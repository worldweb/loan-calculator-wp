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
			// Add JS
			wp_enqueue_script(
				'loan-calculator-admin-script',
				WW_LOAN_CALCULATOR_URL . 'includes/js/admin-script.js',
				array('jquery'),
				WW_LOAN_CALCULATOR_VERSION,
				true
			);

			wp_enqueue_script('post_type_admin_js', WW_LOAN_CALCULATOR_URL . 'includes/js/post_type_admin.js', array(), WW_LOAN_CALCULATOR_VERSION, true);
			WW_LOAN_CALCULATOR_URL . 'includes/js/post_type_admin.js';

			wp_enqueue_script('fstdropdown', WW_LOAN_CALCULATOR_URL . 'includes/js/fstdropdown.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);
			wp_enqueue_script('fstdropdown.min', WW_LOAN_CALCULATOR_URL . 'includes/js/fstdropdown.min.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);

			wp_enqueue_style('post_type_admin_css', WW_LOAN_CALCULATOR_URL . 'includes/css/post_type_admin.css', array(), WW_LOAN_CALCULATOR_VERSION);

			wp_enqueue_style('fstdropdown_select', WW_LOAN_CALCULATOR_URL . 'includes/css/fstdropdown.css', array(), WW_LOAN_CALCULATOR_VERSION);
			wp_enqueue_style('fstdropdown.min_select', WW_LOAN_CALCULATOR_URL . 'includes/css/fstdropdown.min.css', array(), WW_LOAN_CALCULATOR_VERSION);

			$admin_setting_data = array(
				"ajaxurl" => admin_url('admin-ajax.php'),
				"is_user_logged_in" => (is_user_logged_in()) ? true : false,
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
			wp_register_style('loan-calculator-font-awesome-script', WW_LOAN_CALCULATOR_URL . 'includes/css/all.min.css', array(), WW_LOAN_CALCULATOR_VERSION);

			// Custom CSS and JS
			wp_register_style('loan-calculator-new-theme-style', WW_LOAN_CALCULATOR_URL . '/includes/admin/forms/theme-templates/new-theme/css/style.css', array(), WW_LOAN_CALCULATOR_VERSION);
			wp_register_script('loan-calculator-print-script', WW_LOAN_CALCULATOR_URL . 'includes/js/jquery.print.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);
			wp_register_style('loan-calculator-frontend-style', WW_LOAN_CALCULATOR_URL . 'includes/css/frontend-style.css', array(), WW_LOAN_CALCULATOR_VERSION);
			wp_register_script('loan-calculator-frontend-script', WW_LOAN_CALCULATOR_URL . 'includes/js/frontend-script.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);
			wp_register_script('loan-calculator-frequency-payment', WW_LOAN_CALCULATOR_URL . 'includes/js/frequency_payment.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true);
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
