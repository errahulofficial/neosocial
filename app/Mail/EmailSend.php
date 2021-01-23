<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailSend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $SendTemplate;
    public function __construct($SendTemplate)
    {
        $this->SendTemplate = $SendTemplate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@neosocial.com','NeoSocial')
        ->subject($this->SendTemplate->emailSubject)
        ->view('/mail/SendTemplate');
    }
}
