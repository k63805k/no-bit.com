<?php
    
    if(isset($_COOKIE['email']))
    {
        $email = $_COOKIE['email'];
    }  else {
        $email = '';
}
?>
<form role="form" class="authform" action="" method="post">
    <p class="err"> <?=$this->error;?></p>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" value='<?=$email;?>'>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pass">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
    <button type="submit" class="btn btn-default login_btn" name="login">Submit</button>
</form>