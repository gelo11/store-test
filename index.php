<?php

//error_reporting('E_ALL');
//ini_set('display_errors', 1);

define('DS', DIRECTORY_SEPARATOR);
$sitePath = realpath(dirname(__FILE__) . DS);
define('SITE_PATH', $sitePath);

include (SITE_PATH . DS . 'config.php');

include (SITE_PATH . DS . 'Tovar.php');
include (SITE_PATH . DS . 'Color.php');

if(isset($_GET['tovar_id'])) {
    $result = (new Tovar())->getTovar($_GET['tovar_id']);
} else {
    $result = (new Tovar())->getFirstTovar();
}

$colorTovar = new Color();
$colors = [];
foreach ( $colorTovar->getColorTovar($result['id']) as $color) {
    $colors[] = '<span style="color:' . $color['code'] . '">' . $color['name'] . '</span>';
}

include (SITE_PATH . DS . 'view.php');
