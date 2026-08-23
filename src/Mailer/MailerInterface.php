<?php
declare(strict_types=1);

namespace App\Mailer;

interface MailerInterface 
{
    public function sendMail(string $to, string $subject, string $message, array $attachments = []): bool;
}

?>

