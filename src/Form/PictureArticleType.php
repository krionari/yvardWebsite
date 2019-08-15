<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Entity\Media;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;


class PictureArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', FileType::class, [
                'label' => 'Picture JPG, PNG, JPEG file',
                'constraints' => [
        new File([
            'maxSize' => '1000k',
            'mimeTypes' => [
                'image/png',
                'image/jpeg',
                'image/jpg',
            ],
            'mimeTypesMessage' => 'Télécharge un fichier PNG, JPG, où JPEG'
        ])
    ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Media::class,
        ]);
    }
}