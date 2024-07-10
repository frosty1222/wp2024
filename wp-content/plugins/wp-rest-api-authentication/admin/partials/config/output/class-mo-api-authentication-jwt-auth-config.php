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
 * [Description Mo_API_Authentication_Jwt_Auth_Config]
 */
class Mo_API_Authentication_Jwt_Auth_Config {

	/**
	 * JWT Authentication Configuration output.
	 *
	 * @return void
	 */
	public static function mo_api_auth_configuration_output() {
		?>
		<div id="mo_api_jwt_authentication_support_layout" class="border border-1 rounded-4 p-3">
			<form method="post">
				<input type="hidden" name="action" id="mo_api_jwtauth_save_config_input" value="Save JWT Auth">
				<div class="d-flex align-items-center gap-3 mb-3 justify-content-between">
					<h5 class="m-0">
						<a class="text-decoration-none" href="admin.php?page=mo_api_authentication_settings&tab=config">Configure Methods</a>
						> JWT Authentication Method
					</h4>
					<div class="d-flex gap-2 text-center">
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="window.location.href='admin.php?page=mo_api_authentication_settings'">Back</button>
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="moJWTAuthenticationMethodSave('save_jwt_auth')">Next</button>
					</div>
				</div>
				<div id="mo_api_authentication_support_basicoauth">
					<p>WordPress REST API - JWT Authentication Method involves the REST APIs access on validation against the JWT token (JSON Web Token) generated based on the user’s username, password using highly secure encryption algorithm.</p>
					<div class="d-flex gap-3 my-4">
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/youtube.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://www.youtube.com/watch?v=XlbSVHR7ohQ" target="_blank" rel="noopener noreferrer">Video Guide</a>
						</div>
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/user-guide.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://plugins.miniorange.com/wordpress-rest-api-jwt-authentication-method#step_1" target="_blank">Setup Guide</a>
						</div>
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/document.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://developers.miniorange.com/docs/rest-api-authentication/wordpress/jwt-authentication" target="_blank">Developer Doc</a>
						</div>
					</div>
					<h6 class="mt-5">Select JWT Token generation types</h6>
					<p class="mb-3 text-muted"><b>Tip: </b>With the current plan of the plugin, by default HS256 Encryption algorithm is configured.</p>
					<div class="container p-0" id="mo_rest_api_jwt_auth_options">
						<div class="row mx-1 gx-2">
							<div class="col me-2 border border-1 p-4 pb-0 mo_rest_api_cursor_pointer rounded-3">
								<div class="d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/guarantee.png" height="30px" width="30px">
									<span class="mo_rest_api_primary_font">Username & Password with Base64 Encoding</span>
								</div>
								<div class="mo_api_auth_premium_label_main" id="mo_api_basicauth_select_type1" class="<?php echo ( ! get_option( 'mo_api_authentication_selected_authentication_method' ) || ( get_option( 'mo_api_authentication_selected_authentication_method' ) === 'basic_auth' && get_option( 'mo_api_authentication_authentication_key' ) === 'uname_pass' ) ) ? 'd-block' : 'd-none'; ?>">
									<img src="<?php echo esc_attr( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/select-all.png" height="25px">
								</div>
							</div>
							<div class="col border border-1 p-4 pb-0 mo_rest_api_cursor_no_drop rounded-3">
								<div class="d-flex flex-column justify-content-center align-items-center gap-2 text-center">
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/secure.png" height="30px" width="30px">
									<span class="mo_rest_api_primary_font">Username & Password with Base64 Encoding</span>
								</div>
								<div class="mo_api_auth_premium_label_main">
									<div class="mo_api_auth_premium_label_internal">
										<p class="mb-0 rounded-1 mo_api_auth_premium_label_text">Premium</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex align-items-center gap-3 mt-5 mb-2">
						<h6 class="m-0">Signing Key/Certificate Configuration</h6>
						<span class="mo_api_auth_inner_premium_label">Premium</span>
					</div>
					<p class="text-muted"><b>Tip: </b>With the current plan of the plugin, by default a randomly generated secret key will be used.</p>
					<textarea class="form-control" rows="8" placeholder="Configure your certificate or secret key" disabled></textarea>
				</div>
			</form>
		</div>
		<div class="d-none border border-1 rounded-4 p-3" id="mo_api_jwtauth_finish">
			<form method="post" id="mo-api-jwt-authentication-method-form">
				<input required type="hidden" name="option" value="mo_api_jwt_authentication_config_form" />
				<?php wp_nonce_field( 'mo_api_jwt_authentication_method_config', 'mo_api_jwt_authentication_method_config_fields' ); ?>	
				<div class="d-flex align-items-center gap-3 mb-3 justify-content-between">
					<h5 class="m-0">
						<a class="text-decoration-none" href="admin.php?page=mo_api_authentication_settings&tab=config">Configure Methods</a>
						> JWT Authentication Method
					</h4>
					<div class="d-grid gap-2 d-md-block text-center">
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="moJWTAuthenticationMethodBack()">Back</button>
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="submit" onclick="moJWTAuthenticationMethodFinish()">Finish</button>
					</div>
				</div>
				<div id="mo_api_basicauth_client_creds">
					<div class="border border-1 rounded-3 p-3">
						<h6>Configuration Overview</h6>
						<div class="pt-3">
							<div class="row">
								<div class="col-4">
									<p class="mo_rest_api_primary_font">JWT Token Generation Algorithm:</p>
								</div>
								<div class="col">
									<p class="mo_rest_api_primary_font"><b>HS256</b></p>
								</div>
							</div>
						</div>
					</div>
					<div class="border border-1 rounded-3 p-3 mt-2">
						<h6>Test Configuration</h6>
						<div id="mo_api_authentication_jwt_test_config" class="mt-4">
							<div>
								<h6>1. Get User Token from the Token Endpoint:</h6>
								<div class="row mt-3">
									<div class="col mb-3">
										<label for="mo_rest_api_jwt_username" class="form-label mo_rest_api_primary_font">Username</label>
										<input type="text" class="form-control mo_test_config_input" id="mo_rest_api_jwt_username">
									</div>
									<div class="col mb-3">
										<label for="mo_rest_api_jwt_password" class="form-label mo_rest_api_primary_font">Password</label>
										<span id="mo_api_auth_test_password">
											<input type="password" class="form-control mo_test_config_input" id="mo_rest_api_jwt_password">
											<i class="fa fa-fw fa-eye-slash" id="mo_api_jwt_eye_show_hide" aria-hidden="true" onclick="mo_rest_api_display_jwt_auth_password()"></i>
										</span>
									</div>
								</div>
								<label for="" class="mo_rest_api_primary_font">Token Endpoint:</label>
								<div class="row mt-2">
									<div class="col-2">
										<button type="button" class="btn mo_rest_api_postman_bg fw-bold w-100 text-white">POST</button>
									</div>
									<div class="col p-0">
										<input class="form-control mo_test_config_input w-100" type="text" name="rest_token_endpoint" id="rest_token_endpoint" value="<?php echo esc_url( get_rest_url() ) . 'api/v1/token'; ?>" aria-readonly="true" readonly>
									</div>
								</div>
								<div class="d-grid justify-content-center my-3">
									<button type="button" class="btn btn-sm text-white mo_rest_api_button" onclick="mo_JWT_test_config('token')" value="Fetch Token">Fetch Token</button>
								</div>
								<h6 id="jwt_token_response_text" class="d-none mt-3">Response</h6>
								<pre id="json_jwt_token" class="mo_test_config_response d-none"></pre>
								<h6 id="jwt_token_troubleshoot_text" class="d-none align-items-center gap-2 mt-3">
									<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/trouble_2.png" height="15px">
									<span>TroubleShoot</span>
								</h6>
								<pre id="json_jwt_token_troubleshoot" class="d-none pt-3 text-wrap mo_test_config_response"></pre>
							</div>
							<div>
								<h6>2. Check if token is valid:</h6>
								<div class="row mt-3">
									<div class="col mb-3">
										<label for="rest_token_value" class="form-label mo_rest_api_primary_font">Token</label>
										<input type="text" class="form-control mo_test_config_input" id="rest_token_value" placeholder="Enter JWT Token">
									</div>
								</div>
								<label for="" class="mo_rest_api_primary_font">Token Validation Endpoint:</label>
								<div class="row mt-2">
									<div class="col-2">
										<button type="button" class="btn btn-success fw-bold w-100">GET</button>
									</div>
									<div class="col p-0">
										<input class="form-control mo_test_config_input w-100" type="text" name="rest_validate_endpoint" id="rest_validate_endpoint" value="<?php echo esc_url( get_rest_url() ) . 'api/v1/token-validate'; ?>" aria-readonly="true" readonly>
									</div>
								</div>
								<div class="d-grid justify-content-center my-3">
									<button type="button" class="btn btn-sm text-white mo_rest_api_button" onclick="mo_JWT_test_config('validate')" value="Check Token">Check Token</button>
								</div>
								<h6 id="jwt_token_validate_response_text" class="d-none mt-3">Response</h6>
								<pre id="json_jwt_token_validate" class="mo_test_config_response d-none"></pre>
								<h6 id="jwt_token_validate_text" class="d-none align-items-center gap-2 mt-3">
									<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/trouble_2.png" height="15px">
									<span>TroubleShoot</span>
								</h6>
								<pre id="json_jwt_token_validate_troubleshoot" class="pt-3 text-wrap mo_test_config_response"></pre>
							</div>
							<div>
								<h6>3. Access the protected REST APIs by using the jwt_token obtained from above Step 1:</h6>
								<div class="row mt-3">
									<div class="col mb-3">
										<label for="rest_jwt_token" class="form-label mo_rest_api_primary_font">Token</label>
										<input type="text" class="form-control mo_test_config_input" id="rest_jwt_token" placeholder="Enter JWT Token">
									</div>
								</div>
								<label for="" class="mo_rest_api_primary_font">REST API Endpoint:</label>
								<div class="row mt-2">
									<div class="col-2">
										<button type="button" class="btn btn-success fw-bold w-100">GET</button>
									</div>
									<div class="col p-0">
										<input class="form-control mo_test_config_input w-100" type="text" name="rest_endpoint_jwt_auth" id="rest_endpoint_jwt_auth" value="<?php echo esc_url( get_rest_url() ) . 'wp/v2/posts'; ?>" aria-readonly="true" readonly>
									</div>
								</div>
								<div class="d-grid justify-content-center my-3">
									<button type="button" class="btn btn-sm text-white mo_rest_api_button" onclick="mo_JWT_test_config('rest')" value="Test Configuration">Test Configuration</button>
								</div>
								<div id="mo_api_jwt_auth_message">
									<p class="mo_api_auth_note"><strong><i>Note: </i></strong>The Test has been done successfully. Please click on <strong>"Finish"</strong> button on the top right corner of the screen to save the authentication method.</p>
								</div>
								<h6 id="jwt_token_req_headers_text" class="d-none mt-3">Request Headers</h6>
								<div id="jwt_token_request_headers" class='mo_request_header_jwt_auth'>
									<div>
										<span class='mo_test_config_key text-wrap'>Authorization </span>
										<span class='mo_test_config_string text-wrap'>Bearer </span>
										<span class='mo_test_config_key_string text-wrap' id='jwt_request_headers_value'></span>
									</div>
								</div>
								<h6 id="jwt_token_api_response_text" class="d-none mt-3">Response</h6>
								<pre id="json_jwt" class="mo_test_config_response"></pre>
								<h6 id="data_display_text" class="d-none align-items-center gap-2 mt-3">
									<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/trouble_2.png" height="15px">
									<span>TroubleShoot</span>
								</h6>
								<pre id="data_display_troubleshoot" class="pt-3 text-wrap mo_test_config_response"></pre>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<script>
			var token_endpoint_obj = document.getElementById('rest_token_endpoint');
			token_endpoint_obj.style.width = ((token_endpoint_obj.value.length + 1) * 7) + 'px';
			var token_endpoint_obj = document.getElementById('rest_validate_endpoint');
			token_endpoint_obj.style.width = ((token_endpoint_obj.value.length + 1) * 7) + 'px';
			var token_endpoint_obj = document.getElementById('rest_endpoint_jwt_auth');
			token_endpoint_obj.style.width = ((token_endpoint_obj.value.length + 1) * 7) + 'px';			
			function MO_RAO_append_params_jwt( endpoint, params ) {
				regex             = /.+\?.+=.+/i;
				regex1            = /.+\?/;
				if ( true == regex.test( endpoint ) ) { // URL already contains params.
					endpoint = endpoint + '&' + params;
				} else if ( true == regex1.test( endpoint ) ) { // URL contains "?" but no params.
					endpoint = endpoint + params;
				} else { // URL doesn't contains "?" and params.
					endpoint = endpoint + '?' + params;
				}
				return endpoint;
			}

			function moJWTAuthenticationMethodSave(action){
				div = document.getElementById('mo_api_jwt_authentication_support_layout');
				div.classList.add("d-none");
				div2 = document.getElementById('mo_api_jwtauth_finish');
				div2.classList.remove("d-none");
				div2.classList.add("d-block");
				document.getElementById('basic_authentication_finish_stepper').classList.add('completed');
			}

			function moJWTAuthenticationMethodFinish(){
				document.getElementById("mo-api-jwt-authentication-method-form").submit();
			}

			function moJWTAuthenticationMethodBack(){
				div = document.getElementById('mo_api_jwt_authentication_support_layout');
				div.classList.remove("d-none");
				div.classList.add("d-block");
				div2 = document.getElementById('mo_api_jwtauth_finish');
				div2.classList.add("d-none");
				document.getElementById('basic_authentication_finish_stepper').classList.remove('completed');
			}


			function mo_JWT_test_config(event) {
				if(event === 'token') {
					var token_endpoint = document.getElementById("rest_token_endpoint").value;
					var username = document.getElementById("mo_rest_api_jwt_username").value;
					var password = document.getElementById("mo_rest_api_jwt_password").value;
					var myHeaders = new Headers();

					var formdata = new FormData();
					formdata.append("username", username);
					formdata.append("password", password);

					var requestOptions = {
						method: 'POST',
						credentials: 'include',
						headers: myHeaders,
						body: formdata,
						redirect: 'follow'
					};

					fetch(token_endpoint, requestOptions)
					.then(response => response.text())
					.then(result => moJWTdisplay_jwt_data(result))
					.catch(error => console.log('error', error));
				}
				else if(event === "validate"){
					var validate_endpoint = document.getElementById("rest_validate_endpoint").value;
					var token_val = document.getElementById("rest_token_value").value;

					var myHeaders = new Headers();
					myHeaders.append('Content-Type', 'application/json');
					myHeaders.append('Authorization','Bearer '+ token_val);

					var requestOptions = {
						method: 'GET',
						headers: myHeaders,
						redirect: 'follow'
					};

					validate_endpoint = MO_RAO_append_params_jwt( validate_endpoint, 'mo_rest_api_test_config=jwt_auth');

					fetch(validate_endpoint, requestOptions)
					.then(response => response.text())
					.then(result => moJWTdisplay_token_val_data(result))
					.catch(error => console.log('error', error));

				}
				else {
					var token = document.getElementById("rest_jwt_token").value;
					var endpoint = document.getElementById("rest_endpoint_jwt_auth").value;

					var myHeaders = new Headers();

					myHeaders.append("Authorization", "Bearer "+token);
					document.getElementById("jwt_request_headers_value").textContent = token;

					var requestOptions = {
						method: 'GET',
						headers: myHeaders,
						redirect: 'follow'
					};
					endpoint = MO_RAO_append_params_jwt( endpoint, 'mo_rest_api_test_config=jwt_auth' );

					fetch(endpoint, requestOptions)
					.then(response => response.text())
					.then(result => moJWTdisplay_data(result))
					.catch(error => console.log('error', error));
				}
			}

			var container = document.getElementById("mo_api_authentication_jwt_test_config");

			function moJWTdisplay_jwt_data(result) {
				var data = JSON.parse(result);
				var json = JSON.stringify(data, undefined, 4);
				moJWToutput(moJWTsyntaxHighlight(json), 'token');
				document.getElementById("json_jwt_token").classList.remove("d-none");
				document.getElementById("json_jwt_token").classList.add("d-block");
				document.getElementById("jwt_token_response_text").classList.remove("d-none");
				document.getElementById("jwt_token_response_text").classList.add("d-block");
				container.scrollTo({
					top: document.getElementById("jwt_token_response_text").offsetTop - container.offsetTop,
					behavior: "smooth"
				});
				if(data.error)
					moJWTtroubleshootPrintJWT(data.error , 'token');
				else
					moJWTtroubleshootHideJWT('token');
			}
			function moJWTdisplay_token_val_data(result) {
				var data = JSON.parse(result);
				var json = JSON.stringify(data, undefined, 4);
				moJWToutput(moJWTsyntaxHighlight(json), 'validate');
				document.getElementById("json_jwt_token_validate").classList.remove("d-none");
				document.getElementById("json_jwt_token_validate").classList.add("d-block");
				document.getElementById("jwt_token_validate_response_text").classList.remove("d-none");
				document.getElementById("jwt_token_validate_response_text").classList.add("d-block");
				container.scrollTo({
					top: document.getElementById("jwt_token_validate_response_text").offsetTop - container.offsetTop,
					behavior: "smooth"
				});
				if(data.error)
					moJWTtroubleshootPrintJWT(data.error , 'valid');
				else
					moJWTtroubleshootHideJWT('valid');
			}
			function moJWTtroubleshootHideJWT(place){
				if(place === "token"){
					document.getElementById("json_jwt_token_troubleshoot").classList.remove("d-flex");
					document.getElementById("json_jwt_token_troubleshoot").classList.add("d-none");
					document.getElementById("jwt_token_troubleshoot_text").classList.remove("d-flex");
					document.getElementById("jwt_token_troubleshoot_text").classList.add("d-none");
				}
				else if(place === "valid"){
					document.getElementById("json_jwt_token_validate_troubleshoot").classList.remove("d-flex");
					document.getElementById("json_jwt_token_validate_troubleshoot").classList.add("d-none");
					document.getElementById("jwt_token_validate_text").classList.remove("d-flex");
					document.getElementById("jwt_token_validate_text").classList.add("d-none");
				}
				else{
					document.getElementById("data_display_troubleshoot").classList.remove("d-flex");
					document.getElementById("data_display_troubleshoot").classList.add("d-none");
					document.getElementById("data_display_text").classList.remove("d-flex");
					document.getElementById("data_display_text").classList.add("d-none");
				}
			}
			function moJWTtroubleshootPrintJWT(err,place){
				if(err === "INVALID_CREDENTIALS")
				{
					document.getElementById("json_jwt_token_troubleshoot").innerHTML = `<ul style="list-style: inside;"><li>Check if username and password entered are correct. If yes, make sure that, the password does not consists of special characters.</li><li>Make sure that you are using WordPress username and not email, as JWT Authentication with email and password is available with the Premium plan only.</li></ul>`;
					document.getElementById("json_jwt_token_troubleshoot").classList.remove("d-none");
					document.getElementById("json_jwt_token_troubleshoot").classList.add("d-flex");
					document.getElementById("jwt_token_troubleshoot_text").classList.remove("d-none");
					document.getElementById("jwt_token_troubleshoot_text").classList.add("d-flex");

				}
				else if(err === "BAD_REQUEST")
				{
					document.getElementById("json_jwt_token_troubleshoot").innerHTML = 'Username or Password is missing.';
					document.getElementById("json_jwt_token_troubleshoot").classList.remove("d-none");
					document.getElementById("json_jwt_token_troubleshoot").classList.add("d-flex");
					document.getElementById("jwt_token_troubleshoot_text").classList.remove("d-none");
					document.getElementById("jwt_token_troubleshoot_text").classList.add("d-flex");

				}
				else if(err === "SEGMENT_FAULT")
				{
					if(place === "valid"){
						document.getElementById("json_jwt_token_validate_troubleshoot").innerHTML = 'JWT token you entered is of invalid format re-enter it properly.';
						document.getElementById("json_jwt_token_validate_troubleshoot").classList.remove("d-none");
						document.getElementById("json_jwt_token_validate_troubleshoot").classList.add("d-flex");
						document.getElementById("jwt_token_validate_text").classList.remove("d-none");
						document.getElementById("jwt_token_validate_text").classList.add("d-flex");
						}
					else{
						document.getElementById("data_display_troubleshoot").innerHTML = 'JWT token you entered is of invalid format re-enter it properly.';
						document.getElementById("data_display_troubleshoot").classList.remove("d-none");
						document.getElementById("data_display_troubleshoot").classList.add("d-flex");
						document.getElementById("data_display_text").classList.remove("d-none");
						document.getElementById("data_display_text").classList.add("d-flex");
						}
				}
				else if(err === "INVALID_PASSWORD")
				{
					document.getElementById("json_jwt_token_validate_troubleshoot").innerHTML = '';
					document.getElementById("json_jwt_token_validate_troubleshoot").classList.remove("d-none");
					document.getElementById("json_jwt_token_validate_troubleshoot").classList.add("d-flex");
					document.getElementById("jwt_token_validate_text").classList.remove("d-none");
					document.getElementById("jwt_token_validate_text").classList.add("d-flex");

				}
				else if(err === "MISSING_AUTHORIZATION_HEADER")
				{

					if(place === "valid"){
						document.getElementById("json_jwt_token_validate_troubleshoot").innerHTML = '<ul style="list-style: inside;"><li>Verify if you have added necessary headers.</li><li>Add below lines to your htaccess file(Apache server)</li><ul style="padding-inline-start: 19px;"><li>RewriteEngine On &NewLine;RewriteCond %{HTTP:Authorization} ^(.*) &NewLine;RewriteRule .* - [e=HTTP_AUTHORIZATION:%1]</li></ul><li>Add below lines to your config file(NGINX server)</li><ul style="padding-inline-start: 19px;"><li>add_header Access-Control-Allow-Headers "Authorization";</li></ul></ul>';
						document.getElementById("json_jwt_token_validate_troubleshoot").classList.remove("d-none");
						document.getElementById("json_jwt_token_validate_troubleshoot").classList.add("d-flex");
						document.getElementById("jwt_token_validate_text").classList.remove("d-none");
						document.getElementById("jwt_token_validate_text").classList.add("d-flex");

					}
					else{
						document.getElementById("data_display_troubleshoot").innerHTML = '<ul style="list-style: inside;"><li>Verify if you have added necessary headers.</li><li>Add below lines to your htaccess file(Apache server)</li><ul style="padding-inline-start: 19px;"><li>RewriteEngine On &NewLine;RewriteCond %{HTTP:Authorization} ^(.*) &NewLine;RewriteRule .* - [e=HTTP_AUTHORIZATION:%1]</li></ul><li>Add below lines to your config file(NGINX server)</li><ul style="padding-inline-start: 19px;"><li>add_header Access-Control-Allow-Headers "Authorization";</li></ul></ul>';
						document.getElementById("data_display_troubleshoot").classList.remove("d-none");
						document.getElementById("data_display_troubleshoot").classList.add("d-flex");
						document.getElementById("data_display_text").classList.remove("d-none");
						document.getElementById("data_display_text").classList.add("d-flex");

					}
				}
				else if(err === "INVALID_AUTHORIZATION_HEADER_TOKEN_TYPE")
				{
					if(place === "valid"){
						document.getElementById("json_jwt_token_validate_troubleshoot").innerHTML = 'JWT token is missing check the JWT token field.';
						document.getElementById("json_jwt_token_validate_troubleshoot").classList.remove("d-none");
						document.getElementById("json_jwt_token_validate_troubleshoot").classList.add("d-flex");
						document.getElementById("jwt_token_validate_text").classList.remove("d-none");
						document.getElementById("jwt_token_validate_text").classList.add("d-flex");

					}
					else{
						document.getElementById("data_display_troubleshoot").innerHTML = 'JWT token is missing check the JWT token field.';
						document.getElementById("data_display_troubleshoot").classList.remove("d-none");
						document.getElementById("data_display_troubleshoot").classList.add("d-flex");
						document.getElementById("data_display_text").classList.remove("d-none");
						document.getElementById("data_display_text").classList.add("d-flex");

					}
				}
				else if(err === "UNAUTHORIZED")
				{
					if(place === "valid"){
						document.getElementById("json_jwt_token_validate_troubleshoot").innerHTML = `<ul style="list-style: inside;"><li>JWT token entered is either expired or is of different authorization flow.</li><li>Regenrate JWT token and copy past it properly.</li></ul>`;
						document.getElementById("json_jwt_token_validate_troubleshoot").classList.remove("d-none");
						document.getElementById("json_jwt_token_validate_troubleshoot").classList.add("d-flex");
						document.getElementById("jwt_token_validate_text").classList.remove("d-none");
						document.getElementById("jwt_token_validate_text").classList.add("d-flex");

					}
					else{
						document.getElementById("data_display_troubleshoot").innerHTML = `<ul style="list-style: inside;"><li>JWT token entered is either expired or is of different authorization flow.</li><li>Regenrate JWT token and copy past it properly.</li></ul>`;
						document.getElementById("data_display_troubleshoot").classList.remove("d-none");
						document.getElementById("data_display_troubleshoot").classList.add("d-flex");
						document.getElementById("data_display_text").classList.remove("d-none");
						document.getElementById("data_display_text").classList.add("d-flex");

					}
				}
				document.querySelector("#mo_api_jwt_auth_message .mo_api_auth_note ").innerHTML = '<strong><i>Note: </i></strong>You are currently in the testing mode and this authentication method is not yet enabled on your site. Please click on <strong>"Finish"</strong> button on the top right corner of the screen to save the authentication method.';
				document.querySelector("#mo_api_jwt_auth_message .mo_api_auth_note").style.display = "block";
			}


			function moJWToutput(inp, endpoint) {
				// document.body.appendChild(document.createElement('pre')).innerHTML = inp;
				if( endpoint === 'wp_rest_api') {
					document.getElementById("json_jwt").innerHTML = inp;
				}

				else if(endpoint === "token"){
					document.getElementById("json_jwt_token").innerHTML = inp;
				}
				else{
					document.getElementById("json_jwt_token_validate").innerHTML = inp;
				}
			}

			function moJWTsyntaxHighlight(json) {
				json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
				return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
					var cls = 'mo_test_config_number';
					if (/^"/.test(match)) {
						if (/:$/.test(match)) {
							cls = 'mo_test_config_key';
						} else {
							cls = 'mo_test_config_string text-wrap';
						}
					} else if (/true|false/.test(match)) {
						cls = 'mo_test_config_boolean';
					} else if (/null/.test(match)) {
						cls = 'mo_test_config_null';
					}
					return '<span class="' + cls + '">' + match + '</span>';
				});
			}

			function moJWTdisplay_data(result) {
				var data = JSON.parse(result);
				var json = JSON.stringify(data, undefined, 4);
				document.getElementById("json_jwt").classList.remove("d-none");
				document.getElementById("json_jwt").classList.add("d-block");
				document.getElementById("jwt_token_req_headers_text").classList.remove("d-none");
				document.getElementById("jwt_token_req_headers_text").classList.add("d-block");
				document.getElementById("jwt_token_request_headers").classList.remove("d-none");
				document.getElementById("jwt_token_request_headers").classList.add("d-block");
				document.getElementById("jwt_token_api_response_text").classList.remove("d-none");
				document.getElementById("jwt_token_api_response_text").classList.add("d-block");
				container.scrollTo({
					top: document.getElementById("jwt_token_api_response_text").offsetTop - container.offsetTop,
					behavior: "smooth"
				});
				document.querySelector("#mo_api_jwt_auth_message .mo_api_auth_note ").innerHTML = '<strong><i>Note: </i></strong>The Test has been done successfully. Please click on <strong>"Finish"</strong> button on the top right corner of the screen to save the authentication method.';
				document.querySelector("#mo_api_jwt_auth_message .mo_api_auth_note").classList.remove("d-none");
				document.querySelector("#mo_api_jwt_auth_message .mo_api_auth_note").classList.add("d-block");
				moJWToutput(moJWTsyntaxHighlight(json), 'wp_rest_api');
				if(data.error)
					moJWTtroubleshootPrintJWT(data.error , 'wp_rest_api');
				else
					moJWTtroubleshootHideJWT('wp_rest_api');

			}

			function mo_rest_api_display_jwt_auth_password() {
				var field = document.getElementById("mo_rest_api_jwt_password");
				var showButton = document.getElementById("mo_api_jwt_eye_show_hide");
				if (field.type == "password") {
					field.type = "text";
					showButton.className = "fa fa-eye";
				} else {
					field.type = "password";
					showButton.className = "fa fa-eye-slash";
				}
			}
		</script>
		<?php
	}
}
