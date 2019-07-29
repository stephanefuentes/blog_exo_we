<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;

class AdminArticleController extends AbstractController
{
    /**
     * @Route("/admin/article", name="admin_article")
     */
    public function index(ArticleRepository $repo)
    {
        $articles = $repo->findBy([], ["createdAt" => "DESC"]);

        return $this->render('admin_article/index.html.twig', [
            'controller_name' => 'AdminArticleController',
            'articles' => $articles
        ]);
    }


    /**
     * @Route("/admin/article/{id}/edit", name="admin_article")
     */
    public function editArticle(Article $article)
    {
        

        return $this->render('admin_article/index.html.twig', [
            'controller_name' => 'AdminArticleController'
            
        ]);
    }
}
