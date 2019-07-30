<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => "Titre de l'article",
                'attr' => [
                    'placeholder' => "Renseigner le titre ici ..."
                ]
            ])
            ->add('slug', TextType::class, [
                'label' => "Slug ( sera égale au slug du titre par défaut )",
                'attr' => [
                    'placeholder' => "Renseigner votre slug ici ..."

                ]
            ])
            //->add('createdAt')
            //->add('publishedAt')
            ->add('content', TextareaType::class, [
                'label' => "Contenu de l'article ",
                'attr' => [
                    'placeholder' => "Contenu de l'article ici ...",
                    'rows' => "10"
                ]
            ])
            ->add('image', TextType::class, [
                'label' => "Image",
                'attr' => [
                    'placeholder' => "Renseigner l'Url de votre image'ici ..."
                ]
            ])
            //->add('utilisateur', HiddenType::class)
            //->add('updatedAt')
            //->add('utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
