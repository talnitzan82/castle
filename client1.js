var ad = <?php echo $ad_number ?>;
console.log(ad);

if (ad == 1) {
    var videoElement = '<iframe src="http://go.adslserver.com/view/tag.php?tag=mg4f10&size=320x50&subid4=<?php echo $top_domain ?>&subid5=<?php echo $carrier ?>&subid2=XXX&cad[idfa]=<?php echo $idfa ?>" width="320" height="50" border="0" frameborder="0" scrolling="no" ></iframe>';
} else if (ad == 2) {
    var videoElement = '<iframe src="http://go.adslserver.com/view/tag.php?tag=9ogmq9&size=300x250&subid4=<?php echo $top_domain ?>&subid5=<?php echo $carrier ?>&subid2=XXX&cad[idfa]=<?php echo $idfa ?>" width="300" height="250" border="0" frameborder="0" scrolling="no" ></iframe>';
} else if (ad == 3) {
    var videoElement = '<script type="text/javascript" src="http://go.adslserver.com/view/tagjs.php?tag=3yqiri&size=320x50&subid4=<?php echo $top_domain ?>&subid5=<?php echo $carrier ?>&subid2=XXX&cad[idfa]=<?php echo $idfa ?>"></script>';
} else if (ad == 4) {
    var videoElement = '<script type="text/javascript" src="http://go.adslserver.com/view/tagjs.php?tag=yea5y1&size=300x250&subid4=<?php echo $top_domain ?>&subid5=<?php echo $carrier ?>&subid2=XXX&cad[idfa]=<?php echo $idfa ?>"></script>';
}



// var videoElement = '<a href="<?php echo $click_url ?>" target="_blank" style="height:<?php echo $height ?>px;width:<?php echo $width ?>px"><img src="<?php echo $ad_image?>" alt="banner" height="<?php echo $height ?>" width="<?php echo $width ?>"></a>';
// var videoElement = '<img height="250" width="300" src="<?php echo $ad_image?>">';
$('#main_script').parent().append(videoElement);