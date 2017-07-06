<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>php-demo1</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="../../css/reset.css" type="text/css">
    <style type="text/css">
        
    </style>
</head>
<body>
   	<div class="wrap">
        <?php
        // 定义变量并默认设置为空值
        $nameErr = $emailErr = $genderErr = $websiteErr = "";
        $name = $email = $gender = $comment = $website = "";
        // $_SERVER["REQUEST_METHOD"访问页面的请求方法
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (empty($_POST["name"]))//empty()函数
            {
                $nameErr = "名字是必需的";
            }
            else
            {
                $name = test_input($_POST["name"]);
                // 检测名字是否只包含字母跟空格
                // preg_match — 进行正则表达式匹配。
                if (!preg_match("/^[a-zA-Z ]*$/",$name))
                {
                    $nameErr = "只允许字母和空格"; 
                }
            }
            
            if (empty($_POST["email"]))
            {
              $emailErr = "邮箱是必需的";
            }
            else
            {
                $email = test_input($_POST["email"]);
                // 检测邮箱是否合法
                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
                {
                    $emailErr = "非法邮箱格式"; 
                }
            }
            
            if (empty($_POST["website"]))
            {
                $website = "";
            }
            else
            {
                $website = test_input($_POST["website"]);
                // 检测 URL 地址是否合法
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
                {
                    $websiteErr = "非法的 URL 的地址"; 
                }
            }
            
            if (empty($_POST["comment"]))
            {
                $comment = "";
            }
            else
            {
                $comment = test_input($_POST["comment"]);
            }
            
            if (empty($_POST["gender"]))
            {
                $genderErr = "性别是必需的";
            }
            else
            {
                $gender = test_input($_POST["gender"]);
            }
        }

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            名字: <input type="text" name="name" value="<?php echo $name?>"><span>*<?php echo $nameErr?></span></br>
            email: <input type="text" name="email" value="<?php echo $email?>"><span>*<?php echo $emailErr?></span></br>
            网址: <input type="text" name="website" value="<?php echo $website?>"></br>
            备注: <textarea name="comment" id="" cols="30" rows="10" value="<?php echo $comment?>"></textarea></br>
            性别：<input type="radio" name="gender" value="female" <?php if(isset($gender) && $gender = "female") echo "checked"?>>男
                  <input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender = "male") echo "checked"?>>女</br>
            <input type="submit" value="提交">
        </form>
        
        <?php
        echo "<h2>您输入的内容是:</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;
        ?>
   	</div>
   
    
</body>
</html>