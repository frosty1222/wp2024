<?php
/**
 * Protected REST APIs
 * This file will display the UI to protect/protect the WP REST API endpoints.
 *
 * @package    protected-rest-api
 * @author     miniOrange <info@miniorange.com>
 * @license    MIT/Expat
 * @link       https://miniorange.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * [Protected REST APIs]
 */
class Mo_API_Authentication_ProtectedRestAPIs {

	/**
	 * Internal redirect to display protected REST API endpoints.
	 *
	 * @return void
	 */
	public static function mo_api_authentication_protected_restapis() {
		self::protect_wp_rest_apis();
	}

	/**
	 * Display protected REST API endpoints.
	 *
	 * @return void
	 */
	public static function protect_wp_rest_apis() {
		$wp_rest_server = rest_get_server();
		$all_namespaces = $wp_rest_server->get_namespaces();
		$all_namespaces = array_flip( $all_namespaces );
		?>
			<div id="mo_api_authentication_password_setting_layout" class="border border-1 rounded-4 p-3 bg-white">
				<form method="post" action="" id="ProtectedRestAPI_form">
					<div class="d-flex align-items-center gap-3 mb-3 justify-content-between">
						<h5 class="m-0">Protected REST API Settings</h4>
						<div class="d-grid gap-2 d-md-block text-center">
							<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="submit" name="reset">Reset Settings</button>
							<button class="btn btn-sm mo_rest_api_button text-white text-capitalize" type="button" onclick="moProtectedAPIsSave()">Save</button>
						</div>
					</div>
					<p>All the REST APIs listed below are protected from public access. You can uncheck the checkboxes to make it publicly accessible.</p>					</p>
					<p><b>Note: </b>The free plan supports only default WordPress endpoints. Upgrade to the<b><i><a href="admin.php?page=mo_api_authentication_settings&tab=licensing" style="color:#a83262"><u> All-Inclusive Plan </u></a></i></b>to control access to custom and third-party plugin endpoints, allowing you to block or allow public access.</p>
					<p class="fs-6"><b>On this website, the REST API root is <?php echo esc_attr( site_url() ) . '/wp-json'; ?></b></p>
					<input type="hidden" name="option" value="mo_api_authentication_protected_apis_form">
					<?php wp_nonce_field( 'ProtectedRestAPI_admin_nonce', 'ProtectedRestAPI_admin_nonce_fields' ); ?>
					<div class="accordion" id="mo-rest-api-protected-api-accordion-parent">
						<div class="accordion-item">
							<h2 class="accordion-header" id="mo-rest-api-protected-api-accordion">
								<button class="accordion-button text-black" type="button" data-bs-toggle="collapse" data-bs-target="#mo-rest-api-protect-rest-api-accordion" aria-expanded="true" aria-controls="mo-rest-api-protect-rest-api-accordion">
									<span class="me-2">Protected WordPress Default REST APIs</span>
									<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M13 22.75C14.2804 22.75 15.5482 22.4978 16.7312 22.0078C17.9141 21.5178 18.9889 20.7997 19.8943 19.8943C20.7997 18.9889 21.5178 17.9141 22.0078 16.7312C22.4978 15.5482 22.75 14.2804 22.75 13C22.75 11.7196 22.4978 10.4518 22.0078 9.26884C21.5178 8.08591 20.7997 7.01108 19.8943 6.10571C18.9889 5.20034 17.9141 4.48216 16.7312 3.99217C15.5482 3.50219 14.2804 3.25 13 3.25C10.4141 3.25 7.93419 4.27723 6.10571 6.10571C4.27723 7.93419 3.25 10.4141 3.25 13C3.25 15.5859 4.27723 18.0658 6.10571 19.8943C7.93419 21.7228 10.4141 22.75 13 22.75ZM12.7487 16.9433L18.1653 10.4433L16.5013 9.05667L11.843 14.6456L9.43258 12.2341L7.90075 13.7659L11.1508 17.0159L11.9893 17.8544L12.7487 16.9433Z" fill="#3F855B" />
									</svg>
								</button>
							</h2>
							<div id="mo-rest-api-protect-rest-api-accordion" class="accordion-collapse collapse show" aria-labelledby="mo-rest-api-protected-api-accordion" data-bs-parent="#mo-rest-api-protected-api-accordion-parent">
								<div class="accordion-body bg-light">
									<div class="protectedrestapi_container"><?php self::protected_rest_api_display_route_checkboxes( $all_namespaces ); ?></div>
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="mo-rest-api-unprotected-api-accordion">
								<button class="accordion-button text-black collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mo-rest-api-unprotected-rest-api-accordion" aria-expanded="false" aria-controls="mo-rest-api-unprotected-rest-api-accordion">
									<span class="d-flex gap-2">
										<span>Un-Authenticated WordPress Custom REST APIs</span>
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_18_40)">
												<path d="M10.9325 10L14.8075 6.125C14.8687 6.06377 14.9173 5.99108 14.9504 5.91108C14.9836 5.83108 15.0006 5.74534 15.0006 5.65875C15.0006 5.57216 14.9836 5.48642 14.9504 5.40642C14.9173 5.32642 14.8687 5.25373 14.8075 5.1925C14.7463 5.13127 14.6736 5.0827 14.5936 5.04956C14.5136 5.01643 14.4278 4.99937 14.3412 4.99937C14.2547 4.99937 14.1689 5.01643 14.0889 5.04956C14.0089 5.0827 13.9362 5.13127 13.875 5.1925L10 9.0675L6.125 5.1925C6.06377 5.13127 5.99108 5.0827 5.91108 5.04956C5.83108 5.01643 5.74534 4.99937 5.65875 4.99937C5.57216 4.99937 5.48642 5.01643 5.40642 5.04956C5.32642 5.0827 5.25373 5.13127 5.1925 5.1925C5.13127 5.25373 5.0827 5.32642 5.04956 5.40642C5.01643 5.48642 4.99937 5.57216 4.99937 5.65875C4.99937 5.74534 5.01643 5.83108 5.04956 5.91108C5.0827 5.99108 5.13127 6.06377 5.1925 6.125L9.0675 10L5.1925 13.875C5.13127 13.9362 5.0827 14.0089 5.04956 14.0889C5.01643 14.1689 4.99937 14.2547 4.99937 14.3412C4.99937 14.4278 5.01643 14.5136 5.04956 14.5936C5.0827 14.6736 5.13127 14.7463 5.1925 14.8075C5.25373 14.8687 5.32642 14.9173 5.40642 14.9504C5.48642 14.9836 5.57216 15.0006 5.65875 15.0006C5.74534 15.0006 5.83108 14.9836 5.91108 14.9504C5.99108 14.9173 6.06377 14.8687 6.125 14.8075L10 10.9325L13.875 14.8075C13.9362 14.8687 14.0089 14.9173 14.0889 14.9504C14.1689 14.9836 14.2547 15.0006 14.3412 15.0006C14.4278 15.0006 14.5136 14.9836 14.5936 14.9504C14.6736 14.9173 14.7463 14.8687 14.8075 14.8075C14.8687 14.7463 14.9173 14.6736 14.9504 14.5936C14.9836 14.5136 15.0006 14.4278 15.0006 14.3412C15.0006 14.2547 14.9836 14.1689 14.9504 14.0889C14.9173 14.0089 14.8687 13.9362 14.8075 13.875L10.9325 10ZM10 20C7.34784 20 4.8043 18.9464 2.92893 17.0711C1.05357 15.1957 0 12.6522 0 10C0 7.34784 1.05357 4.8043 2.92893 2.92893C4.8043 1.05357 7.34784 0 10 0C12.6522 0 15.1957 1.05357 17.0711 2.92893C18.9464 4.8043 20 7.34784 20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20Z" fill="#B13E3E" />
											</g>
											<defs>
												<clipPath id="clip0_18_40">
													<rect width="20" height="20" fill="white" />
												</clipPath>
											</defs>
										</svg>
									</span>
									<span class="mo_api_auth_inner_premium_label position-absolute" data-toggle="tooltip" title="Authenticating third-party APIs is available in all-inclusive plan.">Premium</span>
								</button>
							</h2>
							<div id="mo-rest-api-unprotected-rest-api-accordion" class="accordion-collapse collapse" aria-labelledby="mo-rest-api-unprotected-api-accordion" data-bs-parent="#mo-rest-api-protected-api-accordion-parent">
								<div class="accordion-body bg-light">
									<div class="protectedrestapi_container"><?php self::unprotected_rest_api_display_route_checkboxes( $all_namespaces ); ?></div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<script>
				jQuery(document).ready(function(){
					jQuery('[data-toggle="tooltip"]').tooltip(); 
				});
				function moProtectedAPIsSave() {
					document.getElementById("ProtectedRestAPI_form").submit();
				}
			</script>
		<?php
	}

	/**
	 * Display Route checkboxes.
	 *
	 * @param array $all_namespaces All available namespaces on the site.
	 * @return void
	 */
	public static function protected_rest_api_display_route_checkboxes( &$all_namespaces ) {
		$wp_rest_server = rest_get_server();
		if ( ! get_option( 'mo_api_authentication_init_protected_apis' ) ) {
			mo_api_authentication_reset_api_protection();
			update_option( 'mo_api_authentication_init_protected_apis', 'true' );
		}
		$blocked_routes = is_array( get_option( 'mo_api_authentication_protectedrestapi_route_whitelist' ) ) ? get_option( 'mo_api_authentication_protectedrestapi_route_whitelist' ) : array();
		$blocked_routes = array_map( 'esc_html', wp_unslash( $blocked_routes ) );
		?>
			<div class="accordion" id="mo-rest-api-protected-api">
				<?php if ( array_key_exists( 'wp/v2', $all_namespaces ) ) : ?>
					<div class="accordion-item">
						<h2 class="accordion-header" id="mo-rest-api-protected-api-accordion-wp-v2">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mo-rest-api-accordion-control-route-wp-v2" aria-expanded="false" aria-controls="mo-rest-api-accordion-control-route-wp-v2">
								<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) ) . '../../images/wordpress-logo.png'; ?>" width="30px">
								<span class="ms-2">WordPress</span>
							</button>
						</h2>
						<div id="mo-rest-api-accordion-control-route-wp-v2" class="accordion-collapse collapse" aria-labelledby="mo-rest-api-protected-api-accordion-wp-v2" data-bs-parent="#mo-rest-api-protected-api">
							<div class="accordion-body" id="mo-caw-accordion-body-protected-apis-wp-v2">
								<?php
									$routes = array_keys( $wp_rest_server->get_routes( 'wp/v2' ) );
									$routes = array_map( 'esc_html', wp_unslash( $routes ) );
								?>
								<?php if ( count( $routes ) > 0 ) : ?>
									<?php foreach ( $routes as $index => $route ) : ?>
										<?php if ( 0 === $index ) : ?>
											<?php unset( $routes[0] ); ?>
											<div class="form-check d-flex align-items-center my-2">
												<input class="form-check-input" type="checkbox" id="mo-rest-api-select-all-wp/v2" name="" onchange="moRESTAPIselectAll(this,'wp/v2')" <?php echo count( array_intersect( $blocked_routes, $routes ) ) === count( $routes ) ? 'checked' : ''; ?>>
												<label class="form-check-label" for="mo-rest-api-select-all-wp/v2"><?php echo esc_html( wp_unslash( $route ) ); ?></label>
											</div>
										<?php else : ?>
											<div class="form-check d-flex align-items-center my-2 ms-3">
												<input class="form-check-input mo-rest-api-select-all-wp/v2" type="checkbox" value="<?php echo esc_html( wp_unslash( $route ) ); ?>" id="<?php echo esc_html( wp_unslash( $route ) ); ?>" name="mo_rest_routes[]" <?php echo ! empty( $blocked_routes ) && in_array( esc_html( wp_unslash( $route ) ), $blocked_routes, true ) ? 'checked' : ''; ?>>
												<label class="form-check-label" for="<?php echo esc_html( wp_unslash( $route ) ); ?>"><?php echo esc_html( wp_unslash( $route ) ); ?></label>
											</div>
										<?php endif; ?>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<script>
				function moRESTAPIselectAll(selectAll, namespace) {
					let selectAllSiblings = Array.from(document.getElementsByClassName(`mo-rest-api-select-all-${namespace}`));
					selectAllSiblings.forEach(siblingElement => {
						siblingElement.checked = selectAll.checked ? true : false;
					});
				}
			</script>
		<?php
		unset( $all_namespaces['wp/v2'] );
	}

	/**
	 * Display routes that are not available to be authenticated.
	 *
	 * @param array $all_namespaces All available namespaces on the site.
	 * @return void
	 */
	private static function unprotected_rest_api_display_route_checkboxes( &$all_namespaces ) {
		$wp_rest_server = rest_get_server();
		$blocked_routes = is_array( get_option( 'mo_api_authentication_protectedrestapi_route_whitelist' ) ) ? get_option( 'mo_api_authentication_protectedrestapi_route_whitelist' ) : array();
		$blocked_routes = array_map( 'esc_html', wp_unslash( $blocked_routes ) );

		$file_path = plugin_dir_path( __FILE__ ) . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'third-party-integrations.json';

		$recognized_plugins = Mo_API_Authentication_Utils::retrieve_file_contents( $file_path );
		$recognized_plugins = json_decode( $recognized_plugins, true ) ?? $recognized_plugins;
		?>
			<div class="accordion" id="mo-rest-api-unprotected-api">
				<?php if ( is_array( $recognized_plugins ) ) : ?>
					<?php foreach ( $recognized_plugins as $plugin => $details ) : ?>
						<?php if ( is_plugin_active( $details['file'] ) ) : ?>
							<?php $new_prefix = str_replace( '/', '-', $details['namespace'] ); ?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="mo-rest-api-protected-api-accordion-<?php echo esc_attr( $new_prefix ); ?>">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mo-rest-api-accordion-control-route-<?php echo esc_attr( $new_prefix ); ?>" aria-expanded="false" aria-controls="mo-rest-api-accordion-control-route-<?php echo esc_attr( $new_prefix ); ?>">
										<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) ) . '../../images/' . esc_attr( $details['image'] ); ?>" width="30px">
										<span class="ms-2"><?php echo esc_attr( $plugin ); ?></span>
									</button>
								</h2>
								<div id="mo-rest-api-accordion-control-route-<?php echo esc_attr( $new_prefix ); ?>" class="accordion-collapse collapse" aria-labelledby="mo-rest-api-protected-api-accordion-<?php echo esc_attr( $new_prefix ); ?>" data-bs-parent="#mo-rest-api-unprotected-api">
									<div class="accordion-body" id="mo-caw-accordion-body-protected-apis-<?php echo esc_attr( $new_prefix ); ?>">
										<?php self::display_routes( $details['namespace'], $all_namespaces ); ?>
									</div>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php else : ?>
					<div class="alert alert-danger" role="alert"><?php echo esc_attr( $recognized_plugins ); ?></div>
				<?php endif; ?>
				<div class="accordion-item">
					<h2 class="accordion-header" id="mo-rest-api-protected-api-accordion-api-v1">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mo-rest-api-accordion-control-route-api-v1" aria-expanded="false" aria-controls="mo-rest-api-accordion-control-route-api-v1">
							<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) ) . '../../images/mologo.png'; ?>" width="30px">
							<span class="ms-2">miniOrange REST API Authentication Plugin</span>
						</button>
					</h2>
					<div id="mo-rest-api-accordion-control-route-api-v1" class="accordion-collapse collapse" aria-labelledby="mo-rest-api-protected-api-accordion-api-v1" data-bs-parent="#mo-rest-api-protected-api">
						<div class="accordion-body" id="mo-caw-accordion-body-protected-apis-api-v1">
							<?php self::display_routes( 'api/v1', $all_namespaces ); ?>
						</div>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="mo-rest-api-protected-api-accordion-other-apis">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mo-rest-api-accordion-control-route-other-apis" aria-expanded="false" aria-controls="mo-rest-api-accordion-control-route-other-apis">
							<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) ) . '../../images/api.png'; ?>" width="30px">				
							<span class="ms-2">Others</span>
						</button>
					</h2>
					<div id="mo-rest-api-accordion-control-route-other-apis" class="accordion-collapse collapse" aria-labelledby="mo-rest-api-protected-api-accordion-other-apis" data-bs-parent="#mo-rest-api-unprotected-api">
						<div class="accordion-body" id="mo-caw-accordion-body-protected-apis-other-apis">
						<?php foreach ( $all_namespaces as $namespace => $index ) : ?>
							<?php
								$routes = array_keys( $wp_rest_server->get_routes( $namespace ) );
								$routes = array_map( 'esc_html', wp_unslash( $routes ) );
							?>
								<?php if ( count( $routes ) > 0 ) : ?>
									<?php foreach ( $routes as $index => $route ) : ?>
										<?php if ( 0 === $index ) : ?>
											<?php unset( $routes[0] ); ?>
											<div class="form-check d-flex align-items-center my-2">
												<input class="form-check-input" type="checkbox" id="mo-rest-api-select-all-<?php echo esc_html( $namespace ); ?>" name="" onchange="moRESTAPIselectAll(this,'<?php echo esc_html( $namespace ); ?>')" <?php echo count( array_intersect( $blocked_routes, $routes ) ) === count( $routes ) ? 'checked' : ''; ?>>
												<label class="form-check-label" for="mo-rest-api-select-all-<?php echo esc_html( $namespace ); ?>"><?php echo esc_html( wp_unslash( $route ) ); ?></label>
											</div>
										<?php else : ?>
											<div class="form-check d-flex align-items-center my-2 ms-3">
												<input class="form-check-input mo-rest-api-select-all-<?php echo esc_html( $namespace ); ?>" type="checkbox" name="mo_rest_routes[]" value="<?php echo esc_html( wp_unslash( $route ) ); ?>" id="<?php echo esc_html( wp_unslash( $route ) ); ?>" <?php echo ! empty( $blocked_routes ) && in_array( esc_html( wp_unslash( $route ) ), $blocked_routes, true ) ? 'checked' : ''; ?>>
												<label class="form-check-label" for="<?php echo esc_html( wp_unslash( $route ) ); ?>"><?php echo esc_html( wp_unslash( $route ) ); ?></label>
											</div>
										<?php endif; ?>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		<?php
	}

	/**
	 * Check if the route is WP standard route or not
	 *
	 * @param mixed $route rest api route.
	 * @return bool
	 */
	public static function check_route_is_wp_standard_or_not( $route ) {
		if ( stripos( $route, '/wp/v2' ) === false ) {
			return false;
		} else {
			return true;
		}
	}


	/**
	 * Check if the route is checked.
	 *
	 * @param mixed $route rest api route.
	 * @param mixed $blocked_routes protected routes.
	 * @return bool
	 */
	public static function protected_rest_api_get_route_checked_prop( $route, $blocked_routes ) {

		if ( self::check_route_is_wp_standard_or_not( $route ) || get_option( 'mo_rest_api_protect_migrate' ) ) {

			$is_route_checked = in_array( esc_html( wp_unslash( $route ) ), $blocked_routes, true );
			return checked( $is_route_checked, true, false );
		} else {
			return false;
		}
	}

	/**
	 * Display all the routes under a namespace.
	 *
	 * @param string $route_prefix   Route prefix to categorize routes.
	 * @param array  $all_namespaces All the namespaces.
	 * @return void
	 */
	public static function display_routes( $route_prefix, &$all_namespaces ) {
		$wp_rest_server = rest_get_server();
		$blocked_routes = is_array( get_option( 'mo_api_authentication_protectedrestapi_route_whitelist' ) ) ? get_option( 'mo_api_authentication_protectedrestapi_route_whitelist' ) : array();
		$blocked_routes = array_map( 'esc_html', wp_unslash( $blocked_routes ) );

		foreach ( $all_namespaces as $namespace => $index ) {
			if ( 0 === strpos( $namespace, $route_prefix ) ) {
				$routes = array_keys( $wp_rest_server->get_routes( $namespace ) );
				$routes = array_map( 'esc_html', wp_unslash( $routes ) );
				if ( count( $routes ) > 0 ) {
					foreach ( $routes as $index => $route ) {
						?>
						<?php if ( 0 === $index ) : ?>
							<?php unset( $routes[0] ); ?>
							<div class="form-check d-flex align-items-center my-2">
								<input class="form-check-input" type="checkbox" id="mo-rest-api-select-all-<?php echo esc_html( $namespace ); ?>" name="" onchange="moRESTAPIselectAll(this,'<?php echo esc_html( $namespace ); ?>')" <?php echo count( array_intersect( $blocked_routes, $routes ) ) === count( $routes ) ? 'checked' : ''; ?>>
								<label class="form-check-label" for="mo-rest-api-select-all-<?php echo esc_html( $namespace ); ?>"><?php echo esc_html( wp_unslash( $route ) ); ?></label>
							</div>
						<?php else : ?>
							<div class="form-check d-flex align-items-center my-2 ms-3">
								<input class="form-check-input mo-rest-api-select-all-<?php echo esc_html( $namespace ); ?>" type="checkbox" name="mo_rest_routes[]" value="<?php echo esc_html( wp_unslash( $route ) ); ?>" id="<?php echo esc_html( wp_unslash( $route ) ); ?>" <?php echo ! empty( $blocked_routes ) && in_array( esc_html( wp_unslash( $route ) ), $blocked_routes, true ) ? 'checked' : ''; ?>>
								<label class="form-check-label" for="<?php echo esc_html( wp_unslash( $route ) ); ?>"><?php echo esc_html( wp_unslash( $route ) ); ?></label>
							</div>
						<?php endif; ?>
						<?php
					}
				}
				unset( $all_namespaces[ $namespace ] );
			}
		}
	}
}
