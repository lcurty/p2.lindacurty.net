<form method='POST' name='signup_form' action='/users/p_signup'> 
  <fieldset>
  	<legend>Sign Up</legend>
    <p>
      <label for="first_name" id="first_name_label">First Name</label><br />
      <input type="text" name="first_name" id="first_name" size="38" value=""/>
    </p>
    <p>
      <label for="last_name" id="last_name_label">Last Name</label><br />
      <input type="text" name="last_name" id="last_name" size="38" value="" />
    </p>
    <p>
      <label for="email" id="email_label">Email*</label><br />
      <input type="text" name="email" id="email" size="38" required="required" value="" />
    </p>
    <p>
      <label for="username" id="username_label">Username*</label><br />
      <input type="text" name="username" id="username" size="38" required="required" value="" />
    </p>
    <p>
      <label for="password" id="password_label">Password*</label><br />
      <input type="password" name="password" id="password" size="38" required="required" value="" />
    </p>
    <p>
      <label for="profile_image" id="image_label">Upload Photo</label><br />
      <input type="file" name="profile_image" id="profile_image" size="38" value="" />
    </p>
    <p class="center"><input type="submit" class="button" id="submit_btn" value="Sign Up" /></p>
    <p class="note">* Required
  </fieldset>  
</form>

<!-- Switch to Sign up Form -->
<div id="switch-link">
  <p><a href="/users/login">I have an account ... log me in!</a></p>
</div>