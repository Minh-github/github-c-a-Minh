<?php 
	include 'config.php';
	if (isset($_POST['submit']) && $_POST['name'] !='' && $_POST['CT'] !='') {
		$sname = $_POST['name'];
		$sct   = $_POST['CT'];
		$spic  = $_POST['pic1'];

		$sql = "INSERT  INTO creator(titles,content,pic) VALUES('$sname','$sct','$spic')";
		$result = mysqli_query($conn,$sql);
		 if ($result) {
                    header("location:index.php");

		}
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style2.css">	
	<title>Create content</title>
</head>
<body>
	<div class="container">
		<form method="post">
			<div class="title">
				<div>Tiêu đề của bài viết</div>
				<input type="text" name="name" placeholder="text in here">
				<div>Hình minh họa</div>
				<input type="text" name="pic1" placeholder="URL in here">
			</div>
			<div class="content">
				<div>Nội dung chương</div>
				<textarea name="CT" placeholder="text in here"></textarea>
			</div>
			<div class="btn">
				<button class="btn btn-success" name="submit">Tạo bài viết</button>
			</div>
		</form>
	</div>
</body>
</html>