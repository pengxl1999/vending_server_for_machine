<?php

    /* @var $result */
    if($result != null)
        echo "<script type=text/javascript>haveFun('" . $result->info_result ."', '" . $result->info_voice . "')</script>";
?>

<form id='search_form' action="./index.php?r=question/qa" method="post">
    <input type="text" name="search_info" id='search_med' placeholder="搜索药品" style="font-size: x-large" value=""/>
    <input type="submit" value="搜索" class="btn btn-primary" style="font-size:x-large; margin-left: 15px" />
</form>

<script>
    function haveFun(arg1, arg2) {
        window.android.setInformation(arg1, arg2);
    }
    
    function getInformation(arg) {
        var form = document.getElementById('search_form');
        var med = document.getElementById('search_info');
        med.value = arg;
        form.submit();
    }
    
</script>