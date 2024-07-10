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
 * [Handle Demo request]
 */
class Mo_API_Authentication_Demo {

	/**
	 * Internal redirect for processing demo request
	 *
	 * @return void
	 */
	public static function mo_api_authentication_requestfordemo() {
		self::demo_request();
	}

	/**
	 * Raises query for the trial plugin.
	 *
	 * @param mixed $email user email.
	 * @param mixed $message query entered by the user.
	 * @param mixed $subject email subject.
	 *
	 * @return null|bool|string
	 */
	public static function mo_rest_api_auth_send_trial_mail( $email, $message, $subject ) {
		$url                    = get_option( 'host_name' ) . '/moas/api/notify/send';
		$default_customer_key   = '16555';
		$default_api_key        = 'fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq';
		$customer_key           = $default_customer_key;
		$api_key                = $default_api_key;
		$current_time_in_millis = \Miniorange_API_Authentication_Customer::get_timestamp();
		$string_to_hash         = $customer_key . $current_time_in_millis . $api_key;
		$hash_value             = hash( 'sha512', $string_to_hash );
		$customer_key_header    = 'Customer-Key: ' . $customer_key;
		$timestamp_header       = 'Timestamp: ' . $current_time_in_millis;
		$authorization_header   = 'Authorization: ' . $hash_value;
		$from_email             = $email;
		$site_url               = site_url();

		global $user;
		$user = wp_get_current_user();

		$content = '<div >Hello, </a><br><br><b>Email :</b><a href="mailto:' . $from_email . '" target="_blank">' . $from_email . '</a><br><br><b>Requirements (Usecase) :</b> ' . $message . '</div>';

		$fields = array(
			'customerKey' => $customer_key,
			'sendEmail'   => true,
			'email'       => array(
				'customerKey' => $customer_key,
				'fromEmail'   => $from_email,
				'bccEmail'    => 'apisupport@xecurify.com',
				'fromName'    => 'miniOrange',
				'toEmail'     => 'apisupport@xecurify.com',
				'toName'      => 'apisupport@xecurify.com',
				'subject'     => $subject,
				'content'     => $content,
			),
		);

		$field_string             = wp_json_encode( $fields );
		$headers                  = array( 'Content-Type' => 'application/json' );
		$headers['Customer-Key']  = $customer_key;
		$headers['Timestamp']     = $current_time_in_millis;
		$headers['Authorization'] = $hash_value;
		$args                     = array(
			'method'      => 'POST',
			'body'        => $field_string,
			'timeout'     => '5',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);

		$response = wp_remote_post( $url, $args );
		$body     = wp_remote_retrieve_body( $response );
		$body     = json_decode( $body, true );
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			echo 'Something went wrong: ' . esc_html( $error_message );
			exit();
		} elseif ( isset( $body ) && 'ERROR' === $body['status'] ) {
			return 'WRONG_FORMAT';
		}

		return true;
	}

	/**
	 * Demo request form.
	 *
	 * @return void
	 */
	public static function demo_request() {
		?>
		<div id="mo_api_authentication_password_setting_layout" class="border border-1 rounded-4 p-3 bg-white">
			<div class="d-flex align-items-center gap-3 mb-3">
				<h5 class="m-0">Demo/Trial Request for Premium Plans</h4>
			</div>
			<p>Make a request for the demo/trial of the Premium plans of the plugin to try all the features.</p>
			<form method="post">
				<input type="hidden" name="option" value="mo_api_authentication_demo_request_form" />
				<?php wp_nonce_field( 'mo_api_authentication_demo_request_form', 'mo_api_authentication_demo_request_field' ); ?>
				<div class="row">
					<div class="mb-3 col">
						<div class="row">
							<div class="col-3 text-start">
								<label for="mo_api_authentication_demo_email" class="form-label mo_rest_api_primary_font mb-0 me-3">Email:</label>
							</div>
							<div class="col">
								<input type="email" class="form-control mt-0" name="mo_api_authentication_demo_email" placeholder="person@example.com" value="<?php echo esc_attr( get_option( 'mo_api_authentication_admin_email' ) ); ?>" aria-required="true" required>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="mb-3 col">
						<div class="row">
							<div class="col-3 text-start">
								<label for="mo_api_authentication_demo_plan" class="form-label mo_rest_api_primary_font mb-0 me-3">Select Premium Plan:</label>
							</div>
							<div class="col">
								<select class="form-select mt-0" name="mo_api_authentication_demo_plan" aria-required="true" required>
									<option disabled >Select a plan</option>
									<option value="miniorange-api-authentication-plugin@40.1.0" seleced>WP API Authentication All-Inclusive Plan</option>
									<option value="Not Sure">Not Sure</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="mb-3 col">
						<div class="row">
							<div class="col-3 text-start">
								<label for="mo_api_authentication_demo_usecase" class="form-label mo_rest_api_primary_font mb-0 me-3">Use Case and Requirements:</label>
							</div>
							<div class="col">
								<textarea type="text" class="form-control mt-0" rows="5" name="mo_api_authentication_demo_usecase" placeholder="Explain your business use case" aria-required="true" required></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="mb-3 col">
						<div class="row">
							<div class="col-3 text-start">
								<label class="form-label mo_rest_api_primary_font mb-0 me-3">Authentication Methods:</label>
							</div>
							<div class="col">
								<div class="form-check d-flex align-items-center">
									<input class="form-check-input" type="checkbox" name="mo_api_authentication_demo_basic_auth">
									<label class="form-check-label mo_rest_api_primary_font" for="mo_api_authentication_demo_basic_auth">
										Basic Authentication
									</label>
								</div>
								<div class="form-check d-flex align-items-center">
									<input class="form-check-input" type="checkbox" name="mo_api_authentication_demo_jwt_auth">
									<label class="form-check-label mo_rest_api_primary_font" for="mo_api_authentication_demo_jwt_auth">
										JWT Authentication
									</label>
								</div>
								<div class="form-check d-flex align-items-center">
									<input class="form-check-input" type="checkbox" name="mo_api_authentication_demo_apikey_auth">
									<label class="form-check-label mo_rest_api_primary_font" for="mo_api_authentication_demo_apikey_auth">
										API Key Authentication
									</label>
								</div>
								<div class="form-check d-flex align-items-center">
									<input class="form-check-input" type="checkbox" name="mo_api_authentication_demo_oauth_auth">
									<label class="form-check-label mo_rest_api_primary_font" for="mo_api_authentication_demo_oauth_auth">
										OAuth 2.0 Authentication
									</label>
								</div>
								<div class="form-check d-flex align-items-center">
									<input class="form-check-input" type="checkbox" name="mo_api_authentication_demo_thirdparty_auth">
									<label class="form-check-label mo_rest_api_primary_font" for="mo_api_authentication_demo_thirdparty_auth">
										Third Party Authentication
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="mb-3 col">
						<div class="row">
							<div class="col-3 text-start">
								<label for="email" class="form-label mo_rest_api_primary_font mb-0 me-3">REST API Endpoints:</label>
							</div>
							<div class="col">
								<div class="form-check d-flex align-items-center">
									<input class="form-check-input" type="checkbox" name="mo_api_authentication_demo_endpoints_wp_rest_api">
									<label class="form-check-label mo_rest_api_primary_font" for="mo_api_authentication_demo_endpoints_wp_rest_api">
										WP REST API
									</label>
								</div>
								<div class="form-check d-flex align-items-center">
									<input class="form-check-input" type="checkbox" name="mo_api_authentication_demo_endpoints_custom_api">
									<label class="form-check-label mo_rest_api_primary_font" for="mo_api_authentication_demo_endpoints_custom_api">
										WP Third Party/Custom APIs
									</label>
								</div>								
							</div>
						</div>
					</div>
				</div>
				<p class="text-muted"><b>Note: </b>You will receive the email shortly with the demo details once you successfully make the demo/trial request. If not received, please check out your spam folder or contact us at <a href="mailto:apisupport@xecurify.com?subject=WP REST API Authentication Plugin - Enquiry">apisupport@xecurify.com</a>.</p>
				<div class="text-center">
					<button id="mo_rest_api_auth_sandbox_btn" type="submit" class="btn btn-sm mo_rest_api_button text-capitalization text-white">Submit Request</button>
				</div>
			</form>
		</div>
			<?php
	}
}
