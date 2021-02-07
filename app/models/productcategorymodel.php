<?php
namespace PHPMVC\Models;

class ProductCategoryModel extends AbstractModel
{

    public $CategoryId;
    public $CategoryName;
    public $CategoryDesc;
    public $CategoryImage;
    public $CategoryField;

    protected static $tableName = 'app_products_categories';

    protected static $tableSchema = array(
        'CategoryName'          => self::DATA_TYPE_STR,
        'CategoryDesc'          => self::DATA_TYPE_STR,
        'CategoryImage'         => self::DATA_TYPE_STR,
        'CategoryField'        => self::DATA_TYPE_INT

    );

    protected static $primaryKey = 'CategoryId';

    public static function getAll()
    {
        $sql = $sql = 'SELECT *, (SELECT FieldName FROM app_fields WHERE app_fields.FieldId = ' . self::$tableName . '.CategoryField) Field FROM ' . self::$tableName ;

        return self::get($sql);
    }
}