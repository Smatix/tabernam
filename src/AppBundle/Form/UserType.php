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
            ->add('name', TextType::class, array('label' => 'Imię'))
            ->add('surname', TextType::class, array('label' => 'Nazwisko'))
            ->add('username', TextType::class, array('label' => 'Login'))
            ->add('password', PasswordType::class, array('label' => 'Hasło'))    
            ->add('email', EmailType::class, array('label' => 'E-mail'))    
            ->add('save', SubmitType::class, array('label' => 'Zapisz'));
        
    }
}
