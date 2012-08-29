<div class="container">

      <h1><i class="icon-user"></i> Create User</h1>
      <hr /><br />
      
      <?php if(!empty($message)): ?>      
        <div class="alert alert-error">
          <a class="close" data-dismiss="alert" href="#">×</a>
          <?php echo $message; ?>
        </div>
       <?php endif; ?>
	
      <form action="<?php echo site_url('manage/users/create_user'); ?>" method="post" class="form-horizontal">
            <fieldset>
            <legend>User Information</legend>
            <div class="control-group">
              <label class="control-label" for="email">First Name</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Last Name</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Company Name</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="company" name="company" value="<?php echo set_value('company'); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Email</label>
              <div class="controls">
                <input type="text" class="input-xlarge" id="email" name="email" value="<?php echo set_value('email'); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Password</label>
              <div class="controls">
                <input type="password" class="input-xlarge" id="password" name="password" value="<?php echo set_value('password'); ?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">Confirm Password</label>
              <div class="controls">
                <input type="password" class="input-xlarge" id="password_confirm" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>">
              </div>
            </div>
            <?php foreach($groups as $group): ?>
            <div class="control-group">
              <label class="control-label" for="optionsCheckbox">Group</label>
              <div class="controls">
                <label class="checkbox">
                  <input type="checkbox" id="optionsCheckbox" value="<?php echo $group->id; ?>">
                  <?php echo $group->name; ?>
                </label>
              </div>
            </div>
            <?php endforeach; ?>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Create User</button>
            </div>
          </fieldset>
      </form>

</div>
