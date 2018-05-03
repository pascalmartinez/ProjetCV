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
use App\Entity\Experiences;


class CVController extends Controller

{
    /**
     * @Route("/", name="cv",requirements={"page"="\d+"})
     */

     public function new(Request $request, \Swift_Mailer $mailer)
    {
        //get files database Experience
        $repository_Exp = $this->getDoctrine()->getRepository(Experiences::class);
        $experiences = $repository_Exp->findAll();

        // //get files database formations
        // $repository_Forma = $this->getDoctrine()->getRepository(Formations::class);
        // $formations = $repository_Forma->findAll();



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
           $this->push($contactFormNom. " : " . $contactFormTitre, $contactFormMessage);
           $mailer->send($message);
           return $this->redirect($request->getUri());
           $this->addFlash("success", "Votre message a bien été prit en compte, je vous répondrai dès que possible");


           // $form->getData() holds the submitted values
           // but, the original `$task` variable has also been updated

       }

       return $this->render('CV/cv.html.twig', array(
           'form' => $form->createView(),
           'exp'  => $experiences,

           // 'forma'=> $formations
              ));
   }


//Fonction messagerie instantannée PushBullet
   public function push($title, $body)
   {
       $headers = array(
           'Access-Token: o.olH1Klh2Fobe7iKPFXAYbOAvpO1iKr8o',
           'Content-Type: application/json'
       );

       $post = array('type' => 'note' ,
                       'title'=> $title,
                       'body'=> $body
                   );

       $post = json_encode($post);

       $ch = curl_init("https://api.pushbullet.com/v2/pushes");

       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); //=header
       curl_setopt($ch,CURLOPT_POST, 1);// réaliser la méthode
       curl_setopt($ch,CURLOPT_POSTFIELDS,$post); // contenu du post
       // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //retour du message d'erreur
       curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3); //fin de session en cas de problème
       curl_setopt($ch,CURLOPT_TIMEOUT, 20);//fin de la requete en cas de problème

       curl_exec($ch); //execute la requete et envoi le message
       curl_close($ch); //ferme la connection

   }

}
