<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface as FormFormBuilderInterface;

class LoginType extends AbstractType
{
    public function buildForm(FormFormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,['required'=>true,])
            ->add('password', PasswordType::class,['required'=>true,]);
        ;
    }
}