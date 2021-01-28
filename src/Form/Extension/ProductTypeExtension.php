<?php

namespace App\Form\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension
{

    const COLOR_RED = 'sylius.form.product.color.red';
    const COLOR_BLUE = 'sylius.form.product.color.blue';
    const COLOR_BLACK = 'sylius.form.product.color.black';

    /**
     * @return array
     */
    static public function getColors() {
        return [
            self::COLOR_BLACK => self::COLOR_BLACK,
            self::COLOR_RED => self::COLOR_RED,
            self::COLOR_BLUE => self::COLOR_BLUE,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('color', ChoiceType::class, [
                'choices' => self::getColors(),
                'label' => 'sylius.form.product.color',
                'placeholder' => 'sylius.form.product.choosePlaceholder',
                'required' => false,
            ])
        ;
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}