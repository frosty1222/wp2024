<?php
/**
 * Licensing
 * Display the premium plans of WP REST Authentication plugin.
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
 * Premium page.
 */
class Mo_API_Authentication_License {
	/**
	 * Premium Licensing Page.
	 *
	 * @return void
	 */
	public static function mo_api_authentication_licensing_page() {
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="mo-rest-api-auth-pricing-card bg-white">
						<div class="mo-rest-api-auth-first-card">
							<p class="mo-rest-api-auth-mo-rest-api-auth-customer-price-head text-center">ESSENTIAL</p>
							<p class="mo-rest-api-auth-customer-price-detail text-center">(Basic, API Key, JWT)</p>
							<p class="mo-rest-api-auth-customer-price mo-rest-api-auth-pricing-plan-number"><sup>$</sup><span>199</span></p>
							<a href="https://portal.miniorange.com/initializepayment?requestOrigin=wp_rest_api_authentication_essential_security_plan" target="_blank"
								class="mo-rest-api-pricing-btn mt-5">Upgrade Now</a>
						</div>
						<ul class="mo-rest-api-auth-ul-points">
							<li>
								<i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes" style="padding-top: 24px;"></i> 
								<b>Protect default WP APIs</b> with :
								<ul class="mo-rest-api-auth-second-ul">
									<li>Basic Authentication</li>
									<li>API Key Authentication</li>
									<li>JWT Authentication</li>
								</ul>
							</li>
							<li><i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes"></i> Setup Single Authentication method</li>
							<li><i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes"></i> Role-based Access to APIs</li>
							<li><i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes"></i> Configurable API protection <span data-toggle="tooltip" title="" data-original-title="Choose which APIs should be accessible with and without authentication"><i class="fa fa-info-circle" aria-hidden="true"></i></span></li>
							<li><i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes"></i> Custom Token Expiry</li>
							<li><i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes"></i> HSA & RSA Signature Validation</li>
						</ul>
						<br><br>
					</div>
				</div>

				<div class="col-md-4">
					<div class="mo-rest-api-auth-pricing-card bg-white">
						<div class="mo-rest-api-auth-second-card mo-rest-api-auth-first-card">
							<p class="mo-rest-api-auth-mo-rest-api-auth-customer-price-head text-center">ADVANCED</p>
							<p class="mo-rest-api-auth-customer-price-detail text-center">(OAuth 2.0, OAuth Token)</p>
							<p class="mo-rest-api-auth-customer-price mo-rest-api-auth-pricing-plan-number"><sup>$</sup><span>299</span></p>
							<a href="https://portal.miniorange.com/initializepayment?requestOrigin=wp_rest_api_authentication_advanced_security_plan" target="_blank"
								class="mo-rest-api-pricing-btn mt-5">Upgrade Now</a>
						</div>
						<ul class="mo-rest-api-auth-ul-points">
							<li>
								<i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes" style="padding-top: 24px;"></i>
								<b>Essential Plan Features +</b><br>
								<i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes" style="padding-top: 24px;"></i>
								<b>Protect default WP APIs</b> with :
								<ul class="mo-rest-api-auth-second-ul">
									<li>OAuth 2.0 Authentication</li>
									<li>Token from External Identity Providers</li>
								</ul>
								<ul>
									<ul class="mo-rest-api-auth-third-ul">
										<li>Firebase</li>
										<li>Azure</li>
										<li>Google </li>
										<li>Okta</li>
										<li>Any OAuth/OIDC provider.</li>
									</ul>
								</ul>
							</li>
						</ul>
						<br><br>
					</div>
				</div>

				<div class="col-md-4">
					<div class="mo-rest-api-auth-pricing-card bg-white " style="border: 3px solid #eb5424;">
						<div class="mo-rest-api-incl-plan"></div>
						<div class="mo-rest-api-auth-first-card ">
							<p class="mo-rest-api-auth-mo-rest-api-auth-customer-price-head text-center">ALL-INCLUSIVE</p>
							<p class="mo-rest-api-auth-customer-price-detail text-center">(Complete API security)</p>
							<p class="mo-rest-api-auth-customer-price mo-rest-api-auth-pricing-plan-number"><sup>$</sup><span>399</span></p>
							<a href="https://portal.miniorange.com/initializepayment?requestOrigin=wp_rest_api_authentication_all_inclusive_security_plan" target="_blank"
								class="mo-rest-api-pricing-btn mt-5">Upgrade Now</a>
						</div>
						<ul class="mo-rest-api-auth-ul-points">
							<li style="padding-top: 26px;">
								<i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes"></i>
								<b>Advanced Plan Features +</b>
							</li>
							<li><i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes"></i> Custom-developed REST API endpoints <span data-toggle="tooltip" title="" data-original-title="If you have created your own custom APIs, you can authenticate them as well"><i class="fa fa-info-circle" aria-hidden="true"></i></span></li>
							<li>
								<i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes"></i> 
								Third-Party plugin API authentication:
								<ul class="mo-rest-api-auth-second-ul">
									<li>WooCommerce</li>
									<li>Learndash</li>
									<li>Buddyboss</li>
									<li>CoCart</li>
									<li>Gravity Forms etc.</li>
								</ul>
							</li>
							<li><i class="fa fa-check-circle mo-rest-api-auth-customer-pricing-yes"></i> Setup Multiple Authentication methods</li>
						</ul>
						<br><br>
					</div>
				</div>
			</div>
		</div>
		<script>
			jQuery(document).ready((() => {
				jQuery('[data-toggle]').hover(
					function() {
						var $this = jQuery(this);
						var tooltipText = $this.data('original-title');
						jQuery('<div class="mo-rest-api-auth-tooltip">' + tooltipText + '</div>')
							.appendTo('body')
							.css({
								top: $this.offset().top - 40,
								left: $this.offset().left + ($this.outerWidth() / 2) - 100
							})
							.animate({ opacity: 1 }, 200);
					},
					function() {
						jQuery('.mo-rest-api-auth-tooltip').animate({ opacity: 0 }, 50, function() {
							jQuery(this).remove();
						});
					}
				);
			}));
		</script>
		<?php
	}
}
