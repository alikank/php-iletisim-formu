
<?php session_start();
ob_start();
include("ayar.php"); ?>
<!DOCTYPE html>
<?php
if ($_SESSION) {
	?>
	<?php include("assets/header.php"); ?>

<div id="page-wrapper">
            <div id="page-inner">

<?php 
if(isset($_GET["pid"]))
{
	$sorgu=$db->prepare("delete from iletisim WHERE i_id=?");
	$sonuc=$sorgu->execute([$_GET["pid"]]);
	if($sonuc){
header("Refresh:3; url=anasayfa.php");
		echo " Mesaj Silindi tekrar yönlendiriliyorsunuz. ";
	}
	else
		echo("Kayıt silinemedi.");
}


if(isset($_GET["kid"]))
{
	$sorgu=$db->prepare("update iletisim set i_okundu=1 WHERE i_id=?");
	$sonuc=$sorgu->execute([$_GET["kid"]]);
	if($sonuc){
header("Refresh:3; url=anasayfa.php");
		echo " Okundu Olarak İşaretlendi tekrar yönlendiriliyorsunuz. ";
	}
	else
		echo("Hata.");
}
?>



<h1 align="center">Okunmayan Mesajlar Listesi</h1>

 
 <div class="block">
 <div class="widget-content">

	
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="text-align:center;">#ID</th>
                    <th>İsim</th>
					 <th>Email</th>
                    <th>Gelen Mesaj</th>
			        <th>İşlem</th>
		
                  </tr>
                </thead>
                <tbody>
	<?php foreach($db->query("select * from iletisim where i_okundu=0 order by i_id desc") as $yazdir){ ?>
                  <tr>
                    <td width="50" style="text-align:center;"><?php echo $yazdir['i_id']; ?></td>
                    <td><?php echo $yazdir['i_ad']; ?></td>
                    <td><?php echo $yazdir['i_mail']; ?></td>	
                    <td><?php echo $yazdir['i_mesaj']; ?></td>				
					<td width="100" class="td-actions">
					<a href="anasayfa.php?pid=<?php echo $yazdir['i_id']; ?>" class="btn btn-danger btn-small"><i class="fas fa-trash-alt"></i></a>
					<a href="anasayfa.php?kid=<?php echo $yazdir['i_id']; ?>" class="btn btn-info btn-small"><i class="fas fa-check"></i></a></td>

                  </tr>
<?php } ?>
                </tbody>
              </table>

            </div>
</div>

<br />
<?php include("assets/footer.php"); ?> 
<?php
}else {
	header("location:index.php");
       exit();
}
?>
