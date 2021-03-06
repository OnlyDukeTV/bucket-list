<?php

namespace App\Form;

use App\Entity\Clients;

use App\Entity\Offres;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\VarDumper\Caster\DateCaster;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, ["label" => "Prenom :"])
            ->add('nom', TextType::class, ["label" => "Nom :"])
            ->add('age', IntegerType::class, ["label" => "Age :"])
            // JOINTURE FORM Offre.id to Clients
            ->add('dateReservation', DateType::class, ["label" => "Date de Reservation", "widget" => "single_text"])
            ->add('Offre', EntityType::class, ['class' => Offres::class, 'choice_label' => 'nom', "label" => "Choisir votre offre"])
            ->add('ajouter', SubmitType::class, ["label" => "Ajouter Reservation"])
            ->add('effacer', ResetType::class, ["label" => "Effacer"]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}
