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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adding required files.
 */
require 'output/class-mo-api-authentication-basic-oauth-config.php';
require 'output/class-mo-api-authentication-tokenapi-config.php';
require 'output/class-mo-api-authentication-jwt-auth-config.php';
require 'output/class-mo-api-authentication-oauth-client-config.php';
require 'output/class-mo-api-authentication-third-party-provider-config.php';

/**
 * [API authentication methods configuration]
 */
class Mo_API_Authentication_Config {

	/**
	 * API authentication methods configuration panel
	 *
	 * @return void
	 */
	public static function mo_api_authentication_config_panel() {
		?>
		<div id="mo_api_section_method" class="bg-white rounded-4">
			<div id="mo_api_authentication_password_setting_layout" class="border border-1 rounded-4 p-3 bg-white">
				<div class="d-flex align-items-center gap-3 mb-3 justify-content-between">
					<h5 class="m-0">API Authentication Methods Configuration</h5>
					<?php if ( get_option( 'mo_api_authentication_selected_authentication_method' ) ) : ?>
						<button class="btn btn-sm mo_rest_api_button text-white" aria-disabled="true" disabled><i class="fa fa-plus"></i> Add Application</button>
					<?php endif; ?>
				</div>
				<?php if ( get_option( 'mo_api_authentication_selected_authentication_method' ) ) : ?>
					<div id="mo_api_auth_add_app_message">
						<p class="mo_api_auth_note"><strong><i>Note: </i></strong>You can only configure one authentication method at a time with the free version. Please <strong><a href="admin.php?page=mo_api_authentication_settings&tab=licensing">Upgrade to All-Inclusive Plan Package</a></strong> to configure multiple authentication applications.</p>
					</div>
				<?php else : ?>
					<p>Select any of the below authentication methods to get started</p>
				<?php endif; ?>
				<div class="row px-3 gap-2 mb-3">
					<div class="col d-flex justify-content-start align-items-center p-3 rounded-3 mo_rest_api_auth_method <?php echo 'basic_auth' === get_option( 'mo_api_authentication_selected_authentication_method' ) ? 'mo_rest_api_selected_border' : 'border border-1'; ?>" onclick="api_ajax_redir('basic auth')">
						<img class="me-3" src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/basic-key.png" height="55px">
						<h6 class="fw-bolder mb-0">BASIC AUTHENTICATION</h6>
					</div>
					<div class="col d-flex justify-content-start align-items-center p-3 rounded-3 mo_rest_api_auth_method <?php echo 'jwt_auth' === get_option( 'mo_api_authentication_selected_authentication_method' ) ? 'mo_rest_api_selected_border' : 'border border-1'; ?>" onclick="api_ajax_redir('jwt auth')">
						<img class="me-3" src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/jwt_authentication.png" height="55px">
						<h6 class="fw-bolder mb-0">JWT AUTHENTICATION</h6>
					</div>
				</div>
				<div class="row px-3 gap-2 mb-3">
					<div class="col p-0">
						<div class="d-flex justify-content-start align-items-center p-3 rounded-3 mo_rest_api_auth_method <?php echo 'tokenapi' === get_option( 'mo_api_authentication_selected_authentication_method' ) ? 'mo_rest_api_selected_border' : 'border border-1'; ?>" onclick="api_ajax_redir('apikey auth')">
							<img class="me-3" src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/api-key.png" height="55px">
							<h6 class="fw-bolder mb-0">API KEY AUTHENTICATION</h6>
						</div>
						<div class="mo_api_auth_premium_label_main">
							<div class="mo_api_auth_premium_label_internal">
								<p class="mb-0 rounded-1 mo_api_auth_premium_label_text">Premium</p>
							</div>
						</div>
					</div>
					<div class="col p-0">
						<div class="d-flex justify-content-start align-items-center p-3 border border-1 rounded-3 mo_rest_api_auth_method" onclick="api_ajax_redir('oauth2 auth')">
							<img class="me-3" src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/oauth_2.png" height="55px">
							<h6 class="fw-bolder mb-0">OAUTH 2.0 AUTHENTICATION</h6>
						</div>
						<div class="mo_api_auth_premium_label_main">
							<div class="mo_api_auth_premium_label_internal">
								<p class="mb-0 rounded-1 mo_api_auth_premium_label_text">Premium</p>
							</div>
						</div>
						<div class="me-1 mo_api_auth_premium_label_main">
							<div class="mo_api_auth_premium_label_internal">
								<div class="mb-0 rounded-1 mo_api_auth_premium_label_text" style='background-color: #ffa033'>Most Secure</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row px-3" id="mo_rest_api_auth_third_party_selector">
					<div class="col-6 p-0">
						<div class="d-flex justify-content-start align-items-center p-3 border border-1 rounded-3 mo_rest_api_auth_method" onclick="api_ajax_redir('thirdparty auth')">
							<img class="me-3" src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/third_party.png" height="55px">
							<h6 class="fw-bolder mb-0">THIRD PARTY AUTHENTICATION</h6>
						</div>
						<div class="mo_api_auth_premium_label_main">
							<div class="mo_api_auth_premium_label_internal">
								<p class="mb-0 rounded-1 mo_api_auth_premium_label_text">Premium</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div id='mo_api_section_basicauth_method' class="d-none rounded-4 bg-white">
				<?php Mo_API_Authentication_Basic_Oauth_Config::mo_api_auth_configuration_output(); ?>
			</div>
			<div id='mo_api_section_jwtauth_method' class="d-none rounded-4 bg-white">
				<?php Mo_API_Authentication_Jwt_Auth_Config::mo_api_auth_configuration_output(); ?>
			</div>
			<div id='mo_api_section_apikeyauth_method' class="d-none rounded-4 bg-white">
				<?php Mo_API_Authentication_TokenAPI_Config::mo_api_auth_configuration_output(); ?>
			</div>
			<div id='mo_api_section_oauth2auth_method' class="d-none rounded-4 bg-white">
				<?php Mo_API_Authentication_OAuth_Client_Config::mo_api_auth_configuration_output(); ?>
			</div>
			<div id='mo_api_section_thirdpartyauth_method' class="d-none rounded-4 bg-white">
				<?php Mo_API_Authentication_Third_Party_Provider_Config::mo_api_auth_configuration_output(); ?>
			</div>
			<div id="mo_api_auth_step_container" class="d-none">
				<h5 class="text-white text-center p-2">Configuration Tracker</h5>
				<div class="step completed d-flex gap-2 py-0">
					<div class="v-stepper d-flex flex-column align-items-center">
						<span class="circle rounded-circle"></span>
						<span class="line h-100"></span>
					</div>
					<p class="text-white">Configure Authentication Method</p>
				</div>
				<div class="step active d-flex gap-2 py-0" id="basic_authentication_finish_stepper">
					<div class="v-stepper d-flex flex-column align-items-center">
						<span class="circle rounded-circle"></span>
						<span class="line h-100"></span>
					</div>
					<p class="text-white" id="mo_api_auth_flow_method_name">Basic Authentication Method Configurations (Pre-Configured)</p>
				</div>
				<div class="step active d-flex gap-2 py-0">
					<div class="v-stepper d-flex flex-column align-items-center">
						<span class="circle rounded-circle"></span>
					</div>
					<p class="text-white">Save Configuration and Get Started</p>
				</div>
			</div>
		</div>
		<script>
			function api_ajax_redir(auth_method){
				div = document.getElementById('mo_api_section_method');
				div.classList.add("d-none");
				if(auth_method == "basic auth"){
					handle_auth_display('mo_api_section_basicauth_method', 'Basic Authentication Method Configurations (Pre-Configured)');
				}
				else if(auth_method == "jwt auth"){
					handle_auth_display('mo_api_section_jwtauth_method', 'JWT Authentication Method Configurations (Pre-Configured)');
				}
				else if(auth_method == "apikey auth"){
					handle_auth_display('mo_api_section_apikeyauth_method', 'API Key Authentication Method Configurations (Pre-Configured)');
				}
				else if(auth_method == "oauth2 auth"){
					handle_auth_display('mo_api_section_oauth2auth_method', 'OAuth 2.0 Authentication Method Configurations (Pre-Configured)');
				}
				else if(auth_method == "thirdparty auth"){
					handle_auth_display('mo_api_section_thirdpartyauth_method', '3rd Party Authentication Method Configurations (Pre-Configured)');
				}
			}

			function handle_auth_display(section, display_text) {
				div2 = document.getElementById(section);
				div2.classList.remove("d-none");
				div2.classList.add("d-block");
				close_success_message('mo_api_auth_admin_custom_notice_success');
				close_success_message('mo_api_auth_admin_custom_notice_alert');
				document.getElementById('mo_api_side_bar_content').innerHTML = document.getElementById('mo_api_auth_step_container').innerHTML;
				document.getElementById('mo_api_auth_flow_method_name').innerHTML = display_text;
			}

			function close_success_message(classname) {
				if(document.getElementsByClassName(classname)[0] != undefined) {
					document.getElementsByClassName(classname)[0].style.display = "none";
				}
			}

		</script>
		<?php
	}
}
