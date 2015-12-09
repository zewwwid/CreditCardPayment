<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class, array('label' => 'Номер заказа'))
            ->add('summa', TextType::class, array('label' => 'Сумма'))
            ->add('currency', EntityType::class, array('class' => 'AppBundle:Currency', 'choice_label' => 'name', 'label' => 'Валюта'))
            ->add('cardNumber', TextType::class, array('label' => 'Номер карты'))
            ->add('cardOwner', TextType::class, array('label' => 'Владелец')) 
            ->add('cardMonth', TextType::class)
            ->add('cardYear', TextType::class)
            ->add('cvv', PasswordType::class, array('label' => 'CVV2/CVC2'))
            ->add('save', SubmitType::class, array('label' => 'Купить'))
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Order',
        	'csrf_protection' => false
        ));
    }
}

