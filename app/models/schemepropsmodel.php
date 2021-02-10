<?php
namespace PHPMVC\Models;

class SchemePropsModel extends AbstractModel
{

    public $PSPId;
    public $PropId;
    public $SchemeId;

    protected static $tableName = 'app_product_scheme_props';

    protected static $tableSchema = array(
        'PSPId'                 => self::DATA_TYPE_INT,
        'PropId'                => self::DATA_TYPE_INT,
        'SchemeId'              => self::DATA_TYPE_INT
    );

    protected static $primaryKey = '$PSPId';

    public static function getSchemeProps(PSchemeModel $pScheme) {
        $schemeProps = self::getBy(['GroupId' => $pScheme->PSId]);
        $extractedPropsIds = [];
        if(false !== $schemeProps) {
            foreach ($schemeProps as $prop) {
                $extractedPropsIds[] = $prop->PXId;
            }
        }
        return $extractedPropsIds;
    }
    /*public static function getSchemePropss(UserGroupModel $group) {
        $groupPrivileges = self::getBy(['GroupId' => $group->GroupId]);
        $extractedPrivilegesIds = [];
        if(false !== $groupPrivileges) {
            foreach ($groupPrivileges as $privilege) {
                $extractedPrivilegesIds[] = $privilege->PrivilegeId;
            }
        }
        return $extractedPrivilegesIds;
    }*/


    public static function getPropsForSchemes($PSId)
    {
        $sql = 'SELECT apsp.*, app.PXProp FROM ' . self::$tableName . ' apsp';
        $sql .= ' INNER JOIN app_products_props app ON app.PXId = apsp.PXId';
        $sql .= ' WHERE apsp.PSId = ' . $PSId;
        $privileges =  self::get($sql);
        $extractedUrls = [];
        if(false !== $privileges) {
            foreach ($privileges as $privilege) {
                $extractedUrls[] = $privilege->Privilege;
            }
        }
        return $extractedUrls;
    }

    public static function getPrivilegesForGroup($groupId)
    {
        $sql = 'SELECT augp.*, aup.Privilege FROM ' . self::$tableName . ' augp';
        $sql .= ' INNER JOIN app_users_privileges aup ON aup.PrivilegeId = augp.PrivilegeId';
        $sql .= ' WHERE augp.GroupId = ' . $groupId;
        $privileges =  self::get($sql);
        $extractedUrls = [];
        if(false !== $privileges) {
            foreach ($privileges as $privilege) {
                $extractedUrls[] = $privilege->Privilege;
            }
        }
        return $extractedUrls;
    }
}