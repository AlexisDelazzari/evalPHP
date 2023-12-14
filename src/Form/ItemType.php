<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
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
                'attr' => [
                    'class' => 'form-check-input',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-check-label'],
                'label' => 'form.isBotte',
            ])
            ->add('isMythic' , CheckboxType::class, [
                'attr' => [
                    'class' => 'form-check-input',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-check-label'],
                'label' => 'form.isMythic',
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
