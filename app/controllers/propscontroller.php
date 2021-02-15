<?php
namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\lib\messenger;
use PHPMVC\Models\PropsModel;
use PHPMVC\Models\PrivilegeModel;
use PHPMVC\Models\SchemePropsModel;

class PropsController extends AbstractController
{
    use InputFilter;
    use Helper;

    private $_createActionRoles =
    [

    ];

    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->language->load('props.default');
        $this->_data['additionalHeaderCss'] = '';
        $this->_data['props'] = PropsModel::getAll();

        $this->_view();
    }

    // TODO: we need to implement csrf prevention
    public function createAction()
    {
        $this->language->load('template.common');
        $this->language->load('props.labels');
        $this->language->load('props.create');
        $this->_data['additionalHeaderCss'] = '';
        if(isset($_POST['submit'])) {
            $prop = new PropsModel();

            $prop->PXName       = isset($_POST['PXName']) ? $this->filterString($_POST['PXName']) : '';
            $propType           = isset($_POST['PXType']) ? $this->filterString($_POST['PXType']) : '';
            $propValues         = isset($_POST['PXValues']) ? explode(',', $this->filterString($_POST['PXValues'])) : '';
            $propDefault        = isset($_POST['PXDefault']) ? explode(',', $this->filterString($_POST['PXDefault'])) : '';
            $propMultiple       = isset($_POST['PXApplyMultiple']) ? $this->filterString($_POST['PXDefault']) : 'off';

            $prop->PXProp = json_encode([
                'Type'          => $propType,
                'Values'        => $propValues,
                'Default'       => $propDefault,
                'ApplyMultiple' => $propMultiple,
            ]);
            if($prop->save())
            {
                $this->messenger->add('تم حفظ الخاصية بنجاح');
                $this->redirect('/props');
            }

            var_dump($prop);
            var_dump(json_decode( '{"Type":"email","Values":[""],"Default":[""],"ApplyMultiple":"off"}'));
        }

        $this->_view();
    }

    public function editAction()
    {
        $this->_data['additionalHeaderCss'] = '';
        $id = $this->filterInt($this->_params[0]);
        $prop = PropsModel::getByPK($id);

        /*if($prop === false) {
            $this->redirect('/props');
        }*/

        $this->_data['prop'] = $prop;


        $this->language->load('template.common');
        $this->language->load('props.labels');
        $this->language->load('props.edit');

        if(isset($_POST['submit'])) {
            $prop->PXName       = isset($_POST['PXName']) ? $this->filterString($_POST['PXName']) : '';
            $propType           = isset($_POST['PXType']) ? $this->filterString($_POST['PXType']) : '';
            $propValues         = isset($_POST['PXValues']) ? explode(',', $this->filterString($_POST['PXValues'])) : '';
            $propDefault        = isset($_POST['PXDefault']) ? explode(',', $this->filterString($_POST['PXDefault'])) : '';
            $propMultiple       = isset($_POST['PXApplyMultiple']) ? $this->filterString($_POST['PXApplyMultiple']) : 'off';

            $prop->PXProp = json_encode([
                'Type'          => $propType,
                'Values'        => $propValues,
                'Default'       => $propDefault,
                'ApplyMultiple' => $propMultiple,
            ]);
            if($prop->save())
            {
                $this->redirect('/props');
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {

        $id = $this->filterInt($this->_params[0]);
        $prop = PropsModel::getByPK($id);

        if($prop=== false) {
            $this->redirect('/props');
        }

        $schemeProps = SchemePropsModel::getBy(['PXId' => $prop->PXId]);
        if(false !== $schemeProps) {
            foreach ($schemeProps as $schemeProp) {
                $schemeProp->delete();
            }
        }

        if($prop->delete())
        {
            $this->redirect('/props');
        }
    }

}