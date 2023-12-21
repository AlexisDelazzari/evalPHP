<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class EmailService
{
    private MailerInterface $mailer;

    public function __construct()
    {
        $transport = Transport::fromDsn('smtp://21mailsmtp21@gmail.com:ihij+kcdi+govw+ylrv@smtp.gmail.com:587');
        $this->mailer = new Mailer($transport);
    }

    public function sendInformationMail($toEmail, $user): void
    {
        $email = (new Email())
            ->from('21mailsmtp21@gmail.com')
            ->to($toEmail)
            ->subject('Connexion depuis le site de génération de champion')
            ->html('<p>Bonjour ' . $user->getUsername() . ',</p><p>Vous êtes bien connecté sur le site de génération de champion.</p>');

        $this->mailer->send($email);
    }

    public function sendConfirmMail($toEmail, $user): void
    {
        $email = (new Email())
            ->from('21mailsmtp21@gmail.com')
            ->to($toEmail)
            ->subject('Confirmation de votre inscription sur le site de génération de champion')
            ->html('<p>Bonjour ' . $user->getUsername() . ',</p><p>Votre inscription sur le site de génération de champion a bien été prise en compte.</p><p>Veuillez confirmer votre inscription via le code suivant : ' . $user->getCodeMailInscription() . '</p>');

        $this->mailer->send($email);
    }

    public function sendResetPasswordMail($toEmail, $user): void
    {
        $email = (new Email())
            ->from('21mailsmtp21@gmail.com')
            ->to($toEmail)
            ->subject('Réinitialisation de votre mot de passe sur le site de génération de champion')
            ->html('<p>Bonjour ' . $user->getUsername() . ',</p><p>Veuillez réinitialiser votre mot de passe via le code suivant : ' . $user->getCodeMailReinitialisation() . '</p>');

        $this->mailer->send($email);
    }
}