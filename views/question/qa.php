<?php


?>


<script type="text/javascript">
    function getInformation(arg) {
        var inputData = arg;
        let result = <?
            $input = "<script type=text/javascript>document.write(inputData)</script>";
            $information = \app\models\Information::findOne(['info_question' => $input]);
            echo $information == null ? "" : $information->info_result ?>;
        let voice = <?
            $input = "<script type=text/javascript>document.write(inputData)</script>";
            $information = \app\models\Information::findOne(['info_question' => $input]);
            echo $information == null ? "" : $information->info_voice ?>;
        window.android.setInformation(result, voice);
    }

</script>