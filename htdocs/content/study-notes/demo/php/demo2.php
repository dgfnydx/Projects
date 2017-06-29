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
            header("content-type:text/html;charset=utf-8");
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "first";
             
            // 创建连接
            $conn = new mysqli($servername, $username, $password, $dbname);
             
            // 检测连接
            if ($conn->connect_error) {
                die("连接失败: " . $conn->connect_error);
            } 
            echo "连接成功";

            // // 使用 sql 创建数据表
            // $sql = "CREATE TABLE MyGuests (
            //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            //     firstname VARCHAR(30) NOT NULL,
            //     lastname VARCHAR(30) NOT NULL,
            //     email VARCHAR(50),
            //     reg_date TIMESTAMP
            // )";

            // if ($conn->query($sql) === TRUE) {
            //     echo "Table MyGuests created successfully";
            // } else {
            //     echo "创建数据表错误: " . $conn->error;
            // }

            // $conn->close();
        ?>
   	</div>
   
    
</body>
</html>