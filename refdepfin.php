<html>
<head>
<title>更新結果</title>
</head>
<body>
    <form action="logintest.php" method="post">
    <input type ="submit" name="answer" value="返回目錄">
    </form>
    <form action="department.php" method="post">
    <input type ="submit" name="answer" value="返回科系目錄">
    </form>
    <form action="refrashdepartment.php" method="post">
    <input type ="submit" name="answer" value="繼續更新科系">
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
$stunum=$_POST["depnum"];
$stunam=$_POST["depnam"];
$stuma=$_POST["depma"];
if (!$db_link)
  die ("連線失敗!");  
$db_open_sql =mysqli_select_db($db_link,"ch17_db");
mysqli_query($db_link,"SET NAMES 'UTF8'");
if (!$db_open_sql)
  die("無法開啟資料庫!");
$insert_record_sql="UPDATE　科系代碼表  SET 系碼=$stunum,系名=$stunam,系主任=$stuma WHERE 系碼='$stunam'";
mysqli_query($db_link,$insert_record_sql);
if (mysqli_affected_rows($db_link))
      echo "指令執行成功";
else
     echo "指令執行失敗";
mysqli_close($db_link);          
?>