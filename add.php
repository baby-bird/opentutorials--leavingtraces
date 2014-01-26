<?php
// 1. 데이터베이스 서버에 접속
$link=mysql_connect('localhost','root','111111');
if(!$link) {
die('Could not connect: '.mysql_error());
}
// 2. 데이터베이스 선택
mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
if(!empty($_GET['id'])) {
$sql="SELECT * FROM topic WHERE id = ".$_GET['id'];
$result = mysql_query($sql);
$topic = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<style type="text/css">
body {
font-size: 0.8em;
font-family: dotum;
line-height: 1.6em;
}
body.black {
background-color: black;
color: white;
}
body.black a {
color: white;
}
body.black a:hover {
color: #f60;
}
body.black header {
border-bottom: 1px solid #333;
}
body.black nav {
border-right: 1px solid #333;
}
header {
border-bottom: 1px solid #ccc;
padding: 20px 0;
}
#toolbar {
padding: 10px;
float: right;
}
input.submit {
margin-left: 50px;}
ul,ol,li{list-style-type:none}
textarea{vertical-align:bottom;}

nav {
float: left;
margin-right: 20px;
min-height: 500px;
border-right: 1px solid #ccc;
}
nav ul {
list-style: none;
padding-left: 0;
padding-right: 20px;
}
article {
float: left;
}
footer {
clear: both;
}
a {
text-decoration: none;
}
a:link, a:visited {
color: #333;
}
a:hover {
color: #f60;
}
h1 {
font-size: 1.4em;
}
.description{
width:500px;
}
</style>
</head>
<body id="body">
<div>
<header>
<a href="./index.php"><h1>JavaScript</h1></a>
</header>
<div id="toolbar">
<input type="button" value="black" onclick="document.getElementById('body').className='black'" />
<input type="button" value="white" onclick="document.getElementById('body').className='white'" />
</div>
<nav>
<ul>
	<a href="./add.php">
    <button>응원 한마디</button>
   </a>
<?php
$sql="select id,title from topic";
$result=mysql_query($sql);
while($row=mysql_fetch_assoc($result)) {
echo "
<li>
<a href=\"./index.php?id={$row['id']}\">{$row['title']}</a></li>";
}
?>
</ul>
</nav>
	<article>
	 	<form action="add_process.php" method="POST">
		<h2><label>제목</label>
			<input type="text" name="title">
			</h2>
		<div class="description">
		<p><ul><li>본문 : 
			<div style="margin:0;padding:0;">
			<textarea name="description" id="" cols="30" rows="10" >한번쓰면 지우는 기능 없어요.(어떻게 지우는지 이제 공부중...) 신중히쓰기ㅋㅋ</textarea></div>
			</li></ul></p>
		<p><input class="submit" type="submit" value="힘내라!" /></p>
		</div>
		</form>
	</article>
</div>
</body>
</html>