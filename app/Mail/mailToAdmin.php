<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $attach;
    public $number;
    public $comment;

    public function build()
    {
        foreach ($this->attach as $at){
            $this->attach('../storage/app/public/'.$at);
        }
        return $this->view('mail')->with($this->number)->with($this->comment);
    }
}
