<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/**
 * Scripts Class
 *
 * Handles adding scripts functionality to the admin pages as well as the front pages.
 *
 * @package Loan Calculator
 * @since 1.0.0
 */
if (!class_exists('WW_Loan_Calculator_Script')) {

	class WW_Loan_Calculator_Script
	{
		/**
		 * Include JS and CSS for backend	 
		 *
		 * @package Loan Calculator
		 * @since 1.0.0
		 */
		function ww_loan_calculator_admin_scripts()
		{

			wp_enqueue_script(
				'jquery-validate',
				WW_LOAN_CALCULATOR_URL . 'includes/js/jquery.validate.min.js',
				array('jquery'),
				WW_LOAN_CALCULATOR_VERSION,
				true
			);

			// Add JS
			wp_enqueue_script(
				'loan-calculator-admin-script',
				WW_LOAN_CALCULATOR_URL . 'includes/js/admin-script.js',
				array('jquery', 'wp-color-picker', 'jquery-validate'),
				WW_LOAN_CALCULATOR_VERSION,
				true
			);

			wp_enqueue_script('post_type_admin_js', WW_LOAN_CALCULATOR_URL . 'includes/js/post_type_admin.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);
			WW_LOAN_CALCULATOR_URL . 'includes/js/post_type_admin.js';

			wp_enqueue_script('fstdropdown', WW_LOAN_CALCULATOR_URL . 'includes/js/fstdropdown.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);
			wp_enqueue_script('fstdropdown.min', WW_LOAN_CALCULATOR_URL . 'includes/js/fstdropdown.min.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);

			wp_enqueue_style('post_type_admin_css', WW_LOAN_CALCULATOR_URL . 'includes/css/post_type_admin.css', array('wp-color-picker'), WW_LOAN_CALCULATOR_VERSION);

			wp_enqueue_style('fstdropdown_select', WW_LOAN_CALCULATOR_URL . 'includes/css/fstdropdown.css', array(), WW_LOAN_CALCULATOR_VERSION);
			wp_enqueue_style('fstdropdown.min_select', WW_LOAN_CALCULATOR_URL . 'includes/css/fstdropdown.min.css', array(), WW_LOAN_CALCULATOR_VERSION);

			wp_enqueue_style('admin_settings_style', WW_LOAN_CALCULATOR_URL . 'includes/css/loan_calculator_admin_settings.css', array('wp-color-picker'), WW_LOAN_CALCULATOR_VERSION);

			$admin_setting_data = array(
				"ajaxurl" => admin_url('admin-ajax.php'),
				"is_user_logged_in" => (is_user_logged_in()) ? true : false,
				'enter_loan_amt_label_msg' => esc_html__('Please Enter Loan Amount Field Label', 'loan-calculator-wp'),				
				'enter_loan_amt_msg' => esc_html__('Please Enter Loan Amount Value', 'loan-calculator-wp'),
				'enter_loan_amt_min_msg' => esc_html__('Please Enter Loan Amount Minimum Value', 'loan-calculator-wp'),
				'enter_loan_amt_max_msg' => esc_html__('Please Enter Loan Amount Maximum Value', 'loan-calculator-wp'),
				'enter_interest_rate_msg' => esc_html__('Please Enter Interest Rate Value', 'loan-calculator-wp'),
				'enter_interest_rate_min_msg' => esc_html__('Please Enter Interest Rate Minimum Value', 'loan-calculator-wp'),
				'enter_interest_rate_max_msg' => esc_html__('Please Enter Interest Rate Maximum Value', 'loan-calculator-wp'),
				'enter_application_fee_msg' => esc_html__('Please Enter Application Fee', 'loan-calculator-wp'),
				'enter_monthly_rate_msg' => esc_html__('Please Enter Monthly Rate', 'loan-calculator-wp'),
				'enter_about_calcultor_label' => esc_html__('Please Enter About This Calculator Label', 'loan-calculator-wp'),
				'enter_print_label' => esc_html__('Please Enter Print Label', 'loan-calculator-wp'),
				'enter_summery_chart_label' => esc_html__('Please Enter Summery Chart Label', 'loan-calculator-wp'),
				'enter_ballon_amt_per' => esc_html__('Please Enter Balloon Amount Percentage', 'loan-calculator-wp'),
				'regular_repayment_heading' => esc_html__('Please Enter Regular Repayment Label', 'loan-calculator-wp'),
				'total_interest_payable_label' => esc_html__('Please Enter Total Interest Payable Label', 'loan-calculator-wp'),
				'enter_ballon_amt_heading' => esc_html__('Please Enter Balloon Amount Label', 'loan-calculator-wp'),
				'enter_down_payment_heading' => esc_html__('Please Enter Down Payment Label', 'loan-calculator-wp'),
				'enter_extra_payment_heading' => esc_html__('Please Enter Extra Payment Label', 'loan-calculator-wp'),
				'enter_extra_payment_save_time_label' => esc_html__('Please Enter Extra Payment Save Time Label', 'loan-calculator-wp'),
				'enter_extra_payment_total_label' => esc_html__('Please Enter Extra Payment Total Label', 'loan-calculator-wp'),
				'enter_extra_payment_save_interest_label' => esc_html__('Please Enter Extra Payment Save Interest Label', 'loan-calculator-wp'),
				'enter_application_fee_heading' => esc_html__('Please Enter Application Fee Label', 'loan-calculator-wp'),
				'enter_monthly_fee_heading' => esc_html__('Please Enter Monthly Fee Label', 'loan-calculator-wp'),
				'enter_total_regular_fees' => esc_html__('Please Enter Total Regular Fees Label', 'loan-calculator-wp'),
				'enter_total_fees' => esc_html__('Please Enter Total Fees Label', 'loan-calculator-wp'),
				'enter_repayment_chart_heading' => esc_html__('Please Enter Repayment Chart Tooltip', 'loan-calculator-wp'),				
				'enter_loan_table_heading' => esc_html__('Please Enter Loan Amortization Table Tooltip', 'loan-calculator-wp'),
				'enter_video_heading' => esc_html__('Please Enter Video Tab Tooltip', 'loan-calculator-wp'),
				'enter_youtube_video_link' => esc_html__('Please Enter Youtube Video Link', 'loan-calculator-wp'),
				'enter_contact_popup_button_heading' => esc_html__('Please Enter Contact Popup Button Label', 'loan-calculator-wp'),
				'enter_contact_popup_content' => esc_html__('Please Enter Contact Form Content', 'loan-calculator-wp'),
				'enter_contact_url' => esc_html__('Please Enter Contact URL', 'loan-calculator-wp'),
				'enter_down_payment_label' => esc_html__('Please Enter Down Payment Label', 'loan-calculator-wp'),
				'enter_down_payment_max_per' => esc_html__('Please Enter Down Payment Maximum', 'loan-calculator-wp'),
				'enter_extra_payment_max_per' => esc_html__('Please Enter Extra Payment Maximum', 'loan-calculator-wp'),
				'enter_loan_term_field_label_msg' => esc_html__('Please Enter Loan Term Field Label', 'loan-calculator-wp'),
				'enter_balloon_amount_field_label_msg' => esc_html__('Please Enter Balloon Amount Field Label', 'loan-calculator-wp'),
				'enter_extra_payment_field_label_msg' => esc_html__('Please Enter Extra Payment Field Label', 'loan-calculator-wp'),
				'enter_interest_rate_field_label_msg' => esc_html__('Please Enter Interest Rate Field Label', 'loan-calculator-wp'),
				'enter_payment_mode_field_label_msg' => esc_html__('Please Enter Payment Mode Field Label', 'loan-calculator-wp'),
				'repayment_frequency_field_label_msg' => esc_html__('Please Enter Repayment Frequency Field Label', 'loan-calculator-wp'),

			);

			// Setting data is passed in js file using Localize 
			wp_localize_script(
				'loan-calculator-admin-script',
				'admin_setting_data',
				$admin_setting_data
			);
		}


		/**
		 * Include JS and CSS for frontend	 
		 *
		 * @package Loan Calculator
		 * @since 1.0.0
		 */
		function ww_loan_calculator_front_scripts()
		{
			// CHART JS
			wp_register_script('loan-calculator-chart-js', WW_LOAN_CALCULATOR_URL . 'includes/js/chart-js/chart.js', array(), WW_LOAN_CALCULATOR_VERSION, true);

			// Font awesome
			wp_register_style('loan-calculator-font-awesome-css', WW_LOAN_CALCULATOR_URL . 'includes/css/all.min.css', array(), WW_LOAN_CALCULATOR_VERSION);

			// Custom CSS and JS
			wp_register_style('loan-calculator-new-theme-style', WW_LOAN_CALCULATOR_URL . '/includes/admin/forms/theme-templates/new-theme/css/style.css', array(), WW_LOAN_CALCULATOR_VERSION);
			wp_register_script('loan-calculator-print-script',  WW_LOAN_CALCULATOR_URL . 'includes/js/jquery.print.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);

// 			wp_register_script('loan-calculator-print-script',  WW_LOAN_CALCULATOR_URL . 'includes/js/print.min.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);

// 			wp_register_style('loan-calculator-print-style', WW_LOAN_CALCULATOR_URL . 'includes/css/print.min.css', array(), WW_LOAN_CALCULATOR_VERSION);

			wp_register_style('loan-calculator-frontend-style', WW_LOAN_CALCULATOR_URL . 'includes/css/frontend-style.css', array(), WW_LOAN_CALCULATOR_VERSION);
			wp_register_script('loan-calculator-frontend-script', WW_LOAN_CALCULATOR_URL . 'includes/js/frontend-script.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);
			wp_register_script('loan-calculator-frequency-payment', WW_LOAN_CALCULATOR_URL . 'includes/js/frequency_payment.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);
			wp_register_script('loan-calculator-datalabels', WW_LOAN_CALCULATOR_URL . 'includes/js/chart-js/chartjs-plugin-datalabels.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);
			wp_register_script('loan-calculator-break-up-of-total-payment', WW_LOAN_CALCULATOR_URL . 'includes/js/break-up-of-total-payment.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true); 


			$active_theme = wp_get_theme();
			if ($active_theme->get('Name') === 'Twenty Twenty-Four' || $active_theme->get('Name') === 'Twenty Twenty-Three' || $active_theme->get('Name') === 'Twenty Twenty-Two') {
				add_action('wp_body_open', function() {
					echo '<script>document.body.setAttribute("data-theme", "twenty-twenty-four");</script>';
				});
			}

			add_action('wp_footer', function () {
				global $setting_data;
				if (isset($setting_data) && is_array($setting_data)) {
					$formatted_data = wp_json_encode($setting_data);
					printf('<script id="loan-calculator-frontend-script-js-extra">var setting_data = %s;</script>', $formatted_data); // phpcs:ignore
				}
			});
		}

		/**
		 * Adding Hooks
		 *
		 * Adding hooks for the styles and scripts.
		 *
		 * @package Loan Calculator
		 * @since 1.0.0
		 */
		public function add_hooks()
		{
			// add scripts and styles for backend and frontend
			add_action('admin_enqueue_scripts', array($this, 'ww_loan_calculator_admin_scripts'));
			add_action('wp_enqueue_scripts', array($this, 'ww_loan_calculator_front_scripts'));
		}
	}
}
