<?php
    echo 'haveddd';
?>

<form id='search_form' action="./index.php?r=buy/index" method="post">
    <input type="text" name="search_med" id='search_med' placeholder="搜索药品" style="font-size: x-large" value=""/>
    <input type="submit" value="搜索" class="btn btn-primary" style="font-size:x-large; margin-left: 15px" />
</form>

<script>
    function haveFun() {
        var form = document.getElementById('search_form');
        var med = document.getElementById('search_med');
        med.value = "haahh";
        window.android.haha();
    }
</script>