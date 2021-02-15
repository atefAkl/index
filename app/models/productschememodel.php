<?php
namespace PHPMVC\Models;

use PHPMVC\Models\FieldsModel;

class ProductSchemeModel extends AbstractModel
{

    public $PSId;
    public $PSName;
    public $PSCommon;
    public $PSSpecial;

    protected static $tableName = 'app_product_scheme';
    protected static $tableSchema = array(
        'PSId'                  => self::DATA_TYPE_STR,
        'PSName'                => self::DATA_TYPE_STR,
    );

    protected static $primaryKey = 'PSId';
}