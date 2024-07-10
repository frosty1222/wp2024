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
 * [Description Mo_API_Authentication_TokenAPI_Config]
 */
class Mo_API_Authentication_TokenAPI_Config {

	/**
	 * API Key Authentication Configuration output
	 *
	 * @return void
	 */
	public static function mo_api_auth_configuration_output() {

		$mo_api_key_enable = ( get_option( 'mo_api_authentication_selected_authentication_method' ) === 'tokenapi' ) ? 1 : 0;
		?>
		<div id="mo_api_key_authentication_support_layout" class="border border-1 rounded-4 p-3">
			<form method="post" id="mo-api-key-authentication-method-form">
				<input type="hidden" name="action" id="mo_api_apikeyauth_save_config_input" value="Save APIKey Auth">
				<?php wp_nonce_field( 'mo_api_key_authentication_method_config', 'mo_api_key_authentication_method_config_fields' ); ?>
				<div class="d-flex align-items-center gap-3 mb-3 justify-content-between">
					<div class="d-flex align-items-center gap-3 mb-3">
						<h5 class="m-0">
							<a class="text-decoration-none" href="admin.php?page=mo_api_authentication_settings&tab=config">Configure Methods</a>
							> API Key Authentication Method
						</h4>
						<span class="mo_api_auth_inner_premium_label">Premium</span>
					</div>
					<div class="d-flex gap-2 text-center">
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="window.location.href='admin.php?page=mo_api_authentication_settings'">Back</button>
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="moAPIKeyAuthenticationMethodSave('save_apikey_auth')" <?php echo ! $mo_api_key_enable ? 'disabled' : ''; ?>>Next</button>
					</div>
				</div>
				<div id="mo_api_authentication_support_basicoauth">
					<p>WordPress REST API - API Key Authentication Method involves the REST APIs access on validation against the API key/token.</p>
					<div class="d-flex gap-3 my-4">
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/youtube.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://www.youtube.com/watch?v=HdWvlkAdXgA" target="_blank" rel="noopener noreferrer">Video Guide</a>
						</div>
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/user-guide.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://plugins.miniorange.com/rest-api-key-authentication-method#step_1" target="_blank">Setup Guide</a>
						</div>
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/document.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://developers.miniorange.com/docs/rest-api-authentication/wordpress/api-key-authentication" target="_blank">Developer Doc</a>
						</div>
					</div>
					<div class="container p-0">
						<div class="mt-5 p-3 border border-1 rounded-3">
							<div class="row mb-3">
								<label class="col-3 d-flex align-items-center gap-1">
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/universal-key.png" height="25px">
									<span class="mo_rest_api_primary_font">Universal API Key:</span>
								</label>
								<div class="col d-flex align-items-center gap-1">
									<input class="form-control" type="text" value="XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" disabled>
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/write.png" height="25px">
								</div>
							</div>
							<p class="text-muted"><b>Tip:</b> Universal key can be used to unlock all the WordPress REST API access which does not involves user permissions. You can create the key for any user from the above dropdown.</p>
						</div>
						<div class="mt-2 p-3 border border-1 rounded-3">
							<div class="row mb-3">
								<label class="col-3 d-flex align-items-center gap-1">
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/user-based-login.png" height="25px">
									<span class="mo_rest_api_primary_font">User-Specific API Key:</span>
								</label>
								<div class="col d-flex align-items-center gap-1">
									<?php $user = wp_get_current_user(); ?>
									<select class="form-select" disabled>
										<option selected><?php echo esc_attr( $user->user_login ); ?></option>
									</select>
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/write.png" height="25px">
								</div>
							</div>
							<p class="text-muted"><b>Tip:</b> User specific key can be used to unlock all the WordPress REST API access including the ones that involves user permissions.</p>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div id="mo_api_keyauth_finish" class="d-none border border-1 rounded-4 p-3">
			<form method="post" id="mo-api-key-authentication-method-form" action="">
				<input required type="hidden" name="option" value="mo_api_key_authentication_config_form" />
				<?php wp_nonce_field( 'mo_api_key_authentication_method_config', 'mo_api_key_authentication_method_config_fields' ); ?>	
				<div class="d-flex align-items-center gap-3 mb-3 justify-content-between">
					<div class="d-flex align-items-center gap-3 mb-3">
						<h5 class="m-0">
							<a class="text-decoration-none" href="admin.php?page=mo_api_authentication_settings&tab=config">Configure Methods</a>
							> API Key Authentication Method
						</h4>
						<span class="mo_api_auth_inner_premium_label">Premium</span>
					</div>
					<div class="d-grid gap-2 d-md-block text-center">
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="window.location.href='admin.php?page=mo_api_authentication_settings'">Back</button>
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="submit" onclick="moAPIKeyAuthenticationMethodFinish()">Finish</button>
					</div>
				</div>
				<div id="mo_api_basicauth_client_creds">
					<h6>Configuration Overview</h6>
					<div class="pt-3">
						<div class="row">
							<div class="col-3">
								<p>Universal API Key:</p>
							</div>
							<div class="col">
								<p><b>universal-api-key</b></p>
							</div>
						</div>
					</div>
					<p class="text-muted"><b>Tip : </b>Please keep this API key securely and do not share it. In case if it is compromised, you can always regenerate it.</p>
				</div>
			</form>
		</div>

		<script>
			function moAPIKeyAuthenticationMethodSave(action){

				div = document.getElementById('mo_api_key_authentication_support_layout');
				div.classList.remove("d-block");
				div.classList.add("d-none");
				div2 = document.getElementById('mo_api_keyauth_finish');
				div2.classList.remove("d-none");
				div2.classList.add("d-block");
			}

			function moAPIKeyAuthenticationMethodFinish(){
				document.getElementById("mo-api-key-authentication-method-form").submit();
			}

		</script>
		<?php
	}
}
