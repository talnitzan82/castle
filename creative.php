<?php
require_once (__DIR__."/utils/uuid.php");
//require_once (__DIR__."/utils/utilFuncs.php");
//require_once (__DIR__."/server/db.php");
$uuid = UUID::v4();
$ad_image = $_GET['ad'];
$click_url = $_GET['click'];
$height = $_GET['height'];
$width = $_GET['width'];
$height = str_replace("'","",$height);
$width = str_replace("'","",$width);
$isAudit = isAudit($width,$height);

$uAgent = $_SERVER['HTTP_USER_AGENT'];
//TODO: split user agent

//insert to DB

if ($isAudit) {
    include "audit.js";
} else {
    include "no_audit.js";
}

function isAudit($width,$height) {
    if (!is_numeric($width) || !is_numeric($height)) {
        return true;
    };
}
?>
    
