<?php

namespace AppBundle\Form;

use AppBundle\Entity\Student;
use AppBundle\Entity\Subject;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LectureType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', null, ['label' => 'Статус: '])
            ->add('students', null, ['label' => 'Студент: '])
            ->add('lecturer', null, ['label' => 'Лектор: '])
            ->add('subject', EntityType::class, [
                'label' => 'Дисциплина',
                'class' => Subject::class,
        ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Lecture'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_lecture';
    }


}
