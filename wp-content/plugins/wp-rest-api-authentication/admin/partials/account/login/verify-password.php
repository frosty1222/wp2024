<?php
/**
 * Verify-Password
 * This file will help in provide a UI to help users login using their miniOrange account.
 *
 * @package    verify-password-ui
 * @author     miniOrange <info@miniorange.com>
 * @license    MIT/Expat
 * @link       https://miniorange.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * When a user attempts to register with an already registered email address, display the UI for logging in with miniOrange.
 *
 * @return void
 */
function mo_api_authentication_verify_password_ui() {
	?>
	<div class="border border-1 rounded-4 p-3 bg-white">
		<form method="post">
			<input type="hidden" name="option" value="mo_api_authentication_verify_customer" />
			<?php wp_nonce_field( 'mo_api_authentication_verify_customer_form', 'mo_api_authentication_verify_customer_form_fields' ); ?>
			<h5>Login with miniOrange</h5>
			<p class="mo_rest_api_primary_font">Enter your miniOrange login credentials to log into the plugin.</p>
			<div class="bg-white mo-caw-shadow p-3 mo-caw-rounded-16">
					<div class="row px-5">
						<div class="col ps-0">
							<div>
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
											<input type="password" class="form-control mt-0" id="password" name="password" placeholder="Enter your password" aria-required="true" required>
										</div>
									</div>
								</div>
							</div>
							<div class="text-end mb-3">
								<a class="mo_rest_api_primary_font" href="#mo_api_authentication_forgot_password_link">Click here if you forgot your password?</a>
							</div>
							<div class="d-grid gap-2 d-md-block text-center">
								<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" name="mo_api_authentication_back_button" id="mo_api_authentication_back_button" onclick="document.getElementById('mo_api_authentication_change_email_form').submit();">Back</button>
								<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="submit" value="Login">Login</button>
							</div>
						</div>
					</div>
				</div>
		</form>
	</div>
	<form id="mo_api_authentication_change_email_form" method="post" action="">
		<?php wp_nonce_field( 'mo_api_authentication_change_email_address_form', 'mo_api_authentication_change_email_address_form_fields' ); ?>
		<input type="hidden" name="option" value="mo_api_authentication_change_email_address" />
	</form>
	<script>
		jQuery("a[href=\"#mo_api_authentication_forgot_password_link\"]").click(function(){
			window.open('https://portal.miniorange.com/moas/idp/resetpassword');
		});
	</script>
	<?php
}
