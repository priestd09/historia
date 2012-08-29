<div class="container">

	<h1><i class="icon-dashboard"></i> Dashboard</h1>
	<hr /><br />

	<?php if(!empty($message)): ?>      
	  <div class="alert alert-error">
	    <a class="close" data-dismiss="alert" href="#">×</a>
	    <?php echo $message; ?>
	  </div>
	 <?php endif; ?>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>URL</th>
				<th>Status</th>
				<th>Archives</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($jobs as $job): ?>
			<tr>
				<td><?php echo $job->name; ?></td>
				<td><a href="<?php echo $job->url; ?>"><?php echo $job->url; ?></a></td>
				<td><?php echo ($job->active ? 'Active' : 'Disabled'); ?></td>
				<td><?php echo$this->job_model->get_archives_cnt($job->id); ?></td>
				<td><i class="icon-download-alt"></i> <a href="<?php echo site_url('client/archives/'.$job->id); ?>">View Archives</a></td>
		<?php endforeach; ?>
		</tbody>
	</table>

</div>