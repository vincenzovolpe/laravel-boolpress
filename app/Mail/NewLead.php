<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewLead extends Mailable
{
    use Queueable, SerializesModels;

    public $messaggio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($new_message)
    {
        $this->messaggio = $new_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     // Viene chiamata quando voglio inviare un email
    public function build()
    {
        // Quando si mandano le email da sistema è sempre bene usare lo stesso dominio del sito, altrimenti vengono spammate.
        return $this->from('info@sito.com')
        ->subject('Nuovo messaggio ricevuto dal sito')
        ->view('mail.nuovo-messaggio');
    }
}
