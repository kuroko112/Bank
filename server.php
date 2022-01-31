
<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors  = array();
 

// connect to the database
$db = mysqli_connect('localhost', 'root', '789456123258', 'a4g');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username   = mysqli_real_escape_string($db, $_POST['username']);
  $email      = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $address    = mysqli_real_escape_string($db, $_POST['address']);
  $fullname    = mysqli_real_escape_string($db, $_POST['fullname']);
  //  Potential errors when fields are empty
  // by adding (array_push()) corresponding error into $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($fullname)) { array_push($errors, "Fullname is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  } 

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    // Query That Was Insert into YOUR Table 
  	$query = "INSERT INTO users (username, email, password, Address, fullname) 
  			  VALUES('$username', '$email', '$password', '$address', '$fullname')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    // edit New an acount 
    $query_user  = "SELECT * FROM users WHERE username = '$username'";
    $reuslt_user = mysqli_query($db, $query_user);
    $row_user = mysqli_fetch_assoc($reuslt_user);
    $id  = $row_user['UserID'];
    
    $query_acn = "INSERT INTO anc (id_useracn) VALUES ('$id')";
    // echo $query_acn;
    mysqli_query($db, $query_acn);
  	
  }
}





// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM userbank WHERE user_bank='$username' AND bank_password='$password'";
        $results = mysqli_query($db, $query);
        // To Cheek IF The username Has Taken
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }



?>


