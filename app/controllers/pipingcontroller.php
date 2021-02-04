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

    private $_createActionRoles = [
        'ProductId'             => 'req|alphanum|between(3,100)',
        'ProductName'           => 'req|alphanum',
        'ProductImages'         => 'req|alphanum',
        'ProductDesc'           => 'req|alphanum',
        'ProductCat'            => 'req|alphanum',
        'ProductOuterDia'       => 'req|alphanum',
        'ProductLength'         => 'req|alphanum',
        'ProductWallThk'        => 'req|alphanum',
        'ProductSurface'        => 'req|alphanum',
        'ProductTesting'        => 'req|alphanum',
        'ProductCertificates'   => 'req|alphanum',
        'ProductStandards'      => 'req|alphanum',
        'ProductGrades'         => 'req|alphanum',
        'ProductTables'         => 'req|alphanum',
        'ProductDatasheet'      => 'req|alphanum',
        'ProductDateReg'        => 'req|alphanum',
        'UserId'                => 'req|num'
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('piping.default');

        $this->_data['piping'] = PipingModel::getAll();
        $this->_data['session'] = $this->session;

        $this->_view();
    }

    public function createAction()
    {
        //$this->_me();
        ob_start();
        $this->language->load('template.common');
        $this->language->load('piping.create');
        $this->language->load('piping.labels');
        $this->language->load('productlist.messages');
        $this->language->load('validation.errors');
        $this->_data['additionalHeaderCss'] = '';


        if(isset($_POST['submit']) /* && $this->isValid($this->_createActionRoles, $_POST)*/) {

            $product = new PipingModel();
            $product->ProductName           = $_POST['ProductName'] != '' ? $this->filterString($_POST['ProductName']) : '';
            $product->ProductCat            = $_POST['ProductCat'] != '' ? $this->filterString($_POST['ProductCat']) : '';
            $product->ProductDesc           = $_POST['ProductDesc'] != '' ? $this->filterString($_POST['ProductDesc']) : '';
            $product->ProductWallThk        = 'From ' . $this->filterString($_POST['wallThkFrom']) .' To '. $this->filterString($_POST['wallThkTo']);
            $product->ProductLength         = 'From ' . $this->filterString($_POST['lengthFrom']) .' To '. $this->filterString($_POST['lengthTo']);
            $product->ProductCertificates   = $_POST['ProductCertificates'] != '' ? $this->filterString(implode(', ', $_POST['ProductCertificates'])) : '';
            $product->ProductOuterDia       = 'From ' . $this->filterString($_POST['outerDiaFrom']) .' To '. $this->filterString($_POST['outerDiaTo']);
            $product->ProductStandards      = $_POST['ProductStandards'] != '' ? $this->filterString(implode(', ', $_POST['ProductStandards'])) : '';
            $product->ProductSurface        = $_POST['ProductSurface'] != '' ? $this->filterString(implode(', ', $_POST['ProductSurface'])) : '';


            $grades_cats = $_POST['ProductGrades'] != '' ? explode(', ', $this->filterString(implode(', ', $_POST['ProductGrades']))) : '';
            $grades_full = [];
            if (!empty($grades_cats)) {
                foreach ($grades_cats as $grades_cat) {
                    $item = explode('|', $grades_cat);
                    $grades_full[$item[0]][] = $item[1];
                }
                $grades_full = json_encode($grades_full);
            } else {
                $grades_full = '';
            }
            $product->ProductGrades         = $grades_full;
            $product->ProductImages         = '';
            $product->ProductTables         = '';
            $product->ProductDatasheet      = '';
            $product->ProductTesting        = $_POST['ProductTesting'] != '' ? $this->filterString(implode(', ', $_POST['ProductTesting'])) : '';
            $product->UserId                = $this->session->u->UserId;
            $product->ProductDateReg        = Date("Y-M-d D, h:m:s");

            $this->_data['product'] =$product;
            function regImages($img, $imgName, $product, $obj) {
                if(!empty($img)) {
                    $filesToUpload = [];
                    if (is_array($img['name'])) {
                        for ($i = 0; $i < count($img['name']); $i++) {
                            $filesToUpload[$i]['name'] = $img['name'][$i];
                            $filesToUpload[$i]['type'] = $img['type'][$i];
                            $filesToUpload[$i]['tmp_name'] = $img['tmp_name'][$i];
                            $filesToUpload[$i]['error'] = $img['error'][$i];
                            $filesToUpload[$i]['size'] = $img['size'][$i];

                            $uploader = new FileUpload($filesToUpload[$i]);
                            $uploadError = '';
                            try {
                                $uploader->upload();
                                $product->$imgName .= $i > 0 ? '|'.$uploader->getFileName() : $uploader->getFileName();

                            } catch (\Exception $e) {
                                $obj->messenger->add($e->getMessage(), messenger::APP_MESSAGE_ERROR);
                                $uploadError = true;
                            }
                            if (!$uploadError) {
                                $obj->messenger->add($obj->language->get('message_create_success'));
                            } else {
                                $obj->messenger->add($obj->language->get('message_create_failed'), messenger::APP_MESSAGE_ERROR);
                            }
                        }
                    } else {
                        $filesToUpload['name'] = $img['name'];
                        $filesToUpload['type'] = $img['type'];
                        $filesToUpload['tmp_name'] = $img['tmp_name'];
                        $filesToUpload['error'] = $img['error'];
                        $filesToUpload['size'] = $img['size'];
                        $uploader = new FileUpload($filesToUpload);
                        $uploadError = '';
                        try {
                            $uploader->upload();
                            $product->$imgName = $uploader->getFileName();

                        } catch (\Exception $e) {
                            $obj->messenger->add($e->getMessage(), messenger::APP_MESSAGE_ERROR);
                            $uploadError = true;
                        }
                        if (!$uploadError) {
                            $obj->messenger->add($obj->language->get('message_create_success'));

                        } else {
                            $obj->messenger->add($obj->language->get('message_create_failed'), messenger::APP_MESSAGE_ERROR);
                        }
                    }
                }


            }
            regImages($_FILES['ProductImages'], 'ProductImages', $product, $this);
            regImages($_FILES['ProductDatasheet'], 'ProductDatasheet', $product, $this);
            regImages($_FILES['ProductTables'], 'ProductTables', $product, $this);
            var_dump($product);
            if ($product->save()) {
                $this->redirect('/piping/');
            }

        }
        $this->_view();
        ob_end_flush();
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