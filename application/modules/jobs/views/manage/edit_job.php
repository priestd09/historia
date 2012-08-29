<div class="container">

      <h1><i class="icon-user"></i> Update Job</h1>
      <hr /><br />
      
      <?php if(!empty($message)): ?>      
        <div class="alert alert-error">
          <a class="close" data-dismiss="alert" href="#">×</a>
          <?php echo $message; ?>
        </div>
       <?php endif; ?>
	
      <form action="<?php echo site_url('jobs/jobs_manage/edit_job/'.$job['id']); ?>" method="post" class="form-horizontal">
            <fieldset>
            <legend>Job Information</legend>
            <div class="control-group">
              <label class="control-label" for="name">Website Name</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="name" name="name" value="<?php echo $job['name']; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Website Slug</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="slug" name="slug" value="<?php echo $job['slug']; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Website URL</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="url" name="url" value="<?php echo $job['url']; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">User</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="user_id" name="user_id" value="<?php echo $job['user_id']; ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="active">Status</label>
              <div class="controls">
                <label class="checkbox">
                  <input type="checkbox" <?php echo ($job['active'] == 1 ? 'checked="checked"' : ''); ?> id="active" name="active" value="1">
                  Active
                </label>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Update Job</button>
            </div>
          </fieldset>
      </form>

</div>
