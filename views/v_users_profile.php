<?php foreach($profile as $profile): ?>
  <form method='POST' name='signup_form' action='/users/p_profile'> 
    <fieldset>
      <legend>Edit Profile</legend>
      <p>
        <label for="first_name" id="first_name_label">First Name</label><br />
        <input type="text" name="first_name" id="first_name" size="38" value="<?=$profile['first_name']?>" class="text-input" /><br />
      </p>
      <p>
        <label for="last_name" id="last_name_label">Last Name</label><br />
        <input type="text" name="last_name" id="last_name" size="38" value="<?=$profile['last_name']?>" class="text-input" />
      </p>
      <p>
        <label for="email" id="email_label">Email</label><br />
        <input type="text" name="email" id="email" size="38" value="<?=$profile['email']?>" class="text-input" />
      </p>
      <p>
        <label for="password" id="password_label">Update Password</label><br />
        <input type="password" name="password" id="password" size="38" value="" class="text-input" />
      </p>
      <p>Insert Photo Upload</p>
      <p class="center"><input type="submit" class="button" id="submit_btn" value="Sign Up" /></p>
    </fieldset>  
  </form>
<?php endforeach ?>