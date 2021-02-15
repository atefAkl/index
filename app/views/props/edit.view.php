<div class="tempDiv" style="min-height: 90vh; margin: auto; padding: 75px 16px">
    <?php
    $xProps     = $prop->PXProp != null ? json_decode($prop->PXProp) : '';
    $values     = $xProps != null ? implode(',', $xProps->Values) : '';
    $type       = $xProps != null ? $xProps->Type : '';
    $default    = $xProps != null ? implode(',', $xProps->Default) : '';
    $multiple   = $xProps != null ? $xProps->ApplyMultiple : '';
    ?>
    <form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper_other n50 border padding">
                <label><b><?= $text_label_prop_name ?></b></label>
                <input required type="text" name="PXName" id="PrivilegeTitle" maxlength="30" value="<?= $prop->PXName?>">
            </div>

            <div class="input_wrapper_other n50 padding" style="padding: 10px; background-color: #e4ffe4;">
                <ul>
                    <b>Property Name Must be:</b>
                    <li style="display: inline-block; padding: 3px 8px; background-color: #abb;">Single Word</li>
                    <li style="display: inline-block; padding: 3px 8px; background-color: #abb;">Without Spaces</li>
                    <li style="display: inline-block; padding: 3px 8px; background-color: #abb;">Starts with letter</li>
                    <li style="display: inline-block; padding: 3px 8px; background-color: #abb;">Latin Letters</li>
                </ul>

            </div>
            <div class="input_wrapper_other n50 padding">
                <?php $inputTypes = ["checkbox","color","date","datetime-local","email","file","number","password","radio","range","reset","select","tel","text","time","url","textarea",] ?>
                <label class="block"><b><?= $text_label_input_types ?></b></label>
                <?php   foreach ($inputTypes as $inputType) { ?>
                    <div class="propInput radio" style="display: inline-block; background-color: #acacac; margin: 10px 5px 5px;">
                        <input <?= $type == $inputType ? 'checked' : ''?> required type="radio" name="PXType" id="<?= $inputType ?>" value="<?= $inputType ?>" hidden>
                        <label for="<?= $inputType ?>" style="display: block; padding: 5px 16px"><?= ucfirst($inputType) ?></label>
                    </div>
                <?php    } ?>
            </div>

            <div class="input_wrapper_other n50 padding">

                <label class="block"><b><?= $text_label_input_values ?></b></label>
                <input type="text" name="PXValues" id="PXValues" value="<?= $values ?>">
            </div>

            <div class="input_wrapper_other n50 padding">

                <label class="block"><b><?= $text_label_default_value ?></b></label>
                <input type="text" name="PXDefault" id="PXDefault" value="<?= $default ?>">
            </div>

            <div class="input_wrapper_other n50 padding">
                <label class="block"><b><?= $text_label_apply_multiple ?></b></label>
                <div class="propInput radio" style="display: inline-block; background-color: #acacac; margin: 10px 5px 5px;">
                    <input type="checkbox" name="PXApplyMultiple" id="ApplyMultiple" style="display: inline-block; width: 20px;height: 20px;" <?= $multiple == 'on' ? 'checked' : ''?>>
                    <label id="multipleLabel" for="ApplyMultiple" style="display: inline-block; padding: 5px 16px"><?= $text_label_apply_multiple_yes ?></label>
                </div>
            </div>

            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>
<?php
var_dump($_POST);
var_dump($_FILES);