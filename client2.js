var ad = <?php echo $ad_number ?>;
console.log(ad);

if (ad == 1) {
	var videoElement = '<iframe src="http://app.jennywsplash.com/view/tag.php?tag=ca7hh3&size=300x250&subid4=<?php echo $top_domain ?>&subid5=carrier&subid2=1234&cad[app_name]=443&cad[pub_sub]=<?php echo $uuid ?>&cad[idfa]=<?php echo $idfa ?>" width="300" height="250" border="0" frameborder="0" scrolling="no" ></iframe>';
} else if (ad == 2) {
    var videoElement = '<iframe src="http://app.jennywsplash.com/view/tag.php?tag=ydd08w&size=320x50&subid4=<?php echo $top_domain ?>&subid5=carrier&subid2=1234&cad[app_name]=443&cad[pub_sub]=<?php echo $uuid ?>&cad[idfa]=<?php echo $idfa ?>" width="320" height="50" border="0" frameborder="0" scrolling="no" ></iframe>';
} else {
    var videoElement = '<a href="<?php echo $click_url ?>" target="_blank" style="height:<?php echo $height ?>px;width:<?php echo $width ?>px"><img src="<?php echo $ad_image?>" alt="banner" height="<?php echo $height ?>" width="<?php echo $width ?>"></a>';
}

$('#main_script').parent().append(videoElement);