<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Application/Admin/css/admin_login.css" />
</head>

<body>
    <div class="admin_login_wrap">
        <div class="adming_login_border">
            <!-- <h1><b><font color="black">后台管理</font></b></h1> -->
            <div class="admin_input">
                <form action="<?php echo U('user/login');?>" method="post">
                    <ul class="admin_items">
                        <li>
                            <label for="user">用户名：</label>
                            <input type="text" name="login_name" value="" id="user" size="40" class="admin_input_style" placeholder="请输入登陆名"/>
                        </li>
                        <li>
                            <label for="pwd">密码：</label>
                            <input type="password" name="password" value="" id="pwd" size="40" class="admin_input_style" placeholder="请输入密码"/>
                        </li>
                        <!-- <li>
                            <label for="pwd">验证码：</label>
                            <input type="text" name="code" value="请输入验证码" id="code" size="15" class="admin_input_style" />
                        </li> -->
                        <li>
                            <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <!-- <p class="admin_copyright">
            <a tabindex="5" href="#" target="_blank">进入前台</a> &copy; 2016 Powered by
            <a href="#" target="_blank">你的大名</a>
        </p> -->
    </div>
</body>

</html>