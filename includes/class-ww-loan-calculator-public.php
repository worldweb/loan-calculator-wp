<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/**
 * Public Class
 *
 * Handles Loan Calculator
 *
 * @package Loan Calculator
 * @since 1.0.0
 */
if (!class_exists('WW_Loan_Calculator_Public')) {

	class WW_Loan_Calculator_Public
	{
		/**
		 * Loan Calculator Shortcode
		 *
		 * Handle to Loan Calculator Shortcode
		 *
		 * @package Loan Calculator
		 * @since 1.0.0
		 */
		public function ww_loan_calculator_shortcode_fn($atts, $content = null)
		{
			global $setting_data;

			// Default attributes
			$atts = shortcode_atts(
				array(
					'id' => '',
					'title' => '',
					'mobile-view' => 'true',
					'shortcode_render' => 'true'
				),
				$atts,
				'loan_calculator'
			);

			// Apply filter on ww_loan_calculator_all_setting_data
			$loan_all_setting_data = apply_filters( 'ww_loan_calculator_all_setting_data', get_option( 'ww_loan_option' ), $atts);

			// If repayment chat is enabled then only enqueue chart js
			if (isset($loan_all_setting_data['enable_repayment_chart']) && $loan_all_setting_data['enable_repayment_chart'] == 1) { // Chart JS
				wp_enqueue_script('loan-calculator-chart-js');
			}

			// enqueue font awesome CSS
			$disable_font_awesome = isset($loan_all_setting_data['disable_font_awesome']) ? $loan_all_setting_data['disable_font_awesome'] : "";
			if (empty($disable_font_awesome)) { // If Disable font awesome is disable then only enqueue font awesome CSS
				wp_enqueue_style('loan-calculator-font-awesome-css');
			}

			// Get all currency symbole
			$ww_loan_currency = isset($loan_all_setting_data['ww_loan_currency']) ? $loan_all_setting_data['ww_loan_currency'] : "";

			$select_theme = isset($loan_all_setting_data['select_theme']) ? $loan_all_setting_data['select_theme'] : "";


			$down_payment_option = isset($loan_all_setting_data['down_payment_option']) ? $loan_all_setting_data['down_payment_option'] : "";

			$down_payment_mode = isset($loan_all_setting_data['down_payment_mode']) ? $loan_all_setting_data['down_payment_mode'] : "fixed";




			$repay_freq_per_field_label = ww_loan_repayment_frequency_calc_label();

			// Setting data is passed in js file using Localize
			$setting_data = array(
				'loan_amount_min_value' =>  isset($loan_all_setting_data['loan_amount_min_value']) ? $loan_all_setting_data['loan_amount_min_value'] : "",
				'loan_amount_max_value'   => isset($loan_all_setting_data['loan_amount_max_value']) ? $loan_all_setting_data['loan_amount_max_value'] : "",
				'loan_term_min_value'      => isset($loan_all_setting_data['loan_term_min_value']) ? $loan_all_setting_data['loan_term_min_value'] : "",
				'loan_term_max_value' => isset($loan_all_setting_data['loan_term_max_value']) ? $loan_all_setting_data['loan_term_max_value'] : "",
				'monthly_rate' => isset($loan_all_setting_data['monthly_rate']) ? $loan_all_setting_data['monthly_rate'] : "",
				'application_fee' => isset($loan_all_setting_data['application_fee']) ? $loan_all_setting_data['application_fee'] : "",
				'back_ground_color' => isset($loan_all_setting_data['back_ground_color']) ? $loan_all_setting_data['back_ground_color'] : "",
				'interested_rate' => isset($loan_all_setting_data['interested_rate']) ? $loan_all_setting_data['interested_rate'] : "",
				'interest_rate_min_value' => isset($loan_all_setting_data['interest_rate_min_value']) ? $loan_all_setting_data['interest_rate_min_value'] : "",
				'interest_rate_max_value' => isset($loan_all_setting_data['interest_rate_max_value']) ? $loan_all_setting_data['interest_rate_max_value'] : "",
				'calculation_fee_setting_enable' => isset($loan_all_setting_data['calculation_fee_setting_enable']) ? $loan_all_setting_data['calculation_fee_setting_enable'] : "",
				'currency_symbols' => ww_loan_get_currency_symbol($ww_loan_currency),
				'remove_decimal_point' => isset($loan_all_setting_data['remove_decimal_point']) ? $loan_all_setting_data['remove_decimal_point'] : "",
				'month_label' => __('Months', 'loan-calculator-wp'),
				'year_label' => __('Years', 'loan-calculator-wp'),
				'interest_label' => __('Interest', 'loan-calculator-wp'),
				'principal_label' => __('Principal', 'loan-calculator-wp'),
				'default_balloon_amount' => isset($loan_all_setting_data['ballon_per']) ? $loan_all_setting_data['ballon_per'] : "",
				'disable_ballon_amt' => isset($loan_all_setting_data['disable_ballon_amt']) ? $loan_all_setting_data['disable_ballon_amt'] : "",
				'payment_mode_enable' => isset($loan_all_setting_data['payment_mode_enable']) ? $loan_all_setting_data['payment_mode_enable'] : "",
				'select_theme' => $select_theme,
				'regular_repayment_heading' => isset($loan_all_setting_data['regular_repayment_heading']) ? $loan_all_setting_data['regular_repayment_heading'] : "",
				'repay_freq_per_month_label' => $repay_freq_per_field_label['Monthly'],
				'repay_freq_per_quarter_label' => $repay_freq_per_field_label['Quarterly'],
				'repay_freq_per_year_label' => $repay_freq_per_field_label['Yearly'],
				'repay_freq_per_week_label' => $repay_freq_per_field_label['Weekly'],
				'repay_freq_per_fortnight_label' => $repay_freq_per_field_label['Fortnight'],
				'chart_types' => isset($loan_all_setting_data['chart_types']) ? $loan_all_setting_data['chart_types'] : "line",
				'down_payment_option' => $down_payment_option,
				'down_payment_mode' => $down_payment_mode,
				'down_payment_label_str' => __('Down Payment', 'loan-calculator-wp'),
				'font_awesome_css_url' => WW_LOAN_CALCULATOR_URL . 'includes/css/all.min.css'
			);

			wp_localize_script('loan-calculator-frontend-script', 'setting_data', $setting_data);

			wp_enqueue_script('loan-calculator-frontend-script');
			wp_enqueue_script('loan-calculator-frequency-payment');
			wp_enqueue_script('loan-calculator-print-script');

			wp_enqueue_style('loan-calculator-print-style');

			// Output content based on the theme
			$html = '';
			if ($select_theme == 'new_theme') {
				ob_start();
				include(WW_LOAN_CALCULATOR_ADMIN . '/forms/theme-templates/new-theme/ww-loan-calculator-loan-new-theme-form.php');
				wp_enqueue_style('loan-calculator-new-theme-style');
				$html .= ob_get_clean();
			} else {
				ob_start();
				include(WW_LOAN_CALCULATOR_ADMIN . '/forms/theme-templates/default-theme/ww-loan-calculator-loan-default-theme-form.php');
				wp_enqueue_style('loan-calculator-frontend-style');
				$html .= ob_get_clean();
			}

			return $html;
		}

		/**
		 * Adding Hooks
		 *
		 * @package Loan Calculator
		 * @since 1.0.0
		 */
		function add_hooks()
		{
			// Add Calculator Shortcode
			add_shortcode('loan_calculator', array($this, 'ww_loan_calculator_shortcode_fn'));
		}
	}
}
