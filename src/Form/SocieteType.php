<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Societe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('RaisonSocial')
            ->add('FormeJuridique', ChoiceType::class, [
                'choices' => [
                    'Entreprise Individuelle (EI)' => 'EI',
                    'Société Anonyme (SA)' => 'SA',
                    'Société à Responsabilité Limitée (SARL)' => 'SARL',
                    'Société à Responsabilité Limitée Unipersonnelle (SARLU)' => 'SARLU',

                ],
                'placeholder' => 'Sélectionner un type de société',
            ])
            ->add('Activite')
            ->add('Numero')
            ->add('Siege')
            ->add('Telephone')
            ->add('ville')
            ->add('date',DateType::class,[
                'data' => new \DateTime(),
            ])
            ->add('AdressePostal')
            ->add('pays')
            ->add('Email')
            ->add('SiteInternet')
            ->add('CodeCommercial')
            ->add('RegimeFiscal')
//            ->add('relation', EntityType::class, [
//                'class' => User::class,
//                'choice_label' => 'id',
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}
