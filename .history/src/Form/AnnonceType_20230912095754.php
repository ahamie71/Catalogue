<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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

        ->add('image', TextType::class, [
            'required' => true,
            'label' => 'Image (URL)', // Vous pouvez ajuster l'étiquette selon vos besoins
        ])
        
        
        ->add('category',EntityType::class,[
            'class' => Category::class,
            'choice_label'=> 'name',
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
