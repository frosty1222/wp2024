<?php
/**
 * Advance Security Settings
 * This file will display the UI to display advance API authentication settings.
 *
 * @package    advance-security-settings
 * @author     miniOrange <info@miniorange.com>
 * @license    MIT/Expat
 * @link       https://miniorange.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Advanced API settings
 */
class Mo_API_Authentication_AdvancedSettings {

	/**
	 * Display advance API settings.
	 *
	 * @return void
	 */
	public static function mo_api_authentication_advanced_settings() {
		?>
		<div id="mo_api_authentication_password_setting_layout" class="border border-1 rounded-4 p-3 bg-white">
			<div class="d-flex align-items-center gap-3 mb-3">
				<h5 class="m-0">Third Party Plugin API Authentication/Integration</h4>
				<span class="mo_api_auth_inner_premium_label">Premium</span>
			</div>
			<p class="mb-4">This section consists of advanced settings that can be used on the top of the authentication method configuration to provide more control over security.</p>
			<div class="border border-1 rounded-3 p-3 mt-2">
				<h6 class="mb-3" >Custom Header Configuration</h6>
				<div class="row mb-3">
					<label class="col-3 d-flex align-items-center gap-1">
						<img src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/heading.png" height="25px">
						<span class="mo_rest_api_primary_font">Custom Header:</span>
					</label>
					<div class="col d-flex align-items-center gap-1">
						<input class="form-control" type="text" value="Authorization" disabled>
						<img src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/write.png" height="25px">
					</div>
				</div>
				<p class="text-muted"><b>Tip:</b> If you want to authenticate the WordPress REST APIs in a more secure way, you can set a custom Header.</p>
			</div>
			<div class="border border-1 rounded-3 p-3 mt-2">
				<h6 class="mb-3">Role Based API Access Restriction Configuration</h6>
				<div class="mb-3">
					<?php $base_roles = array_keys( get_editable_roles() ); ?>
					<?php foreach ( $base_roles as $role ) : ?>
						<div class="form-check d-flex align-items-center">
							<input class="form-check-input" type="checkbox" aria-disabled="true" disabled aria-checked="true" checked>
							<label class="form-check-label mo_rest_api_primary_font">
								<?php echo esc_attr( $role ); ?>
							</label>
						</div>
					<?php endforeach; ?>
				</div>
				<p class="text-muted"><b>Tip:</b> User having below roles can access REST APIs of <b><?php echo esc_url( site_url() ); ?></b> site.</p>
			</div>
			<div class="border border-1 rounded-3 p-3 mt-2">
				<h6 class="mb-3">Custom Token Expiration Configuration</h6>
				<div class="row mb-3">
					<label class="col-5 d-flex align-items-center gap-1">
						<img src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/hourglass.png" height="25px">
						<span class="mo_rest_api_primary_font">Access Token Expiry Time (in minutes)</span>
					</label>
					<div class="col d-flex align-items-center gap-1">
						<input class="form-control" type="text" value="2628000" disabled>
						<img src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/write.png" height="25px">
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-5 d-flex align-items-center gap-1">
						<span class="d-flex align-item-center justify-content-center">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/hourglass.png" height="25px">
							<span class="mo_rest_api_primary_font">Refresh Token Expiry Time &nbsp;</span>
							<select aria-readonly="true" readonly>
								<option value="days">Days</option>
								<option value="hours">Hours</option>
							</select>
						</span>
					</label>
					<div class="col d-flex align-items-center gap-1">
						<input class="form-control" type="text" value="14" disabled>
						<img src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/write.png" height="25px">
					</div>
				</div>
				<p class="text-muted"><b>Tip:</b> JWT Token and the OAuth 2.0 Access Token will be expired on the given time.</p>
			</div>
			<div class="border border-1 rounded-3 p-3 mt-2">
				<h6 class="mb-3">Exclude REST API Configuration</h6>
				<div class="mb-3 d-flex align-items-center gap-2">
					<input class="form-control" type="text" placeholder="Enter the REST API patterns here" aria-disabled="true" disabled>
					<div class="d-flex align-item-center gap-1">
						<img src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/more.png" height="25px">
						<img src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/less.png" height="25px">
					</div>
				</div>
				<p class="text-muted"><b>Tip:</b> Given APIs will be publicly accessible from the all users.</p>
			</div>
		</div>
		<?php
	}
}
