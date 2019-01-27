<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('Hello World!');        
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        $comments = [
            'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque enim incidunt minima provident consectetur quos! Necessitatibus, expedita pariatur! Veniam repellendus ipsam impedit asperiores, cum incidunt quasi commodi dolores itaque unde?',
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores pariatur harum porro perferendis. Aperiam illum atque provident quos mollitia illo quaerat distinctio sunt quas, necessitatibus accusantium soluta aspernatur hic! Quia?',
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus harum est natus cum quae. Labore excepturi ipsa sapiente iste enim veritatis vel dicta distinctio voluptatibus, est molestiae iusto expedita provident.',
        ];

        dump($slug, $this);

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments,
        ]);
    }
}