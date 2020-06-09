<?php

namespace App\Controller;

use App\Form\PosttType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use App\Form\PosttType;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index()
    {
        $post = new Post();
        $post->setName('Welcome');
        $post->setAge('18');

        $form = $this->createForm(PosttType::class, $post);

        //handle the request//


        return $this->render('form/index.html.twig', [
            'post_form' => $form->createView()
        ]);
    }
}
