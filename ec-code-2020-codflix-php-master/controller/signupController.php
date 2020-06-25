<?php

require_once( 'model/user.php' );

/****************************
* ----- LOAD SIGNUP PAGE -----
****************************/

function signupPage() {

  $user     = new stdClass();
  $user->id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( !$user->id ):
    require('view/auth/signupView.php');
  else:
    require('view/homeView.php');
  endif;

}

/***************************
* ----- SIGNUP FUNCTION -----
***************************/

function signup( $post ) {

  $data           = new stdClass();
  $data->email    = $post['email'];
  $data->password = $post['password'];

  $user           = new User( $data );
  $userData       = $user->getUserByEmail();

  $error_msg      = "Informations requises";

  if( $userData && sizeof( $userData ) != 0 ):
    if( $user->getPassword() == $userData['password'] ):

      // Set session
      $_SESSION['user_id'] = $userData['id'];

      header( 'location: index.php ');
    endif;
  endif;

  require('view/auth/loginView.php');
}