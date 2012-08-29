<div class="container">
  <?php if(!empty($message)): ?>      
  <div class="alert alert-error">
    <a class="close" data-dismiss="alert" href="#">×</a>
    <?php echo $message; ?>
  </div>
  <?php endif; ?>
  <form action="<?php echo site_url('manage/login'); ?>" method="post" class="form-horizontal">
    <fieldset>
      <legend>Historia Login</legend>
      <div class="control-group">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
          <input type="text" class="input-xlarge" id="identity" name="identity" value="<?php echo set_value('identity'); ?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="email">Password</label>
        <div class="controls">
          <input type="password" class="input-xlarge" id="password" name="password">
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Sign In</button>
      </div>
    </fieldset>
  </form>
</div>