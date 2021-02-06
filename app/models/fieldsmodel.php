<?php
namespace PHPMVC\Models;

class fieldsModel extends AbstractModel
{

    public $FieldId;
    public $FieldName;
    public $FieldDesc;
    public $FieldImage;
    public $FieldChildCat;


    protected static $tableName = 'app_fields';

    protected static $tableSchema = array(
        'FieldName'          => self::DATA_TYPE_STR,
        'FieldDesc'          => self::DATA_TYPE_STR,
        'FieldImage'         => self::DATA_TYPE_STR,
        'FieldChildCat'      => self::DATA_TYPE_STR,


    );

    protected static $primaryKey = 'FieldId';

    public static function selectOnly($field) {
        $sql = 'SELECT ' . $field .  ' FROM ' . static::$tableName;
        return self::get($sql);
    }

}