<?php

namespace App\Jobs;
use App\Mail\EmailWithAttachments;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $emailTujuan;
    public $data;
    public $attachmentPaths;
    /**
     * Create a new job instance.
     */
    public function __construct($emailTujuan, $data, $attachmentPaths)
    {
        $this->emailTujuan = $emailTujuan;
        $this->data = $data;
        $this->attachmentPaths = $attachmentPaths;
    }

    public function handle()
    {
        $send = new EmailWithAttachments($this->data, $this->attachmentPaths);
        Mail::to($this->emailTujuan)->send($send);
    }
}
