<?php

namespace App\Form;

use App\Entity\User;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('birthday',TextType::class,['required'=>true,])
        ->get('birthday')->addModelTransformer(new StringToDateTimeTransformer());
        $builder
            ->add('username',TextType::class,['required'=>true,])
            // ->add('password', RepeatedType::class, [
            //     'type' => PasswordType::class,
            //     'first_options' => ['label' => 'Password'],
            //     'second_options' => ['label' => 'Confirm Password']
            // ])
            ->add('password',PasswordType::class,['required'=>true,])
            ->add('email', EmailType::class,['required'=>true,])
            ->add('phone',NumberType::class,['required'=>true,])
            ->add('gender',ChoiceType::class,[
                'choices' => [
                    'Male' => 'male',
                    'Female' => 'female',
                ],
                'expanded' => true, // display choices as radio buttons
                'label' => 'Gender',
                'required' => true
            ])
            ->add('job',HiddenType::class,['data' => 'Updating'])
            ->add('hometown',HiddenType::class,['data' => 'Updating'])
            ->add('status',HiddenType::class,['data' => 'Unknown'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
