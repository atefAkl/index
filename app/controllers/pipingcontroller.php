<?php
namespace PHPMVC\Controllers;
use PHPMVC\lib\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\lib\messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\PrivilegeModel;
use PHPMVC\Models\ProductCategoryModel;
use PHPMVC\Models\PipingModel;
use PHPMVC\Models\UserGroupModel;
use PHPMVC\Models\UserGroupPrivilegeModel;

class PipingController extends AbstractController
{

    use InputFilter;
    use Helper;
    use Validate;

    private $_createActionRoles =
    [
        'ProductName'           => 'req|alphanum|between(3,100)',
        'productImages'         => 'req|alphanum',
        'ProductDesc'           => 'req|alphanum',
        'ProductCat'            => 'req|alphanum',
        'ProductOuterDia'       => 'req|alphanum',
        'ProductLength'         => 'req|alphanum',
        'ProductWallThk'        => 'req|alphanum',
        'ProductSurface'        => 'req|alphanum',
        'ProductCertificates'   => 'req|alphanum',
        'ProductStandards'      => 'req|alphanum',
        'ProductGrades'         => 'req|alphanum',
        'ProductDatasheet'      => 'req|alphanum',
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('piping.default');

        $this->_data['piping'] = ProductModel::getAll();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load('template.common');
        $this->language->load('piping.create');
        $this->language->load('piping.labels');
        $this->language->load('productlist.messages');
        $this->language->load('productlist.units');
        $this->language->load('validation.errors');
        $this->_data['additionalHeaderCss'] = '';


        if(isset($_POST['submit']) /* && $this->isValid($this->_createActionRoles, $_POST)*/) {

            $product = new PipingModel();
            $product->ProductName           = $this->filterString($_POST['productName']);
            $product->ProductCat            = $this->filterString($_POST['ProductCat']);
            $product->ProductDesc           = $this->filterString($_POST['ProductDesc']);
            $product->ProductImages         = $this->filterString($_POST['pImages']);
            $product->ProductWallThk        = 'From' . $this->filterString($_POST['wallThkFrom']) .' To '. $this->filterString($_POST['wallThkTo']);
            $product->ProductLength         = 'From' . $this->filterString($_POST['lengthFrom']) .' To '. $this->filterString($_POST['lengthTo']);
            $product->ProductCertificates   = $this->filterString(implode(', ', $_POST['certificates']));
            $product->ProductOuterDia       = 'From' . $this->filterString($_POST['outerDiaFrom']) .' To '. $this->filterString($_POST['outerDiaTo']);
            $product->ProductStandards      = $this->filterString(implode(', ', $_POST['ProductStandards']));
            $product->ProductStandards      = $this->filterString(implode(', ', $_POST['ProductStandards']));
            $product->ProductGrades         = $this->filterString(implode(', ', $_POST['steelGrades']));
            $product->ProductTesting        = $this->filterString(implode(', ', $_POST['ProductTesting']));
            $product->ProductDatasheet      = $this->filterString($_POST['datasheet']);


            var_dump($product);
/*          if(!empty($_FILES['image']['name'])) {
                $uploader = new FileUpload($_FILES['image']);
                try {
                    $uploader->upload();
                    $product->Image = $uploader->getFileName();
                } catch (\Exception $e) {
                    $this->messenger->add($e->getMessage(), messenger::APP_MESSAGE_ERROR);
                    $uploadError = true;
                }
            }
            if($uploadError === false && $product->save())
            {
                $this->messenger->add($this->language->get('message_create_success'));
                $this->redirect('/productlist');
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), messenger::APP_MESSAGE_ERROR);
            }*/
        }


        $this->_view();
    }

    public function editAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $product = ProductModel::getByPK($id);

        if($product === false) {
            $this->redirect('/productlist');
        }

        $this->language->load('template.common');
        $this->language->load('productlist.edit');
        $this->language->load('productlist.labels');
        $this->language->load('productlist.messages');
        $this->language->load('productlist.units');
        $this->language->load('validation.errors');


        $this->_data['product'] = $product;
        $this->_data['categories'] = ProductCategoryModel::getAll();
        $uploadError = false;

        if(isset($_POST['submit'])) {

            $product->Name = $this->filterString($_POST['Name']);
            $product->CategoryId = $this->filterInt($_POST['CategoryId']);
            $product->Quantity = $this->filterInt($_POST['Quantity']);
            $product->BuyPrice = $this->filterFloat($_POST['BuyPrice']);
            $product->SellPrice = $this->filterFloat($_POST['SellPrice']);
            $product->Unit = $this->filterInt($_POST['Unit']);

            if(!empty($_FILES['image']['name'])) {
                // Remove the old image
                if($product->Image !== '' && file_exists(IMAGES_UPLOAD_STORAGE.DS.$product->Image) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                    unlink(IMAGES_UPLOAD_STORAGE.DS.$product->Image);
                }
                // Create a new image
                $uploader = new FileUpload($_FILES['image']);
                try {
                    $uploader->upload();
                    $product->Image = $uploader->getFileName();
                } catch (\Exception $e) {
                    $this->messenger->add($e->getMessage(), messenger::APP_MESSAGE_ERROR);
                    $uploadError = true;
                }
            }
            if($uploadError === false && $product->save())
            {
                $this->messenger->add($this->language->get('message_create_success'));
                $this->redirect('/productlist');
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $product = ProductModel::getByPK($id);

        if($product === false) {
            $this->redirect('/productlist');
        }

        $this->language->load('productlist.messages');

        if($product->delete())
        {
            // Remove the old image
            if($product->Image !== '' && file_exists(IMAGES_UPLOAD_STORAGE.DS.$product->Image) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                unlink(IMAGES_UPLOAD_STORAGE.DS.$product->Image);
            }
            $this->messenger->add($this->language->get('message_delete_success'));
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'));
        }
        $this->redirect('/productlist');
    }
}