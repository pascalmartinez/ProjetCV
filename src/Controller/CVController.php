<?php


namespace App\Controller;

use App\Form\ContactsType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Message;

class CVController extends Controller

{
    /**
     * @Route("/", name="cv")
     */

     public function new(Request $request, \Swift_Mailer $mailer)
    {
       // creates a task and gives it some dummy data for this example
       $task = new Message();

       $form = $this->createForm(ContactsType::class, $task);

        $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($task);
           $entityManager->flush();

           $contactFormNom=$task->getNom();
           $contactFormMail=$task->getMail();
           $contactFormTitre=$task->getTitre();
           $contactFormMessage=$task->getMessage();

           $message = (new \Swift_Message('Formulaire contact'))
           ->setFrom('send@example.com')
           ->setTo('pmartinez31140@gmail.com')
           ->setSubject('Nouveau formulaire de contact envoyé')
           ->setBody(
               $this->renderView(
                   'Message/mail.html.twig',
                    array(
                        'nom'=>$contactFormNom,
                        'mail'=>$contactFormMail,
                        'titre'=>$contactFormTitre,
                        'message' =>$contactFormMessage,

                        'form'=>$form->createView(),
                    )

                ),
               'text/html'
           );
           $mailer->send($message);
           return $this->redirect($request->getUri());
           $this->addFlash("success", "Votre message a bien été prit en compte, je vous répondrai dès que possible");


           // $form->getData() holds the submitted values
           // but, the original `$task` variable has also been updated

       }

       return $this->render('CV/cv.html.twig', array(
           'form' => $form->createView(),
       ));
    }



}
