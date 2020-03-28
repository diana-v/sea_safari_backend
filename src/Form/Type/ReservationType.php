<?php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('passengers', TextType::class)
            ->add('phone', TextType::class)
            ->add('email', EmailType::class)
            ->add('destination', TextType::class)
            ->add('date', DateType::class, ['input' => 'datetime', 'widget' => 'single_text'])
        ;
    }
}