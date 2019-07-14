<?php

/* @var $qrcode */
/* @var $response */
/* @var $qrPayRequestBuilder */
/* @var $freshTime */
?>

<meta http-equiv="refresh" content="2" />
<div style="text-align: center; vertical-align: middle">
    <?php echo '<img src="'. $qrcode .'"/>'?>
    <br />
    <?php print_r($response) ?>
</div>