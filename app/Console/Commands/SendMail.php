<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\WelcomeMail;
use Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail';

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
        $content = ['email'=>'rizwan@gmail.com','name'=>'Rizwan Hiroli'];
         Mail::to($content['email'])->send(new WelcomeMail(['name'=>$content['name']]));
    }
}
