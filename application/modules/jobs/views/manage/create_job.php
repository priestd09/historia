<div class="container">

      <h1><i class="icon-user"></i> Create Job</h1>
      <hr /><br />
      
      <?php if(!empty($message)): ?>      
        <div class="alert alert-error">
          <a class="close" data-dismiss="alert" href="#">×</a>
          <?php echo $message; ?>
        </div>
       <?php endif; ?>
	
      <form action="<?php echo site_url('jobs/jobs_manage/create_job'); ?>" method="post" class="form-horizontal">
            <fieldset>
            <legend>Job Information</legend>
            <div class="control-group">
              <label class="control-label" for="name">Wesbite Name</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="name" name="name" value="<?php echo set_value('name'); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Wesbite Slug</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="slug" name="slug" value="<?php echo set_value('slug'); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Website URL</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="url" name="url" value="<?php echo set_value('url'); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">User</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="user_id" name="user_id" value="<?php echo set_value('user_id'); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="active">Status</label>
              <div class="controls">
                <label class="checkbox">
                  <input type="checkbox" id="active" name="active">
                  Active
                </label>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Create Job</button>
            </div>
          </fieldset>
      </form>

</div>
