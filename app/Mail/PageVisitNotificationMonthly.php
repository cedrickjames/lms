<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PageVisitNotificationMonthly extends Mailable
{
     use Queueable, SerializesModels;
 
    public $loa;
    public $pendingRequirements;
    
    public function __construct($loa, $pendingRequirements)
        {
        $this->loa = $loa;
        $this->pendingRequirements = $pendingRequirements;
        }


    public function build()
        {
            $subject = 'LMS Advance Notice';
        return $this->subject($subject)
        ->view('emails.sampleNotificationMonthly')
        ->with([
                'emailSubject' => $subject,
                'link'=> 'http://localhost:8000',
             ]);

        }
}
