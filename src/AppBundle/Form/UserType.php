<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Imię'])
            ->add('surname', TextType::class, ['label' => 'Nazwisko'])
            ->add('username', TextType::class,['label' => 'Login'])
            ->add('password', PasswordType::class, ['label' => 'Hasło'])    
            ->add('email', EmailType::class, ['label' => 'E-mail'])    
            ->add('save', SubmitType::class, ['label' => 'Zapisz']);
    }
}
