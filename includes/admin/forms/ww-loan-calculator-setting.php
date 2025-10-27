<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;
/**
 * Settings Page
 *
 * Handle settings
 *
 * @package Loan Calculator
 * @since 1.0.0
 */
// Get Loan Calculator Setting From Option Table.
$loan_all_setting_data = get_option("ww_loan_option");
$disable_ballon_amt = isset($loan_all_setting_data['disable_ballon_amt']) ? $loan_all_setting_data['disable_ballon_amt'] : "";
if ($disable_ballon_amt == 1) {
    $loan_all_setting_data['ballon_per'] = 0;
    update_option("ww_loan_option", $loan_all_setting_data);
    $loan_all_setting_data = get_option("ww_loan_option");
}
/* START : Fetch Selected Theme Setting */
$select_theme = isset($loan_all_setting_data['select_theme']) ? $loan_all_setting_data['select_theme'] : "";

/* END : Fetch Selected Theme Setting */
/* START : Fetch Color Setting */
$font_family_new_theme = isset($loan_all_setting_data['font_family_new_theme']) ?  ($loan_all_setting_data['font_family_new_theme']) : "";
$back_ground_color = isset($loan_all_setting_data['back_ground_color']) ? $loan_all_setting_data['back_ground_color'] : "";
$selected_color = isset($loan_all_setting_data['selected_color']) ? $loan_all_setting_data['selected_color'] : "";
$background_light_color = isset($loan_all_setting_data['background_light_color']) ? $loan_all_setting_data['background_light_color'] : "";
$border_color = isset($loan_all_setting_data['border_color']) ? $loan_all_setting_data['border_color'] : "";
$graph_color = isset($loan_all_setting_data['graph_color']) ? $loan_all_setting_data['graph_color'] : "";
$graph_color_sub = isset($loan_all_setting_data['graph_color_sub']) ? $loan_all_setting_data['graph_color_sub'] : "";
$graph_border_color = isset($loan_all_setting_data['graph_border_color']) ? $loan_all_setting_data['graph_border_color'] : "";
$graph_border_color_sub = isset($loan_all_setting_data['graph_border_color_sub']) ? $loan_all_setting_data['graph_border_color_sub'] : "";
/* END : Fetch Color Setting */
/* START : Amount Field Value Setting */
$ballon_per = isset($loan_all_setting_data['ballon_per']) ? $loan_all_setting_data['ballon_per'] : "";
$loan_term = isset($loan_all_setting_data['loan_term']) ? $loan_all_setting_data['loan_term'] : "";
$loan_amount = isset($loan_all_setting_data['loan_amount']) ? $loan_all_setting_data['loan_amount'] : "";
$loan_amount_min_value = isset($loan_all_setting_data['loan_amount_min_value']) ? $loan_all_setting_data['loan_amount_min_value'] : "";
$loan_amount_max_value = isset($loan_all_setting_data['loan_amount_max_value']) ? $loan_all_setting_data['loan_amount_max_value'] : "";
$loan_term_min_value = isset($loan_all_setting_data['loan_term_min_value']) ? $loan_all_setting_data['loan_term_min_value'] : "";
$loan_term_max_value = isset($loan_all_setting_data['loan_term_max_value']) ? $loan_all_setting_data['loan_term_max_value'] : "";
$interested_rate = isset($loan_all_setting_data['interested_rate']) ? $loan_all_setting_data['interested_rate'] : "";
$interest_rate_min_value = isset($loan_all_setting_data['interest_rate_min_value']) ? $loan_all_setting_data['interest_rate_min_value'] : "";
$interest_rate_max_value = isset($loan_all_setting_data['interest_rate_max_value']) ? $loan_all_setting_data['interest_rate_max_value'] : "";
$monthly_rate = isset($loan_all_setting_data['monthly_rate']) ? $loan_all_setting_data['monthly_rate'] : "";
$application_fee = isset($loan_all_setting_data['application_fee']) ? $loan_all_setting_data['application_fee'] : "";
$application_fee_heading = isset($loan_all_setting_data['application_fee_heading']) ? $loan_all_setting_data['application_fee_heading'] : esc_html__('Application fee', 'loan-calculator-wp');
$monthly_fee_heading = isset($loan_all_setting_data['monthly_fee_heading']) ? $loan_all_setting_data['monthly_fee_heading'] : esc_html__('Monthly fee', 'loan-calculator-wp');
$total_regular_fees = isset($loan_all_setting_data['total_regular_fees']) ? $loan_all_setting_data['total_regular_fees'] : "";
$total_fees = isset($loan_all_setting_data['total_fees']) ? $loan_all_setting_data['total_fees'] : "";
/* END : Amount Field Value Setting */
/* START : Calculation Result */
$regular_repayment_heading = isset($loan_all_setting_data['regular_repayment_heading']) ? $loan_all_setting_data['regular_repayment_heading'] : esc_html__('{frequency} Payment', 'loan-calculator-wp');
$per_month_heading = isset($loan_all_setting_data['per_month_heading']) ? $loan_all_setting_data['per_month_heading'] : esc_html__('Per month for', 'loan-calculator-wp');
$years_heading = isset($loan_all_setting_data['years_heading']) ? $loan_all_setting_data['years_heading'] : esc_html__('years', 'loan-calculator-wp');
$total_interests_payable_heading = isset($loan_all_setting_data['total_interests_payable_heading']) ? $loan_all_setting_data['total_interests_payable_heading'] : esc_html__('Total interest payable', 'loan-calculator-wp');
$over_heading = isset($loan_all_setting_data['over_heading']) ? $loan_all_setting_data['over_heading'] : esc_html__('over', 'loan-calculator-wp');
$ballon_amt_heading = isset($loan_all_setting_data['ballon_amt_heading']) ? $loan_all_setting_data['ballon_amt_heading'] : esc_html__('Balloon amount', 'loan-calculator-wp');
$down_payment_heading = isset($loan_all_setting_data['down_payment_heading']) ? $loan_all_setting_data['down_payment_heading'] : esc_html__('Down Payment Amount', 'loan-calculator-wp');
/* END : Calculation Result */
/* START : Tab Field Setting */
$loan_feature_product_heading = isset($loan_all_setting_data['loan_feature_product_heading']) ? $loan_all_setting_data['loan_feature_product_heading'] : esc_html__('Loan Product Features', 'loan-calculator-wp');
$video_heading = isset($loan_all_setting_data['video_heading']) ? $loan_all_setting_data['video_heading'] : esc_html__('Video', 'loan-calculator-wp');
$loan_table_heading = isset($loan_all_setting_data['loan_table_heading']) ? $loan_all_setting_data['loan_table_heading'] : "";
$repayment_chart_heading = isset($loan_all_setting_data['repayment_chart_heading']) ? $loan_all_setting_data['repayment_chart_heading'] : esc_html__('Repayment Chart', 'loan-calculator-wp');
$youtube_video_link = isset($loan_all_setting_data['youtube_video_link']) ? $loan_all_setting_data['youtube_video_link'] : "";
/* END : Tab Field Setting */
/* START : Calculator Disclaimer Setting*/
$contact_info_heading = isset($loan_all_setting_data['contact_info_heading']) ? $loan_all_setting_data['contact_info_heading'] : "";
$contact_popup_button_heading = isset($loan_all_setting_data['contact_popup_button_heading']) ? $loan_all_setting_data['contact_popup_button_heading'] : "";
$calculator_disclaimer_heading = isset($loan_all_setting_data['calculator_disclaimer_heading']) ? $loan_all_setting_data['calculator_disclaimer_heading'] : "";
$calculator_disclaimer_description = isset($loan_all_setting_data['calculator_disclaimer_description']) ? $loan_all_setting_data['calculator_disclaimer_description'] : "";
$contact_popup_content = isset($loan_all_setting_data['contact_popup_content']) ? $loan_all_setting_data['contact_popup_content'] : "";
$contact_type = isset($loan_all_setting_data['contact_type']) ? $loan_all_setting_data['contact_type'] : "popup";
$contact_url = isset($loan_all_setting_data['contact_url']) ? $loan_all_setting_data['contact_url'] : "";
/* END :  Calculator Disclaimer Setting*/
/* START : Tooltip Setting */
$loan_amount_tooltip = isset($loan_all_setting_data['loan_amount_tooltip']) ? $loan_all_setting_data['loan_amount_tooltip'] : "";
$loan_amount_label = isset($loan_all_setting_data['loan_amount_label']) ? $loan_all_setting_data['loan_amount_label'] : esc_html__('Loan Amount', 'loan-calculator-wp');
$loan_terms_tooltip = isset($loan_all_setting_data['loan_terms_tooltip']) ? $loan_all_setting_data['loan_terms_tooltip'] : "";
$payment_mode_tooltip = isset($loan_all_setting_data['payment_mode_tooltip']) ? $loan_all_setting_data['payment_mode_tooltip'] : "";
$interest_rates_tooltip = isset($loan_all_setting_data['interest_rates_tooltip']) ? $loan_all_setting_data['interest_rates_tooltip'] : "";
$balloon_amount_tooltip = isset($loan_all_setting_data['balloon_amount_tooltip']) ? $loan_all_setting_data['balloon_amount_tooltip'] : "";
/* Disable Payment Mode*/
$payment_mode_enable = isset($loan_all_setting_data['payment_mode_enable']) ? $loan_all_setting_data['payment_mode_enable'] : "";
$choose_default_payment_mode = isset($loan_all_setting_data['choose_default_payment_mode']) ? $loan_all_setting_data['choose_default_payment_mode'] : "";
/* END : Tooltip Setting */
/* START : Header Link Section*/
$print_label = isset($loan_all_setting_data['print_label']) ? $loan_all_setting_data['print_label'] : esc_html__('Print', 'loan-calculator-wp');
$about_this_calculator_disable = isset($loan_all_setting_data['about_this_calculator_disable']) ? $loan_all_setting_data['about_this_calculator_disable'] : "";
$about_this_calculator = isset($loan_all_setting_data['about_this_calculator']) ? $loan_all_setting_data['about_this_calculator'] : "";
$calculator_popup_content = isset($loan_all_setting_data['calculator_popup_content']) ? $loan_all_setting_data['calculator_popup_content'] : "";
$print_option_heading = isset($loan_all_setting_data['print_option_heading']) ? $loan_all_setting_data['print_option_heading'] : "";
/* END : Header Link Section */
/* START : Calculation Fee Setting Enable */
$calculation_fee_setting_enable = isset($loan_all_setting_data['calculation_fee_setting_enable']) ? $loan_all_setting_data['calculation_fee_setting_enable'] : "";
$calculator_heading = isset($loan_all_setting_data['calculator_heading']) ? $loan_all_setting_data['calculator_heading'] : "";
$print_option_enable = isset($loan_all_setting_data['print_option_enable']) ? $loan_all_setting_data['print_option_enable'] : "";
/* END : Calculation Fee Setting Enable */
/* START : Delete Setting */
$delete_data_enable = isset($loan_all_setting_data['delete_data_enable']) ? $loan_all_setting_data['delete_data_enable'] : "";
$disable_font_awesome = isset($loan_all_setting_data['disable_font_awesome']) ? $loan_all_setting_data['disable_font_awesome'] : "";
$remove_decimal_point = isset($loan_all_setting_data['remove_decimal_point']) ? $loan_all_setting_data['remove_decimal_point'] : "";
/* END : Delete Setting */
/* START : Tab Enable Settings */
$enable_repayment_chart = isset($loan_all_setting_data['enable_repayment_chart']) ? $loan_all_setting_data['enable_repayment_chart'] : "";
$enable_video_tab = isset($loan_all_setting_data['enable_video_tab']) ? $loan_all_setting_data['enable_video_tab'] : "";
$enable_loan_mortisation_tab = isset($loan_all_setting_data['enable_loan_mortisation_tab']) ? $loan_all_setting_data['enable_loan_mortisation_tab'] : "";
/* END : Tab Enable Settings */
/* START : NEW SETTINGS ADDED */
$disable_ballon_amt = isset($loan_all_setting_data['disable_ballon_amt']) ? $loan_all_setting_data['disable_ballon_amt'] : "";
/* Repayment Frequency options */
$get_repayment_frequency = (isset($loan_all_setting_data['repayment_frequency']) ? $loan_all_setting_data['repayment_frequency'] : "");
$disable_contactus_section = isset($loan_all_setting_data['disable_contactus_section']) ? $loan_all_setting_data['disable_contactus_section'] : "";
$disable_calculator_disclaimer_section = isset($loan_all_setting_data['disable_calculator_disclaimer_section']) ? $loan_all_setting_data['disable_calculator_disclaimer_section'] : "";
$disable_tabs_icon = isset($loan_all_setting_data['disable_tabs_icon']) ? $loan_all_setting_data['disable_tabs_icon'] : "";
$get_chart_types = ww_loan_chart_types();
$chart_types = isset($loan_all_setting_data['chart_types']) ? $loan_all_setting_data['chart_types'] : "line";
/* END : NEW SETTING ADDED */

/*   loan term label option */

$ww_loan_term_label = isset($loan_all_setting_data['ww_loan_term_label']) ? $loan_all_setting_data['ww_loan_term_label'] : "";
/*   loan term label option */


/*   loan term interest payable option */

$ww_loan_total_interest_payable = isset($loan_all_setting_data['ww_loan_total_interest_payable']) ? $loan_all_setting_data['ww_loan_total_interest_payable'] : "";

/*   loan term interest payable option */


/* down payment option */

$down_payment_option = isset($loan_all_setting_data['down_payment_option']) ? $loan_all_setting_data['down_payment_option'] : "";

$down_payment_mode = isset($loan_all_setting_data['down_payment_mode']) ? $loan_all_setting_data['down_payment_mode'] : "fixed";

$down_payment_fields_display_style = "";

if($down_payment_option != '1'){

    $down_payment_fields_display_style = 'style=display:none;';

}


$down_payment_tooltip = isset($loan_all_setting_data['down_payment_tooltip']) ? $loan_all_setting_data['down_payment_tooltip'] : "";


/* down paymnet label and max cap */

$down_payment_label = isset($loan_all_setting_data['down_payment_label']) ? $loan_all_setting_data['down_payment_label'] : esc_html__('Down Payment', 'loan-calculator-wp');

$down_payment_max_per = isset($loan_all_setting_data['down_payment_max_per']) ? $loan_all_setting_data['down_payment_max_per'] : "100";


/* down payment option */

/* extra payment option */

$extra_payment_option = isset($loan_all_setting_data['extra_payment_option']) ? $loan_all_setting_data['extra_payment_option'] : "";

$extra_payment_max_per = isset($loan_all_setting_data['extra_payment_max_per']) ? $loan_all_setting_data['extra_payment_max_per'] : "100";

$extra_payment_fields_display_style = "";

if($extra_payment_option != '1'){

    $extra_payment_fields_display_style = 'style=display:none;';
}

$extra_payment_tooltip = isset($loan_all_setting_data['extra_payment_tooltip']) ? $loan_all_setting_data['extra_payment_tooltip'] : "";


$extra_payment_heading = isset($loan_all_setting_data['extra_payment_heading']) ? $loan_all_setting_data['extra_payment_heading'] : esc_html__('Extra Payment Amount', 'loan-calculator-wp');      


$extra_payment_save_time_label = isset($loan_all_setting_data['extra_payment_save_time_label']) ? $loan_all_setting_data['extra_payment_save_time_label'] : esc_html__('Time Saved From Extra Payments', 'loan-calculator-wp');  

$extra_payment_total_label = isset($loan_all_setting_data['extra_payment_total_label']) ? $loan_all_setting_data['extra_payment_total_label'] : esc_html__('Total Extra Payments', 'loan-calculator-wp');  


$hide_total_extra_payments = isset($loan_all_setting_data['hide_total_extra_payments']) ? $loan_all_setting_data['hide_total_extra_payments'] : "";

$hide_save_time_extra_payments = isset($loan_all_setting_data['hide_save_time_extra_payments']) ? $loan_all_setting_data['hide_save_time_extra_payments'] : "";


$extra_payment_save_interest_label = isset($loan_all_setting_data['extra_payment_save_interest_label']) ? $loan_all_setting_data['extra_payment_save_interest_label'] : esc_html__('Interest Saved From Extra Payments', 'loan-calculator-wp'); 

$hide_save_interest_extra_payments = isset($loan_all_setting_data['hide_save_interest_extra_payments']) ? $loan_all_setting_data['hide_save_interest_extra_payments'] : "";


/* extra payment option */

/* disable interest rate adjustment */

$interest_rates_adj_disable = isset($loan_all_setting_data['interest_rates_adj_disable']) ? $loan_all_setting_data['interest_rates_adj_disable'] : "";

/* remove all range slider fields */

$remove_range_sliders = isset($loan_all_setting_data['remove_range_sliders']) ? $loan_all_setting_data['remove_range_sliders'] : "";


/* stacked bar chart options */

$balance_border_color_graph = isset($loan_all_setting_data['balance_border_color_graph']) ? $loan_all_setting_data['balance_border_color_graph'] : "";
$balance_point_background_color_graph = isset($loan_all_setting_data['balance_point_background_color_graph']) ? $loan_all_setting_data['balance_point_background_color_graph'] : "";
$extra_payment_graph_color = isset($loan_all_setting_data['extra_payment_graph_color']) ? $loan_all_setting_data['extra_payment_graph_color'] : "";


/* summary pie chart options */

$summary_chart_option = isset($loan_all_setting_data['summary_chart_option']) ? $loan_all_setting_data['summary_chart_option'] : "";


$summary_chart_fields_display_style = "";

if($summary_chart_option != '1'){

    $summary_chart_fields_display_style = 'style=display:none;';
}

$summary_chart_label = isset($loan_all_setting_data['summary_chart_label']) ? $loan_all_setting_data['summary_chart_label'] : esc_html__('Break-up of Total Payment', 'loan-calculator-wp');

$summary_chart_principal_fill_color = isset($loan_all_setting_data['summary_chart_principal_fill_color']) ? $loan_all_setting_data['summary_chart_principal_fill_color'] : "";

$summary_chart_interest_fill_color = isset($loan_all_setting_data['summary_chart_interest_fill_color']) ? $loan_all_setting_data['summary_chart_interest_fill_color'] : "";

$summary_chart_ballon_payment_fill_color = isset($loan_all_setting_data['summary_chart_ballon_payment_fill_color']) ? $loan_all_setting_data['summary_chart_ballon_payment_fill_color'] : "";

$summary_chart_down_payment_fill_color = isset($loan_all_setting_data['summary_chart_down_payment_fill_color']) ? $loan_all_setting_data['summary_chart_down_payment_fill_color'] : "";

$summary_chart_extra_payment_fill_color = isset($loan_all_setting_data['summary_chart_extra_payment_fill_color']) ? $loan_all_setting_data['summary_chart_extra_payment_fill_color'] : "";

/* field label start */

$loan_term_field_label = isset($loan_all_setting_data['loan_term_field_label']) ? $loan_all_setting_data['loan_term_field_label'] : esc_html__('No. of Payments', 'loan-calculator-wp'); 

$repayment_frequency_field_label = isset($loan_all_setting_data['repayment_frequency_field_label']) ? $loan_all_setting_data['repayment_frequency_field_label'] : esc_html__('Repayment Frequency', 'loan-calculator-wp');

$balloon_amount_field_label = isset($loan_all_setting_data['balloon_amount_field_label']) ? $loan_all_setting_data['balloon_amount_field_label'] : esc_html__('Balloon Amount', 'loan-calculator-wp');

$extra_payment_field_label = isset($loan_all_setting_data['extra_payment_field_label']) ? $loan_all_setting_data['extra_payment_field_label'] : esc_html__('Extra Payment', 'loan-calculator-wp');   

$interest_rate_field_label = isset($loan_all_setting_data['interest_rate_field_label']) ? $loan_all_setting_data['interest_rate_field_label'] : esc_html__('Interest Rate', 'loan-calculator-wp');    

$payment_mode_field_label = isset($loan_all_setting_data['payment_mode_field_label']) ? $loan_all_setting_data['payment_mode_field_label'] : esc_html__('Payment Mode', 'loan-calculator-wp');   

$hide_payment_mode = isset($loan_all_setting_data['hide_payment_mode']) ? $loan_all_setting_data['hide_payment_mode'] : "";

$payment_mode_fields_display_style = "";

if($hide_payment_mode == '1'){

    $payment_mode_fields_display_style = 'style=display:none;';

}

?>
<!-- . begining of wrap -->
<div class="wrap">
    <?php
    echo "<h2>" . esc_html__(' Loan Calculator', 'loan-calculator-wp') . "</h2>";
	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_wpnonce'])) {
		$nonce_POST = sanitize_text_field(wp_unslash($_POST['_wpnonce']));
    	if (!isset($nonce_POST) || !wp_verify_nonce($nonce_POST, 'update')) {
			wp_die(esc_attr('Nonce verification failed. Please try again.', 'loan-calculator-wp'));
		}
	}
    ?>
    <?php
    /* START : Tab Setting Active */
    $general_settings_Screen = ((!isset($_GET['action'])) || (isset($_GET['action']) && 'general_settings' == $_GET['action'])) ? true : false;
    $display_settings_Screen = (isset($_GET['action']) && 'display_settings' == $_GET['action']) ? true : false;
    $default_value_Screen = (isset($_GET['action']) && 'default_value' == $_GET['action']) ? true : false;
    $calculation_Screen = (isset($_GET['action']) && 'calculation' == $_GET['action']) ? true : false;
    $tab_setting_Screen = (isset($_GET['action']) && 'tab_setting' == $_GET['action']) ? true : false;
    $calculator_disclaimer_Screen = (isset($_GET['action']) && 'calculator_disclaimer' == $_GET['action']) ? true : false;
    $tooltip_Screen = (isset($_GET['action']) && 'tooltip' == $_GET['action']) ? true : false;
    $delete_Screen = (isset($_GET['action']) && 'misc_setting' == $_GET['action']) ? true : false;

    $label_settings_screen = (isset($_GET['action']) && 'label_settings' == $_GET['action']) ? true : false;

    /* END : Tab Setting Active */
    ?>
    <!-- beginning of the plugin options form -->
    <!-- START : Loan Calculator Setting Tab -->
    <h2 class="nav-tab-wrapper">
        <a href="<?php echo esc_url(add_query_arg(array('action' => 'general_settings'), admin_url('admin.php?page=ww_loan_calculator_page'))); ?>" class="nav-tab<?php if ($general_settings_Screen) echo ' nav-tab-active'; ?>"><?php esc_html_e('General Settings', 'loan-calculator-wp'); ?></a>
        <a href="<?php echo esc_url(add_query_arg(array('action' => 'display_settings'), admin_url('admin.php?page=ww_loan_calculator_page'))); ?>" class="nav-tab<?php if ($display_settings_Screen) echo ' nav-tab-active'; ?>"><?php esc_html_e('Display Settings', 'loan-calculator-wp'); ?></a>
        <a href="<?php echo esc_url(add_query_arg(array('action' => 'default_value'), admin_url('admin.php?page=ww_loan_calculator_page'))); ?>" class="nav-tab<?php if ($default_value_Screen) echo ' nav-tab-active'; ?>"><?php esc_html_e('Default Value Settings', 'loan-calculator-wp'); ?></a>
        <a href="<?php echo esc_url(add_query_arg(array('action' => 'tab_setting'), admin_url('admin.php?page=ww_loan_calculator_page'))); ?>" class="nav-tab<?php if ($tab_setting_Screen) echo ' nav-tab-active'; ?>"><?php esc_html_e('Tab Field', 'loan-calculator-wp'); ?></a>
        <a href="<?php echo esc_url(add_query_arg(array('action' => 'calculator_disclaimer'), admin_url('admin.php?page=ww_loan_calculator_page'))); ?>" class="nav-tab<?php if ($calculator_disclaimer_Screen) echo ' nav-tab-active'; ?>"><?php esc_html_e('Contact Us / Disclaimer', 'loan-calculator-wp'); ?></a>
        <a href="<?php echo esc_url(add_query_arg(array('action' => 'label_settings'), admin_url('admin.php?page=ww_loan_calculator_page'))); ?>" class="nav-tab<?php if ($label_settings_screen) echo ' nav-tab-active'; ?>"><?php esc_html_e('Label Settings', 'loan-calculator-wp'); ?></a>
        <a href="<?php echo esc_url(add_query_arg(array('action' => 'misc_setting'), admin_url('admin.php?page=ww_loan_calculator_page'))); ?>" class="nav-tab<?php if ($delete_Screen) echo ' nav-tab-active'; ?>"><?php esc_html_e('Misc Settings', 'loan-calculator-wp'); ?></a>
    </h2>
    <!-- END : Loan Calculator Setting Tab -->
    <!-- START : Loan Calculator Form -->
    <form name="loan_calculator_form" id="loan_calculator_form_settings" action="options.php" method="POST" novalidate="novalidate">
        <?php
        settings_fields('ww_loan_calculaor_option');
        do_settings_sections('ww_loan_calculaor_option');
        ?>
        <table class="form-table sa-manage-level-product-box" id="calculation_fee" style="display: <?php echo ($general_settings_Screen) ? esc_html('table') : esc_html('none'); ?>">
            <tbody>
                <?php
                $calculation_fee_display = "style=display:none;";
                if ($calculation_fee_setting_enable == 1) {
                    $calculation_fee_display = "";
                }
                $print_option_display_heading = "style=display:none;";
                if ($print_option_enable == 1) {
                    $print_option_display_heading = "";
                }
                ?>
                <tr>
                    <td colspan="2">
                        <h2><?php esc_html_e('General Settings', 'loan-calculator-wp'); ?> </h2>
                        <span class="heading-tooltip-section">
                            <?php esc_html_e('Configure calculator general settings.', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="calculation_fee_setting_enable_lbl"><strong><?php esc_html_e('Shortcode', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <code style="font-size: large;"><b><?php esc_html_e('[loan_calculator]', 'loan-calculator-wp'); ?></b></code><br /><br />
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Copy this shortcode and add in any post or page', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="calculator_heading"><strong><?php esc_html_e('Calculator Heading Title', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[calculator_heading]' id='calculator_heading' maxlength="300" value='<?php echo esc_attr($calculator_heading, 'loan-calculator-wp'); ?>' class="regular-text" /> <br />
                        <br />
                        <span class="description"><i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Display calculator heading title', 'loan-calculator-wp'); ?></i></span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="about_this_calculator_disable"><strong><?php esc_html_e('Disable About This Calculator Option', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[about_this_calculator_disable]' id='about_this_calculator_disable' value='1' <?php checked($about_this_calculator_disable, 1) ?> class="regular-text"><br /><br />
                        <span class="description"><i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(':  Check this box to disable about this Calculator option appear on top-right.', 'loan-calculator-wp'); ?></i></span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="about_this_calculator"><strong><?php esc_html_e('About This Calculator Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[about_this_calculator]' id='about_this_calculator' maxlength="100" value='<?php echo esc_attr($about_this_calculator, 'loan-calculator-wp'); ?>' class="regular-text" />
                        <br><br>
                        <span class="description"><i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Display on top right of the calculator', 'loan-calculator-wp'); ?></i></span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="calculator_popup_content"><strong><?php esc_html_e('About Calculator Popup Content', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <?php
                        $settings = array(
                            'textarea_name' => 'ww_loan_option[calculator_popup_content]',
                            'textarea_rows' => '10',
                            'tinymce' => true,
                            'media_buttons' => false,
                            'wpautop' => false,
                        );
                        wp_editor($calculator_popup_content, 'ww_loan_option_calculator_popup_content', $settings);
                        ?><br /><br />
                        <span class="description"><i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Enter the about calculator information which will be displayed on click of About us calculator label', 'loan-calculator-wp'); ?></i></span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="print_option_enable"><strong><?php esc_html_e('Enable Print Option', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[print_option_enable]' id='print_option_enable' value='<?php esc_attr_e('1', 'loan-calculator-wp'); ?>' <?php echo ($print_option_enable == 1) ? esc_html("checked") : ""; ?> class="regular-text">
                        <label for="print_option_enable"><?php esc_html_e('Enable Print Option', 'loan-calculator-wp'); ?></label>
                        <br /><br />
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Check this box to enable print option. It will be visible on top right of the calculator', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr>
                <tr class='print-option-heading' <?php echo esc_attr($print_option_display_heading, 'loan-calculator-wp'); ?>>
                    <th scope="row">
                        <label for="print_option_heading"><strong><?php esc_html_e('Print Option Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[print_option_heading]' id='print_option_heading' value='<?php echo esc_attr($print_option_heading, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="about_this_calculator"><strong><?php esc_html_e('Currency ', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <?php
                        $ww_loan_get_currencies = ww_loan_get_currencies();
                        $selected_currency = ww_loan_get_currency();
                        ?>
                        <select name="ww_loan_option[ww_loan_currency]" id="ww_loan_option" class="fstdropdown-select" searchdisable="false">
                            <?php
                            if (!empty($ww_loan_get_currencies)) {
                                foreach ($ww_loan_get_currencies as $key_currencies => $val_currencies) {
                                    $currency_symbol = ww_loan_get_currency_symbol($key_currencies);
                                    if (!empty($currency_symbol)) {
                                        $currency_symbol = " ( " . $currency_symbol . " )";
                                    }
                            ?>
                                    <option value="<?php echo esc_attr($key_currencies); ?>" <?php echo ($selected_currency == $key_currencies) ? "selected" : ""; ?>><?php echo esc_attr($val_currencies . $currency_symbol); ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="repayment_frequency"><strong><?php esc_html_e('Enable Repayment Frequency', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <?php
                        $frequencies = [
                            'Monthly'   => __('Monthly', 'loan-calculator-wp'),
                            'Yearly'    => __('Yearly', 'loan-calculator-wp'),
                            'Quarterly' => __('Quarterly', 'loan-calculator-wp'),
                            'Fortnight' => __('Fortnightly', 'loan-calculator-wp'),
                            'Weekly'    => __('Weekly', 'loan-calculator-wp'),
                        ];

                        // Get saved selected repayment frequencies in order
                        $saved_selection = $get_repayment_frequency ?? []; // e.g. ['Yearly', 'Monthly']

                        // Ensure default if nothing selected
                        if (empty($saved_selection)) {
                            $saved_selection = ['Monthly'];
                        }

                        $selected_items = array_values(array_filter($saved_selection, function ($key) use ($saved_selection) {
                            return in_array($key, $saved_selection);
                        }));

                        // Get unselected options
                        $default_order = array_keys($frequencies);
                        $unselected_items = array_diff($default_order, $selected_items);

                    ?>
                            <div class="sortable-container">
                                <!-- Unselected + Not Sortable -->
                                <div class="sortable-wrapper">
                                    <h4><?php esc_html_e('Disabled Options', 'loan-calculator-wp'); ?></h4>
                                    <ul id="sortable-disabled" class="sortable-list disabled-options">
                                        <?php foreach ($unselected_items as $key): ?>
                                            <li data-key="<?= esc_attr($key); ?>">
                                                <label>
                                                    <input type="checkbox"
                                                           name="ww_loan_option[repayment_frequency][]"
                                                           value="<?= esc_attr($key); ?>" class="toggle-repayment">
                                                    <?= esc_html($frequencies[$key]); ?>
                                                </label>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <!-- Selected + Sortable -->
                                <div class="sortable-wrapper">
                                    <h4><?php esc_html_e('Enabled Options ( Drag to Reorder )', 'loan-calculator-wp'); ?></h4>
                                    <ul id="sortable-enabled" class="sortable-list enabled-options">
                                        <?php foreach ($selected_items as $key): ?>
                                           <li data-key="<?= esc_attr($key); ?>">
                                                <span class="drag-handle" title="<?php esc_attr_e('Drag to reorder', 'loan-calculator-wp'); ?>">⋮⋮</span>
                                                <label>
                                                    <input type="checkbox" checked
                                                           name="ww_loan_option[repayment_frequency][]"
                                                           value="<?= esc_attr($key); ?>" class="toggle-repayment">
                                                    <?= esc_html($frequencies[$key]); ?>
                                                </label>
                                            </li>

                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                        <p><i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp'); ?></b> <?php esc_html_e('If no Repayment Frequency Options are selected, the monthly option will be automatically displayed on the frontend by default.', 'loan-calculator-wp'); ?></i></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="form-table sa-manage-level-product-box" id="color" style="display: <?php echo ($display_settings_Screen) ? esc_html('table') : esc_html('none'); ?>">
            <tbody>
                <tr>
                    <td colspan="2">
                        <h2><?php esc_html_e('Display Color Settings', 'loan-calculator-wp'); ?></h2>
                        <span class="heading-tooltip-section">
                            <?php esc_html_e('Customize the calculator look. Change the background color, hover color, border color etc...', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>
                <?php
                if ($select_theme == 'new_theme') {
                    $google_fonts = ww_get_google_fonts();
                ?>
                    <tr id="new-theme-font-section">
                        <th scope="row">
                            <label for="new_theme_font_selection"><strong><?php esc_html_e('Select Font', 'loan-calculator-wp'); ?></strong></label>
                        </th>
                        <td>
                            <select name="ww_loan_option[font_family_new_theme]" id="ww_loan_option" class="fstdropdown-select" searchdisable="false">
                                <?php
                                foreach ($google_fonts as $font_name => $font_style) {
                                ?>
                                    <option value="<?php echo esc_attr($font_style); ?>" <?php selected($font_family_new_theme, $font_style, true); ?>>
                                        <?php echo esc_html($font_name); ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                <?php
                } else {
                    if ($select_theme == 'default_theme') {
                        update_option("ww_loan_option[font_family_new_theme]", $font_family_new_theme);
                    }
                }
                ?>
                <tr id="select_chart">
                    <th scope="row">
                        <label for="select_chart"><strong><?php esc_html_e('Change Chart', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <select name='ww_loan_option[chart_types]' id='chart_types' style="width: 100%;">
                            <?php foreach ($get_chart_types as $chart_key => $chart_value) { ?>
                                <option value="<?php echo esc_attr($chart_key); ?>" <?php echo esc_attr(selected($chart_types, $chart_key, true)); ?>><?php echo esc_attr($chart_value, 'loan-calculator-wp') ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr id="backbround-color-section">
                    <th scope="row">
                        <label for="back_ground_color"><strong><?php esc_html_e('Background Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[back_ground_color]' id='back_ground_color' value='<?php echo esc_attr($back_ground_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr id="selected-color">
                    <th scope="row">
                        <label for="selected_color"><strong><?php esc_html_e('Selected Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[selected_color]' id='selected_color' value='<?php echo esc_attr($selected_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr id="background-light-sec">
                    <th scope="row">
                        <label for="background_light_color"><strong><?php esc_html_e('Background Light Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[background_light_color]' id='background_light_color' value='<?php echo esc_attr($background_light_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr id="border-color">
                    <th scope="row">
                        <label for="border_color"><strong><?php esc_html_e('Border Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[border_color]' id='border_color' value='<?php echo esc_attr($border_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr id="Graph-color">
                    <th scope="row">
                        <label for="border_color"><strong><?php esc_html_e('Principal Graph Fill Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[graph_color]' id='graph_color' value='<?php echo esc_attr($graph_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr id="Graph-border-color">
                    <th scope="row">
                        <label for="graph_border_color"><strong><?php esc_html_e('Principal Graph Border Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[graph_border_color]' id='graph_border_color' value='<?php echo esc_attr($graph_border_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr id="Graph-color-sub">
                    <th scope="row">
                        <label for="graph_color_sub"><strong><?php esc_html_e('Interest Graph Fill Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[graph_color_sub]' id='graph_color_sub' value='<?php echo esc_attr($graph_color_sub, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr id="graph-border-color-sub">
                    <th scope="row">
                        <label for="graph_border_color_sub"><strong><?php esc_html_e('Interest Graph Border Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[graph_border_color_sub]' id='graph_border_color_sub' value='<?php echo esc_attr($graph_border_color_sub, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <!-- stacked bar color options start -->
                
                <tr id="balance-border-color-graph">
                    <th scope="row">
                        <label for="balance_border_color_graph"><strong><?php esc_html_e('Balance Graph Border Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[balance_border_color_graph]' id='balance_border_color_graph' value='<?php echo esc_attr($balance_border_color_graph, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr id="balance-point-background-color-graph">
                    <th scope="row">
                        <label for="balance_point_background_color_graph"><strong><?php esc_html_e('Balance Graph Point Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[balance_point_background_color_graph]' id='balance_point_background_color_graph' value='<?php echo esc_attr($balance_point_background_color_graph, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>               
                <tr id="extra-payment-graph-color">
                    <th scope="row">
                        <label for="extra_payment_graph_color"><strong><?php esc_html_e('Extra Payment Graph Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[extra_payment_graph_color]' id='extra_payment_graph_color' value='<?php echo esc_attr($extra_payment_graph_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <!-- end -->
                <input type="hidden" name="ww_loan_option[select_theme]" value="default_theme" />
                <tr id="select_theme">
                    <th scope="row">
                        <label for="select_theme"><strong><?php esc_html_e('Select Theme', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <select name='ww_loan_option[select_theme]' id='select_theme' style="width: 100%;">
                            <option value="default_theme" <?php echo esc_attr(selected($select_theme, "default_theme", true)); ?>><?php echo esc_attr("Default Theme") ?></option>
                            <option value="new_theme" <?php echo esc_attr(selected($select_theme, "new_theme", true)); ?>><?php echo esc_attr("New Theme") ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h2><?php esc_html_e('Summary Chart Visual Settings', 'loan-calculator-wp'); ?></h2>
                        <span class="heading-tooltip-section">
                            <?php esc_html_e('Customize Visual of Summary Chart', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="summary_chart_option"><strong><?php esc_html_e('Summary Chart Option', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="checkbox" name="ww_loan_option[summary_chart_option]" id="summary_chart_option" value="1" class="regular-text" <?php echo ($summary_chart_option == "1") ? "checked" : ""; ?>> <label for="summary_chart_option"><?php esc_attr_e("Enable Summary Chart", "loan-calculator-wp"); ?></label>
                        <br><br>                        
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Check this box to enable Pie chart visible in calcualtion result sidebar of the calculator', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr> 
                <tr class="summary-chart-options" <?php echo esc_attr($summary_chart_fields_display_style); ?>>
                    <th scope="row">
                        <label for="summary_chart_label"><strong><?php esc_html_e('Summary Chart Main Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[summary_chart_label]' id='summary_chart_label' value='<?php echo esc_attr($summary_chart_label, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr class="summary-chart-options" <?php echo esc_attr($summary_chart_fields_display_style); ?>>
                    <th scope="row">
                        <label for="summary_chart_principal_fill_color"><strong><?php esc_html_e('Principal Fill Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[summary_chart_principal_fill_color]' id='summary_chart_principal_fill_color' value='<?php echo esc_attr($summary_chart_principal_fill_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr class="summary-chart-options" <?php echo esc_attr($summary_chart_fields_display_style); ?>>
                    <th scope="row">
                        <label for="summary_chart_interest_fill_color"><strong><?php esc_html_e('Interest Fill Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[summary_chart_interest_fill_color]' id='summary_chart_interest_fill_color' value='<?php echo esc_attr($summary_chart_interest_fill_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr class="summary-chart-options" <?php echo esc_attr($summary_chart_fields_display_style); ?>>
                    <th scope="row">
                        <label for="summary_chart_ballon_payment_fill_color"><strong><?php esc_html_e('Ballon Payment Fill Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[summary_chart_ballon_payment_fill_color]' id='summary_chart_ballon_payment_fill_color' value='<?php echo esc_attr($summary_chart_ballon_payment_fill_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr class="summary-chart-options" <?php echo esc_attr($summary_chart_fields_display_style); ?>>
                    <th scope="row">
                        <label for="summary_chart_down_payment_fill_color"><strong><?php esc_html_e('Down Payment Fill Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[summary_chart_down_payment_fill_color]' id='summary_chart_down_payment_fill_color' value='<?php echo esc_attr($summary_chart_down_payment_fill_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr class="summary-chart-options" <?php echo esc_attr($summary_chart_fields_display_style); ?>>
                    <th scope="row">
                        <label for="summary_chart_extra_payment_fill_color"><strong><?php esc_html_e('Extra Payment Fill Color', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[summary_chart_extra_payment_fill_color]' id='summary_chart_extra_payment_fill_color' value='<?php echo esc_attr($summary_chart_extra_payment_fill_color, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <!-- end -->

            </tbody>
        </table>
        <table class="form-table sa-manage-level-product-box" id="amount" style="display: <?php echo ($default_value_Screen) ? esc_html('table') : esc_html('none'); ?>">
            <tbody>
                <tr>
                    <td colspan="2">
                        <h2><?php esc_html_e('Default Value for Amount Text Field', 'loan-calculator-wp'); ?></h2>
                        <span class="heading-tooltip-section">
                            <?php esc_html_e('Set the default value for all amount text fields', 'loan-calculator-wp'); ?><br><br>
                           <?php esc_html_e('Note','loan-calculator-wp'); ?>: <span style='color:red;'>(*)</span>  <?php esc_html_e('are required fields', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>                
                <tr id="loan-amount">
                    <th scope="row">
                        <label for="loan_amount"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Loan Amount', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[loan_amount]' id='loan_amount' maxlength="20" value='<?php echo esc_attr($loan_amount, 'loan-calculator-wp'); ?>' class="regular-text" onkeydown="return onlyNos(event,'loan_amount')">
                    </td>
                </tr>
                <tr id="loan-amount-min">
                    <th scope="row">
                        <label for="loan_amount_min_value"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Loan Amount Min Value', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[loan_amount_min_value]' id='loan_amount_min_value' maxlength="20" value='<?php echo esc_attr($loan_amount_min_value, 'loan-calculator-wp'); ?>' class="regular-text" onkeydown="return onlyNos(event,'loan_amount_min_value')">
                    </td>
                </tr>
                <tr id="loan-amount-max">
                    <th scope="row">
                        <label for="loan-amount-max_lbl"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Loan Amount Max Value', 'loan-calculator-wp'); ?></strong></label><br>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[loan_amount_max_value]' id='loan_amount_max_value' maxlength="20" value='<?php echo esc_attr($loan_amount_max_value, 'loan-calculator-wp'); ?>' class="regular-text" onkeydown="return onlyNos(event,'loan_amount_max_value')">
                    </td>
                </tr>                
                <tr id="loan-term">
                    <th scope="row">
                        <label for="loan_term"><strong><?php esc_html_e('Loan Term', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <?php
                        $loan_term_month = 480;
                        $loan_term_month = apply_filters('loan_amount_max_val_hk', $loan_term_month);
                        $loan_term_year = ceil($loan_term_month / 12);
                        ?>
                        <select name="ww_loan_option[loan_term]" id="loan_term" class="regular-text">
                            <option value="<?php esc_attr_e('1', 'loan-calculator-wp'); ?>" <?php echo ($loan_term == '1') ?  esc_html("selected") : ""; ?>><?php esc_html_e('1', 'loan-calculator-wp'); ?></option>
                            <?php
                            for ($i = 1; $i <= $loan_term_year; $i++) {
                                $display_val = $i * 12;
                            ?>
                                <option value="<?php echo esc_attr($display_val, 'loan-calculator-wp'); ?>" <?php echo ($loan_term == $display_val) ?  esc_html("selected") : ""; ?>><?php echo esc_html($display_val, 'loan-calculator-wp'); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr id="loan-term-min">
                    <th scope="row">
                        <label for="loan_term_min_value"><strong><?php esc_html_e('Loan Term Min Value', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <select name="ww_loan_option[loan_term_min_value]" id="loan_term_min_value" class="regular-text">
                            <option value="<?php esc_attr_e('1', 'loan-calculator-wp'); ?>" <?php echo ($loan_term_min_value == '1') ?  esc_html("selected") : ""; ?>><?php esc_html_e('1', 'loan-calculator-wp'); ?></option>
                            <?php
                            for ($i = 1; $i <= $loan_term_year; $i++) {
                                $display_val = $i * 12;
                            ?>
                                <option value="<?php echo esc_attr($display_val, 'loan-calculator-wp'); ?>" <?php echo ($loan_term_min_value == $display_val) ? esc_html("selected")  : ""; ?>><?php echo esc_html($display_val, 'loan-calculator-wp'); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr id="loan-term-max">
                    <th scope="row">
                        <label for="loan_term_max_value"><strong><?php esc_html_e('Loan Term Max Value', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <select name="ww_loan_option[loan_term_max_value]" id="loan_term_max_value" class="regular-text">
                            <option value="<?php esc_attr_e('1', 'loan-calculator-wp'); ?>" <?php echo ($loan_term_max_value == '1') ?  esc_html("selected") : ""; ?>><?php esc_html_e('1', 'loan-calculator-wp'); ?></option>
                            <?php
                            for ($i = 1; $i <= $loan_term_year; $i++) {
                                $display_val = $i * 12;
                            ?>
                                <option value="<?php echo esc_attr($display_val, 'loan-calculator-wp'); ?>" <?php echo ($loan_term_max_value == $display_val) ? esc_html("selected")  : ""; ?>><?php echo esc_html($display_val, 'loan-calculator-wp'); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>               
                <tr id="ballon_amt_per">
                    <th scope="row">
                        <label for="disable_ballon_per"><strong><?php esc_html_e('Disable Ballon', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="checkbox" name="ww_loan_option[disable_ballon_amt]" id="disable_ballon_amt" value="1" class="regular-text" <?php echo ($disable_ballon_amt == "1") ? "checked" : ""; ?>> <label for="disable_ballon_amt"><?php esc_attr_e("To enable the balloon amount in the loan calculator form, uncheck this box.", "loan-calculator-wp") ?></label>
                    </td>
                </tr>                
                <tr id="ballon_amt_per_text_section">
                    <th scope="row">
                        <label for="ballon_per"><strong><?php esc_html_e('Ballon Percentage', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='number' name='ww_loan_option[ballon_per]' id='ballon_per'  value='<?php echo esc_attr($ballon_per, 'loan-calculator-wp'); ?>' class="regular-text" onkeydown="return onlyNos(event,'ballon_per')" step="any" placeholder="Enter ballon percentage between 1 to 80 (only number)">
                    </td>
                </tr>                                         
                <tr>
                    <th scope="row">
                        <label for="down_payment_option"><strong><?php esc_html_e('Down Payment Option', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="checkbox" name="ww_loan_option[down_payment_option]" id="down_payment_option" value="1" class="regular-text" <?php echo ($down_payment_option == "1") ? "checked" : ""; ?>> <label for="down_payment_option"><?php esc_attr_e("Enable Down Payment Option", "loan-calculator-wp") ?></label>
                        <br><br>                        
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Check this box to enable Down Payment option. It will be visible on the calculator', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr>                 
                <tr class="down-payment-fields-row" <?php echo esc_attr($down_payment_fields_display_style); ?>>
                    <th scope="row">
                        <label for="down_payment_mode"><strong><?php esc_html_e('Down Payment Mode', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                       <input type="radio" id="dp_fixed" name="ww_loan_option[down_payment_mode]" value="fixed" <?php if($down_payment_mode=='fixed') { echo "checked"; } ?>><label for="dp_fixed" ><?php esc_html_e('Fixed Amount', 'loan-calculator-wp'); ?></label>
                       <input type="radio" id="dp_percent" name="ww_loan_option[down_payment_mode]" value="percentage" <?php if($down_payment_mode=='percentage') { echo "checked"; } ?>><label for="dp_percent"><?php esc_html_e('With %  Amount', 'loan-calculator-wp'); ?></label>
                       <br><br>                        
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': You can select one option from above modes to add down payment in loan calculator', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr>
                <tr class="down-payment-fields-row down-payment-max-per-field-row" <?php echo esc_attr($down_payment_fields_display_style); ?>>
                    <th scope="row">
                        <label for="down_payment_max_per"><strong><?php esc_html_e('Down Payment Maximum', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="number" min="1" max="100" name="ww_loan_option[down_payment_max_per]" id="down_payment_max_per" value="<?php echo esc_attr($down_payment_max_per, 'loan-calculator-wp'); ?>" > <label for="down_payment_max_per"><?php esc_attr_e("%", "loan-calculator-wp") ?></label>
                        <br><br>                        
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Enter maximum percentage of loan amount for Down payment that will be allowed for User', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr>                          
                <tr>
                    <th scope="row">
                        <label for="extra_payment_option"><strong><?php esc_html_e('Extra Payment Option', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="checkbox" name="ww_loan_option[extra_payment_option]" id="extra_payment_option" value="1" class="regular-text" <?php echo ($extra_payment_option == "1") ? "checked" : ""; ?>> <label for="extra_payment_option"><?php esc_attr_e("Enable Extra Payment Option", "loan-calculator-wp") ?></label>
                        <br><br>                        
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Check this box to enable Extra Payment option. It will be visible on the calculator', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr>                 
                <tr class="extra-payment-fields-row" <?php echo esc_attr($extra_payment_fields_display_style); ?>>
                    <th scope="row">
                        <label for="extra_payment_max_per"><strong><?php esc_html_e('Extra Payment Maximum', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="number" min="1" max="100" name="ww_loan_option[extra_payment_max_per]" id="extra_payment_max_per" value="<?php echo esc_attr($extra_payment_max_per, 'loan-calculator-wp'); ?>" > <label for="extra_payment_max_per"><?php esc_attr_e("%", "loan-calculator-wp") ?></label>
                        <br><br>                        
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Enter maximum percentage of loan amount for extra payment that will be allowed for User', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr>                   
                <tr>
                    <th scope="row">
                        <label for="interested_rate"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Interest Rate', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='number' name='ww_loan_option[interested_rate]' id='interested_rate' step="any" min="1" max="40" value='<?php echo esc_attr($interested_rate, 'loan-calculator-wp'); ?>' maxlength="5" class="regular-text" onkeydown="return onlyNos(event,'interested_rate')">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="interest-rate-min_lbl"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Interest Rate Min Value', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='number' name='ww_loan_option[interest_rate_min_value]' step="any" min="1" max="40" id='interest_rate_min_value' maxlength="5" value='<?php echo esc_attr($interest_rate_min_value, 'loan-calculator-wp'); ?>' class="regular-text" onkeydown="return onlyNos(event,'interest_rate_min_value')">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="interest_rate_max_value"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Interest Rate Max Value', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='number' name='ww_loan_option[interest_rate_max_value]' step="any" min="1" max="40" id='interest_rate_max_value' maxlength="5" value='<?php echo esc_attr($interest_rate_max_value, 'loan-calculator-wp'); ?>' class="regular-text" onkeydown="return onlyNos(event,'interest_rate_max_value')">
                    </td>
                </tr>                
                <tr>
                    <th scope="row">
                        <label for="interest_rates_adj_disable"><strong><?php esc_html_e('Disable Interest Rates Adjustment', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="checkbox" name="ww_loan_option[interest_rates_adj_disable]" id="interest_rates_adj_disable" value="1" class="regular-text" <?php echo ($interest_rates_adj_disable == "1") ? "checked" : ""; ?> > <label for="interest_rates_adj_disable"><?php esc_attr_e("Disable Interest Rates Adjustment", "loan-calculator-wp") ?></label>
                        <br><br>                        
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Check this box to disable interest rate adjustment by User', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr>
                <tr id="application-fee">
                    <th scope="row">
                        <label for="application_fee"><strong><?php esc_html_e('Application Fee', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[application_fee]' id='application_fee' min="1" max="50000" value='<?php echo esc_attr($application_fee, 'loan-calculator-wp'); ?>' class="regular-text" onkeydown="return onlyNos(event,'application_fee')">
                    </td>
                </tr>
                <tr id="monthly-rate">
                    <th scope="row">
                        <label for="monthly_rate"><strong><?php esc_html_e('Monthly Rate', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[monthly_rate]' id='monthly_rate' min="1" max="50000" value='<?php echo esc_attr($monthly_rate, 'loan-calculator-wp'); ?>' class="regular-text" onkeydown="return onlyNos(event,'monthly_rate')">
                    </td>
                </tr>  
                <tr>
                    <th scope="row">
                        <label for="hide_payment_mode"><strong><?php esc_html_e('Hide Payment Mode Field', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="checkbox" name="ww_loan_option[hide_payment_mode]" id="hide_payment_mode" value="1" class="regular-text" <?php echo ($hide_payment_mode == "1") ? "checked" : ""; ?>> <label for="hide_payment_mode"><?php esc_attr_e("Hide Payment Mode Field", "loan-calculator-wp") ?></label>
                    </td>
                </tr>                
                <tr id="payment-mode" class="payment-mode-field-row" <?php echo esc_attr($payment_mode_fields_display_style); ?>>
                    <th scope="row">
                        <label for="payment_mode"><strong><?php esc_html_e('Display Specific Payment Mode', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[payment_mode_enable]' id='payment_mode_enable' value='1' <?php checked($payment_mode_enable, 1) ?> class="regular-text"> <br><br>
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': If you wish to showcase a particular payment mode selected from the options provided below, please mark the checkbox. In the absence of selection, both modes will be displayed.', 'loan-calculator-wp'); ?> </i>
                    </td>
                </tr>
                <tr id="default_payment-mode" class="payment-mode-field-row" <?php echo esc_attr($payment_mode_fields_display_style); ?>>
                    <th scope="row">
                        <label for="default_payment"><strong><?php esc_html_e('Default Payment Mode', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='radio' name='ww_loan_option[choose_default_payment_mode]' value='In Advanced' <?php checked('In Advanced', $choose_default_payment_mode) ?> class="regular-text choose_default_payment_mode"><?php esc_attr_e('In Advance', 'loan-calculator-wp') ?>&nbsp;
                        <input type='radio' name='ww_loan_option[choose_default_payment_mode]' value='In Arrears' <?php checked('In Arrears', $choose_default_payment_mode) ?> class="regular-text choose_default_payment_mode"><?php esc_attr_e('In Arrears', 'loan-calculator-wp') ?> <br><br>
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': If you enable the setting, it will use "In Advance" or "In Arrears" payment mode based on "Default Payment method" setting. ', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr> 
                <tr id="loan-terms-label-sec">
                    <th scope="row">
                        <label for="ww_loan_term_label"><strong><?php esc_html_e('Display Loan Term Label', 'loan-calculator-wp'); ?></strong></label>                       
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[ww_loan_term_label]' id='ww_loan_term_label' value='1' <?php checked($ww_loan_term_label, 1) ?> class="regular-text">
                         <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': If you enable this setting, you can see the label ( with Year and Month Duration ) below No. of payment field.', 'loan-calculator-wp'); ?> </i>
                    </td>
                </tr>
                <tr id="loan-total-interest-payable">
                    <th scope="row">
                        <label for="ww_loan_total_interest_payable"><strong><?php esc_html_e('Hide Total Interest Payable', 'loan-calculator-wp'); ?></strong></label>                       
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[ww_loan_total_interest_payable]' id='ww_loan_total_interest_payable' value='1' <?php checked($ww_loan_total_interest_payable, 1) ?> class="regular-text">
                         <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': if you enable this option it will hide Total Interest Payable Amount', 'loan-calculator-wp'); ?> </i>
                    </td>
                </tr>
                <tr id="loan-total-extra-payment">
                    <th scope="row">
                        <label for="hide_total_extra_payments"><strong><?php esc_html_e('Hide Total Extra Payments', 'loan-calculator-wp'); ?></strong></label>                       
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[hide_total_extra_payments]' id='hide_total_extra_payments' value='1' <?php checked($hide_total_extra_payments, 1) ?> class="regular-text">
                         <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': if you enable this option it will hide Total Extra Payments', 'loan-calculator-wp'); ?> </i>
                    </td>
                </tr>
                <tr id="save-time-extra-payment">
                    <th scope="row">
                        <label for="hide_save_time_extra_payments"><strong><?php esc_html_e('Hide Save Time For Extra Payments', 'loan-calculator-wp'); ?></strong></label>                       
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[hide_save_time_extra_payments]' id='hide_save_time_extra_payments' value='1' <?php checked($hide_save_time_extra_payments, 1) ?> class="regular-text">
                         <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': if you enable this option it will hide Save Time Extra Payments', 'loan-calculator-wp'); ?> </i>
                    </td>
                </tr>
                <tr id="save-interest-extra-payment">
                    <th scope="row">
                        <label for="hide_save_interest_extra_payments"><strong><?php esc_html_e('Hide Save Interest For Extra Payments', 'loan-calculator-wp'); ?></strong></label>                       
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[hide_save_interest_extra_payments]' id='hide_save_interest_extra_payments' value='1' <?php checked($hide_save_interest_extra_payments, 1) ?> class="regular-text">
                         <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': if you enable this option it will hide Save Interest Extra Payments', 'loan-calculator-wp'); ?> </i>
                    </td>
                </tr>   
                <tr>
                    <td colspan="2">
                        <h2><?php esc_html_e('Fee Calculation Settings ', 'loan-calculator-wp'); ?> </h2>
                        <span class="heading-tooltip-section">
                            <?php esc_html_e('Show application fees, monthly fees, total regular fees and total fees. Customize each fees label.', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="calculation_fee_setting_enable_lbl"><strong><?php esc_html_e('Enable Fees Calculation', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[calculation_fee_setting_enable]' id='calculation_fee_setting_enable' value='1' <?php echo ($calculation_fee_setting_enable == 1) ?  esc_html('checked') : ""; ?> class="regular-text">
                        <label for="calculation_fee_setting_enable"><?php esc_html_e('Enable Fees Calculation', 'loan-calculator-wp'); ?></label><br /><br /><i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Display Application fees, monthly fees, total regular fees and total fees below calculator result', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr>                
            </tbody>
        </table>
        <table class="form-table sa-manage-level-product-box" id="tab" style="display: <?php echo ($tab_setting_Screen) ? esc_html('table') : esc_html('none'); ?>">
            <tbody>
                <tr>
                    <td colspan="2">
                        <h2><?php esc_html_e('Tab Settings Field', 'loan-calculator-wp'); ?> </h2>
                        <span class="heading-tooltip-section">
                            <?php esc_html_e('Enable individual tab based on your need', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>
                <tr id="disable_tabs_icon_section_row">
                    <th scope="row">
                        <label for="disable_tabs_icon_section_lbl"><strong><?php esc_html_e('Disable Tabs Icon', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="checkbox" name="ww_loan_option[disable_tabs_icon]" id="disable_tabs_icon" value="1" class="regular-text" <?php echo ($disable_tabs_icon == "1") ? "checked" : ""; ?>><label for="disable_tabs_icon"><?php esc_html_e('Check this box if you want to remove tab icon section in loan calculator form', 'loan-calculator-wp') ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="enable_repayment_chart"><strong><?php esc_html_e('Enable Repayment Chart Tab', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[enable_repayment_chart]' id='enable_repayment_chart' value='1' <?php echo ($enable_repayment_chart == 1) ? esc_html('checked') : ""; ?> class="regular-text"> <label for="enable_repayment_chart"><?php esc_html_e('Enable Repayment Chart Tab', 'loan-calculator-wp'); ?></label>
                    </td>
                </tr>
                <?php
                $enable_repayment_chart_display = ($enable_repayment_chart == 1) ? '' : "style=display:none";
                $enable_video_tab_display = ($enable_video_tab == 1) ? '' : "style=display:none";
                $enable_loan_mortisation_tab_display = ($enable_loan_mortisation_tab == 1) ? '' : "style=display:none";
                ?>
                <tr class="repayment_chart_heading_lbl" <?php echo esc_attr($enable_repayment_chart_display); ?>>
                    <th scope="row" class="enable_repayment_lbl">
                        <label for="repayment_chart_heading"><strong><?php esc_html_e('Repayment Chart Tooltip', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[repayment_chart_heading]' id='repayment_chart_heading' maxlength="60" value='<?php echo esc_attr($repayment_chart_heading, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="enable_loan_mortisation_tab"><strong><?php esc_html_e('Enable Loan Mortisation Tab', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[enable_loan_mortisation_tab]' id='enable_loan_mortisation_tab' value='1' <?php echo ($enable_loan_mortisation_tab == 1) ? esc_html('checked') : ""; ?> class="regular-text" onclick="return hideshow_loan_table_field();"> <label for="enable_loan_mortisation_tab"><?php esc_html_e('Enable Loan Mortisation Tab', 'loan-calculator-wp'); ?></label>
                    </td>
                </tr>
                <tr class="loan_table_heading_lbl" <?php echo esc_attr($enable_loan_mortisation_tab_display, 'loan-calculator-wp'); ?>>
                    <th scope="row">
                        <label for="loan_table_heading"><strong><?php esc_html_e('Loan Amortization Table Tooltip', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[loan_table_heading]' id='loan_table_heading' maxlength="60" value='<?php echo esc_attr($loan_table_heading, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="enable_video_tab"><strong><?php esc_html_e('Enable Video Tab', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[enable_video_tab]' id='enable_video_tab' value='1' <?php echo ($enable_video_tab == 1) ? esc_html('checked') : ""; ?> class="regular-text"> <label for="enable_video_tab"><?php esc_html_e('Enable Video Tab', 'loan-calculator-wp'); ?></label>
                    </td>
                </tr>
                <tr class="video_heading_lbl" <?php echo esc_attr($enable_video_tab_display); ?>>
                    <th scope="row">
                        <label for="video_heading"><strong><?php esc_html_e('Video Tab Tooltip', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[video_heading]' id='video_heading' maxlength="60" value='<?php echo esc_attr($video_heading, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr class="video_heading_lbl" <?php echo esc_attr($enable_video_tab_display, 'loan-calculator-wp'); ?>>
                    <th scope="row">
                        <label for="youtube_video_link"><strong><?php esc_html_e('Youtube Video Link', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[youtube_video_link]' id='youtube_video_link' maxlength="200" value='<?php echo esc_attr($youtube_video_link, 'loan-calculator-wp'); ?>' class="regular-text"><br><i><b style="color:red">Note</b>: Enter youtube embed url e.g. https://www.youtube.com/embed/VhvlcwYUyIg?si=6ZQebyFT9_HwIrFo.</i>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="form-table sa-manage-level-product-box" id="calculator_disclaimer" style="display: <?php echo ($calculator_disclaimer_Screen) ? esc_html('table') : esc_html('none'); ?>">
            <tbody>
                <tr>
                    <td colspan="2">
                        <h2><?php esc_html_e('Contact Us Settings - Setup Contact Form', 'loan-calculator-wp'); ?> </h2>
                        <span class="heading-tooltip-section">
                            <?php esc_html_e('Contact form setting.', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>
                <tr id="disable_contactus_section_row">
                    <th scope="row">
                        <label for="disable_contactus_section"><strong><?php esc_html_e('Disable Contact Us Section', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="checkbox" name="ww_loan_option[disable_contactus_section]" id="disable_contactus_section" value="1" class="regular-text" <?php echo ($disable_contactus_section == "1") ? "checked" : ""; ?>> <label for="disable_contactus_section"><?php esc_html_e('Check this box if you want to remove contact us section in loan calculator form', 'loan-calculator-wp') ?></label>
                    </td>
                </tr>
                <!-- <tr>
<th scope="row">
<label for="contact_info_heading"><strong><?php esc_html_e('Contact Info Label', 'loan-calculator-wp'); ?></strong></label>
</th>
<td>
<input type='text' name='ww_loan_option[contact_info_heading]' id='contact_info_heading' maxlength="150" value='<?php echo esc_attr($contact_info_heading, 'loan-calculator-wp'); ?>' class="regular-text">
</td>
</tr> -->
                <tr>
                    <th scope="row">
                        <label for="contact_popup_button_heading"><strong><?php esc_html_e('Contact Popup Button Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[contact_popup_button_heading]' id='contact_popup_button_heading' maxlength="200" value='<?php echo esc_attr($contact_popup_button_heading, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="contact_popup_button_heading"><strong><?php esc_html_e('Contact Type', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <label for="popup-type">
                            <input type="radio" name="ww_loan_option[contact_type]" id="popup-type" value="popup" <?php echo ($contact_type == "popup") ? "checked" : ""; ?> class="contact-type-btn" />
                            <?php esc_html_e('Popup', 'loan-calculator-wp'); ?>
                        </label>
                        <label for="link-type">
                            <input type="radio" name="ww_loan_option[contact_type]" id="link-type" value="link" <?php echo ($contact_type == "link") ? "checked" : ""; ?> class="contact-type-btn" />
                            <?php esc_html_e('Link', 'loan-calculator-wp'); ?>
                        </label>
                    </td>
                </tr>
                <tr style="display:<?php echo ($contact_type == "popup") ? "" : "none"; ?>" id="contact-popup-section">
                    <th scope="row">
                        <label for="contact_popup_content"><strong><?php esc_html_e('Contact Form Content', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <textarea name="ww_loan_option[contact_popup_content]" id="contact_popup_content" rows="4" cols="50"><?php echo esc_attr($contact_popup_content, 'loan-calculator-wp'); ?></textarea>
                        <br /><br />
                        <i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(': Here you can enter any contact form shortcode. If you are using Contact Form 7, Gravity Forms, WP Forms, or any other forms. insert the shortcode as follows: [your_contact_form_shortcode]', 'loan-calculator-wp'); ?></i>
                    </td>
                </tr>
                <tr style="display:<?php echo ($contact_type == "link") ? "" : "none"; ?>" id="contact-url-section">
                    <th scope="row">
                        <label for="contact_popup_content"><strong><?php esc_html_e('Contact URL', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="text" name="ww_loan_option[contact_url]" id="popup-type" value="<?php echo esc_attr($contact_url); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h2><?php esc_html_e('Calculator Disclaimer Settings ', 'loan-calculator-wp'); ?> </h2>
                        <span class="heading-tooltip-section">
                            <?php esc_html_e('Show disclaimer notice at the end of calculator.', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>
                <tr id="disable_calculator_disclaimer_section_row">
                    <th scope="row">
                        <label for="disable_calculator_disclaimer_section"><strong><?php esc_html_e('Disable Calculator Disclaimer Section', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type="checkbox" name="ww_loan_option[disable_calculator_disclaimer_section]" id="disable_calculator_disclaimer_section" value="1" class="regular-text" <?php echo ($disable_calculator_disclaimer_section == "1") ? "checked" : ""; ?>> <label for="disable_calculator_disclaimer_section"><?php esc_html_e('Check this box if you want to remove Calculator Disclaimer section in loan calculator form', 'loan-calculator-wp') ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="calculator_disclaimer_heading"><strong><?php esc_html_e('Calculator Disclaimer', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[calculator_disclaimer_heading]' id='calculator_disclaimer_heading' maxlength="50" value='<?php echo esc_attr($calculator_disclaimer_heading, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="calculator_disclaimer_description"><strong><?php esc_html_e('Calculator Disclaimer Description', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <?php
                        $settings = array(
                            'textarea_name' => 'ww_loan_option[calculator_disclaimer_description]',
                            'textarea_rows' => '10',
                            'tinymce' => true,
                            'media_buttons' => false,
                            'wpautop' => false,
                        );
                        wp_editor($calculator_disclaimer_description, 'calculator_disclaimer_description', $settings);
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="form-table sa-manage-level-product-box" id="label_settings" style="display: <?php echo ($label_settings_screen) ? esc_html('table') : esc_html('none'); ?>">
            <tbody>
                <tr>
                    <td colspan="2">
                        <h2><?php esc_html_e('All Fields Labels', 'loan-calculator-wp'); ?> </h2>
                        <span class="heading-tooltip-section">
                            <?php esc_html_e('Set the calculation fields labels', 'loan-calculator-wp'); ?>
                            <br><br>
                           <?php esc_html_e('Note','loan-calculator-wp'); ?>: <span style='color:red;'>(*)</span>  <?php esc_html_e('are required fields', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="loan_amount_tooltip"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Loan Amount Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[loan_amount_label]' id='loan_amount_label' value='<?php echo esc_attr($loan_amount_label, 'loan-calculator-wp'); ?>' class="regular-text" >
                    </td>                    
                    <th scope="row" class="lc-sett-sec-col-th">
                        <label for="loan_amount_tooltip"><strong><?php esc_html_e('Loan Amount Tooltip', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <textarea name="ww_loan_option[loan_amount_tooltip]" id="loan_amount_tooltip" rows="2" cols="50"><?php echo esc_attr($loan_amount_tooltip, 'loan-calculator-wp'); ?></textarea>
                    </td>
                </tr>
                 <tr id="loan-term-label">
                    <th scope="row">
                        <label for="loan_term_field_label"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Loan Term Field Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[loan_term_field_label]' id='loan_term_field_label' value='<?php echo esc_attr($loan_term_field_label, 'loan-calculator-wp'); ?>' class="regular-text" >
                    </td>
                     <th scope="row" class="lc-sett-sec-col-th">
                        <label for="loan_terms_tooltip"><strong><?php esc_html_e('Loan Terms Tooltip', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <textarea name="ww_loan_option[loan_terms_tooltip]" id="loan_terms_tooltip" rows="2" cols="50"><?php echo esc_attr($loan_terms_tooltip, 'loan-calculator-wp'); ?></textarea>
                    </td>

                </tr>                
                <tr id="loan-term-freq-label" class="new-theme-fields-row <?php if($select_theme=='new_theme') { ?> active <?php } ?>">
                    <th scope="row">
                        <label for="repayment_frequency_field_label"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Repayment Frequency Field Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[repayment_frequency_field_label]' id='repayment_frequency_field_label' value='<?php echo esc_attr($repayment_frequency_field_label, 'loan-calculator-wp'); ?>' class="regular-text" >
                    </td>
                </tr> 
                <tr>
                    <th scope="row">
                        <label for="interest_rate_field_label"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Interest Rate Field Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[interest_rate_field_label]' id='interest_rate_field_label' value='<?php echo esc_attr($interest_rate_field_label, 'loan-calculator-wp'); ?>' class="regular-text" >
                    </td>
                    <th scope="row" class="lc-sett-sec-col-th">
                        <label for="interest_rates_tooltip"><strong><?php esc_html_e('Interest Rate Tooltip', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <textarea name="ww_loan_option[interest_rates_tooltip]" id="interest_rates_tooltip" rows="2" cols="50"><?php echo esc_attr($interest_rates_tooltip, 'loan-calculator-wp'); ?></textarea>
                    </td>
                </tr> 
                 <tr class="payment-mode-field-label-row <?php if($hide_payment_mode != '1'){ ?> active <?php } ?>">
                    <th scope="row">
                        <label for="payment_mode_field_label"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Payment Mode Field Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[payment_mode_field_label]' id='payment_mode_field_label' value='<?php echo esc_attr($payment_mode_field_label, 'loan-calculator-wp'); ?>' class="regular-text" >
                    </td>
                    <th scope="row" class="lc-sett-sec-col-th">
                        <label for="payment_mode_tooltip"><strong><?php esc_html_e('Payment Mode Tooltip', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <textarea name="ww_loan_option[payment_mode_tooltip]" id="payment_mode_tooltip" rows="2" cols="50"><?php echo esc_attr($payment_mode_tooltip, 'loan-calculator-wp'); ?></textarea>
                    </td>
                </tr>               
                <tr class="ballon-amt-field-label-row <?php if($disable_ballon_amt != '1'){ ?> active <?php } ?>">
                    <th scope="row">
                        <label for="balloon_amount_field_label"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Ballon Amount Field Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[balloon_amount_field_label]' id='balloon_amount_field_label' value='<?php echo esc_attr($balloon_amount_field_label, 'loan-calculator-wp'); ?>' class="regular-text" >
                    </td>
                    <th scope="row" class="lc-sett-sec-col-th">
                        <label for="balloon_amount_tooltip"><strong><?php esc_html_e('Balloon Amount Tooltip', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <textarea name="ww_loan_option[balloon_amount_tooltip]" id="balloon_amount_tooltip" rows="2" cols="50"><?php echo esc_attr($balloon_amount_tooltip, 'loan-calculator-wp'); ?></textarea>
                    </td>
                </tr>
                <tr class="downpayment-field-label-row <?php if($down_payment_option == '1'){ ?> active <?php } ?>">
                    <th scope="row">
                        <label for="down_payment_label"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Down Payment Field Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>                        
                        <input type='text' name='ww_loan_option[down_payment_label]' id='down_payment_label' value='<?php echo esc_attr($down_payment_label, 'loan-calculator-wp'); ?>' class="regular-text" >
                    </td>
                    <th scope="row" class="lc-sett-sec-col-th">
                        <label for="down_payment_tooltip"><strong><?php esc_html_e('Down Payment Tooltip', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <textarea name="ww_loan_option[down_payment_tooltip]" id="down_payment_tooltip" rows="2" cols="50"><?php echo esc_attr($down_payment_tooltip, 'loan-calculator-wp'); ?></textarea>
                    </td>
                </tr>                
                <tr class="extrapayment-field-label-row <?php if($extra_payment_option == '1'){ ?> active <?php } ?>">
                    <th scope="row">
                        <label for="extra_payment_field_label"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Extra Payment Field Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[extra_payment_field_label]' id='extra_payment_field_label' value='<?php echo esc_attr($extra_payment_field_label, 'loan-calculator-wp'); ?>' class="regular-text" >
                    </td>
                    <th scope="row" class="lc-sett-sec-col-th">
                        <label for="extra_payment_tooltip"><strong><?php esc_html_e('Extra Payment Tooltip', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <textarea name="ww_loan_option[extra_payment_tooltip]" id="extra_payment_tooltip" rows="2" cols="50"><?php echo esc_attr($extra_payment_tooltip, 'loan-calculator-wp'); ?></textarea>
                    </td>
                </tr>                             
                <tr>
                    <td colspan="2">
                        <h2><?php esc_html_e('Default Text for Calculation Result', 'loan-calculator-wp'); ?></h2>
                        <span class="heading-tooltip-section">
                            <?php esc_html_e('Set the calculation results labels', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="regular_repayment_heading"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Regular Repayment Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[regular_repayment_heading]' id='regular_repayment_heading' maxlength="200" value='<?php echo esc_attr($regular_repayment_heading, 'loan-calculator-wp'); ?>' class="regular-text">
                        <br/><i><b style="color:red"><?php esc_html_e('Note', 'loan-calculator-wp') ?></b><?php esc_html_e(' {frequency} : Frequency will replace with the dynamic option selected in dropdown like "Monthly", "Yearly", "Quarterly" etc.', 'loan-calculator-wp'); ?> </i>
                    </td>
                </tr>
                <tr class="total-interest-payable-label-row <?php if($ww_loan_total_interest_payable != '1'){ ?> active <?php } ?>">
                    <th scope="row">
                        <label for="total_interests_payable_heading"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Total Interest Payable Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[total_interests_payable_heading]' id='total_interests_payable_heading' maxlength="200" value='<?php echo esc_attr($total_interests_payable_heading, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr class="ballon-amt-field-label-row <?php if($disable_ballon_amt != '1'){ ?> active <?php } ?>">
                    <th scope="row">
                        <label for="ballon_amt_heading"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Balloon Amount Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[ballon_amt_heading]' id='ballon_amt_heading' maxlength="200" value='<?php echo esc_attr($ballon_amt_heading, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr> 
                 <tr class="downpayment-field-label-row <?php if($down_payment_option == '1'){ ?> active <?php } ?>">
                    <th scope="row">
                        <label for="down_payment_heading"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Down Payment Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[down_payment_heading]' id='down_payment_heading' maxlength="200" value='<?php echo esc_attr($down_payment_heading, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>              
                <tr class="extrapayment-field-label-row <?php if($extra_payment_option == '1'){ ?> active <?php } ?>">
                    <th scope="row">
                        <label for="extra_payment_heading"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Extra Payment Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[extra_payment_heading]' id='extra_payment_heading' maxlength="200" value='<?php echo esc_attr($extra_payment_heading, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr class="extrapayment-field-label-row <?php if($extra_payment_option == '1' && $hide_save_time_extra_payments != '1'){ ?> active <?php } ?>">
                    <th scope="row">
                        <label for="extra_payment_save_time_label"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Extra Payment Save Time Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[extra_payment_save_time_label]' id='extra_payment_save_time_label' maxlength="200" value='<?php echo esc_attr($extra_payment_save_time_label, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr class="extrapayment-field-label-row <?php if($extra_payment_option == '1' && $hide_total_extra_payments != '1'){ ?> active <?php } ?>">
                    <th scope="row">
                        <label for="extra_payment_total_label"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Extra Payment Total Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[extra_payment_total_label]' id='extra_payment_total_label' maxlength="200" value='<?php echo esc_attr($extra_payment_total_label, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr class="extrapayment-field-label-row <?php if($extra_payment_option == '1' && $hide_save_interest_extra_payments != '1'){ ?> active <?php } ?>">
                    <th scope="row">
                        <label for="extra_payment_save_interest_label"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Extra Payment Save Interest Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[extra_payment_save_interest_label]' id='extra_payment_save_interest_label' maxlength="200" value='<?php echo esc_attr($extra_payment_save_interest_label, 'loan-calculator-wp'); ?>' class="regular-text">
                    </td>
                </tr>
                <tr <?php echo esc_attr($calculation_fee_display, 'loan-calculator-wp'); ?> class='calculation-fee-display-section'>
                    <td colspan="2">
                        <h2><?php esc_html_e('Fee Calculation Labels ', 'loan-calculator-wp'); ?> </h2>
                         <span class="heading-tooltip-section">
                            <?php esc_html_e('Set the fee calculation results labels', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>
                <tr id="application_fee_heading_lbl" <?php echo esc_attr($calculation_fee_display, 'loan-calculator-wp'); ?> class='calculation-fee-display-section'>
                    <th scope="row">
                        <label for="application_fee_heading"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Application Fee Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[application_fee_heading]' id='application_fee_heading' value='<?php echo esc_attr($application_fee_heading, 'loan-calculator-wp'); ?>' maxlength="50" class="regular-text">
                    </td>
                </tr>
                <tr id="common-heading" <?php echo esc_attr($calculation_fee_display, 'loan-calculator-wp'); ?> class='calculation-fee-display-section'>
                    <th scope="row">
                        <label for="monthly_fee_heading"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Monthly Fee Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[monthly_fee_heading]' id='monthly_fee_heading' value='<?php echo esc_attr($monthly_fee_heading, 'loan-calculator-wp'); ?>' maxlength="50" class="regular-text">
                    </td>
                </tr>
                <tr id="common-heading" <?php echo esc_attr($calculation_fee_display, 'loan-calculator-wp'); ?> class='calculation-fee-display-section'>
                    <th scope="row">
                        <label for="total_regular_fees"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Total Regular Fees Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[total_regular_fees]' id='total_regular_fees' value='<?php echo esc_attr($total_regular_fees, 'loan-calculator-wp'); ?>' maxlength="50" class="regular-text">
                    </td>
                </tr>
                <tr id="common-heading" <?php echo esc_attr($calculation_fee_display, 'loan-calculator-wp'); ?> class='calculation-fee-display-section'>
                    <th scope="row">
                        <label for="total_fees"><strong><span class='require-field-star'>*</span> <?php esc_html_e('Total Fees Label', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='text' name='ww_loan_option[total_fees]' id='total_fees' value='<?php echo esc_attr($total_fees, 'loan-calculator-wp'); ?>' maxlength="50" class="regular-text">
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="form-table sa-manage-level-product-box" id="delete_settings" style="display: <?php echo ($delete_Screen) ? esc_html('table') : esc_html('none'); ?>">
            <tbody>
                <tr>
                    <td>
                        <h2><?php esc_html_e('Plugin Misc Settings', 'loan-calculator-wp'); ?> </h2>
                        <span class="heading-tooltip-section">
                            <?php esc_html_e('Misc Settings', 'loan-calculator-wp'); ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="delete_setting_enable_lbl"><strong><?php esc_html_e('Delete Data On Uninstall', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[delete_data_enable]' id='delete_setting' value='1' <?php echo ($delete_data_enable == 1) ? esc_html('checked') : ""; ?> class="regular-text"> <label for="delete_setting"><?php esc_html_e('Check this box if you want to delete all settings data on plugin uninstall', 'loan-calculator-wp'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="delete_setting_enable_lbl"><strong><?php esc_html_e('Disable Font Awesome CSS', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[disable_font_awesome]' id='disable_font_awesome' value='1' <?php echo ($disable_font_awesome == 1) ? esc_html('checked') : ""; ?> class="regular-text"> <label for="disable_font_awesome"><?php esc_html_e('Check this box if you want to disable font awesome css on plugin install', 'loan-calculator-wp'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="delete_setting_enable_lbl"><strong><?php esc_html_e('Remove Decimal Points', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[remove_decimal_point]' id='remove_decimal_point' value='1' <?php echo ($remove_decimal_point == 1) ? esc_html('checked') : ""; ?> class="regular-text"> <label for="remove_decimal_point"><?php esc_html_e('Check this box if you want to remove decimal point in loan calculator form', 'loan-calculator-wp'); ?></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="remove_range_sliders"><strong><?php esc_html_e('Remove All Range Sliders', 'loan-calculator-wp'); ?></strong></label>
                    </th>
                    <td>
                        <input type='checkbox' name='ww_loan_option[remove_range_sliders]' id='remove_range_sliders' value='1' <?php echo ($remove_range_sliders == 1) ? esc_html('checked') : ""; ?> class="regular-text"> <label for="remove_range_sliders"><?php esc_html_e('Check this box if you want to remove all range slider fields in the calculator form', 'loan-calculator-wp'); ?></label>
                    </td>
                </tr>

            </tbody>
        </table>
        <table class="form-table sa-manage-level-product-box" id="save_setting">
            <tbody>
                <tr>
                    <td>
                        <input type="submit" class="button button-primary loan-submit-btn" name="loan_calculator_setting" value="Save Changes" id="loan_calculator_setting">
                    </td>
                </tr>
            </tbody>
        </table>
    </form><!-- END : Loan Calculator Form -->
</div><!-- .end of wrap -->
