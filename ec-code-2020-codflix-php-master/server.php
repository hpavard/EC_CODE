<?php
session_start();

// Initializing variables
$email    = "";
$errors = array(); 

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // Receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Adress email requise"); }
  if (empty($password_1)) { array_push($errors, "Mot de passe requis"); }
  if ($password_1 != $password_2) { array_push($errors, "Les deux mots de passe ne sont pas identiques"); }

  // first check the database to make sure 
  // a user does not already exist with the same email
  $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  // If user exists
  if ($user) { if ($user['email'] === $email) { array_push($errors, "Adresse email déjà utilisée"); }}

  // Finally, register user if there are no errors in the form.
  // Encrypt the password before saving in the database.
  if (count($errors) == 0) { $password = md5($password_1);

  	$query = "INSERT INTO user (email, password) 
  			  VALUES('$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "Vous êtes connecté(e)";
  	header('location: index.php');
  }
}