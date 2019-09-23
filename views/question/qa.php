<?php


?>


<script type="text/javascript">
    var aaa;
    function getInformation(arg) {
        aaa = arg;
        var result = <? echo "<script type=text/javascript>document.write(aaa)</script>";?>;
        var voice = <? echo "<script type=text/javascript>document.write(aaa)</script>";?>;
        window.android.setInformation(result, voice);
    }
</script>

