<?php

namespace App\Form;

use App\Entity\Coach;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoachType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            // Fields from the User class
            ->add('nom', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('date_naissance', null, [
                'label' => 'Date de naissance',
            ])
            ->add('cin', TextType::class, [
                'label' => 'CIN',
            ])
            ->add('email', TextType::class, [
                'label' => 'Email',
            ])
            ->add('password', TextType::class, [
                'label' => 'Mot de passe',
            ])
            ->add('annee_experience', IntegerType::class, [
                'label' => 'Année d\'expérience',
            ])
            ->add('categorie', null, [
                'label' => 'Catégorie',
            ])
            // Add any other fields from the User class as needed
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Coach::class,
        ]);
    }
}
