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
    public $productTables;
    public $UserId;
    public $ProductDateReg;


    protected static $tableName = 'app_piping_products';

    protected static $tableSchema = array(
        'ProductId'             => self::DATA_TYPE_INT,
        'ProductName'           => self::DATA_TYPE_STR,
        'ProductImages'         => self::DATA_TYPE_STR,
        'ProductDesc'           => self::DATA_TYPE_STR,
        'ProductCat'            => self::DATA_TYPE_STR,
        'ProductOuterDia'       => self::DATA_TYPE_STR,
        'ProductLength'         => self::DATA_TYPE_STR,
        'ProductWallThk'        => self::DATA_TYPE_STR,
        'ProductSurface'        => self::DATA_TYPE_STR,
        'ProductTesting'        => self::DATA_TYPE_STR,
        'ProductCertificates'   => self::DATA_TYPE_STR,
        'ProductStandards'      => self::DATA_TYPE_STR,
        'ProductGrades'         => self::DATA_TYPE_STR,
        'ProductTables'          => self::DATA_TYPE_STR,
        'ProductDatasheet'      => self::DATA_TYPE_STR,
        'ProductDateReg'        => self::DATA_TYPE_STR,
        'UserId'                => self::DATA_TYPE_INT,
    );

    protected static $primaryKey = 'ProductId';


}