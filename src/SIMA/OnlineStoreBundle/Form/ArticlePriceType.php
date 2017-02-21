<?php

namespace SIMA\OnlineStoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticlePriceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('purchasePrice')->add('priceHT')->add('priceTTC')->add('priceQuotation')->add('priceDiscont')->add('offerPrice')->add('supplier')->add('article')  ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIMA\OnlineStoreBundle\Entity\ArticlePrice'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sima_onlinestorebundle_articleprice';
    }


}
