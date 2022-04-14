<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class adminmail extends Mailable
{
    use Queueable, SerializesModels;

    public $admin;
    public function __construct($admin)
    {
        $this-> admin=$admin;
    }


    public function build()
    {
        return $this->from($this->admin["email"])->view("mail.adminmail");
    }
}
