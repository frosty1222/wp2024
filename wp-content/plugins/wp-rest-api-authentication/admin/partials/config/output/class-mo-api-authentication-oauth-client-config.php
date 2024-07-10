<?php
/**
 * Provide a admin area view for the plugin
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @package    Miniorange_Api_Authentication
 * @author     miniOrange <info@miniorange.com>
 * @license    MIT/Expat
 * @link       https://miniorange.com
 */

/**
 * [OAuth Client Authentication Configuration]
 */
class Mo_API_Authentication_OAuth_Client_Config {

	/**
	 * Display OAuth Client Authentication Configuration.
	 *
	 * @return void
	 */
	public static function mo_api_auth_configuration_output() {
		?>
		<div id="mo_api_oauth_authentication_support_layout" class="border border-1 rounded-4 p-3">
			<form method="post">
				<input type="hidden" name="action" id="mo_api_oauth2auth_save_config_input" value="Save OAuth2 Auth">
				<?php wp_nonce_field( 'mo_api_oAuth_authentication_method_config', 'mo_api_oAuth_authentication_method_config_fields' ); ?>	
				<div class="d-flex align-items-center mb-3 justify-content-between">
					<div class="d-flex justify-content-between gap-2 flex-column">
						<h5 class="m-0">
							<a class="text-decoration-none" href="admin.php?page=mo_api_authentication_settings&tab=config">Configure Methods</a><span> > OAuth 2.0 Authentication Method</span>
						</h5>
						<div class="d-flex gap-2">
							<span class="mo_api_auth_inner_premium_label">Premium</span>
							<span class="mo_api_auth_inner_premium_label_special">Most Secure</span>
						</div>
					</div>
					<div class="d-flex gap-2 text-center">
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="window.location.href='admin.php?page=mo_api_authentication_settings'">Back</button>
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" disabled>Next</button>
					</div>
				</div>
				<div>
					<p>WordPress REST API OAuth 2.0 Authentication Method involves the REST APIs access on validation against the access token/JWT token (JSON Web Token) generated based on the user or client credentials using highly secure encryption algorithm. It follows the standards of OAuth 2.0 protocol.</p>
					<div class="d-flex gap-3 my-4">
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/user-guide.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://plugins.miniorange.com/wordpress-rest-api-oauth-2-0-authentication-method#step_1" target="_blank">Setup Guide</a>
						</div>
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/document.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://developers.miniorange.com/docs/rest-api-authentication/wordpress/oauth-authentication" target="_blank">Developer Doc</a>
						</div>
					</div>
					<div class="container p-0 mt-5">
						<div class="row mx-1 gx-2">
							<div class="col me-2 border border-1 p-4 mo_rest_api_cursor_no_drop rounded-3">
								<div class="d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/guarantee.png" height="30px" width="30px">
									<span class="mo_rest_api_primary_font">Password Grant with Access Token</span>
								</div>
							</div>
							<div class="col me-2 border border-1 p-4 mo_rest_api_cursor_no_drop rounded-3">
								<div class="d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/user-authentication.png" height="30px" width="30px">
									<span class="mo_rest_api_primary_font">Password Grant with JWT Token</span>
								</div>
							</div>
							<div class="col border border-1 p-4 mo_rest_api_cursor_no_drop rounded-3">
								<div class="d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/secure.png" height="30px" width="30px">
									<span class="mo_rest_api_primary_font">Client Credentials with Access Token</span>
								</div>
							</div>
						</div>
						<hr>
						<h6 class="my-3 mt-5">Additional Configurations to control OAuth 2.0</h6>
						<div class="form-check d-flex align-items-center gx-1">
							<input class="form-check-input" type="checkbox" name="mo_api_oauth_refresh_token" disabled>
							<label class="form-check-label mo_rest_api_primary_font" for="mo_api_oauth_refresh_token">
								<b>Refresh Token </b> (Refresh tokens are the credentials to be used to acquire new access tokens to increase session timeout)
							</label>
						</div>
						<div class="form-check d-flex align-items-center gx-1">
							<input class="form-check-input" type="checkbox" name="mo_api_oauth_refresh_token" disabled>
							<label class="form-check-label mo_rest_api_primary_font" for="mo_api_oauth_refresh_token">
								<b>Revoke Token </b> (Revoke token request causes the removal of the client permissions associated with the specified token)
							</label>
						</div>
						<div class="form-check d-flex align-items-center gx-1">
							<input class="form-check-input" type="checkbox" name="mo_api_oauth_refresh_token" disabled>
							<label class="form-check-label mo_rest_api_primary_font" for="mo_api_oauth_refresh_token">
								<b>Client Secret Validation</b>
							</label>
						</div>
						<div class="form-check d-flex align-items-center gx-1">
							<input class="form-check-input" type="checkbox" name="mo_api_oauth_refresh_token" disabled>
							<label class="form-check-label mo_rest_api_primary_font" for="mo_api_oauth_refresh_token">
								<b>Client Credentials Validation on refresh token</b>
							</label>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php
	}
}
