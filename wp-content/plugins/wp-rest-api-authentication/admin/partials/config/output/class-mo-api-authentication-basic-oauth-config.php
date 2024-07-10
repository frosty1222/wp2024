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
 * [Basic Auth Configuration]
 */
class Mo_API_Authentication_Basic_Oauth_Config {

	/**
	 * Basic Authentication Configuration output.
	 *
	 * @return void
	 */
	public static function mo_api_auth_configuration_output() {
		?>
		<div id="mo_api_basic_authentication_support_layout" class="border border-1 rounded-4 p-3">
			<form method="post">
				<input type="hidden" name="action" id="mo_api_basicauth_save_config_input" value="Save Basic Auth">
				<div class="d-flex align-items-center gap-3 mb-3 justify-content-between">
					<h5 class="m-0">
						<a class="text-decoration-none" href="admin.php?page=mo_api_authentication_settings&tab=config">Configure Methods</a>
						> Basic Authentication Method
					</h4>
					<div class="d-flex gap-2 text-center">
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="window.location.href='admin.php?page=mo_api_authentication_settings'">Back</button>
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="moBasicAuthenticationMethodSave('save_basic_auth')">Next</button>
					</div>
				</div>
				<div id="mo_api_authentication_support_basicoauth">
					<p>WordPress REST API - Basic Authentication Method involves the REST APIs access on validation against the API token generated based on the user’s username, password and on basis of client credentials.</p>
					<div class="d-flex gap-3 my-4">
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/youtube.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://www.youtube.com/watch?v=vwxkpuj7LCw" target="_blank" rel="noopener noreferrer">Video Guide</a>
						</div>
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/user-guide.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://plugins.miniorange.com/wordpress-rest-api-basic-authentication-method#step_1" target="_blank">Setup Guide</a>
						</div>
						<div class="d-flex justify-content-between align-items-center gap-1 border border-1 rounded-2 p-1">
							<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/document.png" height="25px" width="25px">
							<a class="btn btn-sm text-decoration-none text-black" href="https://developers.miniorange.com/docs/rest-api-authentication/wordpress/basic-authentication" target="_blank">Developer Doc</a>
						</div>
					</div>
					<h6 class="my-3 mt-5">Select One of the below Basic Token generation types</h6>
					<div class="container p-0" id="mo_rest_api_basic_auth_options">
						<div class="row gx-3">
							<div class="col-6 mo_rest_api_cursor_pointer">
								<div class="p-4 border border-1 rounded-3">
									<div class="d-flex flex-column justify-content-center align-items-center gap-2 text-center" onclick="moBasicAuthenticationClienCreds('uname_pass')">
										<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/guarantee.png" height="30px" width="30px">
										<span class="mo_rest_api_primary_font">Username & Password with Base64 Encoding</span>
									</div>
									<div class="mo_api_auth_premium_label_main" id="mo_api_basicauth_select_type1" class="<?php echo ( ! get_option( 'mo_api_authentication_selected_authentication_method' ) || ( get_option( 'mo_api_authentication_selected_authentication_method' ) === 'basic_auth' && get_option( 'mo_api_authentication_authentication_key' ) === 'uname_pass' ) ) ? 'd-block' : 'd-none'; ?>">
										<img class="position-relative" src="<?php echo esc_attr( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/select-all.png" height="25px">
									</div>
								</div>
							</div>
							<div class="col-6 mo_rest_api_cursor_no_drop">
								<div class="p-4 border border-1 rounded-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center" onclick="moBasicAuthenticationClienCreds('uname_pass')">
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/user-authentication.png" height="30px" width="30px">
									<span class="mo_rest_api_primary_font">Username & Password with HMAC Validation</span>
								</div>
								<div class="mo_api_auth_premium_label_main">
									<div class="mo_api_auth_premium_label_internal">
										<p class="me-4 mb-0 rounded-1 mo_api_auth_premium_label_text">Premium</p>
									</div>
								</div>
							</div>
							<div class="col-6 mo_rest_api_cursor_no_drop">
								<div class="p-4 border border-1 rounded-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center" onclick="moBasicAuthenticationClienCreds('cid_secret')">
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/key.png" height="30px" width="30px">
									<span class="mo_rest_api_primary_font">Username & Password with Base64 Encoding</span>
								</div>
								<div class="mo_api_auth_premium_label_main">
									<div class="mo_api_auth_premium_label_internal">
										<p class="me-4 mb-0 rounded-1 mo_api_auth_premium_label_text">Premium</p>
									</div>
								</div>
							</div>
							<div class="col-6 mo_rest_api_cursor_no_drop">
								<div class="p-4 border border-1 rounded-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center" onclick="moBasicAuthenticationClienCreds('cid_secret')">
									<img src="<?php echo esc_url( plugin_dir_url( dirname( dirname( __DIR__ ) ) ) ); ?>/images/secure.png" height="30px" width="30px">
									<span class="mo_rest_api_primary_font">Username & Password with Base64 Encoding</span>
								</div>
								<div class="mo_api_auth_premium_label_main">
									<div class="mo_api_auth_premium_label_internal">
										<p class="me-4 mb-0 rounded-1 mo_api_auth_premium_label_text">Premium</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="d-none border border-1 rounded-4 p-3" id="mo_api_basicauth_finish">
			<form method="post" id="mo-api-basic-authentication-method-form">
				<input required type="hidden" name="option" value="mo_api_basic_authentication_config_form" />
				<input type="hidden" name="action" id="mo_api_auth_save_config_input" value="Save Configuration">
				<?php wp_nonce_field( 'mo_api_basic_authentication_method_config', 'mo_api_basic_authentication_method_config_fields' ); ?>
				<div class="d-flex align-items-center gap-3 mb-3 justify-content-between">
					<h5 class="m-0">
						<a class="text-decoration-none" href="admin.php?page=mo_api_authentication_settings&tab=config">Configure Methods</a>
						> Basic Authentication Method
					</h4>
					<div class="d-grid gap-2 d-md-block text-center">
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="moBasicAuthenticationMethodBack()">Back</button>
						<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="submit" onclick="moBasicAuthenticationMethodFinish()">Finish</button>
					</div>
				</div>
				<div id="mo_api_basicauth_client_creds">
					<div class="border border-1 rounded-3 p-3">
						<h6>Configuration Overview</h6>
						<div class="pt-3">
							<div class="row">
								<div class="col-3">
									<p>Token Credentials Type:</p>
								</div>
								<div class="col">
									<p><b>WordPress Username & Password</b></p>
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<p>Token Encryption Type Type:</p>
								</div>
								<div class="col">
									<p><b>Base 64 Encoding</b></p>
								</div>
							</div>
						</div>
					</div>
					<div class="border border-1 rounded-3 mt-2 p-3">
						<h6>Test Configuration</h6>
						<div id="mo_api_authentication_basic_test_config">
							<div class="row mt-3">
								<div class="col mb-3">
									<label for="mo_rest_api_basic_auth_username" class="form-label mo_rest_api_primary_font">Username</label>
									<input type="text" class="form-control mo_test_config_input" id="mo_rest_api_basic_auth_username">
								</div>
								<div class="col mb-3">
									<label for="mo_rest_api_rest_basic_auth_password" class="form-label mo_rest_api_primary_font">Password</label>
									<span id="mo_api_auth_test_password">
										<input type="password" class="form-control mo_test_config_input" id="mo_rest_api_rest_basic_auth_password">
										<i class="fa fa-fw fa-eye-slash" id="mo_api_basic_eye_show_hide" aria-hidden="true" onclick="mo_rest_api_display_basic_auth_password()"></i>
									</span>
								</div>
							</div>
							<label for="" class="mo_rest_api_primary_font">REST API Endpoint:</label>
							<div class="row mt-3">
								<div class="col-2">
									<button type="button" class="btn btn-success fw-bold w-100">GET</button>
								</div>
								<div class="col p-0">
									<input class="form-control mo_test_config_input w-100" type="text" name="rest_basic_auth_endpoint" id="rest_basic_auth_endpoint" value="<?php echo esc_html( get_rest_url() ) . 'wp/v2/posts'; ?>" placeholder="Enter REST API Endpoint">
								</div>
							</div>
							<div class="d-grid justify-content-center my-3">
								<button type="button" class="btn btn-sm text-white mo_rest_api_button" onclick="mo_rest_api_JWTtest_config_basic_auth()">Test Configuration</button>
							</div>
							<div id="mo_api_basic_auth_message">
								<p class="mo_api_auth_note"><strong><i>Note: </i></strong>The Test has been done successfully. Please click on <strong>"Finish"</strong> button on the top right corner of the screen to save the authentication method.</p>
							</div>
							<h6 id="basic_auth_req_headers_text" class="d-none mt-3">Request Headers</h6>
							<div id="basic_auth_request_headers" class='mo_request_header_basic_auth d-none'>
								<div>
									<span class='mo_test_config_key text-wrap'>Authorization </span>
									<span class='mo_test_config_string text-wrap'>Basic </span>
									<span class='mo_test_config_key_string text-wrap' id='basic_auth_request_headers_value'></span>
								</div>
							</div>
							<h6 id="basic_auth_response_text" class="d-none mt-3">Response</h6>
							<pre id="json_basic_auth" class="mo_test_config_response d-none"></pre>
							<h6 id="basic_display_text" class="d-none align-items-center gap-2 mt-3">
								<img src="<?php echo esc_url( dirname( plugin_dir_url( __FILE__ ) ) ); ?>/images/trouble_2.png" height="15px">
								<span>TroubleShoot</span>
							</h6>
							<pre id="basic_display_troubleshoot" class="pt-3 text-wrap mo_test_config_response"></pre>
						</div>
					</div>
				</div>
			</form>
		</div>

		<script>
			var rest_basic_auth_endpoint_obj = document.getElementById('rest_basic_auth_endpoint');
			rest_basic_auth_endpoint_obj.style.width = ((rest_basic_auth_endpoint_obj.value.length + 1) * 7) + 'px';

			function MO_RAO_append_params_basic( endpoint, params ) {
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

			function moBasicAuthenticationMethodSave(action){

				var data = {
					'action': 'save_temporary_data',
					'auth_method' : 'basic_auth',
					'algo' : 'base64',
					'token_type' : localStorage.getItem('mo_api_basic_token_type'),
					'nonce': '<?php echo esc_attr( wp_create_nonce( 'mo_rest_api_temporal_data_nonce' ) ); ?>'
				};			

				jQuery.post(ajaxurl, data);

				div = document.getElementById('mo_api_basic_authentication_support_layout');
				div.classList.add("d-none");
				div2 = document.getElementById('mo_api_basicauth_finish');
				div2.classList.remove("d-none");
				div2.classList.add("d-block")

				document.getElementById('basic_authentication_finish_stepper').classList.add('completed');
				document.getElementById('basic_authentication_finish_stepper').classList.remove('d-none');
				document.getElementById('basic_authentication_finish_stepper').classList.add('d-flex');


				if(localStorage.getItem('mo_api_basic_token_type') == 'uname_pass' || localStorage.getItem('mo_api_basic_token_type') == ''){
					document.getElementById('mo_api_basicauth_token_type').innerHTML = 'WordPress Username & Password';
				}
				else{
					document.getElementById('mo_api_basicauth_token_type').innerHTML = 'Client ID & Secret';
				}
			}

			function moBasicAuthenticationMethodFinish(){
				document.getElementById("mo-api-basic-authentication-method-form").submit();
			}

			function moBasicAuthenticationMethodBack(){
				div = document.getElementById('mo_api_basic_authentication_support_layout');
				div.classList.remove("d-none");
				div.classList.add("d-block");
				div2 = document.getElementById('mo_api_basicauth_finish');
				div2.classList.add("d-none");
				document.getElementById('basic_authentication_finish_stepper').classList.remove('completed');
				document.getElementById('basic_authentication_finish_stepper').classList.remove('d-none');
				document.getElementById('basic_authentication_finish_stepper').classList.add('d-flex');
			}

			function moBasicAuthenticationClienCreds(type){
				div = document.getElementById('mo_api_basicauth_select_type1');
				div2 = document.getElementById('mo_api_basicauth_select_type2');

				if(type == 'cid_secret'){
					div.classList.remove("d-block");
					div.classList.add("d-none");
					div2.classList.remove("d-none");
					div2.classList.add("d-block");
				}
				else{
					div.classList.remove("d-none");
					div.classList.add("d-block");
					if(div2 != null){
							div2.classList.remove("d-block");
						div2.classList.add("d-none");
					}
				}

				localStorage.setItem('mo_api_basic_token_type', type);
			}

			function mo_rest_api_JWTtest_config_basic_auth() {
				var username = document.getElementById("mo_rest_api_basic_auth_username").value;
				var password = document.getElementById("mo_rest_api_rest_basic_auth_password").value;

				var b64string = username+":"+password;
				var b64string = btoa(unescape(encodeURIComponent(b64string)));

				if( b64string != 'Og==') {
					document.getElementById("basic_auth_request_headers_value").textContent = b64string;
				}

				var endpoint = document.getElementById("rest_basic_auth_endpoint").value;

				var myHeaders = new Headers();
				myHeaders.append("Authorization", "Basic "+b64string);
				var requestOptions = {
					method: 'GET',
					headers: myHeaders,
					redirect: 'follow'
				};

				endpoint = MO_RAO_append_params_basic( endpoint, 'mo_rest_api_test_config=basic_auth' );

				fetch(endpoint, requestOptions)
				.then(response => response.text())
				.then(result => mo_rest_api_display_basic_auth_data(result))
				.catch(error => console.log('error', error));
			}

			function mo_rest_api_output_basic_auth(inp) {
				document.getElementById("json_basic_auth").innerHTML = inp;
			}

			function mo_rest_api_syntaxHighlight_basic_auth(json) {
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

			function mo_rest_api_display_basic_auth_data(result) {
				var data = JSON.parse(result);
				var json = JSON.stringify(data, undefined, 4);
				var container = document.getElementById("mo_api_authentication_basic_test_config");

				mo_rest_api_output_basic_auth(mo_rest_api_syntaxHighlight_basic_auth(json));
				document.getElementById("json_basic_auth").classList.remove("d-none");
				document.getElementById("json_basic_auth").classList.add("d-block");
				document.getElementById("basic_auth_request_headers").classList.remove("d-none");
				document.getElementById("basic_auth_request_headers").classList.add("d-block");
				document.getElementById("basic_auth_req_headers_text").classList.remove("d-none");
				document.getElementById("basic_auth_req_headers_text").classList.add("d-block");
				document.getElementById("basic_auth_response_text").classList.remove("d-none");
				document.getElementById("basic_auth_response_text").classList.add("d-block");
				container.scrollTo({
					top: document.getElementById("basic_auth_response_text").offsetTop - container.offsetTop,
					behavior: "smooth"
				});

				if(data.error)
						mo_rest_api_troubleshootPrintBasic(data.error);
					else
						mo_rest_api_troubleshootHideBasic();
			}
			function mo_rest_api_troubleshootHideBasic(){

				document.getElementById("basic_display_troubleshoot").classList.remove("d-block");
				document.getElementById("basic_display_troubleshoot").classList.add("d-none");
				document.getElementById("basic_display_text").classList.remove("d-flex");
				document.getElementById("basic_display_text").classList.add("d-none");
				document.querySelector("#mo_api_basic_auth_message .mo_api_auth_note ").innerHTML = '<strong><i>Note: </i></strong>The Test has been done successfully. Please click on <strong>"Finish"</strong> button on the top right corner of the screen to save the authentication method.';
				document.querySelector("#mo_api_basic_auth_message .mo_api_auth_note").classList.remove("d-none");
				document.querySelector("#mo_api_basic_auth_message .mo_api_auth_note").classList.add("d-block");
			}
			function mo_rest_api_troubleshootPrintBasic(err){
				if(err === "INVALID_PASSWORD")
				{
					document.getElementById("basic_display_troubleshoot").innerHTML = `<ul style="list-style: inside;"><li>Check if username and password entered are correct.</li><li>If yes try password without special characters.</li></ul>`;
					document.getElementById("basic_display_troubleshoot").classList.remove("d-none");
					document.getElementById("basic_display_troubleshoot").classList.add("d-block");
					document.getElementById("basic_display_text").classList.remove("d-none");
					document.getElementById("basic_display_text").classList.add("d-flex");
				}
				else if(err  === "INVALID_USERNAME")
				{
					document.getElementById("basic_display_troubleshoot").innerHTML = '<ul style="list-style: inside;"><li>Check if user with this username exists or the entered username spelling is correct.</li><li>Make sure that you are using WordPress username and not email, as Basic Authentication with email and password is available with the Premium plan only.</li></ul>';
					document.getElementById("basic_display_troubleshoot").classList.remove("d-none");
					document.getElementById("basic_display_troubleshoot").classList.add("d-block");
					document.getElementById("basic_display_text").classList.remove("d-none");
					document.getElementById("basic_display_text").classList.add("d-flex");
				}
				else if(err === "INVALID_CLIENT_CREDENTIALS")
				{
					document.getElementById("basic_display_troubleshoot").innerHTML = 'INVALID_CLIENT_CREDENTIALS';
					document.getElementById("basic_display_troubleshoot").classList.remove("d-none");
					document.getElementById("basic_display_troubleshoot").classList.add("d-block");
					document.getElementById("basic_display_text").classList.remove("d-none");
					document.getElementById("basic_display_text").classList.add("d-flex");
				}
				else if(err === "MISSING_AUTHORIZATION_HEADER")
				{
					document.getElementById("basic_display_troubleshoot").innerHTML = '<ul style="list-style: inside;"><li>Verify if you have added necessary headers.</li><li>Add below lines to your htaccess file(Apache server)</li><ul style="padding-inline-start: 19px;"><li>RewriteEngine On &NewLine;RewriteCond %{HTTP:Authorization} ^(.*) &NewLine;RewriteRule .* - [e=HTTP_AUTHORIZATION:%1]</li></ul><li>Add below lines to your config file(NGINX server)</li><ul style="padding-inline-start: 19px;"><li>add_header Access-Control-Allow-Headers "Authorization";</li></ul></ul>';
					document.getElementById("basic_display_troubleshoot").classList.remove("d-none");
					document.getElementById("basic_display_troubleshoot").classList.add("d-block");
					document.getElementById("basic_display_text").classList.remove("d-none");
					document.getElementById("basic_display_text").classList.add("d-flex");
				}
				else if(err === "INVALID_AUTHORIZATION_HEADER_TOKEN_TYPE")
				{
					document.getElementById("basic_display_troubleshoot").innerHTML = 'INVALID_AUTHORIZATION_HEADER_TOKEN_TYPE';
					document.getElementById("basic_display_troubleshoot").classList.remove("d-none");
					document.getElementById("basic_display_troubleshoot").classList.add("d-block");
					document.getElementById("basic_display_text").classList.remove("d-none");
					document.getElementById("basic_display_text").classList.add("d-flex");				}
				else if(err === "INVALID_TOKEN_FORMAT")
				{
					document.getElementById("basic_display_troubleshoot").innerHTML = 'INVALID_TOKEN_FORMAT';
					document.getElementById("basic_display_troubleshoot").classList.remove("d-none");
					document.getElementById("basic_display_troubleshoot").classList.add("d-block");
					document.getElementById("basic_display_text").classList.remove("d-none");
					document.getElementById("basic_display_text").classList.add("d-flex");
				}
				document.querySelector("#mo_api_basic_auth_message .mo_api_auth_note ").innerHTML = '<strong><i>Note: </i></strong>You are currently in the testing mode and this authentication method is not yet enabled on your site. Please click on <strong>"Finish"</strong> button on the top right corner of the screen to save the authentication method.';
				document.querySelector("#mo_api_basic_auth_message .mo_api_auth_note").classList.remove("d-none");
				document.querySelector("#mo_api_basic_auth_message .mo_api_auth_note").classList.add("d-block");
			}

			function mo_rest_api_display_basic_auth_password() {
				var field = document.getElementById("mo_rest_api_rest_basic_auth_password");
				var showButton = document.getElementById("mo_api_basic_eye_show_hide");
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
