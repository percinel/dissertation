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
		</div>
	<h3 id="header"><?php echo strtoupper($process['Process']['project_header_perm']) ?></h3>
	<span class='tabular'><?=$authUser['firstname']?> <?=$authUser['lastname']?></span><br/>
	<span class='tabular'><?=$authUser['email_code']?></span><br/>
</div>
