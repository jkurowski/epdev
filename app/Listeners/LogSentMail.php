<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Log;

class LogSentMail
{
    public function handle(MessageSent $event)
    {
        Log::info('Email sent to: ' . implode(', ', array_column($event->message->getTo(), 'address')));
    }
}
