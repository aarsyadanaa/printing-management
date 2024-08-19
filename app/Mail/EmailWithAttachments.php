<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailWithAttachments extends Mailable
{
    use Queueable, SerializesModels;
    public $path;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($path, $name) 
    // ($data, $attachmentPaths)
    {
        $this->path = $path;
        // //dd($data);
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    $this->subject('Mail from Smart Print')
                    ->view('guest.sendEmail');
        //dd($this->path);
        foreach ($this->path as $file){
            $this->attach($file);
        }
  
        return $this;
    }
}

