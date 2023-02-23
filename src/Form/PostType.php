<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('PostUserID',EntityType::class,['class' => User::class,'choice_label' => 'username'])
            ->add('userbeforeshare',HiddenType::class,['mapped'=>false,'required' => false])
            ->add('content', TextareaType::class, [
                'label' => 'Write something',
                'attr' => [
                    'rows' => 3,
                ],
            'required'=>true])
            ->add('image',FileType::class,[
                'label' => 'Image',
                'required' => false,
                'mapped' => false])
            ->add('date',DateTimeType::class,[
                'data' => new \DateTime(),
                'mapped' => false,
            ])
            ->add('status',ChoiceType::class,[
                'choices' => [
                    'Public' => 1,
                    'Private' => 2,
                    'Only Me' => 3,
                ],
                'data' => 1,
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
