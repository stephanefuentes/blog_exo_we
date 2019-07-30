<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Utilisateur;

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
     * @Route("/admin/article/{id}/edit", name="admin_article_edit")
     * @Route("/admin/article/new", name="admin_article_new")
     * 
     */
    public function editArticle(Article $article = null, Request $request, ObjectManager $manager, Utilisateur $utilisateur)
    {
        if(!$article)
        {
            $article = new Article();
            //$article->setUtilisateur($utilisateur);
        }

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            dump($article);
            die();
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('list_article');
        }

        return $this->render('admin_article/edit_article.html.twig', [
            'controller_name' => 'AdminArticleController',
            'formArticle' => $form->createView()

        ]);
    }
}
