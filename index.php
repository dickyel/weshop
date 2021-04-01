<?php

	session_start();

	include_once("function/koneksi.php");
	include_once("function/helper.php");

	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
	
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
	$totalBarang = count($keranjang);

?>

<!DOCTYPE html>
<html>

	<head>
		<title>weshop | barang-barang elektronik</title>
		
		<link href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css" rel="stylesheet" />
		<link href="<?php echo BASE_URL."css/banner.css"; ?>" type="text/css" rel="stylesheet" />
		
		<script src="<?php echo BASE_URL."js/jquery-3.1.1.min.js"; ?>"></script>
		<script src="<?php echo BASE_URL."js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>
		
		<script>
		$(function() {
			$('#slides').slidesjs({
				height: 350,
				play: { auto : true,
					    interval : 3000
					  },
				navigation : false
			});
		});
		</script>		
		
	</head>

	<body>
	
		<div id="container">
			<div id="header">
				<a href="<?php echo BASE_URL."index.php"; ?>">
					<img src="<?php echo BASE_URL."images/logo.png"; ?>" />
				</a>
				
				<div id="menu">
					<div id="user">
						<?php
							if($user_id){
								echo "Hi <b>$nama</b>,
									  <a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
									  <a href='".BASE_URL."logout.php'>Logout</a>";
							}else{
								echo "<a href='".BASE_URL."index.php?page=login'>Login</a>
									 <a href='".BASE_URL."index.php?page=register'>Register</a>";
							}
						?>
					</div>
					
					<a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="button-keranjang">
						<img src="<?php echo BASE_URL."images/cart.png"; ?>" /> 
						<?php
							if($totalBarang != 0){
								echo "<span class='total-barang'>$totalBarang</span>";
							}
						?>
					</a>
				</div>
			</div>	

			<div id="content">
				
				<?php
					$filename = "$page.php";
					
					if(file_exists($filename)){
						include_once($filename);
					}else{
						include_once("main.php");
					}
				?>
			
			</div>
			
			<div id="footer">
				<p>copyright weshop 2016</p>
			</div>
			
		</div>
	
	</body>
	
</html>