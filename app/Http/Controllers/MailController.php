<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\TestMail;
use App\Models\Account;

class MailController extends Controller
{
    public function test()
    {
        $startTime = microtime(true);
        $accountEmail = Account::all();
        $code = 123;
        
        for ($i = 0; $i < 1; $i++) {
            $testMail = new TestMail($code);
            $sendEmailJob = new SendEmail($testMail, $accountEmail);
            dispatch($sendEmailJob);
        }
 
        $endTime = microtime(true);
        $timeExecute = $endTime - $startTime;
 
        return "Done. Time execute: $timeExecute";
    }
}
