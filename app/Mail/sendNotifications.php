<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendNotifications extends Mailable
{
    use Queueable, SerializesModels;
    protected $productionLine;
    public $subject;
    /**
     * Create a new message instance.
     */
    public function __construct($productionLine, $subject)
    {
        $this->productionLine = $productionLine;
        $this->subject = $subject;
    }
    public function build()
    {
        return $this
                    ->view('emails.emailExample')
                    ->subject($this->subject)
                    ->with(['productionLine' => $this->productionLine]);
    }

}
