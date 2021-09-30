<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    /**
     * 
     */
    private function getConfiguration($label, $placeholder, $options = []): array
    {
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ], $options);
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, $this->getConfiguration('Nom', 'Votre nom'))
            ->add('prenom', TextType::class, $this->getConfiguration('Prenom', 'Votre prénom'))
            ->add('email', EmailType::class, $this->getConfiguration('Email', 'foo@exemple.com'))
            ->add('telephone', TextType::class, $this->getConfiguration('Téléphone', 'Votre numéro de téléphone'))
            ->add('region')
            ->add('password', PasswordType::class, ['label' => 'Mot de passe' ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
