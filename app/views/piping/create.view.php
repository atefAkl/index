<div style="height: 80px;"></div>
<form autocomplete="off" class="appForm clearfix" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend><?= $text_legend ?></legend>

        <div class="input_wrapper n20 border">
            <label<?= $this->labelFloat('productName') ?>><?= $text_label_Name ?></label>
            <input required type="text" name="productName" maxlength="100" value="<?= $this->showValue('productName') ?>">
        </div>

        <div class="input_wrapper_other n20 border padding">
            <label><?= $text_label_outerDia ?></label>
            <input required type="text" name="outerDiaFrom" class="border block" placeholder="<?= $text_ph_from ?>">
            <input required type="text" name="outerDiaTo" class="border block" placeholder="<?= $text_ph_to ?>">
        </div>

        <div class="input_wrapper_other n20 border padding">
            <label class="noFloat block"><?= $text_label_wallThk ?></label>
            <input required type="text" class="border block" name="wallThkFrom" placeholder="<?= $text_ph_from ?>">
            <input required type="text" class="border block" name="wallThkTo"  placeholder="<?= $text_ph_to ?>">
        </div>

        <div class="input_wrapper_other n20 border padding">
            <label class="noFloat block"><?= $text_label_length ?></label>
            <input required type="text" class="border block" name="lengthFrom" placeholder="<?= $text_ph_from ?>">
            <input required type="text" class="border block" name="lengthTo"  placeholder="<?= $text_ph_to ?>">
        </div>


        <div class="input_wrapper_other n50 border padding">
            <label<?= $this->labelFloat('productCat') ?>><?= $text_label_catName ?></label>
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
            ];
            if ($ProductCats !== false): foreach ($ProductCats as $ProductCat => $cat): ?>
                <h4><?= $ProductCat ?></h4>
                <?php foreach ($ProductCats[$ProductCat] as $key => $val): ?>
                    <label class="radio">
                        <input type="radio" name="productCats[]" id="cat">
                        <div class="radio_button"></div>
                        <span><?= $val ?></span>
                    </label>
                <?php endforeach; endforeach; endif; ?>
        </div>

        <div class="input_wrapper_other n50 border padding">
            <label><?= $text_label_desc?></label>
            <textarea required  name="productDesc" class="border" placeholder="<?= $text_ph_from ?>">
            </textarea>
        </div>

        <div class="input_wrapper_other">
            <label><?= $text_label_standards ?></label>

            <?php
            $standards = [
                    'API 5L', 'API 5CT', 'ASTM A252', 'ASTM 53', 'EN10217', 'EN10219', 'BS', 'JIS', 'IS'
            ];
            if ($standards !== false): foreach ($standards as $standard): ?>
                <label class="checkbox">
                    <input type="checkbox" name="privileges[]" id="privileges">
                    <div class="checkbox_button"></div>
                    <span><?= $standard ?></span>
                </label>
            <?php endforeach; endif; ?>
        </div>

        <div class="input_wrapper_other">
            <label><?= $text_label_certificates ?></label>

            <?php
            $certificates = [
                'API 5L', 'PSL1/PSL2', 'API 5CT', 'EN10217', 'EN10219'
            ];
            if ($certificates !== false): foreach ($certificates as $certificate): ?>
                <label class="checkbox">
                    <input type="checkbox" name="certificates[]" id="certificates">
                    <div class="checkbox_button"></div>
                    <span><?= $certificate ?></span>
                </label>
            <?php endforeach; endif; ?>
        </div>

<div class="input_wrapper_other">
            <label><?= $text_label_surface ?></label>

            <?php
            $surface = [
                'Fusion bond Epoxy coating', 'Coal Tar Epoxy', '3PE', 'Vanish Coating', 'Bitumen Coating', 'Black Oil coating as per customer’s requirement'
            ];
            if ($certificates !== false): foreach ($certificates as $certificate): ?>
                <label class="checkbox">
                    <input type="checkbox" name="certificates[]" id="certificates">
                    <div class="checkbox_button"></div>
                    <span><?= $certificate ?></span>
                </label>
            <?php endforeach; endif; ?>
        </div>


        <div class="input_wrapper_other n20 border padding">
            <label class="noFloat block"><?= $text_label_surface ?></label>
            <input required type="text" class="border block" name="surface" placeholder="<?= $text_ph_from ?>">
        </div>

        <div class="input_wrapper_other">
            <label><?= $text_label_steel_grades ?></label>

            <?php
            $steel_grades = [
                'API 5L' => ['GR A','GR B','X42','X46','X56', 'X60', 'X65', 'X70'],
                'ASTM A252' => ['GR 1','GR 2','GR 3'],
                'ASTM 53' => ['GR A','GR B','GR C', 'GR D'],
                'EN' => ['S275', 'S275JR', 'S355JRH', 'S355JRH'],
                'BS 4360' => ['Grade 43', 'Grade 50'],
                'ASME' => []
            ];
            if ($steel_grades !== false): foreach ($steel_grades as $steel_grade => $grades): ?>
                <h4><?= $steel_grade ?></h4>
                <?php foreach ($steel_grades[$steel_grade] as $key => $val): ?>
                    <label class="checkbox">
                        <input type="checkbox" name="steelGrades[]" id="grades">
                        <div class="checkbox_button"></div>
                        <span><?= $val ?></span>
                    </label>
            <?php endforeach; endforeach; endif; ?>
        </div>

        <div class="input_wrapper_other padding n40 select">
            <select required name="GroupId">
                <!--<option value=""><?/*= $text_user_GroupId */?></option>-->
                <?php /*if (false !== $groups): foreach ($groups as $group): */?>
                    <!--<option value="<?/*= $group->GroupId */?>"><?/*= $group->GroupName */?></option>-->
                <?php /*endforeach;endif; */?>
            </select>
        </div>
        <input class="block" type="submit" name="submit" value="<?= $text_label_save ?>">
    </fieldset>
</form>