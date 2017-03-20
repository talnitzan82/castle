console.log('Audit');
var videoElement = '<a href="<?php echo $click_url ?>" target="_blank" style="height:<?php echo $height ?>px;width:<?php echo $width ?>px"><img src="<?php echo $ad_image?>" alt="banner" height="<?php echo $height ?>" width="<?php echo $width ?>"></a>';
// var videoElement = '<img height="250" width="300" src="<?php echo $ad_image?>">';
$('#main_script').parent().append(videoElement);