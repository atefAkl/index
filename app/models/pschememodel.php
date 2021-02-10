<?php
namespace PHPMVC\Models;

class PSchemeModel extends AbstractModel
{

    public $PSId;
    public $PSName;

    protected static $tableName = 'app_product_scheme';

    protected static $tableSchema = array(
        'PSId'            => self::DATA_TYPE_INT,
        'PSName'          => self::DATA_TYPE_STR
    );

    protected static $primaryKey = 'PSId';
}