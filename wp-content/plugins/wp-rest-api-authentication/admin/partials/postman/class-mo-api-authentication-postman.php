<?php
/**
 * Postman samples
 * Display the Postman Samples for the Authentication methods.
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
 * Postman Samples.
 */
class Mo_API_Authentication_Postman {

	/**
	 * Emit CSS
	 *
	 * @return void
	 */
	public static function emit_css() {
		?>
		<style>
			.mo-postman-card {
				float: left;
				height: 500px;
				background: #232323;
				box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
			}

			.mo-postman-card:before {
				content: '';
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: #ff6c37;
				clip-path: circle(150px at 80% 20%);
				transition: 0.5s ease-in-out;
			}

			.mo-postman-card:hover:before {
				clip-path: circle(300px at 80% -20%);
			}

			.mo-postman-card:after {
				content: 'Postman';
				position: relative;
				top: 60%;
				font-size: 3em;
				font-weight: 800;
				font-style: italic;
				display: block;
				text-align: center;
				color: #ff6c374f;
			}

			.mo-postman-card .imgBx {
				transform: translateY(-50%);
				height: 220px;
				transition: 0.5s;
			}

			.mo-postman-card:hover .imgBx{
				top: 0;
				transform: translateY(0%);
			}

			.mo-postman-card .imgBx img{
				transform: translate(-50%, -50%);
				max-height: 80px;
			}

			.mo-postman-card:hover .imgBx img{
				transform: translate(-50%, -300%);
				max-height: 100px;
			}

			.mo-postman-card .contentBx {
				bottom: 30px;
				height: 100px;
				transition: 1s;
			}

			.mo-postman-card:hover .contentBx {
				height: 230px;
			}

			.mo-postman-card .contentBx h3 {
				width: max-content;
			}

			.mo-postman-card .contentBx .size{
				transition: 0.5s;
				opacity: 0;
				visibility: hidden;
			}

			.mo-postman-card:hover .contentBx .size {
				opacity: 1;
				visibility: visible;
				transition-delay: 0.5s;
			}

			.mo-postman-card:hover .contentBx .color {
				opacity: 1;
				visibility: visible;
				transition-delay: 0.6s;
			}
			.mo-postman-card .contentBx .color h3 {
				color: #fff;
				font-weight: 500;
				font-size: 14px;
				text-transform: uppercase;
				letter-spacing: 1.5px;
				margin-right: 5px;
			}

			.mo-postman-card .contentBx .size span {
				color: #111111;
				transition: 0.5s;
				color: #111111;
				width: max-content;
			}

			.mo-postman-card .contentBx .size span:hover,.mo-postman-card .contentBx .size span.focus  {
				background: #ff6c37 !important;
				color: #fff;
			}


			.mo-postman-card .contentBx button {
				background: #ff6c37;
				opacity: 0;
				transform: translateY(50px);
				transition: 0.5s;
			}

			.mo-postman-card:hover .contentBx button {
				opacity: 1;
				transform: translateY(0px);
				transition-delay: 0.35s;
			}
			</style>
		<?php
	}

	/**
	 * Display Cards to download postman samples.
	 *
	 * @return void
	 */
	public static function mo_api_authentication_postman_page() {
		self::emit_css();
		?>
		<div class="mo_api_authentication_postman_layout mt-1 border border-1 rounded-4 bg-white">
			<h5 class="mt-3 px-3">Postman Samples</h5>
			<p class="px-3">Download the postman samples to directly test the API configuration from Postman application.</p>
			<p class="px-3 text-muted"><b>Tip : </b>Postman app can be downloaded using this <a href="https://www.postman.com/downloads/" target="_blank">LINK</a></p>
			<div class="row p-3">
				<div class="col-4 position-relative m-0">
					<div class="mo-postman-card overflow-hidden rounded-4 position-relative w-100">
						<div class="imgBx position-absolute top-50 w-100">
							<img class="position-absolute top-50 start-50 mo_rest_api_third_party_apps" src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/apikey-postman.png">
						</div>
						<div class="position-absolute d-flex justify-content-between align-items-center start-50 end-50 flex-column text-center contentBx">
							<h3 class="position-relative fw-bolder text-white">API Key Auth</h3>
							<button class="mt-0 py-2 px-3 rounded-2 btn text-white fw-bolder mt-3" onclick="mo_postman_download_file('api-key', 'api_key_auth')" href="#">Download</button>
						</div>
					</div>
				</div>
				<div class="col-4 position-relative m-0">
					<div class="mo-postman-card overflow-hidden rounded-4 position-relative w-100">
						<div class="imgBx position-absolute top-50 w-100">
							<img class="position-absolute top-50 start-50 mo_rest_api_third_party_apps" src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/basic-auth-postman.png">
						</div>
						<div class="position-absolute d-flex justify-content-between align-items-center start-50 end-50 flex-column text-center contentBx">
							<h3 class="position-relative fw-bolder text-white">Basic Auth</h3>
							<div class="d-flex justify-content-center align-items-center gap-2 pt-5 mt-3 size">
								<span class="select-method p-2 text-center mo_rest_api_primary_font bg-white rounded-2 focus" id="basic-username-password" onclick="mo_postman_select_method('basic-username-password')">User : Password</span>
								<span class="select-method p-2 text-center mo_rest_api_primary_font bg-white rounded-2" id="basic-client-credentials" onclick="mo_postman_select_method('basic-client-credentials')">Client ID : Secret</span>
							</div>
							<button class="mt-0 py-2 px-3 rounded-2 btn text-white fw-bolder" onclick="mo_postman_download_file('', 'basic_auth')" href="#" >Download</button>
						</div>
					</div>
				</div>
				<div class="col-4 position-relative m-0">
					<div class="mo-postman-card overflow-hidden rounded-4 position-relative w-100">
						<div class="imgBx position-absolute top-50 w-100">
							<img class="position-absolute top-50 start-50 mo_rest_api_third_party_apps" src="<?php echo esc_url( plugin_dir_url( dirname( __DIR__ ) ) ); ?>/images/jwt-postman.png">
						</div>
						<div class="position-absolute d-flex justify-content-between align-items-center start-50 end-50 flex-column text-center contentBx">
							<h3 class="position-relative fw-bolder text-white">JWT Auth</h3>
							<div class="d-flex justify-content-center align-items-center gap-2 pt-5 mt-3 size">
								<span id="jwt-token" class="select-method p-2 text-center mo_rest_api_primary_font bg-white rounded-2 focus" onclick="mo_postman_select_method('jwt-token')" >Token</span>
								<span id="jwt-resource" class="select-method p-2 text-center mo_rest_api_primary_font bg-white rounded-2" onclick="mo_postman_select_method('jwt-resource')">Resource</span>
							</div>
							<button class="mt-0 py-2 px-3 rounded-2 btn text-white fw-bolder" onclick="mo_postman_download_file('', 'jwt_auth')" href="#">Download</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<form id="mo-postman-form" action="" method="POST">
			<?php wp_nonce_field( 'mo_api_authentication_postman_config', 'mo_api_authentication_postman_fields' ); ?>
			<input type="hidden" name="option" value="mo_api_authentication_postman_file">
			<input type="hidden" name="file_name" id="mo-postman-file-name-input" value="">
		</form>

		<script>
			function mo_postman_download_file( method, auth_method ) {
				if( method != '' ){
					document.getElementById("mo-postman-file-name-input").value = method;
				}
				if (method == '' && auth_method != '') {
					if(auth_method == 'basic_auth') {
						element = document.getElementById('basic-client-credentials');
						if(element.classList.contains('focus'))
							document.getElementById("mo-postman-file-name-input").value = 'basic-client-credentials';
						else
							document.getElementById("mo-postman-file-name-input").value = 'basic-username-password';
					}
					if(auth_method == 'jwt_auth') {
						element = document.getElementById('jwt-resource');
						if(element.classList.contains('focus'))
							document.getElementById("mo-postman-file-name-input").value = 'jwt-resource';
						else
							document.getElementById("mo-postman-file-name-input").value = 'jwt-token';
					}
				}
				document.getElementById("mo-postman-form").submit();
			}

			function mo_postman_select_method( id ){
				jQuery("span").removeClass("focus");
				jQuery( "#" + id ).addClass("focus");
				document.getElementById("mo-postman-file-name-input").value = id;
			}
		</script>
		<?php
	}
}
