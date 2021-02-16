<?php include("admin/ayar.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>İletişim Formu</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<form action="" method="POST">
					<h3>Contact Us</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
					
							
				<?php 
			
			if($_POST){
			
			$ad = $_POST["ad"];
			$mail = $_POST["mail"];
			$mesaj = $_POST["mesaj"];
			
			if(!$ad || !$mail || !$mesaj){			
			echo "Boş alan bırakmamalısınız.";
			}			
			else{			
			$kaydet = $db-> prepare("insert into iletisim set
		i_ad = ?,
                i_mail = ?,
                i_mesaj = ? 
			");
			$sonuc = $kaydet -> execute(array($ad,$mail,$mesaj));
			if($sonuc)
			{
				echo "Başarıyla Gönderilmiştir";
			}
			else{
				echo "Daha sonra tekrar deneyin, mesajınız gönderilmedi.";
			}		
			}
			}	
//akosetr			
			?>
			
				
					
					<label class="form-group">
			
						<input type="text" name="ad" class="form-control"  required>
						<span>İsim</span>
						<span class="border"></span>
					</label>
					<label class="form-group">
						<input type="text" name="mail" class="form-control"  required>
						<span for="">Mail Adresi</span>
						<span class="border"></span>
					</label>
					<label class="form-group" >
						<textarea name="mesaj" id="" class="form-control" required></textarea>
						<span for="">Mesajınız</span>
						<span class="border"></span>
					</label>
					<button>Gönder
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>		
			</div>
		</div>		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>