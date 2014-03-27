<table>
<tr>
  <th>Mesaj</th>
</tr>
<tr>
<?php foreach($notifications as $n): ?>
<tr>
  <td>
		<?php if($n['Notification']['read']==0): ?>
			<?=$n['Notification']['message']."&nbsp;&nbsp;<span style='color:red'>yeni</span>"?>
		<?php else: ?>
			<?=$n['Notification']['message']?>
		<?php endif; ?>
	</td>
</tr>
<?php endforeach;?>
</table>
	
