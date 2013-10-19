<!-- Login Form -->
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

<!-- Switch to Sign up Form -->
<div id="switch-link">
  <p>
  	<a href="/users/signup">I want to join ...<br />
  	sign me up!</a>
  </p>
</div>