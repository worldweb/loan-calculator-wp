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
			// Default attributes
			$atts = shortcode_atts(
				array(
					'id' => '',
					'title' => '',
				),
				$atts,
				'loan_calculator'
			);

			// Apply filter on ww_loan_calculator_all_setting_data

			$loan_calculator_all_setting_data = get_option("ww_loan_option");

			$loan_all_setting_data = apply_filters('ww_loan_calculator_all_setting_data', $loan_calculator_all_setting_data, $atts);

			$select_theme = isset($loan_all_setting_data['select_theme']) ? $loan_all_setting_data['select_theme'] : "";

			// If repayment chat is enabled then only enqueue chart js
			if (isset($loan_all_setting_data['enable_repayment_chart']) && $loan_all_setting_data['enable_repayment_chart'] == 1) {

				// Chart JS
				wp_enqueue_script('loan-calculator-jquery-ui');
				wp_enqueue_script('loan-calculator-chart-js');
			}

			$disable_font_awesome = isset($loan_all_setting_data['disable_font_awesome']) ? $loan_all_setting_data['disable_font_awesome'] : "";

			// If Disable font awesome is disable then only enqueue font awesome CSS
			if (empty($disable_font_awesome)) {
				// Font Awesome
				wp_enqueue_style('loan-calculator-font-awesome-script');
			}

		
			wp_enqueue_script('loan-calculator-frontend-script'); 	
			wp_enqueue_script('loan-calculator-frequency-payment');
			wp_enqueue_script('loan-calculator-print-script');

			// Output content based on the theme
			$html = '';

			if ($select_theme == 'new_theme') {
				ob_start();
				wp_enqueue_style('loan-calculator-new-theme-style');
				include(WW_LOAN_CALCULATOR_ADMIN . '/forms/theme-templates/new-theme/ww-loan-calculator-loan-new-theme-form.php');
				$html .= ob_get_clean();
			} else {
				ob_start();
				wp_enqueue_style('loan-calculator-frontend-style');
				include(WW_LOAN_CALCULATOR_ADMIN . '/forms/theme-templates/default-theme/ww-loan-calculator-loan-default-theme-form.php');
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
