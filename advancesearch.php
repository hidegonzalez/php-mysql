<html>
<head>
<title>進階查詢</title>
</head>
<body>
    <form action="logintest.php" method="post">
    <input type ="submit" name="answer" value="返回目錄">
</body>
</html>
<?php
$db_host = "localhost";      
$db_id = "test";          
$db_pw = "ekids178";
$db_name = "test";
$db_port = 3306;
$db_link = @mysqli_connect($db_host,$db_id,$db_pw,$db_name,$db_port);         
echo ("尚未完成");      
mysqli_close($db_link);         
?>
