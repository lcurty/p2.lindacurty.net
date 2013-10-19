<form method='POST' name='login_form' action='/users/p_login'> 
  <fieldset>
  	<legend>Login</legend>
    <p>
      <label for="username" id="email_label">Email</label><br />
      <input type="text" name="email" id="email" size="38" value="" class="text-input" />
    </p>
    <p>
      <label for="password" id="password_label">Password</label><br />
      <input type="password" name="password" id="password" size="38" value="" class="text-input" />
    </p>
    <p class="center"><input type="submit" class="button" id="submit_btn" value="Login" /></p>
  </fieldset>  
</form>