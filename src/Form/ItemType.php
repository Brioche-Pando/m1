<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Item;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true
            ])
            ->add('description', TextareaType::class, [
                'required' => true
            ])
            ->add('image', UrlType::class, [
                'required' => true
            ])
            ->add('price', MoneyType::class, [
                'required' => true,
                'html5' => true,
                'attr' => [
                    'min' => 0,
                    'step' => .01
                ]
            ])
            ->add('water', RangeType::class, [
                'required' => true,
                'attr' => [
                    'min' => 1,
                    'max' => 5
                ]
            ])
            ->add('light', RangeType::class, [
                'required' => true,
                'attr' => [
                    'min' => 1,
                    'max' => 5
                ]
            ])
            ->add('category', EntityType::class, [
                'required' => true,
                'class' => Category::class
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
