<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="list_article")
     */
    public function index(ArticleRepository $repo)
    {

        $articles = $repo->findAll();

        return $this->render('article/list_article.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles
        ]);
    }


    /**
     * @Route("/{slug}", name="show_article")
     */
    public function showArticle(Article $article)
    {

        //$articles = $repo->findAll();

        return $this->render('article/show_article.html.twig', [
            'controller_name' => 'ArticleController',
            'article' => $article
        ]);
    }
}
