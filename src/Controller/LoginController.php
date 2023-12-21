<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Service\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{

    private EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/register', name: 'app_register')]
    public function register(EntityManagerInterface $entityManager, Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = $entityManager->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);

            if($email){
                $this->addFlash('error', 'Cet email existe déjà!');
                return $this->redirectToRoute('app_login');
            }

            $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));
            if ($user->getCodeMailReinitialisation() == null || $user->getCodeMailReinitialisation() == '') {
                $user->setCodeMailReinitialisation(rand(10000, 99999));
            }

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Votre inscription a bien été prise en compte!');
            return $this->redirectToRoute('app_checkCodeInscription', ['sendEmail' => true]);
        }
        return $this->render('login/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/home/checkCode', name: 'app_checkCodeInscription')]
    public function checkCode(EntityManagerInterface $entityManager, Request $request ): Response
    {
        $user = $entityManager->getRepository(User::class)->find($this->getUser()->getId());

        if ($request->query->get('sendEmail')) {
            $code = rand(10000, 99999);
            $user->setCodeMailInscription($code);
            $entityManager->persist($user);
            $entityManager->flush();
            $this->emailService->sendConfirmMail($user->getEmail(), $user);
            $this->addFlash('success', 'Un code vous a été envoyé par mail!');
        }

        return $this->render('login/checkCodeInscription.html.twig');
    }
    #[Route('/home/checkCode/confirm', name: 'app_confirmCodeInscription')]
    public function confirmCode(EntityManagerInterface $entityManager, Request $request): Response
    {
        $code= $request->request->get('code');
        $user = $entityManager->getRepository(User::class)->find($this->getUser()->getId());

        if($user->getCodeMailInscription() != $code){
            $this->addFlash('error', 'Le code est incorrect!');
            return $this->redirectToRoute('app_checkCodeInscription', ['sendEmail' => false]);
        }
        $user->setIsConfirmed(true);
        $entityManager->persist($user);
        $entityManager->flush();
        $this->addFlash('success', 'Votre inscription est confirmée!');
        return $this->redirectToRoute('app_login');
    }

    #[Route('/home/resendCode', name: 'app_resendCodeInscription')]
    public function resendCode(EntityManagerInterface $entityManager, Request $request): Response
    {
        $user = $entityManager->getRepository(User::class)->find($this->getUser()->getId());
        if(!$user){
            $this->addFlash('error', 'Cet email n\'existe pas!');
            return $this->redirectToRoute('app_checkCodeInscription');
        }

        $code = rand(10000, 99999);
        $user->setCodeMailInscription($code);
        $entityManager->persist($user);
        $entityManager->flush();

        $emailService = new EmailService();
        $emailService->sendConfirmMail($user->getEmail(), $user);
        $this->addFlash('success', 'Un nouveau code vous a été envoyé!');
        return $this->redirectToRoute('app_checkCodeInscription');
    }

}
