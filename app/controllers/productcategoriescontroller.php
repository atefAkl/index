<?php
namespace PHPMVC\Controllers;
use PHPMVC\lib\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\lib\messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\FieldsModel;
use PHPMVC\Models\PrivilegeModel;
use PHPMVC\Models\ProductCategoryModel;
use PHPMVC\Models\UserGroupModel;
use PHPMVC\Models\UserGroupPrivilegeModel;

class ProductCategoriesController extends AbstractController
{

    use InputFilter;
    use Helper;
    use Validate;

    private $_createActionRoles =
    [
        'CategoryName'          => 'req|alphanum|between(3,30)',
        'CategoryDesc'           => 'req|alphanum|between(3,300)',
        'CategoryParent'         => 'req|num'
    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('productcategories.default');

        $this->_data['categories'] = ProductCategoryModel::getAll();
        $this->_data['additionalHeaderCss'] = '';

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load('template.common');
        $this->language->load('productcategories.create');
        $this->language->load('productcategories.labels');
        $this->language->load('productcategories.messages');
        $this->language->load('validation.errors');
        $this->_data['additionalHeaderCss'] = '';
        $this->_data['categories'] = ProductCategoryModel::getAll();;
        $this->_data['fields'] = FieldsModel::selectOnly('FieldId, FieldName');;
        $cat = new ProductCategoryModel();
        $this->_data['newCategory'] = $cat;


        $uploadError = false;
        if (isset($_POST['submit'])) {
            $cat->CategoryName = $_POST['CategoryName'] != '' ? trim($this->filterString($_POST['CategoryName'])) : '';
            $cat->CategoryDesc = $_POST['CategoryDesc'] != '' ? trim($this->filterString($_POST['CategoryDesc'])) : '';
            $cat->ParentCategory = null;

            if(!empty($_FILES['CategoryImage']['name'])) {
                $uploader = new FileUpload($_FILES['CategoryImage']);
                try {
                    $uploader->upload();
                    $cat->CategoryImage = $uploader->getFileName();
                } catch (\Exception $e) {
                    $this->messenger->add($e->getMessage(), messenger::APP_MESSAGE_ERROR);
                    $uploadError = true;
                }
            }
            if(!$uploadError)
            {
                $this->messenger->add($this->language->get('message_create_success'));
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), messenger::APP_MESSAGE_ERROR);
            }
            if ($cat->save()) {
                $this->redirect('/productcategories');
            }
        }

        // TODO:: explain a better solution to check against file type
        // TODO:: explain a better soution to secure the upload folder


        $this->_view();
    }

    public function editAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $this->_data['additionalHeaderCss'] = '';
        $category = ProductCategoryModel::getByPK($id);
        $categories = ProductCategoryModel::getAll();

        if($category === false) {
            $this->redirect('/productcategories');
        }

        $this->language->load('template.common');
        $this->language->load('productcategories.edit');
        $this->language->load('productcategories.labels');
        $this->language->load('productcategories.messages');
        $this->language->load('validation.errors');


        $this->_data['category'] = $category;
        $this->_data['categories'] = $categories;
        $uploadError = false;

        if(isset($_POST['submit'])) {
            $category->Name = $this->filterString($_POST['CategoryName']);
            $category->Name = $this->filterString($_POST['CategoryDesc']);
            $category->Name = $this->filterInt($_POST['ParentCategory']);
            if(!empty($_FILES['CategoryImage']['name'])) {
                // Remove the old image
                if($category->categoryImage !== '' && file_exists(IMAGES_UPLOAD_STORAGE.DS.$category->categoryImage) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                    unlink(IMAGES_UPLOAD_STORAGE.DS.$category->categoryImage);
                    // Create a new image
                    $uploader = new FileUpload($_FILES['CategoryImage']);
                    try {
                        $uploader->upload();
                        $category->categoryImage = $uploader->getFileName();
                    } catch (\Exception $e) {
                        $this->messenger->add($e->getMessage(), messenger::APP_MESSAGE_ERROR);
                        $uploadError = true;
                    }
                }

            }


            //$this->redirect('/productcategories');
        }


        $this->_view();
    }

    public function deleteAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $category = ProductCategoryModel::getByPK($id);

        if($category === false) {
            $this->redirect('/productcategories');
        }

        $this->language->load('productcategories.messages');

        if($category->delete())
        {
            // Remove the old image
            if($category->Image !== '' && file_exists(IMAGES_UPLOAD_STORAGE.DS.$category->Image)) {
                unlink(IMAGES_UPLOAD_STORAGE.DS.$category->Image);
            }
            $this->messenger->add($this->language->get('message_delete_success'));
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'));
        }
        $this->redirect('/productcategories');
    }
}