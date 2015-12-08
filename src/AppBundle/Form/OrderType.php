<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code')
            ->add('summa')
            ->add('currency')
            ->add('cardNumber')
            ->add('cardOwner') 
            ->add('cardMonth')
            ->add('cardYear')
            ->add('cvv', PasswordType::class)
            ->add('save', SubmitType::class)
        ;
    }
}

