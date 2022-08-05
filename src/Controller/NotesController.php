<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotesController extends AbstractController
{

    /**
     * @Route("/")
     */

    public function mynotes()
    {
      return new return $this->render('/home.html.twig');
    }


    /**
     * @Route("/{selected_note}")
     */

    public function selectedNote($selected_note)
    {
      return new Response(sprintf('Selected Note: "%s"', $selected_note));
    }
}
