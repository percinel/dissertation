<style>
	div {
		font-family:"Calibri-Light", "Calibri Light", "Calibri", sans-serif;
	}
	#header {
		font-size:19px;
		font-weight:bold;
	}
	h3 {
		font-size:16px;
	}
	span.tabular {
		font-size:15px;
		font-weight:bold;
	}
</style>
<div class='main_pdf' align="center" >
		<img src="/img/bilgilogo.jpg" class="img-circle" alt="User Image" style='height:77px;width:355px'/>
		<br/>
		<div>
				<h3>Sosyal Bilimler Enstitusu</h3>
				<h3>Proje Konusu Ve Danisman Onay Formu</h3>
		</div>
</div>
<div style='margin-left:420px'>
	<?=date('d')?>/<?=date('m')?>/<?=date('Y')?>
</div>
<div style='margin-left:30px'>
	<h3>PROJE KONUSU</h3>
	<p><?php echo $process['Process']['project_header_perm'] ?></p>
	<h3 style='text-decoration:underline'>Ogrenci</h3>
	<span class='tabular'>No:</span><?=$authUser['email_code']?><br/>
	<span class='tabular'>Adi Soyadi:</span><?=$authUser['firstname']?> <?=$authUser['lastname']?><br/>
	<span class='tabular'>Imzasi:</span><br/>
	<h3 style='text-decoration:underline'>Danisman</h3>
	<span class='tabular'>Adi Soyadi:</span><?=$advisor['User']['firstname']?> <?=$advisor['User']['lastname']?><br/>
	<span class='tabular'>Imzasi:</span><br/>
	<h3 style='text-decoration:underline'>Proje Direktoru</h3>
	<span class='tabular'>Adi Soyadi:</span><?=$pia['User']['firstname']?> <?=$pia['User']['lastname']?><br/>
	<span class='tabular'>Imzasi:</span><br/>
</div>
