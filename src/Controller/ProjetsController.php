<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjetsController extends Controller
{
    /**
     * @Route("/projets", name="projets")
     */
    public function index()
    {
        return $this->render('CV/projets.html.twig');
    }
}
