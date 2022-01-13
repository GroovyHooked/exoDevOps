<?php
namespace App\Models;

class Mail
{
    public function sendMail($mail, $path){
        $email = \Config\Services::email();
        $config = [
            'mailType' => 'html'
        ];
        $email->initialize($config);
        $email->setFrom('service_client@bazar.com', 'Service Client');

        $email->setTo($mail);
        $email->setSubject('Récapitulatif commande');
        $email->setMessage('<h1 style="color: black">Confirmation de commande</h1> ');

        $email->attach($path);
        $bar = 'https://www.orimi.com/pdf-test.pdf';
        $foo = 'thomascariot@gmail.com';

        //$file = new \CodeIgniter\Files\File();
        //echo $file->getRealPath();

        if (!$email->send()){
            return $email->printDebugger(['headers', 'subject', 'body']);
        } else {
            return true;
        }
    }
}