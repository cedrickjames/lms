<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\DB;


class PageVisitNotification extends Mailable
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
            $subject = 'Overdue LOA';
            

             $link = DB::table('link')->value('link') ?? 'http://localhost:8000/';

        return $this->subject($subject)
        ->view('emails.sampleNotification')
        ->with([
                'emailSubject' => $subject,
                  'link' => $link,
             ]);

        }


}
