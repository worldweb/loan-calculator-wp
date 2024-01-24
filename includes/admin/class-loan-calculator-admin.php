<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Admin Pages Class
 * 
 * Handles Loan Calculator
 *
 * @package Loan Calculator
 * @since 1.0.0
 */
if (!class_exists('WW_Loan_Calculator_Admin_Pages')) {

	class WW_Loan_Calculator_Admin_Pages
	{

		public function __construct()
		{
			// Construct properties
		}

		/**
		 * Admin Pages Class
		 * 
		 * Handles Loan Calculator Menu
		 *
		 * @package Loan Calculator
		 * @since 1.0.0
		 */
		public function ww_loan_calculator_admin_menu()
		{
			// Loan Calculator Menu
			add_menu_page(esc_html__('Loan Calculator', 'ww_loan_calculator_page'), esc_html__('Loan Calculator', 'ww_loan_calculator_page'), WW_LOAN_CALCULATOR_LEVEL, 'ww_loan_calculator_page', '', 'dashicons-calculator');

			add_submenu_page('ww_loan_calculator_page', esc_html__('Loan Calculator', 'ww_loan_calculator_page'), esc_html__('Loan Calculator', 'loan-calculator-wp'), WW_LOAN_CALCULATOR_LEVEL, 'ww_loan_calculator_page', array($this, 'ww_loan_calculator_page'));
		}

		/**
		 * Setting Page for Loan Calculator Plugin
		 *
		 * Handles Function to Setting Page for Loan Calculator Setting Page
		 * 
		 * @package Loan Calculator
		 * @since 1.0.0
		 */
		public function ww_loan_calculator_page()
		{
			// Include Loan Calculator Setting page
			include_once(WW_LOAN_CALCULATOR_ADMIN . '/forms/ww-loan-calculator-setting.php');
		}

		function loan_calculator_settings()
		{

			// Register Loan Calculator Setting
			register_setting('ww_loan_calculaor_option', 'ww_loan_option');

			//  Section Setting Tab
			add_settings_section('section_setting_id', 'Section Setting', '', 'section-setting-admin');
		}

		function loan_calculator_wp_admin_notice()
		{
			if (is_plugin_active('loan-calculator-wp/loan-calculator-wp.php')) {
				if (is_admin()) {
					global $pagenow;
					if ($pagenow === 'index.php' || (isset($_GET['page']) && $_GET['page'] === 'ww_loan_calculator_page')) {
						$avoid_notice = get_option('lc_avoid_notice');
						$display_notice_yes = get_option('lc_rating_notice');
						$last_notice_timestamp = get_option('last_notice_timestamp');
						$future_popup_date = strtotime("+7 days");

						if (get_option('plugin_activation_time')) {
							if ($display_notice_yes == 0 && $avoid_notice == 0) {
?>

								<div class="admin_notice_hide notice notice-info is-dismissible">
									<p>
										<?php esc_html_e("You have been using Loan Calculator Plugin for a while Would you like to leave a review?", "loan_calculator"); ?>
									</p>
									<p>
										<button type="button" id='ww_loan_calculator_response_yes' class='rating_yes button button-primary'><?php esc_attr_e("Yes, I'd love to!", "loan_calculator") ?></button>
										<button type="button" class='button button-secondary notice_avoid_yes dismissable-button' id='ww_loan_calculator_avoid_now'><?php esc_attr_e("No, thanks") ?></button>
									</p>
								</div>

							<?php
							} else if ($last_notice_timestamp >= $future_popup_date && $avoid_notice == 1) {
							?>

								<div class="admin_notice_hide notice notice-info is-dismissible">
									<p>
										<?php esc_html_e("You have been using Loan Calculator Plugin for a while Would you like to leave a review?", "loan_calculator"); ?>
									</p>
									<p>
										<button type="button" id='ww_loan_calculator_response_yes' class='rating_yes button button-primary'><?php esc_attr_e("Yes, I'd love to!", "loan_calculator") ?><a href="https://wordpress.org/plugins/loan-calculator-wp/#reviews" target="_blank" rel="noopener noreferrer"></a></button>
										<button type="button" class='button button-secondary notice_avoid_yes dismissable-button' id='ww_loan_calculator_avoid_now'><?php esc_attr_e("No, thanks") ?></button>
									</p>
								</div>

<?php
							}
						}
					}
				}
			}
		}

		function update_user_choice_weekly()
		{
			/* it's an Ajax call */
			if (defined('DOING_AJAX') && DOING_AJAX) {
				$i = 0;
				update_option('lc_avoid_notice', 1);
				$get_last_notice_avoid_time = strtotime("now");
				update_option('last_notice_timestamp', $get_last_notice_avoid_time);

				$i = 1;
				if ($i) {
					wp_send_json_success(array('message' => 'We\'ve noted your response, Thank you for your efforts.'));
				} else {
					wp_send_json_error(array('message' => 'Something went wrong!'));
				}
			} else {
				wp_send_json_error(array('message' => 'Something went wrong!'));
			}
		}

		function update_display_notice_option()
		{
			/* it's an Ajax call */
			if (defined('DOING_AJAX') && DOING_AJAX) {
				$rating_positive = update_option('lc_rating_notice', 1);
				if ($rating_positive == 1) {
					wp_send_json_success(array('message' => 'Thank You!'));
				} else {
					wp_send_json_error(array('message' => 'Something went wrong!'));
				}
			} else {
				wp_send_json_error(array('message' => 'Something went wrong!'));
			}
		}

		/**
		 * Adding Hooks
		 *
		 * @package Loan Calculator
		 * @since 1.0.0
		 */
		function add_hooks()
		{
			add_action('admin_menu', array($this, 'ww_loan_calculator_admin_menu'));
			add_action('admin_init', array($this, 'loan_calculator_settings'));
			add_action('admin_notices', array($this, 'loan_calculator_wp_admin_notice'));
			add_action('wp_ajax_plugin_notice_review_yes', array($this, 'update_display_notice_option'));
			add_action('wp_ajax_avoid_admin_notice', array($this, 'update_user_choice_weekly'));
		}
	}
}
