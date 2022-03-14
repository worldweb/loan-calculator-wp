<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Scripts Class
 *
 * Handles adding scripts functionality to the admin pages as well as the front pages.
 *
 * @package Loan Calculator
 * @since 1.0.0
 */
class WW_Loan_Calculator_Script {

	/**
	 * Include JS and CSS for backend	 
	 *
	 * @package Loan Calculator
	 * @since 1.0.0
	 */
	function ww_loan_calculator_admin_scripts( $hooks_suffix ) {
		
		if( $hooks_suffix == "toplevel_page_ww_loan_calculator_page" ) {			

			// Add JS
			wp_enqueue_script( 
				'loan-calculator-admin-script',
				WW_LOAN_CALCULATOR_URL . 'includes/js/admin-script.js', 
				array('jquery'), 
				WW_LOAN_CALCULATOR_VERSION, 
				true 
			);			
		}
	}

	/**
	 * Include JS and CSS for frontend	 
	 *
	 * @package Loan Calculator
	 * @since 1.0.0
	 */
	function ww_loan_calculator_front_scripts() {				

		// CHART JS
		wp_register_script( 'loan-calculator-chart-js', WW_LOAN_CALCULATOR_URL . 'includes/js/chart-js/chart.js', array(), WW_LOAN_CALCULATOR_VERSION, true );
		wp_register_script( 'loan-calculator-chart-bundle-script', WW_LOAN_CALCULATOR_URL . 'includes/js/chart-js/chart-bundle.js', array(), WW_LOAN_CALCULATOR_VERSION, true );
		
		// Font awesome
		$loan_all_setting_data = get_option( "ww_loan_option" );
		$disable_font_awesome = isset( $loan_all_setting_data['disable_font_awesome'] ) ? $loan_all_setting_data['disable_font_awesome'] : "";

		if(empty($disable_font_awesome) && $disable_font_awesome ==""){

			wp_register_style( 'loan-calculator-font-awesome-script', WW_LOAN_CALCULATOR_URL . 'includes/css/all.min.css', array(), WW_LOAN_CALCULATOR_VERSION );	
		}		

		// Custom CSS and JS
		wp_register_style( 'loan-calculator-frontend-style', WW_LOAN_CALCULATOR_URL . 'includes/css/frontend-style.css', array(), WW_LOAN_CALCULATOR_VERSION );		
		wp_register_script( 'loan-calculator-frontend-script', WW_LOAN_CALCULATOR_URL . 'includes/js/frontend-script.js', array('jquery'), WW_LOAN_CALCULATOR_VERSION, true );						
	}

	/**
	 * Adding Hooks
	 *
	 * Adding hooks for the styles and scripts.
	 *
	 * @package Loan Calculator
	 * @since 1.0.0
	 */
	public function add_hooks() {

		// add scripts and styles for backend and frontend
		add_action( 'admin_enqueue_scripts', array( $this, 'ww_loan_calculator_admin_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'ww_loan_calculator_front_scripts'));
	}
}