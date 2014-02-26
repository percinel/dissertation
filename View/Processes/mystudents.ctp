<table>
<tr>
  <th>Ogrenci Ismi</th>
  <th>Durum</th>
  <th>Islem</th>
</tr>
<tr>
<?php foreach($processes as $p): ?>
  <td><?=$p['User']['username']?></td>
  <td><?=$this->Diss->getZoneTrans($p['Process']['zone'])?></td>
  <td>
		<?php 
			if(in_array($p['Process']['step'],Configure::read('instructor_resp'))) {
				echo $this->Html->link('Ilgilenmeniz Gerekiyor',array('controller'=>'processes','action'=>'imanage',$p['Process']['id']),array('style'=>'color:red'));
			}else {
				echo '<span style="color:green">Surec Ogrenciyi Bekliyor</span>';
			}
		?>
	</td>
<?php endforeach;?>
</tr>
</table>
	
