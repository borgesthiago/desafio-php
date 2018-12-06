<?php

namespace App\Form;

use App\Entity\Funcionario;
use App\Entity\Secretaria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FuncionarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('matricula')
            ->add('cpf')
            ->add('endereco')
            //->add('secretaria')
            ->add('secretaria', EntityType::class, [
                'class' => Secretaria::class,
                'choice_label' => 'nome',
                'placeholder' => 'Selecione'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Funcionario::class,
        ]);
    }
}
