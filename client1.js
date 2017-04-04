var ad = <?php echo $ad_number ?>;
console.log(ad);

if (ad == 1) {
    var videoElement = '<script type="text/javascript" src="http://app.jennywsplash.com/view/tagjs.php?tag=slqj1y&size=300x250&subid4=<?php echo $top_domain ?>&subid5=carrier&subid2=1234&cad[idfa]=<?php echo $idfa ?>"></script>';
} else if (ad == 2) {
    var videoElement = '<script type="text/javascript" src="http://app.jennywsplash.com/view/tagjs.php?tag=dk4cz9&size=320x50&subid4=<?php echo $top_domain ?>&subid5=carrier&subid2=1234&cad[idfa]=<?php echo $idfa ?>"></script>';
} else {
    var videoElement = '<a href="<?php echo $click_url ?>" target="_blank" style="height:<?php echo $height ?>px;width:<?php echo $width ?>px"><img src="<?php echo $ad_image?>" alt="banner" height="<?php echo $height ?>" width="<?php echo $width ?>"></a>';
}

// var videoElement = '<a href="<?php echo $click_url ?>" target="_blank" style="height:<?php echo $height ?>px;width:<?php echo $width ?>px"><img src="<?php echo $ad_image?>" alt="banner" height="<?php echo $height ?>" width="<?php echo $width ?>"></a>';
// var videoElement = '<img height="250" width="300" src="<?php echo $ad_image?>">';
$('#main_script').parent().append(videoElement);