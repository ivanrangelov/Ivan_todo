<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotesController extends AbstractController
{
    /**
    * @Route("/notes")
     */
    public function notesAction()
    {
        return new Response('Hi!');

    }
}
