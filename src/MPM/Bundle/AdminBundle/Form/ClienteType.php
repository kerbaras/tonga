<?php

namespace MPM\Bundle\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('asosiationId')
            ->add('sancionado')
            ->add('sancionadoDesde')
            ->add('nombre')
            ->add('apellido')
            ->add('dniTipo')
            ->add('dniNumero')
            ->add('sexo')
            ->add('telefono')
            ->add('mail')
            ->add('sysLog')
            ->add('password')
            ->add('salt')
            ->add('enabled')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
            ->add('credentials')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt')
            ->add('image')
            ->add('imageType')
            ->add('notas')
            ->add('tarifa')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MPM\Bundle\AdminBundle\Entity\Cliente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mpm_bundle_adminbundle_cliente';
    }
}
