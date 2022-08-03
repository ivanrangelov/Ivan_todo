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
    public function homeAction()
    {
        return new Response('Hi!');

    }

    /**
     * @Route("/mynotes")
     */

    public function mynotes()
    {
      return new Response("My Notes:");
    }


    /**
     * @Route("/{selected_note}")
     */

    public function selectedNote($selected_note)
    {
      return new Response(sprintf('Selected Note: "%s"', $selected_note));
    }
}
