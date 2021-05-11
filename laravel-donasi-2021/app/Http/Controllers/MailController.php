<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SignUpEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($nama, $email, $verification_code){
        $data = [
            'nama' => $nama,
            'verification_code' => $verification_code,
        ];

        Mail::to($email)->send(new SignUpEmail($data));
    }   
}
