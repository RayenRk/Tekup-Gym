<?php

namespace App\Form;

use App\Entity\Imc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImcType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('weight', NumberType::class, [
                'label' => 'Poids (en kg)',
                'attr' => [
                    'placeholder' => 'Entrez votre poids en kilogrammes',

                ],
            ])
            ->add('height', NumberType::class, [
                'label' => 'Taille (en cm)',
                'attr' => [
                    'placeholder' => 'Entrez votre taille en centimètres',

                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Imc::class,
        ]);
    }
}
