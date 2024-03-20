<?php
namespace App\Form\Type;

use App\Entity\MarquePage;
use App\Entity\MotsCles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AjoutMarquePagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('url', TextType::class)
            ->add('commentaire', TextareaType::class, [
                'required' => false
            ])
            ->add('date_creation', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => true, 
            ])
             ->add('motsCles', EntityType::class, [
                'class' => MotsCles::class,
                'choice_label' => 'motCle',
                'multiple' => true,
                'expanded' => false
            ])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MarquePage::class,
        ]);
    }
}
