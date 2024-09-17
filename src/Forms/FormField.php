<?php

namespace gr_reporting\Forms;


class FormField
{
    //$context utili et obligatoire pour prestashop, bon fonctionnement
    private $context;

    private array $formFields = array();
    //private $var = 'coucou';

    public function __construct()
    {

    }

    // Initialization du formulaire, Attention tout les champs doivent comporter les mêmes éléments
    public function initForm(): array
    {
        $this->formFields = [
          'search' => [
              'name' => 'search',
              'type' => 'text',
              'placeholder' => 'Votre référence',
              //'value' => 'Your search
              'label' => 'Search'
          ],
          'dateStart' =>[
              'name' => 'dateFrom',
              'type' => 'date',
              'label' => 'De'
          ],
          'dateEnd' =>[
              'name' => 'dateTo',
              'type' => 'date',
              'label' => 'à'
          ],
          'errorPayment' => [
              'name' => 'filter_errorPayment',
              'type' => 'checkbox',
              'label' => 'Erreur Paiement',
              'value' => 'Erreur de paiement'
          ],
          'paymentMore48' => [
              'name' => 'filter_paymentMore48',
              'type' => 'checkbox',
              'label' => 'Paiement +48H',
              'value' => 'Paiement +48H'
          ],
          'missingShipping' => [
              'name' => 'filter_missingShipping',
              'type' => 'checkbox',
              'label' => 'Tracking manquant',
              'value' => 'Tracking manquant'
          ],
          'differentsAmounts' => [
              'name' => 'filter_differentsAmounts',
              'type' => 'checkbox',
              'label' => 'Montants Différent',
              'value' => 'Montant payé/facture différent'
          ],
          'submit' => [
              'name' => 'submit',
              'type' => 'submit',
              'value' => 'Envoyer',
              'label' => ''
          ]
        ];
        return $this->formFields;
    }

    public function getFormFields(): array
    {
        return $this->initForm();
    }

    /*public function renderForm()
    {

        $this->context->smarty->assign('formFields', $this->getFormFields());
        $this->context->smarty->assign('var', $this->var);
        $content = $this->context->smarty->fetch('module:gr_reporting/views/templates/admin/form_filter.tpl');
        $this->context->smarty->assign('content', $this->content . $content);

        $this->tpl_view_vars = array(
            'formFields' => $this->getFormFields()
        );

        $this->base_tpl_view = 'form_filter.tpl';

        return parent::renderView();
    }*/
}