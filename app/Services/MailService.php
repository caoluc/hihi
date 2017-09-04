<?php

namespace App\Services;
use Mail;

class MailService extends BaseService
{
    public static function sendMail($layout, $emailTo, $subject, $data = [], $fromUser = null)
    {
        Mail::queue($layout, $data, function($message) use ($emailTo, $subject, $fromUser) {
            $message->to($emailTo);
            $message->subject($subject);

            if ($fromUser) {
                $message->from($fromUser->email, $fromUser->name);
            } else {
                $message->from(config('mail.from.address'), config('mail.from.name'));
            }
        });
    }
}
