<?php
namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\lib\messenger;
use PHPMVC\Models\EieldsModel;
use PHPMVC\Models\fieldsModel;
use PHPMVC\Models\ProductCategoryModel;
use PHPMVC\Models\ProductSchemeModel;
use PHPMVC\Models\PropsModel;

class ProductSchemeController extends AbstractController
{

    use InputFilter;
    use Helper;

    private $_createActionRoles =
    [
        'PSId'           => 'req|alphanum|between(3,40)',
        'PSName'            => 'req|alphanum|max(15)',

    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('productscheme.default');

        $this->_data['additionalHeaderCss'] = '';
        // ps = Product Schemes
        $this->_data['ps'] = ProductSchemeModel::getAll();

        $this->_view();
    }

    public function createAction()
    {

        $this->language->load('template.common');
        $this->language->load('productscheme.create');
        $this->language->load('productscheme.labels');
        $this->language->load('productscheme.messages');
        $this->language->load('validation.errors');
        $this->_data['additionalHeaderCss'] = '';
        $this->_data['fields'] = fieldsModel::get('SELECT FieldName, FieldId FROM app_fields');
        $this->_data['categories'] = ProductCategoryModel::get('SELECT CategoryName, CategoryId FROM app_products_categories ');
        $this->_data['props'] = PropsModel::getAll();

        if(isset($_POST['submit'])) {
            var_dump($_POST);
            /*$client = new ClientModel();

            $client->Name = $this->filterString($_POST['Name']);
            $client->Email = $this->filterString($_POST['Email']);
            $client->PhoneNumber = $this->filterString($_POST['PhoneNumber']);
            $client->Address = $this->filterString($_POST['Address']);*/
/*
            if($client->save()) {
                $this->messenger->add($this->language->get('message_create_success'));
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), messenger::APP_MESSAGE_ERROR);
            }*/
            //$this->redirect('/clients');
        }

        $this->_view();
    }

    public function editAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $client = ClientModel::getByPK($id);

        if($client === false) {
            $this->redirect('/clients');
        }

        $this->_data['client'] = $client;

        $this->language->load('template.common');
        $this->language->load('clients.edit');
        $this->language->load('clients.labels');
        $this->language->load('clients.messages');
        $this->language->load('validation.errors');

        if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {

            $client->Name = $this->filterString($_POST['Name']);
            $client->Email = $this->filterString($_POST['Email']);
            $client->PhoneNumber = $this->filterString($_POST['PhoneNumber']);
            $client->Address = $this->filterString($_POST['Address']);

            if($client->save()) {
                $this->messenger->add($this->language->get('message_create_success'));
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/clients');
        }

        $this->_view();
    }

    public function deleteAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $client = ClientModel::getByPK($id);

        if($client === false) {
            $this->redirect('/clients');
        }

        $this->language->load('clients.messages');

        if($client->delete()) {
            $this->messenger->add($this->language->get('message_delete_success'));
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/clients');
    }
}