
<?php include("ayar.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<form action="" method="POST">
					<h3>Admin Girişi</h3> 
	
					
				<?php 		
			session_start();
	ob_start();
			if($_POST){
			
			$ad = $_POST["ad"];
			$sifre = $_POST["sifre"];
			
	
			$giris = $db-> prepare("select * from yonetici where y_kad=? and y_pass=?");		
	$d = $giris -> execute(array($ad,$sifre));
	$kontrol = $giris -> rowCount();
	$veri = $giris -> fetch(PDO::FETCH_ASSOC);
	
			if ($kontrol) {
				
		header("location:anasayfa.php");
	$_SESSION["kadi"] = $veri["admin_ad"];
		$_SESSION["sifre"] = $veri["admin_sifre"];
	}else {
		echo "yanlış!";
	}	
			
			}	
//akosetr			
			?>
			
				
					
					<label class="form-group">
			
						<input type="text" name="ad" class="form-control"  required>
						<span>Kullanıcı Adı</span>
						<span class="border"></span>
					</label>
					<label class="form-group">
						<input type="password" name="sifre" class="form-control"  required>
						<span for="">Şifre</span>
						<span class="border"></span>
					</label>
					
					<button>Giriş Yap
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>		
			</div>
		</div>		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>