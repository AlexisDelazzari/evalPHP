<?php

namespace App\Form;

use App\Entity\Champion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChampionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.championName',
            ])

            ->add('image', null, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.championImage',
            ])

            ->add('description', null, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => ' text-align: center;',
                ],
                'label_attr' => ['class' => 'form-label'],
                'label' => 'form.championDescription',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Champion::class,
        ]);
    }
}
