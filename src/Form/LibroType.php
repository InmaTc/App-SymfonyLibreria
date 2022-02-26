<?php

namespace App\Form;

use App\Entity\Autor;
use App\Entity\Editorial;
use App\Entity\Libro;
use App\Entity\Socio;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class LibroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo', TextType::class, [
                'label' => 'Título'
            ])
            ->add('editorial', TextType::class, [
                'label' => 'Editorial del libro',
                'class' => Editorial::class
            ])
            ->add('anioPublicacion', IntegerType::class, [
                'label' => 'Año de publicación'
            ])
            ->add('isbn', TextType::class, [
                'label' => 'ISBN del libro'
            ])
            ->add('paginas', IntegerType::class, [
                'label' => 'Número de páginas'
            ])
            ->add('sinopsis', TextareaType::class, [
                'label' => 'Descripción del libro'
            ])
            ->add('precioCompra', IntegerType::class, [
                'label' => 'Precio del libro'
            ])
            ->add('autores', EntityType::class, [
                'label' => 'Autores del libro',
                'class' => Autor::class,
                'multiple' => true
            ])
            ->add('socio', EntityType::class, [
                'label' => 'Socio',
                'class' => Socio::class
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Libro::class
        ]);
    }
}