<?php 
namespace Music\MBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
 		$builder->add('file');
    }
/*
    public function getName()
    {
        return 'contact';
    }
*/
}