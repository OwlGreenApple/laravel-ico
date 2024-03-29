<?php

namespace Icocheckr\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmPaymentAdmin extends Mailable
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
										->subject('[ICOCheckr] Your Payment has been confirmed!')
										->view('emails.confirm-payment-admin')
										->with($this->emaildata);

    }
}
