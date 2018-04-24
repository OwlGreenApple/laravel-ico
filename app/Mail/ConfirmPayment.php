<?php

namespace Icocheckr\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmPayment extends Mailable
{
    use Queueable, SerializesModels;

		protected $emaildata;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emaildata)
    {
        $this->emaildata = $emaildata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@icocheckr.com', 'Icocheckr')
										->view('emails.confirm-payment')
										->with($this->emaildata);

    }
}
