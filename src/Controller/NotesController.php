<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/create/{id}" , name="create")
     */

    public function selectedNote(Request $request, $id = null) : Response
    {
        $doctrine = $this->getDoctrine()->getManager();

        if($id == null){
        $note = new Note();
        $form = $this->createForm(TaskFormType::class, $note);
        $note = $form->getData();
        }

        else{
        $note = $doctrine->getRepository(Note::class)->find($id);
        $form = $this->createForm(TaskFormType::class, $note);
        $note = $form->getData();

        }

        $repository = $doctrine->getRepository(Note::class);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $notes = $form->getData();
            $repository->add($notes, true);
            // ... perform some action, such as saving the task to the database
        }

        return $this->renderForm('tasks.html.twig', [
          'form' => $form,
        ]);

        }


     /**
     * @Route("/delete/{id}" , name="delete")
     */

    public function deleteNote(Request $request, $id) : Response
    {

      $doctrine = $this->getDoctrine()->getManager();
      $repository = $doctrine->getRepository(Note::class);
      $note = $repository->find($id);

      $repository->remove($note, true);


      return $this->redirectToRoute('home');
    }


    /**
    * @Route("/" , name="home")
    */

    public function home()
    {
      $doctrine = $this->getDoctrine()->getManager();
      $repository = $doctrine->getRepository(Note::class);
      $notes = $repository->findAll();

      return $this->render('home.html.twig', [
        'notes' => $notes,
      ]);

    }





}
