<form id='search_form' action="./index.php?r=question/qa" method="post">
    <input type="text" name='info_search' id='info_search' placeholder="搜索药品" style="font-size: x-large" value=""/>
    <input type="submit" value="搜索" class="btn btn-primary" style="font-size:x-large; margin-left: 15px" />
    <button type="button" class="btn btn-primary" style="font-size:x-large; margin-left: 15px" onclick="haveFun('a', 'b')">test</button>
</form>

<script type="text/javascript">

    function getInformation(arg) {
        var form = document.getElementById('search_form');
        var info = document.getElementById('info_search');
        info.value = arg;
        form.submit();
    }

    function haveFun(result, voice) {
        window.android.setInformation(result, voice);
    }

</script>

<?php

/* @var $result */
/* @var $voice */
echo "<script type=text/javascript>haveFun('" . $result . "', '" . $voice  . " ')</script>";
?>