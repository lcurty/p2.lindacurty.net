<?php
	class users_controller extends base_controller {

	public function __construct() {
			parent::__construct();
	} 

	public function index() {
		# Setup view
		$this->template->content = View::instance('v_index_index');
		$this->template->title   = "Chipper Chirper";

		# Render template
		echo $this->template;
	}

	public function signup() {
		# Setup view
		$this->template->content = View::instance('v_users_signup');
		$this->template->title   = "Sign Up";

		# Render template
		echo $this->template;
	}
	
	public function p_signup() {
		# More data we want stored with the user
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();       
		
		# Encrypt and salt the password  
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
			
		# Setup Image Restrictions
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["profile_image"]["name"]);
		$extension = end($temp);
		
		# Rename File
		$ext = pathinfo(($_FILES['profile_image']['name']), PATHINFO_EXTENSION); 
		$ran = rand ();
		$ran2 = pathinfo(($_FILES['profile_image']['name']), PATHINFO_FILENAME) . $ran.".";
		$target = "images/profile/";
		$target = $target . $ran2.$ext;
		
		# Check Image Restrictions
		if ((($_FILES["profile_image"]["type"] == "image/gif")
		|| ($_FILES["profile_image"]["type"] == "image/jpeg")
		|| ($_FILES["profile_image"]["type"] == "image/jpg")
		|| ($_FILES["profile_image"]["type"] == "image/pjpeg")
		|| ($_FILES["profile_image"]["type"] == "image/x-png")
		|| ($_FILES["profile_image"]["type"] == "image/png"))
		&& ($_FILES["profile_image"]["size"] < 1000000)
		&& in_array($extension, $allowedExts))
			{
				if (file_exists($target))
					{
					echo $target . " already exists. ";
					}
				else
					{
					# Move file to folder and write data to db
					move_uploaded_file($_FILES["profile_image"]["tmp_name"],
					$target);
					$_POST['profile_image'] = $ran2.$ext;
					$user_id = DB::instance(DB_NAME)->insert('users', $_POST);
					Router::redirect("/users/login");
					}
				}
		else
			{
			echo "Invalid file";
			}
	}

	public function login($error = NULL) {
		# Setup view
			$this->template->content = View::instance('v_users_login');
			$this->template->title   = "Login";
			
		# Pass data to the view
		$this->template->content->error = $error;

		# Render template
			echo $this->template;
	}
	
	public function p_login() {
		
		# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
			$_POST = DB::instance(DB_NAME)->sanitize($_POST);
	
		# Hash submitted password so we can compare it against one in the db
			$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	
		# Search the db for this email and password
		# Retrieve the token if it's available
			$q = "SELECT token 
				FROM users 
				WHERE email = '".$_POST['email']."' 
				AND password = '".$_POST['password']."'";
	
			$token = DB::instance(DB_NAME)->select_field($q);
	
		# Login failed
    if(!$token) {
        Router::redirect("/users/login/error");
    }
    # Login passed
    else {
        setcookie("token", $token, strtotime('+2 weeks'), '/');
				Router::redirect("/");
	
			}
	}
	
	public function logout() {
		# Generate and save a new token for next login
    	$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

    # Create the data array we'll use with the update method
    # In this case, we're only updating one field, so our array only has one entry
    	$data = Array("token" => $new_token);

    # Do the update
    	DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

    # Delete their token cookie by setting it to a date in the past - effectively logging them out
    	setcookie("token", "", strtotime('-1 year'), '/');

    # Send them back to the main index.
    	Router::redirect("/");

	}

	public function profile() {

		# If user is blank, they're not logged in; redirect them to the login page
			if(!$this->user) {
				Router::redirect('/users/login');
			}

		# If they weren't redirected away, continue:

		# Setup view
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile of ".$this->user->first_name;
			
		# Query user
		$q = 'SELECT 
						users.first_name,
						users.last_name,
						users.email,
						users.profile_image
				FROM users
				WHERE users.user_id = '.$this->user->user_id;

		# Run posts query, store the results in the variable $profile
		$profile = DB::instance(DB_NAME)->select_rows($q);

		# Pass data to the View
		$this->template->content->profile = $profile;

		# Render template
		echo $this->template;
	}

} # end of the class