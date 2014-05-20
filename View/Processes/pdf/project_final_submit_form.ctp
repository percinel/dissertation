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
				<h3>Bitirme Projesi Teslim Formu</h3>
		</div>
</div>
<div style='margin-left:30px'>
	<span class='tabular'>Tarih &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>&nbsp;&nbsp;<?=date('d')?>/<?=date('m')?>/<?=date('Y')?><br/>
	<span class='tabular'>Proje Basligi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>&nbsp;&nbsp;<?=$process['Process']['project_header_perm']?><br/>
	<span class='tabular'>Program &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>&nbsp;&nbsp;<?=""?><br/>
	<span class='tabular'>Ogrenci Numarasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>&nbsp;&nbsp;<?=$authUser['email_code']?><br/>
	<span class='tabular'>Ogrenci Adi ve Soyadi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span><?=$authUser['firstname']?> <?=$authUser['lastname']?><br/>
	<span class='tabular'>Ogrenci Imzasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>&nbsp;&nbsp;<br/>
</div>
