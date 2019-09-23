<?php

    /* @var $result */
    /* @var $voice */
    if($result !== 'N')
        echo "<script type=text/javascript>haveFun('" . $result ."', '" . $voice . "')</script>";
?>


<script>
    function getInformation(arg) {
        window.android.haha(arg);
    }

    function haveFun(arg1, arg2) {
        window.android.setInformation(arg1, arg2);
    }

</script>