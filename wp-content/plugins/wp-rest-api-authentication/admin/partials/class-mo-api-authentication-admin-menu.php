<?php
/**
 * Provide a admin area view for the plugin
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       miniorange
 *
 * @package    Miniorange_Api_Authentication
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Adding required files.
 */
require 'support/class-mo-api-authentication-support.php';
require 'support/class-mo-api-authentication-faq.php';
require 'config/class-mo-api-authentication-config.php';
require 'license/class-mo-api-authentication-license.php';
require 'account/class-mo-api-authentication-account.php';
require 'demo/class-mo-api-authentication-demo.php';
require 'postman/class-mo-api-authentication-postman.php';
require 'advanced/class-mo-api-authentication-advancedsettings.php';
require 'advanced/class-mo-api-authentication-protectedrestapis.php';
require 'custom-api-integration/class-mo-api-authentication-custom-api-integration.php';
require 'custom-api-integration/class-mo-api-authentication-third-party-integrations.php';

/**
 * Main menu
 *
 * @return void
 */
function mo_api_authentication_main_menu() {

	$currenttab = '';
	if ( isset( $_GET['tab'] ) ) { //phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Ignoring nonce validation because we are directly fetching value from URL and not form submission.
		$currenttab = sanitize_text_field( wp_unslash( $_GET['tab'] ) ); //phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Ignoring nonce validation because we are directly fetching value from URL and not form submission.
	}

	if ( ! get_option( 'mo_save_settings' ) ) {
		update_option( 'mo_save_settings', 0 );
	}
	?>

	<div class="bg-light">
		<?php if ( ! isset( $_GET['tab'] ) || ( isset( $_GET['tab'] ) && sanitize_text_field( wp_unslash( $_GET['tab'] ) ) !== 'licensing' ) ) : //phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Ignoring nonce validation because we are directly fetching value from URL and not form submission. ?>
			<div class="bg-white" style="margin-left: -1.8%">
				<nav class="navbar navbar-light mo-caw-navbar border-bottom mo-caw-element-to-toggle mo-caw-light-mode p-0">
					<div class="container-fluid">
						<a class="navbar-brand d-flex align-items-center p-0 ms-3" href="https://plugins.miniorange.com/wordpress-rest-api-authentication">
							<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/miniorange-full-logo.png" alt="miniOrange" width="" height="80px" class="d-inline-block align-text-top mx-3 py-0">
						</a>
						<span>
							<a class="btn p-2 ms-1" href="admin.php?page=mo_api_authentication_settings&tab=postman" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export Postman Samples"><img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/postman.png" height="20px"> Postman-Samples</a>
							<a class="btn p-2 ms-1" href="https://plugins.miniorange.com/wordpress-rest-api-authentication#rest-api-methods" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Learn more about the plugin"><img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/know-how.png" height="20px"> Learn-More</a>
							<a class="btn p-2 ms-1" href="https://wordpress.org/support/plugin/wp-rest-api-authentication/" target="__blank" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="WordPress Forum"><img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/wordpress-logo.png" height="20px"> WordPress Forum</a>
							<a class="btn p-2 ms-1" href="https://faq.miniorange.com/" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="FAQ"><img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/faq.png" height="20px"> FAQ</a>
						</span>
					</div>
				</nav>
			</div>
		<?php endif; ?>
		<?php if ( ! isset( $_GET['tab'] ) || ( isset( $_GET['tab'] ) && sanitize_text_field( wp_unslash( $_GET['tab'] ) ) !== 'licensing' ) ) : //phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Ignoring nonce validation because we are directly fetching value from URL and not form submission. ?>
			<div class="mo_api_side_bar py-4" id="mo_api_side_bar_content">
				<a class="d-flex flex-column align-items-center text-decoration-none py-3 <?php echo ( '' === $currenttab || 'config' === $currenttab ) ? 'mo_api_side_bar_select' : ''; ?>" href="admin.php?page=mo_api_authentication_settings&tab=config">
					<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/setting.png" height="30px" width="30px">
					<h6 class="text-white mt-2 mb-0">Configure Methods</h6>
				</a>
				<a class="d-flex flex-column align-items-center text-decoration-none py-3 <?php echo ( 'protectedrestapis' === $currenttab ) ? 'mo_api_side_bar_select' : ''; ?>" href="admin.php?page=mo_api_authentication_settings&tab=protectedrestapis">
					<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/shield.png" height="30px" width="30px">
					<h6 class="text-white mt-2 mb-0">Protected REST APIs</h6>
				</a>
				<a class="d-flex flex-column align-items-center text-decoration-none py-3 <?php echo ( 'advancedsettings' === $currenttab ) ? 'mo_api_side_bar_select' : ''; ?>" href="admin.php?page=mo_api_authentication_settings&tab=advancedsettings">
					<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/settings.png" height="30px" width="30px">
					<h6 class="text-white mt-2 mb-0">Advanced Settings</h6>
				</a>
				<a class="d-flex flex-column align-items-center text-decoration-none py-3 <?php echo ( 'custom-integration' === $currenttab ) ? 'mo_api_side_bar_select' : ''; ?>" href="admin.php?page=mo_api_authentication_settings&tab=custom-integration">
					<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/controller.png" height="30px" width="30px">
					<h6 class="text-white mt-2 mb-0">Third Party Plugin Integrations</h6>
				</a>
				<a class="d-flex flex-column align-items-center text-decoration-none py-3 <?php echo ( 'third-party-integration' === $currenttab ) ? 'mo_api_side_bar_select' : ''; ?>" href="admin.php?page=mo_api_authentication_settings&tab=third-party-integration">
					<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/popular.png" height="30px" width="30px">
					<h6 class="text-white mt-2 mb-0">Popular Use Cases</h6>
				</a>
				<a class="d-flex flex-column align-items-center text-decoration-none py-3 <?php echo ( 'requestfordemo' === $currenttab ) ? 'mo_api_side_bar_select' : ''; ?>" href="admin.php?page=mo_api_authentication_settings&tab=requestfordemo">
					<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/trial.png" height="30px" width="30px">
					<h6 class="text-white mt-2 mb-0">Premium Trials</h6>
				</a>
				<a class="d-flex flex-column align-items-center text-decoration-none py-3 <?php echo ( 'account' === $currenttab ) ? 'mo_api_side_bar_select' : ''; ?>" href="admin.php?page=mo_api_authentication_settings&tab=account">
					<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/account.png" height="30px" width="30px">
					<h6 class="text-white mt-2 mb-0">Account Setup</h6>
				</a>
			</div>
		<?php else : ?>
			<div id="nav-container" class="bg-white d-flex justify-content-center py-3">
				<div>
					<a class="position-absolute start-0 text-black text-center text-decoration-none ms-3" href="<?php echo ! empty( $_SERVER['REQUEST_URI'] ) ? esc_url( add_query_arg( array( 'tab' => 'config' ), sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) ) ) : ''; ?>">
						<button id="Back-To-Plugin-Configuration" type="button" value="Back-To-Plugin-Configuration" class="btn btn-sm">
							<span class="dashicons dashicons-arrow-left-alt" style="vertical-align: middle;"></span>
							Plugin Configuration
						</button> 
					</a> 
				</div>
				<p class="fw-bold fs-4 m-0">miniOrange REST API Authentication</p>
			</div>
		<?php endif; ?>
		<?php
		$mo_licensing_width        = '';
		$mo_api_main_dashboard_css = '';

		if ( isset( $_GET['tab'] ) && sanitize_text_field( wp_unslash( $_GET['tab'] ) ) === 'licensing' ) { //phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Ignoring nonce validation because we are directly fetching value from URL and not form submission.
			$mo_licensing_width        = 'width:100%';
			$mo_api_main_dashboard_css = 'mo_api_main_dashboard2';
		} else {
			$mo_licensing_width        = 'width:73%';
			$mo_api_main_dashboard_css = 'mo_api_main_dashboard';
		}

		?>
		<div class="<?php echo esc_attr( $mo_api_main_dashboard_css ); ?>">
		<?php

		$mo_api_auth_message_flag  = get_option( 'mo_api_auth_message_flag' );
		$mo_api_auth_message_class = '';

		if ( 2 === $mo_api_auth_message_flag ) {
			$mo_api_auth_message_class = 'mo_api_auth_admin_custom_notice_alert ms-4 me-2 p-2';
		} elseif ( 1 === $mo_api_auth_message_flag ) {
			$mo_api_auth_message_class = 'mo_api_auth_admin_custom_notice_success ms-4 me-2 p-2';
		}

		if ( $mo_api_auth_message_flag ) {
			update_option( 'mo_api_auth_message_flag', 0 );
			?>
			<div class="<?php echo esc_attr( $mo_api_auth_message_class ); ?>" ><p class="m-0"><b><?php echo esc_html( get_option( 'mo_api_auth_message' ) ); ?></b></p></div>
			<br>
			<?php
		}
		?>
	<div id="mo_api_authentication_settings" style="padding-left:1em;">
		<div class="miniorange_container" style="padding-left:1em;">
			<div class="row">
				<div class="col"><?php Mo_API_Authentication_Admin_Menu::mo_api_auth_show_tab( $currenttab ); ?></div>
				<?php if ( 'licensing' !== $currenttab ) : ?>
					<div class="col-3 ps-0"><?php Mo_API_Authentication_Admin_Menu::mo_api_auth_show_support_sidebar( $currenttab ); ?></div>
				<?php endif; ?>
			</div>
			<div class="mo_api_authentication_tutorial_overlay" id="mo_api_authentication_tutorial_overlay" hidden></div>
			</div>
		</div>
	</div>

	<?php
}


/**
 * Admin Menu
 */
class Mo_API_Authentication_Admin_Menu {

	/**
	 * Show current tab
	 *
	 * @param mixed $currenttab current tab user is viewing.
	 * @return void
	 */
	public static function mo_api_auth_show_tab( $currenttab ) {
		if ( 'account' === $currenttab ) {
			if ( get_option( 'mo_api_authentication_verify_customer' ) === 'true' ) {
				Mo_API_Authentication_Account::verify_password();
			} elseif ( trim( get_option( 'mo_api_authentication_email' ) ) !== '' && trim( get_option( 'mo_api_authentication_admin_api_key' ) ) === '' && get_option( 'mo_api_authentication_new_registration' ) !== 'true' ) {
				Mo_API_Authentication_Account::verify_password();
			} else {
				Mo_API_Authentication_Account::register();
			}
		} elseif ( '' === $currenttab || 'config' === $currenttab ) {
			Mo_API_Authentication_Config::mo_api_authentication_config_panel();
		} elseif ( 'protectedrestapis' === $currenttab ) {
			Mo_API_Authentication_ProtectedRestAPIs::mo_api_authentication_protected_restapis();
		} elseif ( 'advancedsettings' === $currenttab ) {
			Mo_API_Authentication_AdvancedSettings::mo_api_authentication_advanced_settings();
		} elseif ( 'custom-integration' === $currenttab ) {
			Mo_API_Authentication_Custom_API_Integration::mo_api_authentication_customintegration();
		} elseif ( 'third-party-integration' === $currenttab ) {
			Mo_API_Authentication_Third_Party_Integrations::mo_api_authentication_thirdpartyintegration();
		} elseif ( 'requestfordemo' === $currenttab ) {
			Mo_API_Authentication_Demo::mo_api_authentication_requestfordemo();
		} elseif ( 'faq' === $currenttab ) {
			Mo_API_Authentication_FAQ::mo_api_authentication_admin_faq();
		} elseif ( 'licensing' === $currenttab ) {
			Mo_API_Authentication_License::mo_api_authentication_licensing_page();
		} elseif ( 'postman' === $currenttab ) {
			Mo_API_Authentication_Postman::mo_api_authentication_postman_page();
		}
	}

	/**
	 * Display support sidebar.
	 *
	 * @param mixed $currenttab current tab user is viewing.
	 * @return void
	 */
	public static function mo_api_auth_show_support_sidebar( $currenttab ) {
		if ( 'licensing' !== $currenttab ) {
			?>
			<div>
				<?php echo esc_html( Mo_API_Authentication_Support::mo_api_authentication_admin_support() ); ?>
				<?php echo esc_html( Mo_API_Authentication_Support::mo_api_authentication_advertise() ); ?>
				<?php echo esc_html( Mo_API_Authentication_Support::mo_oauth_client_setup_support() ); ?>
			</div>
			<?php
		}
	}
}
