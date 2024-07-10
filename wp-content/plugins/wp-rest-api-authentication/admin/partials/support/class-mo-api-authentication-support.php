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
 * Admin Support
 */
class Mo_API_Authentication_Support {

	/**
	 * Premium plugins advertise
	 *
	 * @return void
	 */
	public static function mo_api_authentication_admin_support() {
		?>
		<div id="mo_api_authentication_support_layout" class="card text-white mo_api_authentication_support_layout p-0 text-center rounded-4 mb-2" style="background: linear-gradient(to right, #09B9CE, #3C79DA, #7039E5)">
			<h6 class="card-header bg-transparent border-0">Unlock More Security Features</h6>
			<div class="card-body">
				<h5 class="card-title">Starting at  <span class="mo_api_authentication_adv_span">$199*</span></h5>
				<hr>
				<a href="<?php echo esc_url( site_url() ); ?>/wp-admin/admin.php?page=mo_api_authentication_settings&tab=licensing" class="btn btn-sm mo_rest_api_button text-white text-capitalization">Go Premium Now</a>
			</div>
		</div>
		<?php
	}

	/**
	 * Handle advertising
	 *
	 * @return void
	 */
	public static function mo_api_authentication_advertise() {
		$plugin_name = 'custom-api-for-wp';
		$plugin_path = WP_PLUGIN_DIR . '/' . $plugin_name . '/custom-api-for-wordpress.php';
		?>
		<div id="mo_api_authentication_support_layout" class="card mo_api_authentication_support_layout p-0 text-center rounded-4 mb-2">
			<h6 class="m-2 mt-3">Our Other WordPress Integrations</h6>
			<hr>
			<div>
				<h6>Connect to external APIs | Custom endpoints for WP</h6>
				<p class="text-muted mx-3 mo_rest_api_primary_font" style="text-align: justify;">Create your own REST API endpoints in WordPress to interact with WordPress database to fetch, insert, update, delete data. Also, any external APIs can be connected to WordPress for interaction between WordPress & External application.</p>
				<div>
					<p class="mo_api_authentication_adv_custom_api_p mb-0">
						<button id="mo_api_authentication_caw_loading" type="button" class="btn btn-sm mo_rest_api_button text-white" onclick="mo_api_authentication_install_and_activate_caw_free(<?php echo esc_attr( file_exists( $plugin_path ) ); ?>)">
						<?php
						if ( file_exists( $plugin_path ) ) {
							if ( is_plugin_active( $plugin_name . '/custom-api-for-wordpress.php' ) ) {
								?>
								<svg style="transform: translateY(2px);" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="15" height="15" viewBox="0 0 256 256" xml:space="preserve"><defs></defs><g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)"><path d="M 45 90 C 20.187 90 0 69.813 0 45 C 0 20.187 20.187 0 45 0 c 24.813 0 45 20.187 45 45 C 90 69.813 69.813 90 45 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,186,119); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/><polygon points="35.86,69.67 17.5,51.31 26.66,42.15 35.86,51.34 63.34,23.87 72.5,33.03 " style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/></g></svg>
								<?php
								echo( esc_html( 'Go to Settings' ) );
							} else {
								echo( esc_html( 'Activate Now' ) );
							}
						} else {
							echo( esc_html( 'Install Now' ) );
						}
						?>
						</button>
						</a>
					</p>
				</div>
			</div>
			<hr>
			<div>
				<h6>WooCommerce Product Sync Integrator</h6>
				<p class="text-muted mx-3 mo_rest_api_primary_font" style="text-align: justify;">Automatically sync product data from inventories and suppliers to your WooCommerce store using their API. You can run the sync manually or schedule it. Also, send order details back to your inventory in real-time whenever an order is placed.</p>
				<div>
					<p class="mo_api_authentication_adv_custom_api_p mb-0"><a href="https://plugins.miniorange.com/woocommerce-api-product-sync-with-woocommerce-rest-apis" target="_blank" rel="noopener" ><button type="button" class="btn btn-sm mo_rest_api_button text-white">Know More</button></a></p>
				</div>
			</div>
		</div>
		<script>
			function mo_api_authentication_install_and_activate_caw_free( plugin_exists ) {
				var data = {
					'action': 'install_and_activate_caw_free',
					'nonce': '<?php echo esc_attr( wp_create_nonce( 'mo_rest_api_install_and_activate_caw_free' ) ); ?>'
				};

				if ( plugin_exists ) {
					jQuery('#mo_api_authentication_caw_loading').text('Opening...');
				} else {
					jQuery('#mo_api_authentication_caw_loading').text('Installing...');			
				}
				jQuery.post(ajaxurl, data)
					.done(function(response) {
						if ( response.success ) {
							window.location.href = response.data.redirect_url;
						}
					})
					.fail(function(xhr, textStatus, errorThrown) {
						jQuery('#mo_api_authentication_caw_loading').text('Activate Now');
						window.location.href = 'https://wordpress.org/plugins/custom-api-for-wp/';
					});
			}
		</script>
		<?php
	}

	/**
	 * Handle customer support.
	 *
	 * @return void
	 */
	public static function mo_oauth_client_setup_support() {
		?>
	<div class="mo_rest_api_support-icon d-block">
			<div class="mo_rest_api_help-container" id="help-container">
				<span class="mo_rest_api_span1">
					<div class="mo_rest_api_need">
						<span class="mo_rest_api_span2"></span>
						<div class="mo_rest_api_primary_font" id="mo-rest-api-support-msg">Need help or request a feature? We are right here!</div>
						<span class="fa fa-times fa-1x " id="mo-support-msg-hide" style="cursor:pointer;float:right;display:inline;">
					</span>
					</div>
				</span>
				<div id="service-btn">
				<div class="mo-rest-api-service-icon text-center p-2">
					<img src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) . 'images/mail.png' ); ?>" class="" alt="support" width="100%">
				</div>
			</div>
			</div>
		</div>

	<div class="mo-rest-api-support-form-container" style="display: none;">
			<div class="mo-rest-api-widget-header">
				<b>Contact miniOrange Support</b>
				<div class="mo-rest-api-widget-header-close-icon">
					<span style="cursor: pointer;float:right;" id="mo-rest-api-support-form-hide"><img src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) . 'images/remove.png' ); ?>" height="15px" width = "15px">
					</span>
				</div>
			</div>

			<div class="mo-rest-api-loading-inner" style="overflow:hidden;">
			<div class="loading-icon">
				<div class="loading-icon-inner">
				<span class="icon-box">
					<img class="icon-image" src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) . 'images/tick.png' ); ?>" alt="success" height="25px" width = "25px" >
				</span>
				<p class="loading-icon-text">
					<p>Thanks for your inquiry.<br><br>If you don't hear from us within 24 hours, please feel free to send a follow up email to <a href="mailto:<?php echo 'apisupport@xecurify.com'; ?>"><?php echo 'apisupport@xecurify.com'; ?></a></p>
				</p>
				</div>
			</div>
			</div>

			<div class="mo-rest-api-loading-inner-2" style="overflow:hidden;">
			<div class="mo-rest-api-loading-icon-2">
				<div class="loading-icon-inner-2">
				<br>
				<span class="icon-box-2">
					<img class="icon-image-2" src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) . 'images/mail.png' ); ?>" alt="error" >
				</span>
				<p class="mo-rest-api-loading-icon-text-2">
					<p>Unable to connect to Internet.<br>Please try again.</p>
				</p>
				</div>
			</div>
			</div>
			<div class="mo-rest-api-loading-inner-3" style="overflow:hidden;">
			<div class="loading-icon-3">
				<p class="loading-icon-text-3">
					<p style="font-size:18px;">Please Wait...</p>
				</p>
				<div class="loader"></div>
			</div>
			</div>

			<br>
			<div class="support-form top-label" style="display: block;">
					<label for="email">
						Your Contact E-mail
					</label>
					<br><br>
					<input type="email" class="field-label-text" name="email" id="person_email" dir="auto" required="true" title="Enter a valid email address." placeholder="Enter valid email">
					<br><br>
					<label>
						How can we help you?
					</label>
					<br><br>
					<textarea rows="5" id="person_query" name="description" dir="auto" required="true" class="field-label-textarea" placeholder="You will get reply via email"></textarea>
					<br><br>
					<button id="mo-rest-api-submit-support" type="submit" class="button button-primary button-large" style="width:70px;margin-left:30%;border-radius: 2px;background: #473970;" value="Submit" aria-disabled="false">Submit</button>
			</div>
		</div>
	<script>
			jQuery('#mo-support-msg-hide').click(function(){
				jQuery(".mo_rest_api_span1").css('display','none');
			});

			jQuery('#mo-rest-api-support-form-hide').click(function(){
				jQuery(".mo-rest-api-support-form-container").css('display','none');
			});

			jQuery('#mo-rest-api-support-msg').click(function(){
					jQuery(".mo-rest-api-support-form-container").show();
					jQuery(".mo-rest-api-support-msg").hide();
				});

			jQuery("#service-btn").click(function(){
					jQuery(".mo-rest-api-support-form-container").show();
					jQuery(".mo-rest-api-support-msg").hide();
				});
			jQuery("#mo-rest-api-submit-support").click(function(){

				var email = jQuery("#person_email").val();
				var query = jQuery("#person_query").val();
				var fname = "<?php echo esc_attr( ( wp_get_current_user()->user_firstname ) ); ?>";
				var lname = "<?php echo esc_attr( ( wp_get_current_user()->user_lastname ) ); ?>";
				var version = "<?php echo esc_attr( MINIORANGE_API_AUTHENTICATION_VERSION ); ?>";
				var query = "[WordPress REST API Authentication plugin] "+version+" - "+query;
				var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
				if(email == "" || query == "" || !pattern.test(email)){

					jQuery('#login-error').show();
					jQuery('#errorAlert').show();

				}
				else{
					jQuery('input[type="text"], textarea').val('');
					jQuery('select').val('Select Category');
					jQuery(".support-form").css('display','none');
					jQuery(".mo-rest-api-loading-inner-3").css('display','block');
					var json = new Object();

					json = {
						"email" : email,
						"query" : query,
						"ccEmail" : "apisupport@xecurify.com",
						"company" : "<?php echo ! empty( $_SERVER ['SERVER_NAME'] ) ? esc_html( sanitize_text_field( wp_unslash( $_SERVER ['SERVER_NAME'] ) ) ) : ''; ?>",
						"firstName" : fname,
						"lastName" : lname,
					}
				   
					var jsonString = JSON.stringify(json);
					jQuery.ajax({
						url: "https://login.xecurify.com/moas/rest/customer/contact-us",
						type : "POST",
						data : jsonString,
						crossDomain: true,
						dataType : "text",
						contentType : "application/json; charset=utf-8",
						success: function (data, textStatus, xhr) { successFunction(); },
						error: function (jqXHR, textStatus, errorThrown) { errorFunction(); }
					});
				}
			});

			function successFunction(){
				jQuery(".mo-rest-api-loading-inner-3").css('display','none');
				jQuery(".mo-rest-api-loading-inner").css('display','block');
			}

			function errorFunction(){
				jQuery(".mo-rest-api-loading-inner-3").css('display','none');
				jQuery(".mo-rest-api-loading-inner-2").css('display','block');
			}

	</script>
		<?php
	}
}
