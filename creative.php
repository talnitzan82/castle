<?php
require_once (__DIR__."/utils/uuid.php");
require_once (__DIR__."/utils/legit_domains.php");
//require_once (__DIR__."/utils/utilFuncs.php");
require_once (__DIR__."/server/db.php");

$tableName = 's_traffic';

$ad_number = $_GET['ad'];
$uuid = $impDetails['uuid'] = UUID::v4();
$ad_image = $impDetails['ad_image'] = $_GET['ad'];
$click_url = $impDetails['click_url'] = $_GET['click'];
$idfa = $impDetails['idfa'] = isset($_GET['idfa']) ? $_GET['idfa'] : "";
$carrier = $impDetails['carrier'] = isset($_GET['carrier']) ? $_GET['carrier'] : "";
$impDetails['geo'] = isset($_GET['geo']) ? $_GET['geo'] : "";
$impDetails['cost'] = isset($_GET['cost']) ? $_GET['cost'] : 0;
$impDetails['bid'] = isset($_GET['bid']) ? $_GET['bid'] : 0;
$impDetails['camp_id'] = isset($_GET['camp_id']) ? $_GET['camp_id'] : 0;
$impDetails['type'] = isset($_GET['c']) ? $_GET['c'] : "c";
$impDetails['s_system'] = isset($_GET['s_system']) ? $_GET['s_system'] : "no_system";
$height = $impDetails['height'] = str_replace("'","",$_GET['height']);
$width = $impDetails['width'] = str_replace("'","",$_GET['width']);

$impDetails['referer'] = extract_domain(getReferer());
$top_domain = $impDetails['top_domain'] = isset($_GET['domain']) && strlen($_GET['domain'])>0 ? extract_domain($_GET['domain']) : $impDetails['referer'];

$isAudit = isAudit($width,$height, $impDetails['top_domain'], $legit_domains);
$impDetails['audit_mode'] = $isAudit ? 1 : 0;
$uAgent = $impDetails['uAgent'] = $_SERVER['HTTP_USER_AGENT'];
//TODO: split user agent

//insert to DB
insertImpression($impDetails);
if ($isAudit) {
    include "client1.js";
} else {
    include "no_audit.js";
}

function isAudit($width,$height, $top_domain, $legit_domains) {
    if (!is_numeric($width) || !is_numeric($height) || !in_array ($top_domain , $legit_domains)) {
        return true;
    };
}

function insertImpression($impDetails) {
    global $db_con, $tableName ;
    $arrInsert[] = "u_agent='".mysqli_real_escape_string($db_con, $impDetails['uAgent'])."'";
    $arrInsert[] = "ioID='".mysqli_real_escape_string($db_con, $impDetails['uuid'])."'";
    $arrInsert[] = "user_ip='".mysqli_real_escape_string($db_con, getIP())."'";
    $arrInsert[] = "top_domain='".mysqli_real_escape_string($db_con, $impDetails['top_domain'])."'";
    $arrInsert[] = "referer='".mysqli_real_escape_string($db_con, getReferer())."'";
    $arrInsert[] = "geo='".mysqli_real_escape_string($db_con, $impDetails['geo'])."'";
    $arrInsert[] = "cost='".mysqli_real_escape_string($db_con, $impDetails['cost'])."'";
    $arrInsert[] = "bid='".mysqli_real_escape_string($db_con, $impDetails['bid'])."'";
    $arrInsert[] = "type='".mysqli_real_escape_string($db_con, $impDetails['type'])."'";
    $arrInsert[] = "s_system='".mysqli_real_escape_string($db_con, $impDetails['s_system'])."'";
    $arrInsert[] = "camp_id='".mysqli_real_escape_string($db_con, $impDetails['camp_id'])."'";
    $arrInsert[] = "audit_mode='".mysqli_real_escape_string($db_con, $impDetails['audit_mode'])."'";

    $insert_query = "INSERT INTO ".$tableName." SET ".implode(",",$arrInsert);
//    var_dump($insert_query);
    mysqli_query($db_con, $insert_query);

    return $impDetails['uuid'];
}

function getIP() {
    $ip = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $ips = explode(",", $ip);

    return trim($ips[0]);
}

function extract_domain($domain)
{
    if(preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches))
    {
        return $matches['domain'];
    } else {
        return $domain;
    }
}

function processURLString($urlString) {
    $urlString = trim($urlString);

    if($urlString) {
        $urlString = preg_replace('/https?:\/\//', '', $urlString);
        $urlString = trim($urlString);
        $urlString  = 'http://'.$urlString;
    }

    $parse = parse_url ($urlString);

    $domain = $parse['host'];
    if (substr($domain, 0, 4) == "www.") {
        $domain = substr($domain, 4);
    }

    return $domain;
}

function getReferer() {

    if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '')
        return $_SERVER['HTTP_REFERER'];
    else
        return $_SERVER['HTTP_ORIGIN'];
}

    

/*
CREATE TABLE `s_traffic` (
`id` bigint(18) NOT NULL AUTO_INCREMENT,
`ioID` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
`ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`u_agent` text CHARACTER SET utf8,
`top_domain` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
`referer` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
`geo` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
`conversion` int(4) DEFAULT '0',
`bid` float(7,3) DEFAULT NULL,
`cost` float(7,3) DEFAULT NULL,
`s_system` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
`camp_id` bigint(20) DEFAULT NULL,
`revenue` float(7,3) DEFAULT '0.000',
`type` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
`audit_mode` tinyint(4) DEFAULT '0',
`user_ip` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
PRIMARY KEY (`id`),
KEY `IOCODEINDEX` (`ioID`),
KEY `camp_index` (`camp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
*/


/*
   CREATE TABLE `d_tags` (
  `id` bigint(18) NOT NULL AUTO_INCREMENT,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `d_system` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `d_partner` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `app_name` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `o_system` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `cpi` float(7,3) DEFAULT NULL,
  `geo` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `url` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

Ecp1dxM1DvqnCdMb

 */
?>