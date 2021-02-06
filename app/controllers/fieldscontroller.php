<?php
namespace PHPMVC\Controllers;
use PHPMVC\lib\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\lib\messenger;
use PHPMVC\Lib\Validate;
use PHPMVC\Models\PrivilegeModel;
use PHPMVC\Models\fieldsModel;
use PHPMVC\Models\UserGroupModel;
use PHPMVC\Models\UserGroupPrivilegeModel;

class FieldsController extends AbstractController
{

    use InputFilter;
    use Helper;
    use Validate;

    private $_createActionRoles =
    [
        'FieldName'          => 'req|alphanum|between(3,30)',
        'FieldDesc'           => 'req|alphanum|between(3,300)',

    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('fields.default');

        $this->_data['additionalHeaderCss'] = '';
        $this->_data['fields'] = FieldsModel::getAll();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load('template.common');
        $this->language->load('fields.create');
        $this->language->load('fields.labels');
        $this->language->load('fields.messages');
        $this->language->load('validation.errors');
        $this->_data['additionalHeaderCss'] = '';
        //$this->_data['fields'] = FieldsModel::getAll();;
        $field = new FieldsModel();



        $uploadError = false;
        if (isset($_POST['submit'])) {
            $field->FieldName = $_POST['FieldName'] != '' ? trim($this->filterString($_POST['FieldName'])) : '';
            $field->FieldDesc = $_POST['FieldDesc'] != '' ? trim($this->filterString($_POST['FieldDesc'])) : '';


            if(!empty($_FILES['FieldImage']['name'])) {
                $uploader = new FileUpload($_FILES['FieldImage']);
                try {
                    $uploader->upload();
                    $field->FieldImage = $uploader->getFileName();
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
            if ($field->save()) {
                $this->redirect('/fields');
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
        $field = FieldsModel::getByPK($id);


        if($field === false) {
            $this->redirect('/fields');
        }

        $this->language->load('template.common');
        $this->language->load('fields.edit');
        $this->language->load('fields.labels');
        $this->language->load('fields.messages');
        $this->language->load('validation.errors');


        $this->_data['field'] = $field;

        $uploadError = false;

        if(isset($_POST['submit'])) {
            $field->FieldName = $this->filterString($_POST['FieldName']);
            $field->FieldDesc = $this->filterString($_POST['FieldDesc']);
            if(!empty($_FILES['FieldImage']['name'])) {
                // Remove the old image
                if($field->FieldImage !== '' && file_exists(IMAGES_UPLOAD_STORAGE.DS.$field->FieldImage) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                    unlink(IMAGES_UPLOAD_STORAGE.DS.$field->FieldImage);
                    // Create a new image
                    $uploader = new FileUpload($_FILES['FieldImage']);
                    try {
                        $uploader->upload();
                        $field->FieldImage = $uploader->getFileName();
                    } catch (\Exception $e) {
                        $this->messenger->add($e->getMessage(), messenger::APP_MESSAGE_ERROR);
                        $uploadError = true;
                    }
                }
            }

            if ($field->save()) {
                $this->redirect('/fields');
            }
        }


        $this->_view();
    }

    public function deleteAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $field = fieldsModel::getByPK($id);

        if($field === false) {
            $this->redirect('/fields');
        }

        $this->language->load('fields.messages');

        if($field->delete())
        {
            // Remove the old image
            if($field->FieldImage !== '' && file_exists(IMAGES_UPLOAD_STORAGE.DS.$field->FieldImage)) {
                unlink(IMAGES_UPLOAD_STORAGE.DS.$field->FieldImage);
            }
            $this->messenger->add($this->language->get('message_delete_success'));
        } else {
            $this->messenger->add($this->language->get('message_delete_failed'));
        }
        $this->redirect('/fields');
    }
}