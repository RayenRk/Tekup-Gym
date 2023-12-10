<?php

namespace App\Form;

use App\Entity\Abonnement;
use App\Entity\Adherant;
use App\Entity\Categorie; // Make sure to include the correct namespace
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbonnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type')
            ->add('date_expiration', DateType::class, [
                'widget' => 'single_text',
                // add any other DateType options you need
            ])
            ->add('date_debut', DateType::class, [
                'widget' => 'single_text',
                // add any other DateType options you need
            ])
            ->add('prix', NumberType::class, [
                'scale' => 2, // add this option if you want to allow decimal places
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                //'choice_label' => function($user){
                //  return $user ->getPrenom() . ' ' . $user ->getNom();}
                //,
                "expanded" =>false,
                "multiple" =>false

            ])
            ->add('categories', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nom_categorie',
                "expanded" =>false,
                'multiple' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abonnement::class,
        ]);
    }
}
