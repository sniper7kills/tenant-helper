<?php

namespace sniper7kills\tenantHelper;

use \Illuminate\Foundation\Application;

class TenantApplication extends Application
{
    public function loadFromParent( $parentObj )
    {
        $objValues = get_object_vars($parentObj); // return array of object values
        foreach($objValues AS $key=>$value)
        {
            $this->$key = $value;
        }
    }

    public function getNamespace()
    {
        return parent::getNamespace()."Tenant\\";
    }
}