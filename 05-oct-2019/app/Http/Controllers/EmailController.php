<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;
// namespace App\Mail;
use App\Mail\CompanyVerificationEmails;
class EmailController extends Controller
{
    public function sendEmail()
    {
        $mail_to = 'vinove@getnada.com';

        Mail::to($mail_to)->send(new CompanyVerificationEmails);

        dd('Mail send successfully');
    }
}
