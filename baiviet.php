<?php 
	include'config.php';
	 $id='';
  		if (isset($_GET['id'])) {
	  	$id = $_GET['id'];
	  	$sql = "SELECT *FROM creator WHERE id = ".$id;


	  	$test = executeResult($sql);
	    if ($test != null && count($test) > 0) {
	      $row      	= $test[0];
	      $title     	= $row['titles'];
	      $content    	= $row['content'];
	    }
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="style.css">
 	<link rel="stylesheet" type="text/css" href="responsive.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>	
 	<title>bài viết</title>
 </head>
 <body>
<div class="header">
<div class="nav__pc">
<nav>

	<img class="logo" src="logo.jpg">

<div class="menu">
	<li><a href="#">iPhone</a></li>
	<li><a href="#">iPad</a></li>
	<li><a href="#">Macbook</a></li>
	<li><a href="#">iMac</a></li>
	<li><a href="#">Apple TV</a></li>
	<li>						
		<form method="get" class="something">
			<span id="tim">
			<input type="text" name="s" style="padding-left: 10px;" class="search" placeholder="search">
			</span>
		</form>		
	</li>
</div>
<label for="nav-mobile-input" class="nav__bars-btn">
	<i class="fas fa-bars"></i>
</label>
<input type="checkbox" name="" hidden class="nav__input" id="nav-mobile-input">
<label for="nav-mobile-input" class="nav__overlay"></label>

<lable for="nav-mobile-input" class="nav__mobile">
<nav>
<label for="nav-mobile-input" class="nav__mobile-close">
	<i class="fas fa-times"></i>
</label>
<div class="menu__mobile">
	<li class="list__mobile"><a href="#">iPhone</a></li>
	<li class="list__mobile"><a href="#">iPad</a></li>
	<li class="list__mobile"><a href="#">Macbook</a></li>
	<li class="list__mobile"><a href="#">iMac</a></li>
	<li class="list__mobile"><a href="#">Apple TV</a></li>
	<li class="list__mobile">						
		<form method="get" class="something">
			<span id="tim">
			<input type="text" name="s" style="padding-left: 10px;" class="search" placeholder="search">
			</span>
		</form>		
	</li>
</div>
</nav>

</lable>
</nav>

</div>
</div>
<div class="container">	
<div class="content">

 			<h2>Bai viet : <?php echo $title; ?></h2>

 			<div>noi dung <?php echo $content; ?></div>
</div>
<div class="sidebar">
		<div style="font-weight: bold;text-align: center; margin-bottom: 40px; padding-top: 13px;">BÀI VIẾT GẦN ĐÂY</div> 
		<?php 
			$sql = 'select * from creator order by date DESC limit 3';
			$test = executeResult($sql);
			foreach ($test as $row) {
				echo 		
				'<ul>
					<div><a href="baiviet.php?id='.$row['id'].'","_self">
						<img src="'.$row['pic'].'" style="width: 100px; padding-left: 9px; padding-right: 9px;" align="left">				
						<div >'.$row['titles'].'</div>
					</a></div>
				</ul>';
			}
		?>
	</div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top" class="fas fa-arrow-up"></button>
<div class="footer">
		<span class="info">
			<span>Copyright © 2021 Phamminh Inc. All rights reserved.</span>
		</span>
		<span class="icons">
			<span><a href="#" target="blank"><span class="fab fa-facebook-f"></span></a></span>
			<span><a href="#" target="blank"><span class="fab fa-twitter"></span></a></span>
			<span><a href="#" target="blank"><span class="fab fa-instagram"></span></a></span>
		</span>
</div>
</div>
	<script>
	//Get the button
	var mybutton = document.getElementById("myBtn");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	    mybutton.style.display = "block";
	  } else {
	    mybutton.style.display = "none";
	  }
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
	  document.body.scrollTop = 0;
	  document.documentElement.scrollTop = 0;
	}
	</script>
</body>
 </body>
 </html>