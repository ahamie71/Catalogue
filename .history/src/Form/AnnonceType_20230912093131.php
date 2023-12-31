<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title',TextType::class,[
            'required'=> 'required',
            'label'=>'Titre',
        ])
        ->add('description',TextareaType::class,[
            'required' => 'required',
            'label'=>'Description'
        ])

        ->add('ima')
        ->add('category',EntityType::class,[
            'class' => Category::class,
            'choice_label'=> 'nom',
            'label'=>'Category'
        ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
