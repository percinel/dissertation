<?php 

	foreach($zone_translations as $key => $translation):
		if($process['Process']['zone'] == $key):
			echo '<span class="zone_name current_zone_name">'.$translation.'</span>&nbsp;&nbsp;'; 
		else:
			echo '<span class="zone_name">'.$translation.'</span>&nbsp;&nbsp;'; 
		endif;
	endforeach;
?>
<br/>

<?php
	pr($zone_translations);
	pr($process);
	pr($zones);
	pr($steps);
