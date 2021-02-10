<?php
namespace PHPMVC\Models;

use PHPMVC\Models\FieldsModel;

class ProductSchemeModel extends AbstractModel
{

    public $PSId;
    public $PSField;
    public $PSCat;
    public $PSName;
    public $PSCommon;
    public $PSSpecial;

    protected static $tableName = 'app_product_scheme';
    protected static $tableSchema = array(
        'PSField'               => self::DATA_TYPE_STR,
        'PSCat'                 => self::DATA_TYPE_STR,
        'PSName'                => self::DATA_TYPE_STR,
        'PSCommon'              => self::DATA_TYPE_STR,
        'PSSpecial'             => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'PSId';
}