<?php

namespace App\Form;

use App\Entity\Champion;
use App\Entity\GeneratedChampion;
use App\Entity\Item;
use App\Entity\SecondaryRune;
use App\Entity\Summoner;
use App\Entity\User;
use App\Repository\ItemRepository;
use App\Repository\SummonerRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Enum\GeneratedChampionStatus;

class GeneratedChampionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('champion', null, [
                'label' => 'Champion',
                'choice_label' => 'name',
                'class' => Champion::class,
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => true
            ])
            ->add('summoner1', null, [
                'choice_label' => 'name',
                'choice_translation_domain' => 'messages',
                'class' => Summoner::class,
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => true
            ])
            ->add('summoner2', null, [
                'choice_label' => 'name',
                'choice_translation_domain' => 'messages',
                'class' => Summoner::class,
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => true
            ])
            ->add('secondaryRune1', null, [
                'choice_label' => 'name',
                'choice_translation_domain' => 'messages',
                'class' => SecondaryRune::class,
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => true
            ])
            ->add('secondaryRune2', null, [
                'choice_label' => 'name',
                'choice_translation_domain' => 'messages',
                'class' => SecondaryRune::class,
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => true
            ])
            ->add('user', null, [
                'choice_label' => 'email',
                'class' => User::class,
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => true
            ])
            ->add('botteItems', EntityType::class, [
                'label' => 'Bottes',
                'choice_label' => 'name',
                'class' => Item::class,

                'required' => true,
                'expanded' => true,
                'query_builder' => function (ItemRepository $itemRepository) {
                    return $itemRepository->createQueryBuilder('i')
                        ->where('i.isBotte = true');
                }
            ])

            ->add('mythicItems', EntityType::class, [
                'label' => 'Items mythiques',
                'choice_label' => 'name',
                'class' => Item::class,

                'required' => true,
                'expanded' => true,
                'query_builder' => function (ItemRepository $itemRepository) {
                    return $itemRepository->createQueryBuilder('i')
                        ->where('i.isMythic = true');
                }
            ])

            ->add('legendaryItems', EntityType::class, [
                'label' => 'Items',
                'choice_label' => 'name',
                'class' => Item::class,

                'required' => true,
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function (ItemRepository $itemRepository) {
                    return $itemRepository->createQueryBuilder('i')
                        ->where('i.isBotte = false')
                        ->andWhere('i.isMythic = false');
                }
            ])

            ->add('status', EnumType::class, [
                'label' => 'Status',
                'class' => GeneratedChampionStatus::class,
                'choice_translation_domain' => 'messages',
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => true
            ])

            ->add('save', SubmitType::class, [
                'label' => 'Generate',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            //summoner1 et summoner2 sont différents
            'constraints' => [
                new Callback([$this, 'validateSummoners'])
            ],
            'by_reference' => false,
        ]);
    }

   public function validateSummoners($data, $context): void
   {
        if ($data->getSummoner1() === $data->getSummoner2()) {
           $context->buildViolation('Les deux invocateurs doivent être différents')
               ->atPath('summoner1')
               ->addViolation();
        }
        //les deux secondaryRune sont différents et leur primaryRune sont différents
         if ($data->getSecondaryRune1() === $data->getSecondaryRune2()) {
              $context->buildViolation('Les deux runes secondaires doivent être différentes')
                ->atPath('secondaryRune1')
                ->addViolation();
         }
         if ($data->getSecondaryRune1()->getPrimaryRune() === $data->getSecondaryRune2()->getPrimaryRune()) {
              $context->buildViolation('Les deux runes primaires doivent être différentes')
                ->atPath('secondaryRune1')
                ->addViolation();
         }
       //on regarde si on a une botte dans les items
       $botte = false;
       foreach ($data->getBotteItems() as $item) {
           if ($item->getIsBotte()) {
               $botte = true;
           }
       }
       if (!$botte) {
           $context->buildViolation('Il faut au moins une botte')
               ->atPath('botteItems')
               ->addViolation();
       }

       //on regarde si on a un item mythique dans les items
       $mythic = false;
       foreach ($data->getMythicItems() as $item) {
           if ($item->getIsMythic()) {
               $mythic = true;
           }
       }

       if (!$mythic) {
           $context->buildViolation('Il faut au moins un item mythique')
               ->atPath('mythicItems')
               ->addViolation();
       }

       //on regarde si on a 6 items
       if (count($data->getLegendaryItems()) !== 6) {
           $context->buildViolation('Il faut 6 items')
               ->atPath('legendaryItems')
               ->addViolation();
       }
   }
}
