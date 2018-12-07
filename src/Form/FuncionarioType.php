<?php

namespace App\Form;

use App\Entity\Funcionario;
use App\Entity\Secretaria;
use App\Entity\Remuneracao;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FuncionarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('matricula')
            ->add('cpf')
            ->add('endereco')
            ->add('secretaria', EntityType::class, [
                'class' => Secretaria::class,
                'choice_label' => 'nome',
                'placeholder' => 'Selecione'
                ])            
        ;
        $builder->add('status', ChoiceType::class, array(
            'choices'  => array(
                'Ativo'    =>1,
                'Inativo' =>0
            )));
        $builder->add('tipo', ChoiceType::class, array(
            'choices'  => array(
                'Estatutário'    => 'Estatutário',
                'Comissionado' => 'Comissionado'
            )));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Funcionario::class,
        ]);
    }
}
