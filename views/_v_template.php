<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	

	<!-- Global JS/CSS -->
	<link href="../css/styles.css" rel="stylesheet" type="text/css" media="all">				

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>  



  <br>
  <?php if($user): ?><div id="logged_in"><?php else: ?><div id="logged_out"><?php endif; ?>
    <div id="outer">
      <div id="page">
        <div id='menu'>
      
            <a href='/'>Home</a>
      
            <!-- Menu for users who are logged in -->
            <?php if($user): ?>
      
                <a href='/users/logout'>Logout</a>
                <a href='/users/profile'>Profile</a>
      
            <!-- Menu options for users who are not logged in -->
            <?php else: ?>
      
                <a href='/users/signup'>Sign up</a>
                <a href='/users/login'>Log in</a>
      
            <?php endif; ?>
      
        </div>
  
        <?php if(isset($content)) echo $content; ?>
      
        <?php if(isset($client_files_body)) echo $client_files_body; ?>
     </div>
   </div>
  </div>
</body>
</html>