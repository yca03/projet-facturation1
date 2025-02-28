<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\TypeProduit;
use App\Form\Facture\DetailFactureType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle')
            ->add('uid', HiddenType::class)
            ->add('updateDate', DateType::class, [
                'widget' => 'single_text',
                'data' => new \DateTime(),
            ])
            ->add('prix')
            ->add('typeProduit', EntityType::class, [
                'class' => TypeProduit::class,
                'placeholder'=>'Sélectionnez le type de produit'
            ])
            ->add('tva')
            ->add('quantite', TextType::class, [
                'attr' => [
                    'placeholder' => 'Sélectionnez une quantité pour l\'offre',
                ]])
            ->add('detailProduits', CollectionType::class, [
            'entry_type' => DetailProduitType::class,
            'entry_options' => ['label' => false],
            'allow_add' => true,
            'allow_delete'=>true,
            'prototype'=>true
        ])


        ;


        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $produit = $event->getData();
            $form = $event->getForm();

            // Vérifier si le champ uid est vide
            if (empty($produit->getUid())) {
                // Générer un identifiant unique
                $uid = uniqid();

                // Définir l'identifiant unique dans le champ uid
                $produit->setUid($uid);
            }
        });
    }






    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
