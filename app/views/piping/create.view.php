
<div style="height: 80px;"></div>


<form class="appForm clearfix" method="post" enctype="multipart/form-data" style="width: 50%; min-width: 500px">
    <fieldset>
        <legend><b><?= $text_legend ?></b></legend>

        <div class="input_wrapper_other n50 border padding">
            <label class="block">
                <b><?= $text_label_Name ?></b>
            </label>
            <input type="text" name="ProductName" maxlength="100"/>
        </div>
        <div class="input_wrapper_other n50 border padding">
            <label class="block">
                <b><?= $text_label_outerDia ?></b>
            </label>
            <input  type="text" name="outerDiaFrom" class="border block" placeholder="<?= $text_ph_from ?>">
            <input  type="text" name="outerDiaTo" class="border block" placeholder="<?= $text_ph_to ?>"> mm
        </div>

        <div class="input_wrapper_other border block padding">
            <label><b><?= $text_label_desc?></b></label>
            <textarea   name="ProductDesc" class="border" style="color:#167698">
            </textarea>
        </div>

        <div class="input_wrapper_other n50 border padding">
            <label class="noFloat block"><b><?= $text_label_wallThk ?></b></label>
            <input  type="text" class="border block" name="wallThkFrom" placeholder="<?= $text_ph_from ?>">
            <input  type="text" class="border block" name="wallThkTo"  placeholder="<?= $text_ph_to ?>"> mm
        </div>

        <div class="input_wrapper_other n50 border padding">
            <label class="noFloat block"><b><?= $text_label_length ?></b></label>
            <input  type="text" class="border block" name="lengthFrom" placeholder="<?= $text_ph_from ?>">
            <input  type="text" class="border block" name="lengthTo"  placeholder="<?= $text_ph_to ?>"> mm
        </div>

        <div class="input_wrapper_other border n30 padding select">
            <label class="noFloat block"><b><?= $text_label_catName ?></b></label>
            <?php
            $ProductCats = [
                'Welded Pipes' => [
                        'SSAW Steel Pipes', 'LSAW Steel Pipes', 'ERW Steel Pipes',
                ],
                'Seamless Pipes' => [
                        'Carbon Steel Pipe', 'Stainless Steel pipe', 'Alloy Steel Pipe', 'API 5L Line pipe', 'Boiler Steel Pipe', 'Mild Steel pipe'
                ],
                'Oil Country Tubular Goods' => [
                        'API Casing', 'Oil Tubing', 'API Coupling', 'Drill Pipe'
                ],
                'Hollow Section Tubes' => [
                    'Anti-corrosion Steel Pipe', 'Scaffolding Tube', 'Galvanized Steel Pipe', 'Square Tube', 'Rectangular Tube'
                ],
                'Pipes Fittings And Flanges' => [
                    'Pipe Flanges', 'Pipe Cap', 'Pipe Tee', 'Pipe Reducer', 'Pipe Elbow', 'Pipe Bend'
                ]
            ]; ?>
            <select name="ProductCat">
            <?php
            if ($ProductCats !== false): foreach ($ProductCats as $ProductCat => $cat): ?>
                <option value="" disabled><?= $ProductCat ?></option>
                <?php foreach ($cat as $key => $val): ?>
                <option value="<?= $ProductCat .'|' . $val?>"><?= $val ?></option>
                <?php endforeach; endforeach; endif; ?>
            </select>
        </div>

        <div class="input_wrapper_other clearfix n70 padding border">
            <label><b><?= $text_label_surface ?></b></label>

            <?php
            $surfaces = [
                'Fusion bond Epoxy coating', 'Coal Tar Epoxy', '3PE', 'Vanish Coating', 'Bitumen Coating', 'Black Oil coating as per customer’s requirement'
            ];
            if ($surfaces !== false): foreach ($surfaces as $surface): ?>
                <label class="checkbox">
                    <input type="checkbox" name="ProductSurface[]" id="ProductSurface" value="<?= $surface ?>">
                    <div class="checkbox_button"></div>
                    <span><?= $surface ?></span>
                </label>
            <?php endforeach; endif; ?>
        </div>

        <div class="input_wrapper_other n50 padding border">
            <label><b><?= $text_label_standards ?></b></label>

            <?php
            $standards = [
                    'API 5L', 'API 5CT', 'ASTM A252', 'ASTM 53', 'EN10217', 'EN10219', 'BS', 'JIS', 'IS'
            ];
            if ($standards !== false): foreach ($standards as $standard): ?>
                <label class="checkbox">
                    <input type="checkbox" name="ProductStandards[]" id="ProductStandards" value="<?= $standard ?>">
                    <div class="checkbox_button"></div>
                    <span><?= $standard ?></span>
                </label>
            <?php endforeach; endif; ?>
        </div>

        <div class="input_wrapper_other n50 padding border">
            <label><b><?= $text_label_certificates ?></b></label>

            <?php
            $certificates = [
                'API 5L', 'PSL1/PSL2', 'API 5CT', 'EN10217', 'EN10219'
            ];
            if ($certificates !== false): foreach ($certificates as $certificate): ?>
                <label class="checkbox">
                    <input type="checkbox" name="ProductCertificates[]" id="certificates" value="<?= $certificate ?>">
                    <div class="checkbox_button"></div>
                    <span><?= $certificate ?></span>
                </label>
            <?php endforeach; endif; ?>
        </div>

        <div class="input_wrapper_other n40 padding" style="border-left: 1px solid #d4d4d4;">
            <label><b><?= $text_label_apply ?></b></label>

            <?php
            $applications = [
                'water supply', 'drainage. For gas transportation: gas', 'steam',
                'liquefied petroleum gas.', 'For structural purposes: as piling pipe',
                'for bridges; piers', 'roads', 'buildings and other structures tube'];
            if ($applications !== false): foreach ($applications as $apply): ?>
                <label class="checkbox">
                    <input type="checkbox" name="ProductApplications[]" id="applications" value="<?= $apply ?>">
                    <div class="checkbox_button"></div>
                    <span><?= $apply ?></span>
                </label>
            <?php endforeach; endif; ?>
        </div>

        <div class="input_wrapper_other n60 padding" style="border-bottom: 0;">
            <label><b><?= $text_label_testing ?></b></label>

            <?php
            $testing = [
                'Chemical Component Analysis',
                'Mechanical Properties (Ultimate tensile strength',
                'Yield strength', 'Elongation)', 'Technical Properties (Flattening Test',
                'Bending Test', 'Blow Test', 'Impact Test', 'Exterior Size Inspection',
                'Hydrostatic Test', 'X-ray Test'];
            if ($testing !== false): foreach ($testing as $test): ?>
            <label class="checkbox">
                <input type="checkbox" name="ProductTesting[]" id="ProductTesting" value="<?= $test ?>">
                <div class="checkbox_button"></div>
                <span><?= $test ?></span>
            </label>
            <?php endforeach; endif; ?>
        </div>

        <div class="input_wrapper_other border padding">
            <label><b><?= $text_label_steel_grades ?></b></label>

            <?php
            $steel_grades = [
                'API_5L'        => ['GR A','GR B','X42','X46','X56', 'X60', 'X65', 'X70'],
                'ASTM_A252'     => ['GR 1','GR 2','GR 3'],
                'ASTM_53'       => ['GR A','GR B','GR C', 'GR D'],
                'EN'            => ['S275', 'S275JR', 'S355JRH', 'S355JRH'],
                'BS_4360'       => ['Grade 43', 'Grade 50'],
                'ASME'          => ['ASME']
            ];
            if ($steel_grades !== false): foreach ($steel_grades as $steel_grade => $grades): ?>
                <h4><b><?= $steel_grade ?></b></h4>
                <?php foreach ($grades as $key => $value): ?>
                    <label class="checkbox">
                        <input type="checkbox" cols="40" name="ProductGrades[]" id="grades" value="<?= $steel_grade . '|' . $value ?>">
                        <div class="checkbox_button"></div>
                        <span><?= $value ?></span>
                    </label>
            <?php endforeach; endforeach; endif; ?>
        </div>
        <div class="input_wrapper n100">
            <label class="floated"><?= $text_label_imgs ?></label>
            <input type="file" name="ProductImages[]" accept="image/*" id="pImages" multiple>
        </div>

        <div class="input_wrapper n100">
            <label class="floated"><?= $text_label_datasheet ?></label>
            <input type="file" name="ProductDatasheet" accept="application/pdf" id="datasheet">
        </div>

        <div class="input_wrapper n100">
            <label class="floated"><?= $text_label_tables ?></label>
            <input type="file" name="ProductTables[]" accept="image/*" id="tables" multiple>
        </div>


        <input class="block" type="submit" name="submit" value="<?= $text_label_save ?>">


    </fieldset>


</form>
<?php
if (!empty($_FILES)) {
    var_dump($_FILES);
} ?>

<script>
    $('#pImages').on('change', function () {
        console.log($('this').files);
    })
</script>