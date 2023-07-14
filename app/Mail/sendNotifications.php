<?php

namespace App\Mail;

use App\Http\Controllers\production_lineController;
use App\Models\production_lines_status;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendNotifications extends Mailable
{
    use Queueable, SerializesModels;
    protected $productionLine;
    PUBLIC $subject;
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
