<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name' , null, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.name',
            ])
            ->add('description' , null, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.description',
            ])
            ->add('price' , null, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.price',
            ])
            ->add('image' , null, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.image',
            ])
            ->add('isBotte' , CheckboxType::class, [
                'label' => 'form.isBotte',
                'compound' => false, // <-- important
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input',
                    'style' => 'text-align: center;',
                ],
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('isMythic' , CheckboxType::class, [
                'compound' => false, // <-- important
                'label' => 'form.isMythic',
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
