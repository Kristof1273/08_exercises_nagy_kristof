<?php
declare(strict_types=1);

namespace App\Mailer;

class Mailer implements MailerInterface
{
    private string $senderEmail;

    public function __construct(string $senderEmail = 'no-reply@example.com')
    {
        if (!filter_var($senderEmail, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid sender email address.");
        }
        $this->senderEmail = $senderEmail;
    }

    /**
     * @param array<string> $attachments Array of file paths
     */
    public function sendMail(string $to, string $subject, string $message, array $attachments = []): bool
    {
        $headers = $this->buildHeaders($attachments);
        
        return mail($to, $subject, $message, $headers);
    }

    /**
     * @param array<string> $attachments
     */
    private function buildHeaders(array $attachments): string
    {
        $headers = "From: {$this->senderEmail}\r\n";
        
        $validAttachments = $this->validateAttachments($attachments);
        if (!empty($validAttachments)) {
            $headers .= "Attachments: " . implode(", ", $validAttachments) . "\r\n";
        }

        return $headers;
    }

    /**
     * @param array<string> $attachments
     * @return array<string>
     */
    private function validateAttachments(array $attachments): array
    {
        $validPaths = [];
        foreach ($attachments as $filePath) {
            if (!file_exists($filePath)) {
                throw new \InvalidArgumentException("Attachment file does not exist: {$filePath}");
            }
            $validPaths[] = $filePath;
        }
        return $validPaths;
    }
}