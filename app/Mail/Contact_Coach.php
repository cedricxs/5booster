<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact_Coach extends Mailable
{
    public $content = '';
    public $from_user = null;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param $subject
     * @param $content
     */
    public function __construct($subject, $content, $user)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->from_user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('text.message')->with('slot',$this->subject.' '.$this->content)->with('user',$this->from_user);
    }
}
