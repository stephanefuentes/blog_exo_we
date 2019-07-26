<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // pour activer faker (données en français)...vu dans la doc
        $faker = \Faker\Factory::create('fr_FR');

        for ($a = 0; $a < 11; $a++) {
            $article = new Article();

            $article->setTitle($faker->catchPhrase)
                ->setSlug($faker->slug)
                ->setCreatedAt($faker->dateTimeBetween("-6 months"))
                ->setContent($faker->realText(250))
                ->setImage("http://placehold.it/300x200");

            if (($faker->boolean)) {
                $article->setPublishedAt($faker->dateTimeBetween("-6 months"));
            }


            for ($c = 0; $c < mt_rand(1, 6); $c++) {
                $comment = new Comment();
                $comment->setAuthorName($faker->firstName())
                    ->setContent($faker->realText(200))
                    ->setCreatedAt($faker->dateTimeBetween("-6 months"))
                    ->setArticle($article);

                $manager->persist($comment);
            }

            $manager->persist($article);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
