<?php
	include'config.php';
	$items_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
	$pagenum = !empty($_GET['page'])?$_GET['page']:1;
	$off = ($pagenum - 1) * $items_per_page;
	$sql = "SELECT *FROM creator limit ".$items_per_page." OFFSET ".$off."";
	$product = mysqli_query($conn,$sql);
	$all_items = mysqli_query($conn,"SELECT *FROM creator");
	$all_items = $all_items -> num_rows;	
 	$all_page = ceil($all_items/$items_per_page);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style4.css">
	<link rel="stylesheet" type="text/css" href="responsive.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<title>Phamminh.let</title>
	<script>
    $(window).scroll(function(){
        if ($(window).scrollTop()) {
            $(".header").addClass("black");
        }
        else{
            $(".header").removeClass("black");
        }
    });
  	</script>
</head>
<body>
<div class="header">
<div class="nav__pc">
<nav>

	<img class="logo" src="logo.jpg">

<div class="menu">
	<ul>	
		<li><a href="#">IT-Lập Trình</a></li>
		<li><a href="#">Sách</a></li>
		<li><a href="#">Sống</a></li>
		<li><a href="#">Tiện ích</a></li>
		<li><a href="#">tổng hợp bài viết</a></li>
	</ul>
	<form method="get" class="something">
			<span id="tim">
			<input type="text" name="s" style="padding-left: 10px;" class="search" placeholder="search">
			</span>
	</form>		
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
	<li class="list__mobile"><a href="#">IT-Lập Trình</a></li>
	<li class="list__mobile"><a href="#">Sách</a></li>
	<li class="list__mobile"><a href="#">Sống</a></li>
	<li class="list__mobile"><a href="#">Tiện ích</a></li>
	<li class="list__mobile"><a href="#">tổng hợp bài viết</a></li>
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
	<?php
		if (isset($_GET['s']) && $_GET['s'] != '') {
			$sql = 'select * from creator where titles like "%'.$_GET['s'].'%"';
		} else {
			$sql = "SELECT *FROM creator limit ".$items_per_page." OFFSET ".$off."";}

			$test = executeResult($sql);
			foreach ($test as $row) {
				$tgian	= $row['date'];
				$nam = substr("$tgian",0,4);
				$thang = substr("$tgian",5,2);
				$ngay = substr("$tgian",8,2);
					$monthNum  = $thang;
					$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
			echo '<li> 
				<button onclick=\'window.open("baiviet.php?id='.$row['id'].'","_self")\' style="border: none;">
			 	<div class="img">
			 		<img src="'.$row['pic'].'" align="left" style="width: 170px; padding-top: 1rem;padding-left: 1rem;padding-right: 1rem; padding-bottom: 1rem;">
			 	</div>
			 		<div class="deep" style="padding-top: 1.5rem;padding-left: 1.5rem;padding-right: 1.5rem; height: 120px;">
			 		<div class="title">
			 			'.$row['titles'].'
			 		</div>
			 		<div class="conten" style="font-size: 13px;">
			 			'.$row['content'].'
			 		</div>
			 		<div class="date" style="font-size: 13px;">
			 			'.$monthName.' '.$ngay.', '.$nam.'
			 		</div>
					</button>	 
				 </li>';
				}
	 		?>
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
<div id="pagenum_fth">	
<div class="pagenum">
    <?php for ($num=1; $num<=$all_page ; $num++) { ?>  
       <a  href="?per_page=<?=$items_per_page?>&page=<?=$num?>"><?=$num?></a>
    <?php } ?>
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
</html>
