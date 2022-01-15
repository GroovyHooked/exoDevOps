<?php

namespace App\Controllers;

use App\Models\Mail;
use App\Models\Customer;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Request;
use CodeIgniter\API\ResponseTrait;


class Home extends BaseController
{

    public function path()
    {
        $request = service('request');
        $path = $request->getVar('path');
        $email = $request->getVar('mail');

        $Customer = new Customer();
        $userData = $Customer->doesUserDataExist($email);
        if(isset($userData)){
            $Customer->insertPathIfDataExists($path, $email);
            echo 'User data inserted in database, email will be sent';
            $this->sendPdf($email);
        } else {
            $Customer->insertPathAndMail($path, $email);
            echo 'Path and user email inserted in database';
        }

    }

    public function userdata()
    {
        //$jsonData = $this->request->getJSON();
        $Customer = new Customer();
        $request = service('request');

        $first_name = $request->getVar('nom');
        $last_name = $request->getVar('prenom');
        $email = $request->getVar('mail');

        $pathOrNot = $Customer->isPathInserted($email);

        if($pathOrNot == '' || $pathOrNot == null){
            $isUserCreated = $Customer->insertUserData($first_name, $last_name, $email);
            if($isUserCreated)
                echo 'User data inserted in database';
        } else {
            $isDataInserted = $Customer->updateUserDataWithPath($first_name, $last_name, $email, $pathOrNot);
            if($isDataInserted)
                echo 'User data inserted in database, email will be sent';
                $this->sendPdf($email);
        }

    }

    function sendPdf($email)
    {
        $Mail = new Mail();
        $Customer = new Customer();

        $dataArr = $Customer->getAllData($email);
        $Mail->sendMail($dataArr[0], $dataArr[1], $dataArr[2], $dataArr[3]);

    }


    /*
    public function test()
    {
        $session = session();
        $mail = $session->get('mail');
        $path = $session->get('path');
        if ($session->get('mail')) {
            $foo = $session->get('mail');
            echo $mail . ' ' . $path;
        } else {
            $foo = 'error';
            echo $foo;
            echo 'test';
        }
    }

    public function test2()
    {
        $Customer = new Customer();
        $email = 'thomasariot@gmail.com';
        $pathOrNot = $Customer->doesUserDataExist($email);
        if(isset($pathOrNot)){
            echo var_dump($pathOrNot);
        } else {
            echo 'Test';
        }
    }

    public function pdf()
    {
        // https://stackoverflow.com/questions/41574903/codeigniter-return-a-pdf-file-from-controller-using-readfile
        $filepath = "/path/to/file.pdf";
        if (!file_exists($filepath)) {
            throw new Exception("File $filepath does not exist");
        }
        if (!is_readable($filepath)) {
            throw new Exception("File $filepath is not readable");
        }
        http_response_code(200);
        header('Content-Length: ' . filesize($filepath));
        header("Content-Type: application/pdf");
        header('Content-Disposition: attachment; filename="downloaded.pdf"'); // feel free to change the suggested filename
        readfile($filepath);

        exit;
    }
    */

}
