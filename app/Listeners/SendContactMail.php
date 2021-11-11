<?php

namespace App\Listeners;

use App\Events\ContactRequested;
use App\Mail\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendContactMail implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    protected Mailer $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->onQueue('mail');
        $this->mailer = $mailer;
    }

    public function handle(ContactRequested $event)
    {
        $this->mailer->to('admin@company.com')
            ->to($event->data['email'])
            ->queue(new Contact($event->data));
    }
}
