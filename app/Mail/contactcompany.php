<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactcompany extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $email1;
    public $message1;
    public function __construct($data1,$data2,$data3)
    {
        //
        $this->name = $data1;
        $this->email1 = $data2;
        $this->message1 = $data3;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contactcompany')
                        ->subject('Contact Company');
    }
}
