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
 * [API authentication Utils]
 */
class Mo_API_Authentication_Utils {

	/**
	 * Function to install and activate custom-api-for-wp from the side advertisment pannel by the click of a button.
	 *
	 * @param string $plugin_slug slug added to the WordPress for unique identification.
	 *
	 * @return string
	 */
	private function get_plugin_download_link_from_wp_org( $plugin_slug ) {
		$api_url  = 'https://api.wordpress.org/plugins/info/1.0/' . $plugin_slug . '.json';
		$response = wp_remote_get( $api_url );

		if ( is_wp_error( $response ) ) {
			return false;
		}

		$body = wp_remote_retrieve_body( $response );
		$data = json_decode( $body, true );

		if ( ! $data || ! isset( $data['download_link'] ) ) {
			return false;
		}

		return $data['download_link'];
	}

	/**
	 * Function to install and activate custom-api-for-wp from the side advertisment pannel by the click of a button.
	 *
	 * @return void
	 */
	public function install_and_activate_caw_free() {
		$response = array();
		if ( ! empty( $_SERVER['REQUEST_METHOD'] ) && ! empty( $_POST['nonce'] ) && sanitize_text_field( wp_unslash( $_SERVER['REQUEST_METHOD'] ) ) === 'POST' && current_user_can( 'administrator' ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'mo_rest_api_install_and_activate_caw_free' ) ) {
			$plugin_name   = 'custom-api-for-wp';
			$download_link = $this->get_plugin_download_link_from_wp_org( $plugin_name );
			if ( $download_link ) {
				$plugin_path = WP_PLUGIN_DIR . '/' . $plugin_name . '/custom-api-for-wordpress.php';

				// Check to see if plugin is already exists.
				if ( ! file_exists( $plugin_path ) ) {
					$temp_file = download_url( $download_link );

					if ( ! is_wp_error( $temp_file ) ) {
						$zip = new ZipArchive();
						$res = $zip->open( $temp_file );
						if ( true === $res ) {
							$extract_result = $zip->extractTo( WP_PLUGIN_DIR );
							$zip->close();

							if ( true === $extract_result ) {
								wp_delete_file( $temp_file );
							}
						}
					}
				}
			}

			// Check to see if plugin is already active.
			if ( ! is_plugin_active( $plugin_name . '/custom-api-for-wordpress.php' ) ) {
				$result = activate_plugin( $plugin_path );
				if ( ! is_wp_error( $result ) ) {
					$response = array(
						'message'      => 'Plugin activated successfully.',
						'redirect_url' => admin_url( 'admin.php?page=custom_api_wp_settings' ),
					);
				}
			} else {
				$response = array(
					'message'      => 'Plugin already activated.',
					'redirect_url' => admin_url( 'admin.php?page=custom_api_wp_settings' ),
				);
			}
		}
		if ( $response ) {
			wp_send_json_success( $response );
		}

		$response = array(
			'message' => 'Invalid request check.',
			'code'    => 400,
		);

		wp_send_json_error( $response, $response['code'] );
	}

	/**
	 * Retrieves content of a file.
	 *
	 * @param string $file_path File Path to retrieve data from.
	 * @throws Exception Throws exception if file does not exist or can't be read.
	 * @return string
	 */
	public static function retrieve_file_contents( $file_path ) {
		try {

			if ( ! function_exists( 'WP_Filesystem' ) ) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
			}

			global $wp_filesystem;
			if ( ! WP_Filesystem() ) {
				$file_contents = file_get_contents( $file_path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- The condition if fallback to the WP_Filesystem.
			} else {
				$file_contents = $wp_filesystem->get_contents( $file_path );
			}

			if ( false === $file_contents ) {
				throw new Exception( 'Could not read file contents.' );
			} else {
				return $file_contents;
			}
		} catch ( Exception $e ) {
			return 'Error: ' . $e->getMessage();
		}
	}
}
