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
use PHPMVC\Models\SchemePropsModel;

class ProductSchemeController extends AbstractController
{

    use InputFilter;
    use Helper;

    private $_createActionRoles =
    [
        'PSField'               => 'req|alphanum|between(3,40)',
        'PSName'                => 'req|alphanum|max(15)',


    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('productscheme.default');

        $this->_data['additionalHeaderCss'] = '';
        // ps = Product Schemes
        $this->_data['ps'] = ProductSchemeModel::get('SELECT PSId, PSName FROM app_product_scheme');

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

        $ps = new ProductSchemeModel();
        if(isset($_POST['submit'])) {
            if ($_POST['Field'] != '0' && $_POST['Category'] != '0' &&$_POST['PSName'] != '') {
                $ps->PSName = implode(' | ', [$_POST['Field'], $_POST['Category'], $_POST['PSName']]);
                if ($ps->save()) {
                    $this->redirect('/productscheme');
                } else {
                    $this->messenger->add('Scheme Not Saved');
                }
            }
        }

        $this->_view();
    }

    public function editAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $ps = ProductSchemeModel::getByPK($id);

        if($ps === false) {
            $this->redirect('/productscheme');
        }
        $this->_data['additionalHeaderCss'] = '';
        $this->_data['scheme'] = $ps;

        $this->language->load('template.common');
        $this->language->load('productscheme.edit');
        $this->language->load('productscheme.labels');
        $this->language->load('productscheme.messages');
        $this->language->load('validation.errors');
        $this->_data['fields'] = fieldsModel::get('SELECT FieldName, FieldId FROM app_fields');
        $this->_data['categories'] = ProductCategoryModel::get('SELECT CategoryName, CategoryId FROM app_products_categories ');
        $this->_data['props'] = PropsModel::getAll();

        $extractedSchemePropsIds = SchemePropsModel::get('SELECT PropId FROM app_product_scheme_props WHERE SchemeId = ' . $ps->PSId);
        $schemeProps = [];
        foreach ($extractedSchemePropsIds as $sp) {
            $schemeProps[] = $sp->PropId;
        }
        $this->_data['schemeProps'] = $schemeProps;

        if(isset($_POST['submit'])) {
            $ps->PSName = $this->filterString(implode(' | ', [$_POST['Field'], $_POST['Category'], $_POST['PSName']]));
            if($ps->save())
            {
                if(isset($_POST['Props']) && is_array($_POST['Props'])) {
                    $propsIdsToBeDeleted = array_diff($schemeProps, $_POST['Props']);
                    $propsIdsToBeAdded = array_diff($_POST['Props'], $schemeProps);

                    // Delete the unwanted privileges
                    foreach ($propsIdsToBeDeleted as $deletedProp) {
                        $unwantedPrivilege = SchemePropsModel::getBy(['SchemeId' => $deletedProp, 'SchemeId' => $ps->PSId]);
                        $unwantedPrivilege->current()->delete();
                    }

                    // Add the new privileges
//privilege = prop ,, group = scheme ,, groupPrivilege = schemeProp
                    foreach ($propsIdsToBeAdded as $propId) {
                        $psp = new SchemePropsModel();
                        $psp->SchemeId = $ps->PSId;
                        $psp->PropId = $propId;
                        $psp->save();
                    }
                }
                $this->redirect('/productscheme');
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $ps = ProductSchemeModel::getByPK($id);

        if($ps === false) {
            $this->redirect('/productscheme');
        }

        $this->language->load('validation.messages');

        if($ps->delete()) {
            $this->messenger->add($this->language->get('message_delete_success'));
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'), messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect('/productscheme');
    }
}