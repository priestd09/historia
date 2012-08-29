<div class="container">

	<h1><i class="icon-dashboard"></i> Archives</h1>
	<hr /><br />

	<?php if(!empty($message)): ?>      
	  <div class="alert alert-error">
	    <a class="close" data-dismiss="alert" href="#">×</a>
	    <?php echo $message; ?>
	  </div>
	 <?php endif; ?>
	 
	 <h2><a href="<?php echo $job['url']; ?>" target="_blank"><?php echo $job['name']; ?></a></h2>
	 <br />
	<?php foreach($archives as $archive): ?>
	<p>
		<?php echo $archive->date; ?> - <a href="<?php echo $archive->url; ?>" target="_blank"><?php echo $archive->url; ?></a>
	</p>
	<?php endforeach; ?>
</div>
