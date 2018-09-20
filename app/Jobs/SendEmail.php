<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\WelcomeMail;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $content;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $contents = $this->content;
       try {
            foreach ($contents as $content) {
                Mail::to($content['email'])->send(new WelcomeMail(['name'=>$content['name']]));
            }
            echo 'Mail send successfully';
        } catch (\Exception $e) {
            echo 'Error - '.$e;
            dd($e);
        }
    }
}
