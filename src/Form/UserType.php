<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username' , null, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.username',
            ])
            ->add('password' , PasswordType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.password',
            ])
            ->add('email' , EmailType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.email',
            ])
            ->add('isAdmin', CheckboxType::class, [
                'compound' => '0',
                'label' => 'form.isAdmin',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input',
                    'style' => 'text-align: center;',
                ],
                'label_attr' => ['class' => 'form-check-label'],

            ])
            ->add('save', SubmitType::class, [
                'label' => 'input.save',
                'attr' => [
                    'class' => 'btn btn-primary',
                    'style' => 'width: 50%; text-align: center;',
                ],
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
