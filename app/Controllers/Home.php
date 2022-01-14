<?php

namespace App\Controllers;
use \App\Models\Mail;
use CodeIgniter\HTTP\IncomingRequest;

class Home extends BaseController
{
    public function index($mail_address, $path)
    {
        $mail = new Mail();
        $isSent = $mail->sendMail($mail_address, $path);
        $data = [
            'debug' => $isSent
        ];

        if($isSent === true){
            echo view('success');
        } else {
            echo view('error', $data);
        }
    }

    public function mail()
    {

        $conctat_name = $this->getPost('contact_name');


    }
}
