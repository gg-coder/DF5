<?php

namespace App\Controller;

use App\Form\PosttType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use App\Form\PosttType;
use Symfony\Component\HttpFoundation\Request;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index(Request $request)
    {
        $post = new Post();
        $post->setName('Welcome');
        $post->setAge('18');

        $form = $this->createForm(PosttType::class, $post[
        'action' => $this->generateUrl('form')

            ]);

        //handle the request//
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid())
        {

            // saving to the database //
            $en = $this->getDoctrine()->getManager();

            $en->persist($post);
            $en->flush();
        }
        return $this->render('form/index.html.twig', [
            'post_form' => $form->createView()
        ]);
    }
}
