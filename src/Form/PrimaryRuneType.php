<?php

namespace App\Form;

use App\Entity\PrimaryRune;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrimaryRuneType extends AbstractType
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
                    'style' => 'text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.description',
            ])
            ->add('image' , null, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.image',
            ])
            ->add('color' , null, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.color',
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
            'data_class' => PrimaryRune::class,
        ]);
    }
}
