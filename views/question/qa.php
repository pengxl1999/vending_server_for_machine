<?php

    /* @var $result */
    /* @var $voice */
    /* @var $flag */
    if($flag) {
        echo "<script type=text/javascript>haveFun('". $result . "', '" . $voice ." ')</script>";
    }
?>

<form id='search_form' action="./index.php?r=question/qa" method="post">
    <input type="text" name="info_search" id='search_med' placeholder="搜索药品" style="font-size: x-large" value=""/>
    <input type="submit" value="搜索" class="btn btn-primary" style="font-size:x-large; margin-left: 15px" />
    <a class="btn btn-primary" style="font-size:x-large; margin-left: 15px" onclick="window.android.voiceInput()">语音输入</a>
</form>

<script type="text/javascript">

    function getInformation(arg = "None") {
        var form = document.getElementById('search_form');
        var med = document.getElementById('info_search');
        med.value = arg;
        form.submit();
    }

    function haveFun(result, voice) {
        window.android.setInformation(result, voice);
    }

</script>