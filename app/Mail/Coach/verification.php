<?php

namespace App\Mail\Coach;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class verification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($data)
    {
        $this->email_data = $data;
    }

    public function build()
    {
        return $this->from('support@judoksa.org', 'KSA Boxing Federation')
        ->subject('KSA-Boxing-Federation Email-Verification')
        ->view('mail.coach.verification', ['email_data' => $this->email_data]);
    }
}
