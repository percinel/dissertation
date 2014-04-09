<h1><?php echo $static_page['StaticPage']['title']; ?></h1>
<?php 
if($authUser['role'] == 'pia'): 
	echo $this->Html->link(__('Edit Page'),array('controller'=>'static_pages','action'=>'edit',$static_page['StaticPage']['key']));
endif; 
?>
<div>
	<?php echo $static_page['StaticPage']['content']; ?>
</div>
