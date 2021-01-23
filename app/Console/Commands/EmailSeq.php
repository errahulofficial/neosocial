<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\EmailSend;
use App\EmailSequence;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSeq extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    { 
        $curr_date = date('Y-m-d H:i:s', time());
        $email = EmailSequence::where('send_schedule', $curr_date)->get();
        if($email != ''){
            foreach ($email as $send) {           
        $data_base[0]['body'] = $send->email_template;
        $vars = array();
        $mailBodyData =  strtr($data_base[0]['body'], $vars);
        $TestMail = new \stdClass();
        $TestMail->emailSubject = $send->subject;
        $TestMail->mailBodyData = $mailBodyData;
 
        Mail::to($send->send_to)->send(new EmailSend($TestMail));
    }
        }
    }
}
