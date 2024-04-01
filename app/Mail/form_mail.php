<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class form_mail extends Mailable
{
    // use Queueable, SerializesModels;

    // /**
    //  * Create a new message instance.
    //  */
    // public function __construct()
    // {
    //     //
    // }

    // /**
    //  * Get the message envelope.
    //  */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Form Mail',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'Mails.mail',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }
    
    use Queueable, SerializesModels;
    public $details;
    public $attachmentPath;
    /**
    * Create a new message instance.
    * @return void
    */
    public function __construct($details, ?string $attachmentPath)
    {
    $this->details = $details;
    $this->attachmentPath = $attachmentPath;
    }
    /**
    * Get the message envelope.
    * @return \Illuminate\Mail\Mailables\Envelope
    */
    public function envelope() {
    return new Envelope(
    subject: $this->details['subject'],
    );
    }
    /** 
    *@return 
    */
    public function build()
    {
        $email = $this->view('Mails.mail')
            ->subject($this->details['subject']);

        if ($this->attachmentPath) {
            $email->attach($this->attachmentPath);
        }

        return $email;
    }
     public function content()
    {
    return new Content(
    view: 'Mails.mail',
     );

}
}