<?php
namespace PHPMVC\LIB\Template;


trait templatehelper
{
    public function matchUrl($url) {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $url;
    }

    public function labelFloat($fieldName, $object = null)
    {
        return ((isset($_POST[$fieldName]) && !empty($_POST[$fieldName])) || (null !== $object && $object->$fieldName !== null)) ? ' class="floated"' : '';
    }

    public function showValue($fieldName, $object = null)
    {
        return isset($_POST[$fieldName]) ? $_POST[$fieldName] : (is_null($object) ? '' : $object->$fieldName);
    }

    public function selectedIf($fieldName, $value, $object = null)
    {
        return ((isset($_POST[$fieldName]) && $_POST[$fieldName] == $value) || (!is_null($object) && $object->$fieldName == $value)) ? 'selected="selected"' : '';
    }
    
    public function createInputFrom($prop)
    {
        $name       = $prop->PXName;
        $xProps     = $prop->PXProp != null ? json_decode($prop->PXProp) : '';
        $values     = $xProps != null ? implode(',', $xProps->Values) : '';
        $type       = $xProps != null ? $xProps->Type : '';
        $default    = $xProps != null ? implode(',', $xProps->Default) : '';
        $multiple   = $xProps != null ? $xProps->ApplyMultiple : '';
        $output = '';
        if ($type == 'textArea') {
            $output .= '<div class="input_wrapper_other n50 border padding">';
            $output .= '<label><b>'.ucwords(str_replace('_', ' ', $name)).'</b></label>';
            $output .= '<textarea name="' . $name . '">'.$values.'</textarea>';
            $output .= '</div>';
        } elseif ($type == 'select') {
            $output .= '<div class="input_wrapper_other n50 border padding">';
            $output .= '<label><b>'.ucwords(str_replace('_', ' ', $name)).' : &nbsp;&nbsp;</b></label>';
            $output .= '<select name="' . $name . '"'.($multiple == 'on'? ' multiple': '').'>';
            foreach ($xProps->Values as $value) {
                $output .= '<option value="'.$value.'">'.ucfirst($value).'</option>';
            }
            $output .= '</select>';
            $output .= '</div>';
        } elseif ($type == 'radio') {
            $output .= '<div class="input_wrapper_other n50 border padding">';
            $output .= '<label><b>'.ucwords(str_replace('_', ' ', $name)).' : &nbsp;&nbsp;</b></label>';
            foreach ($xProps->Values as $value) {
                $output .='<div class="propInput radio" style="display: inline-block; background-color: #acacac; margin: 10px 5px 5px;">';
                $output .= '<input type="radio" name="'.$name.'" value="'.$value.'" id="'.$value.'" hidden>';
                $output .= '<label for="'.$value.'" style="padding: 4px 8px">'.ucfirst($value).'</label>';
                $output .= '</div>';
            }
            $output .= '</div>';
        } elseif ($type == 'checkbox') {
            $output .= '<div class="input_wrapper_other n50 border padding">';
            $output .= '<label><b>'.ucwords(str_replace('_', ' ', $name)).' : &nbsp;&nbsp;</b></label>';
            foreach ($xProps->Values as $value) {
                $output .='<div class="propInput radio" style="display: inline-block; background-color: #acacac; margin: 10px 5px 5px;">';
                $output .= '<input type="checkbox" name="'.$name.'[]" value="'.$value.'" id="'.$value.'" hidden>';
                $output .= '<label for="'.$value.'" style="padding: 4px 8px">'.ucfirst($value).'</label>';
                $output .= '</div>';
            }
            $output .= '</div>';
        } elseif ($type == 'file') {
            $output .= '<div class="input_wrapper_other n50 border padding">';
            $output .= '<label><b>'.ucwords(strreplace('_', ' ', $name)).'</b></label>';
            $output .= '<input type="file" name="'.$name.($multiple == 'on'? '[]': '').'" id="'.$name.'"'.($multiple == 'on'? ' multiple': '').' style="display: block; padding: 4px 12px; margin: 0 10px; width: 90%">';
            $output .= '</div>';
        } else {
            $output .= '<div class="input_wrapper_other n50 border padding">';
            $output .= '<label><b>'.ucwords(str_replace('_', ' ', $name)).'</b></label>';
            $output .= '<input type="'.$type.'" name="'.$name.'" accept="image/*" id="'.$name.'" placeholder="'.$values.'" style="display: block; padding: 4px 12px; margin: 0 10px; width: 90%">';
            $output .= '</div>';
        }
        return $output;
        var_dump ($values , $type , $default , $multiple);
    }
}

