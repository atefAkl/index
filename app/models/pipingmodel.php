<?php
namespace PHPMVC\Models;

class PipingModel extends AbstractModel
{

    public $ProductId;
    public $ProductName;
    public $ProductImages;
    public $ProductDesc;
    public $ProductCat;
    public $ProductOuterDia;
    public $ProductLength;
    public $ProductWallThk;
    public $ProductSurface;
    public $ProductTesting;
    public $ProductCertificates;
    public $ProductStandards;
    public $ProductGrades;
    public $ProductDatasheet;

    protected static $tableName = 'app_piping';

    protected static $tableSchema = array(
        'ProductId'             => self::DATA_TYPE_INT,
        'ProductName'           => self::DATA_TYPE_STR,
        'ProductImages'         => self::DATA_TYPE_STR,
        'ProductDesc'           => self::DATA_TYPE_INT,
        'ProductCat'            => self::DATA_TYPE_DECIMAL,
        'ProductOuterDia'       => self::DATA_TYPE_DECIMAL,
        'ProductLength'         => self::DATA_TYPE_DECIMAL,
        'ProductWallThk'        => self::DATA_TYPE_DECIMAL,
        'ProductSurface'        => self::DATA_TYPE_INT,
        'ProductTesting'        => self::DATA_TYPE_STR,
        'ProductCertificates'   => self::DATA_TYPE_STR,
        'ProductStandards'      => self::DATA_TYPE_STR,
        'ProductGrades'         => self::DATA_TYPE_STR,
        'ProductDatasheet'      => self::DATA_TYPE_STR,
    );

    protected static $primaryKey = 'ProductId';

    public static function getAll()
    {
        $sql = 'SELECT apl.*, apc.Name categoryName FROM ' . self::$tableName . ' apl';
        $sql .= ' INNER JOIN ' . ProductCategoryModel::getModelTableName() . ' apc';
        $sql .= ' ON apc.CategoryId = apl.CategoryId';
        return self::get($sql);
    }
}