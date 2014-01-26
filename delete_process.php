<?php
$link=mysql_connect ('localhost','root','111111');
if(!$link) {
die('Could not connect: ' .mysql_error());
}
// 2. 데이터베이스 선택
mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

$id= $_POST['Currentid'];
$sql="DELETE FROM topic WHERE id='$id'";
mysql_query($sql);

if(mysql_affected_rows()==1){
	echo "<html>
				<head>
					<script>alert('성공 했습니다.');
					location.href=\"index.php\";
					</script>					
				</head>
			</html>";
} else {
	echo "
	<html>
		<body> 
			실패, ".mysql_error().";
		</body>
	</html>";
}

?>