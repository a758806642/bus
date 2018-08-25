<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
    <script src="/Application/Home/js/jquery-1.8.2.js"></script>
    <script src="/Application/Home/js/layer/layer.js"></script>
</head>
<body>


<?php if(isset($message)) { ?>
    <script>
        layer.msg('<?php echo($message); ?>',{icon:6,time:1500},function(){
            location.href='<?php echo($jumpUrl); ?>';
        })


    </script>




<?php
 }else{ ?>
    <script>
        layer.msg('<?php echo($error); ?>',{icon:5,time:1500},function(){
            location.href='<?php echo($jumpUrl); ?>';
        })


    </script>


<?php
 } ?>




</body>
</html>