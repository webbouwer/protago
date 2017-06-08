<?php // Custom Login/Register/Password Code @ https://digwp.com/2010/12/login-register-password-code/
function protago_display_userpanel(){
?>
<div id="userpanel">
<?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { ?>
<ul class="tabmenu">
<li>Login</li>
<?php // register
if ( get_option( 'users_can_register' ) ){
?>
<li>Register</li>
<?php } ?>
</ul>
<ul class="tabcontainer">
<li class="tab1 tab">
<?php
global $user_login;
global $user_email;
global $register;
global $reset;

if (isset(  $_GET['register'] )) { $register = $_GET['register']; }
if (isset(  $_GET['reset'] )) { $ $reset = $_GET['reset'];}
if ($register == true) { ?>
			<h3>Success!</h3>
			<p>Check your email for the password and then return to log in.</p>
			<?php } elseif ($reset == true) { ?>
			<h3>Success!</h3>
			<p>Check your email to reset your password.</p>
			<?php } else { ?>
			<h3>Login</h3>
			<p>Log in</p>
			<?php } ?>
			<?php //
			wp_login_form();
			?>
            <div class="resetlogin">Forgot password?</div>
			<?php
			do_action('login_form', 'login');
			?>
</li>
<?php // register
if ( get_option( 'users_can_register' ) ){
?>
<li class="tab2 tab">
			<h3>Register</h3>
			<p>Sign up with email or social account</p>
			<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
			<div class="username">
			<label for="user_login"><?php _e('Username', 'fndtn' ); ?>: </label>
			<input type="text" name="user_login" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="101" />
			</div>
			<div class="password">
			<label for="user_email"><?php _e('Your Email', 'fndtn' ); ?>: </label>
			<input type="text" name="user_email" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" id="user_email" tabindex="102" />
			</div>
			<div class="login_fields">
			<input type="submit" name="user-submit" value="<?php _e('Sign up!', 'fndtn' ); ?>" class="user-submit" tabindex="103" />
			<?php do_action('register_form'); ?>
			<?php if (isset(  $_GET['register'] )) { $register = $_GET['register']; } if($register == true) { echo '<p>Check your email for the password!</p>'; } ?>
			<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
			<input type="hidden" name="user-cookie" value="1" />
			</div>
			</form>
</li>
<?php } ?>
<li class="tab3 tab">
			<h3>Reset</h3>
			<p>Reset your password. You'll receive an email with link to the reset form.</p>
			<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
			<div class="username">
			<label for="user_login" class="hide"><?php _e('Username or Email', 'fndtn' ); ?>: </label>
			<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
			</div>
			<div class="login_fields">
			<input type="submit" name="user-submit" value="<?php _e('Reset my password', 'fndtn' ); ?>" class="user-submit" tabindex="1002" />
			<?php do_action('login_form', 'resetpass'); ?>
			<?php if (isset(  $_GET['reset'] )) { $reset = $_GET['reset']; } if($reset == true) { echo '<p>Check your mailbox for a link to the password reset form.</p>'; } ?>
			<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
			<input type="hidden" name="user-cookie" value="1" />
			</div>
			</form>
</li>
</ul>
<?php } else { // is logged in ?>
<div class="infocontainer">
			<h3>Welcome, <?php echo $user_identity; ?></h3>
			<div class="usericon">
			<?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 60); ?>
			</div>
			<div class="userinfo">
			<p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
			<p>
			<?php echo '<a class="logout-link" href="'.wp_logout_url( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] ).'" title="Logout">Logout</a>';
			/* if (current_user_can('manage_options')) {
			echo '<a href="' . admin_url() . '">' . __('Admin', 'fndtn' ) . '</a>'; } else {
			echo '<a href="' . admin_url() . 'profile.php">' . __('Profile', 'fndtn' ) . '</a>'; }
			*/ ?>
			</p>
			</div>
</div>
<?php } ?>
</div>

<?php

} // end userpanel



?>
