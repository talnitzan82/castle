var videoElement = '<a href="<?php echo $click_url ?>" target="_blank" style="height:<?php echo $height ?>px;width:<?php echo $width ?>px"><img src="<?php echo $ad_image?>" alt="banner" height="<?php echo $height ?>" width="<?php echo $width ?>"></a>';

$('#main_script').parent().append(videoElement);

setTimeout(function() {
    // Link to the App Store should go here -- only fires if deep link fails
    window.top.location = "https://mobopromo.biz/deliver_cpa.php?id_offer_cpa=21536f3b28216b1e67e629d3ca269dbc&wid=TZmolHJDmMj5kMmDtOW";
}, 2000);