<form method='POST' name='signup_form' action='/users/p_profile'> 
  <fieldset>
  	<legend>Edit Profile</legend>
    <p>
      <label for="first_name" id="first_name_label">First Name</label><br />
      <input type="text" name="first_name" id="first_name" size="38" value="" class="text-input" />
    </p>
    <p>
      <label for="last_name" id="last_name_label">Last Name</label><br />
      <input type="text" name="last_name" id="last_name" size="38" value="" class="text-input" />
    </p>
    <p>
      <label for="email" id="email_label">Email</label><br />
      <input type="text" name="email" id="email" size="38" value="" class="text-input" />
    </p>
    <p>
      <label for="username" id="username_label">Username</label><br />
      <input type="text" name="username" id="username" size="38" value="" class="text-input" />
    </p>
    <p>
      <label for="password" id="password_label">Password</label><br />
      <input type="password" name="password" id="password" size="38" value="" class="text-input" />
    </p>
    <p>
      <label for="male" id="male_label">Male</label><input type="radio" name="gender" id="male" value="male"><br />
      <label for="female" id="female_label">Female</label><input type="radio" name="gender" id="female" value="female">
    </p>
    <p>Insert Photo Upload</p>
    <p class="center"><input type="submit" class="button" id="submit_btn" value="Sign Up" /></p>
  </fieldset>  
</form>