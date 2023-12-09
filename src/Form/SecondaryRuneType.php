<?php

namespace App\Form;

use App\Entity\PrimaryRune;
use App\Entity\SecondaryRune;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SecondaryRuneType extends AbstractType
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
            ->add('image' , null, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.image',
            ])
            ->add('primaryRune' , PrimaryRuneType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.primaryRune',
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
            'data_class' => SecondaryRune::class,
        ]);
    }
}
