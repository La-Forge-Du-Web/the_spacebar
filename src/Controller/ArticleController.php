<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage") 
     */
    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}", name="article_show")
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
            'slug' => $slug, 
            'comments' => $comments,
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        // TODO - actually heart/unheart an article
        $logger->info('Article is being hearted');

        return $this->json(['hearts' => rand(5, 100)]);
    }
}