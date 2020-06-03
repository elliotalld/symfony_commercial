<?php

namespace App\Form;
use App\Entity\Famille;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class Produit1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('pa',TextType::class, ['label' => 'Prix Achat : '])
            ->add('pv',TextType::class, ['label' => 'Prix Vente : '])
            ->add('tva',TextType::class,['label' => 'Tva : '])
            ->add('stock',TextType::class,['label' => 'Stock : '])
            ->add('id_famille', EntityType::class, ['label' => 'Famille : ',
            'class' => Famille::class,
             'choice_label' => 'libelle',
         ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
