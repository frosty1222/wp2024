<?php
/**
 * Register
 * This file will help in registring of users inside miniOrange.
 *
 * @package    register
 * @author     miniOrange <info@miniorange.com>
 * @license    MIT/Expat
 * @link       https://miniorange.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Display the UI to login/register a user in miniOrange
 *
 * @return void
 */
function mo_api_authentication_register_ui() {
	update_option( 'mo_api_authentication_new_registration', 'true' );
	$current_user = wp_get_current_user();
	?>
	<div class="border border-1 rounded-4 p-3 bg-white">
		<form method="post">
			<input type="hidden" name="option" value="mo_api_authentication_register_customer" />
			<?php wp_nonce_field( 'mo_api_authentication_register_form', 'mo_api_authentication_register_form_fields' ); ?>
			<h5>Account Setup with miniOrange</h5>
			<p class="mo_rest_api_primary_font">You should register so that in case you need help, we can help you with step by step instructions.<b>You will also need a miniOrange account to upgrade to the premium version of the plugins.</b> We do not store any information except the email that you will use to register with us.</p>
			<div class="bg-white mo-caw-shadow p-3 mo-caw-rounded-16">
				<div class="row px-5">
					<div class="col ps-0">
						<div>
							<input type="hidden" name="company" value="<?php echo ! empty( $_SERVER['SERVER_NAME'] ) ? esc_attr( sanitize_text_field( wp_unslash( $_SERVER['SERVER_NAME'] ) ) ) : ''; ?>">
							<input type="hidden" name="fname" value="<?php echo esc_attr( $current_user->user_firstname ); ?>">
							<input type="hidden" name="lname" value="<?php echo esc_attr( $current_user->user_lastname ); ?>"">
							<input type="hidden" name="phone" value="<?php echo esc_attr( get_option( 'mo_api_authentication_admin_phone' ) ); ?>">
							<div class="mb-3 col">
								<div class="row">
									<div class="col-3 text-start">
										<label for="email" class="form-label mo_rest_api_primary_font mb-0 me-3">Email:</label>
									</div>
									<div class="col">
										<input type="email" class="form-control mt-0" id="email" name="email" placeholder="person@example.com" value="<?php echo esc_attr( get_option( 'mo_api_authentication_admin_email' ) ); ?>" aria-required="true" required>
									</div>
								</div>
							</div>
							<div class="mb-3 col">
								<div class="row">
									<div class="col-3 text-start">
										<label for="password" class="form-label mo_rest_api_primary_font mb-0 me-3">Password:</label>
									</div>
									<div class="col">
										<input type="password" class="form-control mt-0" id="password" name="password" placeholder="Enter your password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{12,}$" title="Password should be at least 12 characters long and should contain at least one from A-Z, a-z and 0-9 and a special character." aria-required="true" required>
									</div>
								</div>
							</div>
							<div class="mb-3 col">
								<div class="row">
									<div class="col-3 text-start">
										<label for="confirm_password" class="form-label mo_rest_api_primary_font mb-0 me-3">Confirm Password:</label>
									</div>
									<div class="col">
										<input type="password" class="form-control mt-0" id="confirm_password" name="confirm_password" placeholder="Confirm your password" aria-required="true" required>
									</div>
								</div>
							</div>
						</div>
						<div class="d-grid gap-2 d-md-block text-center">
							<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" name="mo_api_authentication_goto_login" id="mo_api_authentication_goto_login">Already have an account?</button>
							<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="submit">Register</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<form name="f1" method="post" action="" id="mo_api_authentication_goto_login_form">
		<?php wp_nonce_field( 'mo_api_authentication_goto_login', 'mo_api_authentication_goto_login_fields' ); ?>			
		<input type="hidden" name="option" value="mo_api_authentication_goto_login"/>
	</form>
	<script>
		jQuery("#phone").intlTelInput();
		jQuery('#mo_api_authentication_goto_login').click(function () {
			jQuery('#mo_api_authentication_goto_login_form').submit();
		} );
	</script>
	<?php
}

/**
 * Display the UI to show information of registered user in miniOrange
 *
 * @return void
 */
function mo_api_authentication_show_customer_info() {
	?>
	<div class="border border-1 rounded-4 p-3 bg-white" id="mo_api_authentication_advanced_setting_layout">
		<form method="post" name="f1">
			<?php wp_nonce_field( 'mo_api_authentication_change_email_address_form', 'mo_api_authentication_change_email_address_form_fields' ); ?>
			<input type="hidden" value="mo_api_authentication_change_email_address" name="option"/>
			<h5>miniOrange Account Information</h5>
			<div class="bg-white mo-caw-shadow mo-caw-rounded-16">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="mo_rest_api_primary_font" scope="col">Account Email</th>
							<td class="mo_rest_api_primary_font" scope="col"><?php echo esc_html( get_option( 'mo_api_authentication_admin_email' ) ); ?></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th class="mo_rest_api_primary_font" scope="col">Customer ID</th>
							<td class="mo_rest_api_primary_font" scope="col"><?php echo esc_html( get_option( 'mo_api_authentication_admin_customer_key', '' ) ); ?></td>
						</tr>
					</tbody>
				</table>
				<button class="btn btn-sm mo_rest_api_button text-capitalize text-white" type="submit">Change Account</button>
			</div>
		</form>
	</div>
	<?php
}
