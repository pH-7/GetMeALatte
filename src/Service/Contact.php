<?php

declare(strict_types=1);

namespace GetMeALatteLike\Service;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport\SendmailTransport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email as EmailMessage;

class Contact
{
    public function sendEmailToSiteOwner(array $details): bool
    {
        $bodyMessage = escape($details['message']);
        if (strlen($details['phoneNumber']) > 5) {
            $bodyMessage .= "\n\n" . sprintf('Phone Number: <a href="tel:%s">%s</a>.', escape($details['phoneNumber']), $details['phoneNumber']) . "\n\n";
        }

        try {
            $transport = new SendmailTransport();
            $mailer = new Mailer($transport);

            $emailMessage = new EmailMessage();
            $emailMessage->from(new Address(escape($details['email']), escape($details['name'])));
            $emailMessage->to(new Address($_ENV['ADMIN_EMAIL'], $_ENV['SITE_NAME']));
            $emailMessage->subject('Contact Form');
            $emailMessage->priority(EmailMessage::PRIORITY_NORMAL);
            $emailMessage->text($bodyMessage);

            $mailer->send($emailMessage);

            return true;
        } catch (TransportExceptionInterface $error) {
            // TODO Improvement: Use Monolog would be nice :)
            error_log($error->getMessage());

            return false;
        }
    }
}
