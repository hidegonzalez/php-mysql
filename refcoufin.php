<html>
<head>
<title>更新結果</title>
</head>
<body>
    <form action="logintest.php" method="post">
    <input type ="submit" name="answer" value="返回目錄">
    </form>
    <form action="course.php" method="post">
    <input type ="submit" name="answer" value="返回課程目錄">
    </form>
    <form action="newcourse.php" method="post">
    <input type ="submit" name="answer" value="繼續更新課程">
    </form>
</body>
</html>
<?php
$db_host = "localhost";      
$db_id = "test";             
$db_pw = "ekids178";
$db_name = "ch17_db";
$db_port = 3306;              
$db_link = mysqli_connect($db_host,$db_id,$db_pw,$db_name,$db_port);
$stunum=$_POST["counum"];
$stunam=$_POST["counam"];
$stuma=$_POST["couma"];
if (!$db_link)
  die ("連線失敗!");  
$db_open_sql =mysqli_select_db($db_link,"ch17_db");
mysqli_query($db_link,"SET NAMES 'UTF8'");
if (!$db_open_sql)
  die("無法開啟資料庫!");
$insert_record_sql="UPDATE　課程資料表  SET 課號=$stunum,課名=$stunam,學分數=$stuma WHERE 課名='$stunam'";
mysqli_query($db_link,$insert_record_sql);
if (mysqli_affected_rows($db_link))
      echo "指令執行成功";
else
     echo "指令執行失敗";
mysqli_close($db_link);          
?>