<div class="tempDiv" style="min-height: 90vh; margin: auto; padding: 75px 16px">
    <form autocomplete="off" class="appForm clearfix" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><?= $text_legend ?></legend>
            <div class="input_wrapper_other n50 border">
                <label><b><?= $text_label_prop_name ?></b></label>
                <input required type="text" name="PXName" id="PrivilegeTitle" maxlength="30">
            </div>
            <div class="input_wrapper_other n50 padding border" style="padding: 10px">
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
                <?php   foreach ($inputTypes as $type) { ?>
                    <div class="propInput radio">
                        <input required type="radio" name="PXType" id="<?= $type ?>" value="<?= $type ?>" hidden>
                        <label for="<?= $type ?>" style="display: block; padding: 5px 16px"><?= $type ?></label>
                    </div>
                <?php    } ?>
            </div>

            <div class="input_wrapper_other n50 padding">
                <label class="block"><b><?= $text_label_input_values ?></b></label>
                <input required type="text" name="PXValues" id="PXValues" value="">
            </div>

            <div class="input_wrapper_other n50 padding">
                <label class="block"><b><?= $text_label_default_value ?></b></label>
                <input required type="text" name="PXValues" id="PXValues" value="">
            </div>

            <input class="no_float" type="submit" name="submit" value="<?= $text_label_save ?>">
        </fieldset>
    </form>
</div>
<?php
var_dump($_POST);
var_dump($_FILES);