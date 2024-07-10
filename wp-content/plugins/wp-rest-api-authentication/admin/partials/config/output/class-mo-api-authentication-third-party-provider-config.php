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
 * [Third Party Authentication configuration.]
 */
class Mo_API_Authentication_Third_Party_Provider_Config {

	/**
	 * Third Party Provider Authentication Configuration output
	 *
	 * @return void
	 */
	public static function mo_api_auth_configuration_output() {

		?>
		<div id="mo_api_oauth_authentication_support_layout" class="border border-1 rounded-4 p-3">
			<form method="post">
				<input type="hidden" name="action" id="mo_api_oauth2auth_save_config_input" value="Save OAuth2 Auth">
				<?php wp_nonce_field( 'mo_api_oAuth_authentication_method_config', 'mo_api_oAuth_authentication_method_config_fields' ); ?>	
				<div class="d-flex align-items-center gap-3 mb-3 justify-content-between">
					<div class="d-flex align-items-center gap-3 mb-3">
						<h5 class="m-0">
							<a class="text-decoration-none" href="admin.php?page=mo_api_authentication_settings&tab=config">Configure Methods</a>
							> Third-Party Authentication Method
						</h4>
						<span class="mo_api_auth_inner_premium_label">Premium</span>
					</div>
					<div class="d-flex gap-2 text-center">
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="window.location.href='admin.php?page=mo_api_authentication_settings'">Back</button>
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" disabled>Next</button>
					</div>
				</div>
				<div>
					<p>WordPress REST API Third-party provider Authentication Method involves the REST APIs access on validation against the token provided by Third-party providers like OAuth 2.0, OpenIDConnect, SAML 2.0 etc. The plugin directly validates the token with these providers and based on the response, APIs are allowed to access.</p>
					<div class="d-flex gap-3 my-4">
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/user-guide.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://plugins.miniorange.com/wordpress-rest-api-authentication-using-third-party-provider#step_1" target="_blank">Setup Guide</a>
						</div>
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/document.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://developers.miniorange.com/docs/rest-api-authentication/wordpress/third-party-provider-authentication" target="_blank">Developer Doc</a>
						</div>
					</div>
					<div class="p-0 mt-5">
						<h6 class="my-3">Additional Configurations to control OAuth 2.0</h6>
						<div class="d-grid gap-4 mo_rest_api_third_party_auth_apps_wrapper">
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) . '/images/oauth.png' ); ?>">
									<span class="mo_rest_api_primary_font">OAuth 2.0 Provider</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/oidc.png">
									<span class="mo_rest_api_primary_font">OpenID Connect Provider</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/saml.png">
									<span class="mo_rest_api_primary_font">SAML 2.0 Provider</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/api.png">
									<span class="mo_rest_api_primary_font">Token via Custom API</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/firebase.png">
									<span class="mo_rest_api_primary_font">Firebase</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/cognito.png">
									<span class="mo_rest_api_primary_font">AWS Cognito</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/azure.png">
									<span class="mo_rest_api_primary_font">Azure AD</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/azure.png">
									<span class="mo_rest_api_primary_font">Azure B2C</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/wordpress-logo.png">
									<span class="mo_rest_api_primary_font">WordPress</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/office365.png">
									<span class="mo_rest_api_primary_font">Office 365</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/google.png">
									<span class="mo_rest_api_primary_font">Google</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/facebook.png">
									<span class="mo_rest_api_primary_font">Facebook</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/apple.png">
									<span class="mo_rest_api_primary_font">Apple</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/linkedin.png">
									<span class="mo_rest_api_primary_font">LinkedIn</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/twitter.png">
									<span class="mo_rest_api_primary_font">Twitter</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/okta.png">
									<span class="mo_rest_api_primary_font">Okta</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/keycloak.png">
									<span class="mo_rest_api_primary_font">Keycloak</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/onelogin.png">
									<span class="mo_rest_api_primary_font">One Login</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/shopify.png">
									<span class="mo_rest_api_primary_font">Shopify</span>
								</div>
							</div>
							<div class="rounded-3 border border-1 mo_rest_api_cursor_no_drop">
								<div class="p-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img class="mo_rest_api_third_party_auth_apps" src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/auth0.png">
									<span class="mo_rest_api_primary_font">Auth 0</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php
	}
}
