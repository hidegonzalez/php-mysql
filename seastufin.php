<html>
<head>
<title>搜尋結果</title>
</head>
<body>
    <form action="logintest.php" method="post">
    <input type ="submit" name="answer" value="返回目錄">
    </form>
    <form action="student.php" method="post">
    <input type ="submit" name="answer" value="返回學生功能目錄">
    </form>
    <form action="deletestudent.php" method="post">
    <input type ="submit" name="answer" value="繼續刪除學籍">
    </form>
    <form action="newdstudent.php" method="post">
    <input type ="submit" name="answer" value="繼續新增學籍">
    </form>
    <form action="refrashstudent.php" method="post">
    <input type ="submit" name="answer" value="繼續更新學籍">
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
if (!$db_link)
  die ("連線失敗!");  
$db_open_sql =mysqli_select_db($db_link,"ch17_db");
mysqli_query($db_link,"SET NAMES 'UTF8'");
if (!$db_open_sql)
  die("無法開啟資料庫!");
$sql_query="SELECT * FROM 學生資料表";
$result = mysqli_query($db_link,$sql_query);
if ($sql_query)
	echo "指令執行成功";
else
   echo "指令執行失敗";
//echo $result;  
echo "<TABLE BORDER='1'><TR ALIGN='CENTER'>";

//如果有讀取資料時，則透過for迴圈來依序讀取欲顯示記錄的各「欄位名稱」
for ($i=0; $i<mysqli_num_fields($result); $i++)             
	{
		$row_result = mysqli_fetch_field($result);
		echo "<TD>".$row_result->name."</TD>";  //取得欄位名稱
	}
echo "</TR>";
//如果有讀取資料時，則透過for迴圈來依序讀取欲顯示記錄的各「欄位內容」
for ($i=0; $i<mysqli_num_rows($result); $i++)             
	{
		mysqli_data_seek($result,$i);
		$resrow = mysqli_fetch_row($result);
		echo "<TR>";
		for ($j=0; $j<mysqli_num_fields($result); $j++)
		{
			echo "<TD>".$resrow[$j]."</TD>"; //取得欄位內容
		}
	    echo "</TR>";
	}
echo "</TABLE>";
mysqli_free_result($result);  
mysqli_close($db_link);           
?>