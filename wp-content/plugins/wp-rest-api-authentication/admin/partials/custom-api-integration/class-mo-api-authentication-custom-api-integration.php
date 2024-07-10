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
 * [Description Mo_API_Authentication_Custom_API_Integration]
 */
class Mo_API_Authentication_Custom_API_Integration {

	/**
	 * Internal redirect for Custom API Integration
	 *
	 * @return void
	 */
	public static function mo_api_authentication_customintegration() {
		self::custom_api_integration();
	}

	/**
	 * Custom API Integrations
	 *
	 * @return void
	 */
	public static function custom_api_integration() {
		$integrations_supported = array(
			'WooCommerce'         => 'woocommerce-circle.png',
			'BuddyPress'          => 'buddypress.png',
			'Gravity Forms'       => 'gravityform.jpg',
			'Ultimate Member'     => 'ultimate-member.png',
			'Paid Membership Pro' => 'paid-membership-pro.png',
			'Forminator'          => 'forminator.png',
			'WP Forms'            => 'wpforms.png',
			'Contact Form 7'      => 'contact-form-7.png',
			'Formidable Forms'    => 'formidable-forms.png',
			'Learndash'           => 'learndash.png',
			'CoCart'              => 'cocart-icon.png',
			'Custom REST APIs'    => 'api.png',
		);
		?>
		<div id="mo_api_authentication_password_setting_layout" class="border border-1 rounded-4 p-3 bg-white">
			<div class="d-flex justify-content-between mb-3">
				<div class="d-flex align-items-center gap-3">
					<h5 class="m-0">Custom/Third-Party Plugin API Authentication/Integrations</h4>
					<span class="mo_api_auth_inner_premium_label">Premium</span>
				</div>
				<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" disabled>Save</button>
			</div>
			<p>The REST APIs of third-party plugin can be authenticated with the <b><i><a href="admin.php?page=mo_api_authentication_settings&tab=licensing" style="color:#a83262"><u>All-Inclusive Plan</u></a></i></b>. Also any third-party application can also be integrated using the plugin via APIs.</p>
			<div class="d-grid gap-3 mo_rest_api_third_party_apps_wrapper">
				<?php foreach ( $integrations_supported as $name => $image ) : ?>
					<div class="border border-1 rounded-3">
						<input class="form-check-input ms-2 mt-2" type="checkbox" disabled />
						<div class="d-flex flex-column text-center align-items-center gap-2 pt-1 pb-3">
							<img class="mo_rest_api_third_party_apps" src="<?php echo esc_url( plugin_dir_url( __FILE__ ) ) . '../../images/' . esc_attr( $image ); ?>">
							<span class="mo_rest_api_primary_font"><?php echo esc_attr( $name ); ?></span>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<p class="mt-3 text-muted"><B>Note:</b> Contact us at <a href="mailto:apisupport@xecurify.com?subject=WP REST API Authentication Plugin - Enquiry"><b>apisupport@xecurify.com</b></a> to know more about integrations.</p>
		</div>
		<?php
	}
}
