<?php

namespace App\Form;

use App\Entity\Messagerie;
use App\Entity\Coach;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;


class MessagerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contenu', TextType::class)
            ->add('dateMessage', DateTimeType::class, [
                'data' => new \DateTime(), // Set the default value to the current date and time
                'widget' => 'single_text', // Use a single text input for the date
                'html5' => true, // Use HTML5 input types
            ])
            ->add('coach', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.roles LIKE :role')
                        ->setParameter('role', '%"ROLE_COACH"%');
                },
                'mapped'=> false
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'mapped' => false,
            ]);
        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $messagerie = $event->getData();

                if ($form->get('user')->isSubmitted() && $form->get('user')->isValid()) {
                    // Get the selected user and set its ID
                    $selectedUser = $form->get('user')->getData();
                    $messagerie->setCoach($selectedUser);
                }
                if ($form->get('coach')->isSubmitted() && $form->get('coach')->isValid()) {
                    // Get the selected user and set its ID
                    $selectedUser1 = $form->get('coach')->getData();
                    $messagerie->setUser($selectedUser1);
                }
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Messagerie::class,
        ]);
    }
}
