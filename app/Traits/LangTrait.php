<?php
namespace App\Traits;
$GLOBALS['lang'] = [];
include(app_path().'/resources/lang/en/common.php');
trait LangTrait
{
    public function _lang(String $property)
    {
        return $GLOBALS['lang'][$_GET['ln'] ?? 'en'][strtolower($property)] ?? '';
    }

}