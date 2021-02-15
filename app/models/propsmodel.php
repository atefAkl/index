<?php
namespace PHPMVC\Models;

class PropsModel extends AbstractModel
{

    public $PXId;
    public $PXName;
    public $PXProp;

    protected static $tableName = 'app_product_props';

    protected static $tableSchema = array(
        'PXId'              => self::DATA_TYPE_INT,
        'PXName'            => self::DATA_TYPE_STR,
        'PXProp'            => self::DATA_TYPE_STR,
    );

    protected static $primaryKey = 'PXId';
}