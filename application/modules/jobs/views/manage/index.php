<div class="container">

	<h1><i class="icon-tasks"></i> Jobs</h1>
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
				<th>User</th>
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
				<td>
					<?php 
					$user = $this->ion_auth->user($job->user_id)->row(); 
					echo $user->first_name . " " . $user->last_name;
					?>
				</td>
				<td><?php echo ($job->active ? "Active" : "Disabled"); ?></td>
				<td><?php echo$this->job_model->get_archives_cnt($job->id); ?></td>
				<td><i class="icon-eye-open"></i> <a href="<?php echo site_url('jobs/jobs_manage/job/'.$job->id); ?>">Show</a> | <i class="icon-edit"></i> <a href="<?php echo site_url('jobs/jobs_manage/edit_job/'.$job->id); ?>">Edit</a> | <i class="icon-remove"></i> <a href="">Remove</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	
	<br /><br />
	<p>
		<i class="icon-plus-sign"></i> <a href="<?php echo site_url('jobs/jobs_manage/create_job'); ?>">Create a new Job</a> |
		<i class="icon-download"></i> <a href="<?php echo site_url('jobs/jobs_cron/index/'.$key); ?>">Run Jobs</a>
	</p> 

</div>