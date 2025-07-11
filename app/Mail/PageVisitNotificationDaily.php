<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
class PageVisitNotificationDaily extends Mailable
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
            $subject = 'Approaching the Deadline';
            $link = DB::table('link')->value('link') ?? 'http://localhost:8000/';

        return $this->subject($subject)
        ->view('emails.sampleNotificationDaily')
        ->with([
                'emailSubject' => $subject,
                'link' => $link,
             ]);

        }
}
