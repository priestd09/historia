<div class="container">

	<h1><i class="icon-group"></i> Users</h1>
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
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Company</th>
				<th>Groups</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo $user->first_name; ?></td>
				<td><?php echo $user->last_name; ?></td>
				<td><a href="mailto:<?php echo $user->email; ?>"><?php echo $user->email; ?></a></td>
				<td><?php echo $user->company; ?></td>
				<td>
					<?php foreach ($user->groups as $group): ?>
						<?php echo $group->name; ?>
	                <?php endforeach; ?>
				</td>
				<td><i class="icon-eye-open"></i> <a href="<?php echo site_url('users/users_manage/show'); ?>">Show</a> | <i class="icon-edit"></i> <a href="<?php echo site_url('users/users_manage/edit_user'); ?>">Edit</a> | <i class="icon-remove"></i> <a href="">Remove</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	
	<br /><br />
	<p><i class="icon-plus-sign"></i> <a href="<?php echo site_url('users/users_manage/create_user'); ?>">Create a new User</a></p>
	
</div>
