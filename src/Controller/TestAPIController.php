<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestAPIController extends Controller
{
    /**
     * @Route("/test_api", name="API")
     */
    public function index()
    {
        $message = $this->push();

        return $this->render('test_api/api.html.twig', [
            'message' => $message,
        ]);
    }

    public function push()
    {
        $headers = array(
            'Access-Token: o.olH1Klh2Fobe7iKPFXAYbOAvpO1iKr8o',
            'Content-Type: application/json'
        );

        $post = array('type' => 'note' ,
                        'title'=> 'testTitre',
                        'body'=> 'message'
                    );

        $post = json_encode($post);

        $ch = curl_init("https://api.pushbullet.com/v2/pushes");

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt($ch,CURLOPT_TIMEOUT, 20);

        $message = curl_exec($ch);
        curl_close($ch);

        return $message;

    }
}
