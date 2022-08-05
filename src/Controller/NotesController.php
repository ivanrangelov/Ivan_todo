<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Note;
use App\Form\TaskFormType;

class NotesController extends AbstractController
{

    /**
     * @Route("/home")
     */

    public function mynotes()
    {

      return $this->render('/home.html.twig');
    }


    /**
     * @Route("/myforms")
     */

    public function selectedNote()
    {

        $note = new Note();


        $form = $this->createForm(TaskFormType::class, $note);

        return $this->renderForm('tasks.html.twig', [
          'form' => $form,
        ]);

    }
}
