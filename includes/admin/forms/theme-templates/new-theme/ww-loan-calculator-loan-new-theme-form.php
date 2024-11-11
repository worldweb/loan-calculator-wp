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

$loan_calculator_all_setting_data = get_option('ww_loan_option');

$loan_all_setting_data = apply_filters('ww_loan_calculator_all_setting_data', $loan_calculator_all_setting_data, $atts);

$remove_decimal_point = isset($loan_all_setting_data['remove_decimal_point']) ? $loan_all_setting_data['remove_decimal_point'] : "";
$loan_all_setting_data = apply_filters('ww_loan_calculator_all_setting_data', $loan_calculator_all_setting_data, $atts);
$select_theme = isset($loan_all_setting_data['select_theme']) ? $loan_all_setting_data['select_theme'] : "";
$font_family_new_theme = isset($loan_all_setting_data['font_family_new_theme']) ? $loan_all_setting_data['font_family_new_theme'] : "";
$back_ground_color = isset($loan_all_setting_data['back_ground_color']) ? $loan_all_setting_data['back_ground_color'] : "#1f497d";
$selected_color = isset($loan_all_setting_data['selected_color']) ? $loan_all_setting_data['selected_color'] : "#1f497d";
$background_light_color = isset($loan_all_setting_data['background_light_color']) ? $loan_all_setting_data['background_light_color'] : "";
$border_color = isset($loan_all_setting_data['border_color']) ? $loan_all_setting_data['border_color'] : "";
$graph_color = isset($loan_all_setting_data['graph_color']) ? $loan_all_setting_data['graph_color'] : "";
$graph_color_sub = isset($loan_all_setting_data['graph_color_sub']) ? $loan_all_setting_data['graph_color_sub'] : "";
$graph_border_color = isset($loan_all_setting_data['graph_border_color']) ? $loan_all_setting_data['graph_border_color'] : "";
$graph_border_color_sub = isset($loan_all_setting_data['graph_border_color_sub']) ? $loan_all_setting_data['graph_border_color_sub'] : "";
$interested_rate = isset($loan_all_setting_data['interested_rate']) ? $loan_all_setting_data['interested_rate'] : "";
$ballon_per = isset($loan_all_setting_data['ballon_per']) ? floatval($loan_all_setting_data['ballon_per']) : "10";
$loan_term = isset($loan_all_setting_data['loan_term']) ? $loan_all_setting_data['loan_term'] : "";
$loan_amount = isset($loan_all_setting_data['loan_amount']) ? $loan_all_setting_data['loan_amount'] : "10000";
$monthly_rate = isset($loan_all_setting_data['monthly_rate']) ? $loan_all_setting_data['monthly_rate'] : "";
$application_fee = isset($loan_all_setting_data['application_fee']) ? $loan_all_setting_data['application_fee'] : "";
$loan_amount_min_value = isset($loan_all_setting_data['loan_amount_min_value']) ? $loan_all_setting_data['loan_amount_min_value'] : "";
$loan_amount_max_value = isset($loan_all_setting_data['loan_amount_max_value']) ? $loan_all_setting_data['loan_amount_max_value'] : "";
$loan_term_min_value = isset($loan_all_setting_data['loan_term_min_value']) ? $loan_all_setting_data['loan_term_min_value'] : "";
$loan_term_max_value = isset($loan_all_setting_data['loan_term_max_value']) ? $loan_all_setting_data['loan_term_max_value'] : "";
$interest_rate_min_value = isset($loan_all_setting_data['interest_rate_min_value']) ? $loan_all_setting_data['interest_rate_min_value'] : "";
$interest_rate_max_value = isset($loan_all_setting_data['interest_rate_max_value']) ? $loan_all_setting_data['interest_rate_max_value'] : "";
$application_fee_heading = isset($loan_all_setting_data['application_fee_heading']) ? $loan_all_setting_data['application_fee_heading'] : "";
$total_regular_fees = isset($loan_all_setting_data['total_regular_fees']) ? $loan_all_setting_data['total_regular_fees'] : "";
$total_fees = isset($loan_all_setting_data['total_fees']) ? $loan_all_setting_data['total_fees'] : "";
$monthly_fee_heading = isset($loan_all_setting_data['monthly_fee_heading']) ? $loan_all_setting_data['monthly_fee_heading'] : "";
$equipment_finance_loan_heading = isset($loan_all_setting_data['equipment_finance_loan_heading']) ? $loan_all_setting_data['equipment_finance_loan_heading'] : "";
$equipment_finance_loan_sub_heading_lbl = isset($loan_all_setting_data['equipment_finance_loan_sub_heading_lbl']) ? $loan_all_setting_data['equipment_finance_loan_sub_heading_lbl'] : "";
$equipment_finance_loan_term1 = isset($loan_all_setting_data['equipment_finance_loan_term1']) ? $loan_all_setting_data['equipment_finance_loan_term1'] : "";
$equipment_finance_loan_term2 = isset($loan_all_setting_data['equipment_finance_loan_term2']) ? $loan_all_setting_data['equipment_finance_loan_term2'] : "";
$equipment_finance_loan_term3 = isset($loan_all_setting_data['equipment_finance_loan_term3']) ? $loan_all_setting_data['equipment_finance_loan_term3'] : "";
$equipment_finance_loan_term4 = isset($loan_all_setting_data['equipment_finance_loan_term4']) ? $loan_all_setting_data['equipment_finance_loan_term4'] : "";
$equipment_finance_loan_term5 = isset($loan_all_setting_data['equipment_finance_loan_term5']) ? $loan_all_setting_data['equipment_finance_loan_term5'] : "";

/* START : Calculation Result */
$regular_repayment_heading = isset($loan_all_setting_data['regular_repayment_heading']) ? $loan_all_setting_data['regular_repayment_heading'] : "";

$per_month_heading = isset($loan_all_setting_data['per_month_heading']) ? $loan_all_setting_data['per_month_heading'] : "";
$years_heading = isset($loan_all_setting_data['years_heading']) ? $loan_all_setting_data['years_heading'] : "";
$total_interests_payable_heading = isset($loan_all_setting_data['total_interests_payable_heading']) ? $loan_all_setting_data['total_interests_payable_heading'] : "";
$over_heading = isset($loan_all_setting_data['over_heading']) ? $loan_all_setting_data['over_heading'] : "";
$ballon_amt_heading = isset($loan_all_setting_data['ballon_amt_heading']) ? $loan_all_setting_data['ballon_amt_heading'] : "";

/* END : Calculation Result */

/* START : Tab Field Setting */
$loan_feature_product_heading = isset($loan_all_setting_data['loan_feature_product_heading']) ? $loan_all_setting_data['loan_feature_product_heading'] : "";
$video_heading = isset($loan_all_setting_data['video_heading']) ? $loan_all_setting_data['video_heading'] : "";
$loan_table_heading = isset($loan_all_setting_data['loan_table_heading']) ? $loan_all_setting_data['loan_table_heading'] : "";
$repayment_chart_heading = isset($loan_all_setting_data['repayment_chart_heading']) ? $loan_all_setting_data['repayment_chart_heading'] : "";
$youtube_video_link = isset($loan_all_setting_data['youtube_video_link']) ? $loan_all_setting_data['youtube_video_link'] : "";

/* END : Tab Field Setting */

/* START : Calculator Disclaimer Setting*/
$contact_info_heading = isset($loan_all_setting_data['contact_info_heading']) ? $loan_all_setting_data['contact_info_heading'] : "";
$contact_popup_button_heading = isset($loan_all_setting_data['contact_popup_button_heading']) ? $loan_all_setting_data['contact_popup_button_heading'] : "";
$calculator_disclaimer_heading = isset($loan_all_setting_data['calculator_disclaimer_heading']) ? $loan_all_setting_data['calculator_disclaimer_heading'] : "";
$calculator_disclaimer_description = isset($loan_all_setting_data['calculator_disclaimer_description']) ? $loan_all_setting_data['calculator_disclaimer_description'] : "";
$contact_popup_content = isset($loan_all_setting_data['contact_popup_content']) ? $loan_all_setting_data['contact_popup_content'] : "";

$contact_type = isset($loan_all_setting_data['contact_type']) ? $loan_all_setting_data['contact_type'] : "popup";
$contact_url = isset($loan_all_setting_data['contact_url']) ? $loan_all_setting_data['contact_url'] : "link";


/* END :  Calculator Disclaimer Setting*/

/* START : Tooltip Setting */
$loan_amount_tooltip = isset($loan_all_setting_data['loan_amount_tooltip']) ? $loan_all_setting_data['loan_amount_tooltip'] : "";
$loan_amount_label = isset($loan_all_setting_data['loan_amount_label']) ? $loan_all_setting_data['loan_amount_label'] : "";
$loan_terms_tooltip = isset($loan_all_setting_data['loan_terms_tooltip']) ? $loan_all_setting_data['loan_terms_tooltip'] : "";
$interest_rates_tooltip = isset($loan_all_setting_data['interest_rates_tooltip']) ? $loan_all_setting_data['interest_rates_tooltip'] : "";
$payment_mode_tooltip = isset($loan_all_setting_data['payment_mode_tooltip']) ? $loan_all_setting_data['payment_mode_tooltip'] : "";
$balloon_amount_tooltip = isset($loan_all_setting_data['balloon_amount_tooltip']) ? $loan_all_setting_data['balloon_amount_tooltip'] : "";

/* END : Tooltip Setting */

/* START : Header Link Section*/
$print_label = isset($loan_all_setting_data['print_label']) ? $loan_all_setting_data['print_label'] : "";
$about_this_calculator_disable = isset($loan_all_setting_data['about_this_calculator_disable']) ? $loan_all_setting_data['about_this_calculator_disable'] : "";
$about_this_calculator = isset($loan_all_setting_data['about_this_calculator']) ? $loan_all_setting_data['about_this_calculator'] : "";
$calculator_popup_content = isset($loan_all_setting_data['calculator_popup_content']) ? stripslashes($loan_all_setting_data['calculator_popup_content']) : "";
/* END : Header Link Section */

/* Disable Payment Mode*/

$payment_mode_enable = isset($loan_all_setting_data['payment_mode_enable']) ? $loan_all_setting_data['payment_mode_enable'] : "";
$choose_default_payment_mode = isset($loan_all_setting_data['choose_default_payment_mode']) ? $loan_all_setting_data['choose_default_payment_mode'] : "";

/* START : Calculation Fee Setting Enable */
$calculation_fee_setting_enable = isset($loan_all_setting_data['calculation_fee_setting_enable']) ? $loan_all_setting_data['calculation_fee_setting_enable'] : "";
$calculator_heading = isset($loan_all_setting_data['calculator_heading']) ? $loan_all_setting_data['calculator_heading'] : "";
/* END : Calculation Fee Setting Enable */

/* START : Tab Enable Settings */
$enable_repayment_chart = isset($loan_all_setting_data['enable_repayment_chart']) ? $loan_all_setting_data['enable_repayment_chart'] : "";
$enable_video_tab = isset($loan_all_setting_data['enable_video_tab']) ? $loan_all_setting_data['enable_video_tab'] : "";
$enable_loan_mortisation_tab = isset($loan_all_setting_data['enable_loan_mortisation_tab']) ? $loan_all_setting_data['enable_loan_mortisation_tab'] : "";
$print_option_enable = isset($loan_all_setting_data['print_option_enable']) ? $loan_all_setting_data['print_option_enable'] : "";
$print_option_heading = isset($loan_all_setting_data['print_option_heading']) ? $loan_all_setting_data['print_option_heading'] : "";

$ww_loan_currency = isset($loan_all_setting_data['ww_loan_currency']) ? $loan_all_setting_data['ww_loan_currency'] : "";
$currency_symbols = ww_loan_get_currency_symbol( $ww_loan_currency);


/* END : Tab Enable Settings */


/* START : NEW SETTINGS ADDED */

$disable_ballon_amt = isset($loan_all_setting_data['disable_ballon_amt']) ? $loan_all_setting_data['disable_ballon_amt'] : "";

$disable_repayment_frequency = isset($loan_all_setting_data['disable_repayment_frequency']) ? $loan_all_setting_data['disable_repayment_frequency'] : "";

$disable_repayment_frequency_monthly = isset($loan_all_setting_data['disable_repayment_frequency_monthly']) ? $loan_all_setting_data['disable_repayment_frequency_monthly'] : "";

$disable_repayment_frequency_quarterly = isset($loan_all_setting_data['disable_repayment_frequency_quarterly']) ? $loan_all_setting_data['disable_repayment_frequency_quarterly'] : "";

$disable_repayment_frequency_yearly = isset($loan_all_setting_data['disable_repayment_frequency_yearly']) ? $loan_all_setting_data['disable_repayment_frequency_yearly'] : "";

/* Repayment Frequency options */
$get_repayment_frequency = (isset($loan_all_setting_data['repayment_frequency']) ? $loan_all_setting_data['repayment_frequency'] : "");

// Dropdown Values
$repayment_frequency_label = ww_loan_repayment_frequency_label();

$disable_contactus_section = isset($loan_all_setting_data['disable_contactus_section']) ? $loan_all_setting_data['disable_contactus_section'] : "";

$disable_calculator_disclaimer_section = isset($loan_all_setting_data['disable_calculator_disclaimer_section']) ? $loan_all_setting_data['disable_calculator_disclaimer_section'] : "";

$disable_tabs_icon = isset($loan_all_setting_data['disable_tabs_icon']) ? $loan_all_setting_data['disable_tabs_icon'] : "";

/* END : NEW SETTING ADDED */

/*   loan term label option */

$ww_loan_term_label = isset($loan_all_setting_data['ww_loan_term_label']) ? $loan_all_setting_data['ww_loan_term_label'] : "";
/*   loan term label option */

/* loan term total interest payable */

$ww_loan_total_interest_payable = isset($loan_all_setting_data['ww_loan_total_interest_payable']) ? $loan_all_setting_data['ww_loan_total_interest_payable'] : "";

/* loan term total interest payable */


/* down payment options */

$down_payment_option = isset($loan_all_setting_data['down_payment_option']) ? $loan_all_setting_data['down_payment_option'] : "";

$down_payment_mode = isset($loan_all_setting_data['down_payment_mode']) ? $loan_all_setting_data['down_payment_mode'] : "fixed";


$down_payment_tooltip = isset($loan_all_setting_data['down_payment_tooltip']) ? $loan_all_setting_data['down_payment_tooltip'] : "";

$down_payment_heading = isset($loan_all_setting_data['down_payment_heading']) ? $loan_all_setting_data['down_payment_heading'] : "";

/* down payment options */


/* Extra payment options */

$extra_payment_option = isset($loan_all_setting_data['extra_payment_option']) ? $loan_all_setting_data['extra_payment_option'] : "";

$extra_payment_tooltip = isset($loan_all_setting_data['extra_payment_tooltip']) ? $loan_all_setting_data['extra_payment_tooltip'] : "";

$extra_payment_max_per = isset($loan_all_setting_data['extra_payment_max_per']) ? $loan_all_setting_data['extra_payment_max_per'] : "100";


if($extra_payment_max_per == "100"){

    $extra_payment_max_val =  $loan_amount;

}
else{

    $extra_payment_max_val = round(( (int) $loan_amount * (int) $extra_payment_max_per ) / 100);

}

$extra_payment_heading = isset($loan_all_setting_data['extra_payment_heading']) ? $loan_all_setting_data['extra_payment_heading'] : "";


$extra_payment_save_time_label = isset($loan_all_setting_data['extra_payment_save_time_label']) ? $loan_all_setting_data['extra_payment_save_time_label'] : "";


$extra_payment_total_label = isset($loan_all_setting_data['extra_payment_total_label']) ? $loan_all_setting_data['extra_payment_total_label'] : "";


$hide_total_extra_payments = isset($loan_all_setting_data['hide_total_extra_payments']) ? $loan_all_setting_data['hide_total_extra_payments'] : "";

$hide_save_time_extra_payments = isset($loan_all_setting_data['hide_save_time_extra_payments']) ? $loan_all_setting_data['hide_save_time_extra_payments'] : "";

$extra_payment_save_interest_label = isset($loan_all_setting_data['extra_payment_save_interest_label']) ? $loan_all_setting_data['extra_payment_save_interest_label'] : "";

$hide_save_interest_extra_payments = isset($loan_all_setting_data['hide_save_interest_extra_payments']) ? $loan_all_setting_data['hide_save_interest_extra_payments'] : "";   


/* Extra payment options */


/* disable interest rate adjustment */

$interest_rates_adj_disable = isset($loan_all_setting_data['interest_rates_adj_disable']) ? $loan_all_setting_data['interest_rates_adj_disable'] : "";

/* remove all range slider fields */

$remove_range_sliders = isset($loan_all_setting_data['remove_range_sliders']) ? $loan_all_setting_data['remove_range_sliders'] : "";


?>
<div class="wp-loan-calculator-main-new wp-loan-mobile-view" style="<?php echo esc_attr($font_family_new_theme, 'loan-calculator-wp'); ?>">
    <style type="text/css">
        :root {
            --calc-font-family-new-theme: <?php echo esc_html($font_family_new_theme); ?>;
            --calc-background-color: <?php echo esc_html($back_ground_color); ?>;
            --calc-select-color: <?php echo esc_html($selected_color); ?> !important;
            --calc-bg-light-color: <?php echo esc_html($background_light_color); ?>;
            --calc-border-color: <?php echo esc_html($border_color); ?> !important;
            --calc-graph-color: <?php echo esc_html($graph_color); ?> !important;
            --calc-graph-color-sub: <?php echo esc_html($graph_color_sub); ?>;
            --calc-graph-border-color: <?php echo esc_html($graph_border_color); ?>;
            --calc-graph-border-color-sub: <?php echo esc_html($graph_border_color_sub); ?>;
        }
    </style>
    <div id="overlay" style="display: none;"></div>
    <div id="loader" style="display: none;">
      <div class="spinner"></div>
  </div>
  <section class="heading-section">
    <div class="menu-sec-cls">
        <ul class="heading-sec-link">
            <?php
            if ($print_option_enable) { ?>
                <li>
                    <a href="javascript:void(0);" class="print-table"><i class="fa fa-print" aria-hidden="true"></i><?php echo esc_html($print_option_heading); ?></a>
                </li>
            <?php  } ?>
            <?php if ($about_this_calculator_disable == "") { ?>

                <li>
                    <a href="javascript:void(0);" onclick="jQuery('.about-this-calculator-popup').show();jQuery('body').addClass('body-overflow-hidden');"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo esc_html($about_this_calculator); ?></a>
                </li>
            <?php   } ?>
        </ul>
    </div>
    <div class="about-this-calculator-popup" style="display: none;">
        <div class="about-this-calculator-popup-body">
            <a href="javascript:void(0);" class="close-button" onclick="jQuery('.about-this-calculator-popup').hide();jQuery('body').removeClass('body-overflow-hidden');">X</a>
            <?php
                // very permissive: allows pretty much all HTML to pass - same as what's normally applied to the_content by default
            $allowed_html = wp_kses_allowed_html('post');
            $calculator_popup_content = wp_kses(stripslashes_deep($calculator_popup_content), $allowed_html);
            ?>
            <div class="calculator-content"><?php echo esc_attr($calculator_popup_content); ?></div>
        </div>
    </div>
</section>

<section id="main-sec" class="new-theme-template-section" style="<?php echo esc_attr($font_family_new_theme, 'loan-calculator-wp') ?>">
    <section class="calculator-heading-section calculator-heading-block">
        <div class="calculator-child-heading">
            <h2>
                <center><strong><?php echo esc_html($calculator_heading); ?></strong>
                </center>
            </h2>
        </div>
    </section>

    <section class="loan-option-text-info main-container-new-theme">
        <div class="custom-container loan-option-text-info-section-left-content">
            <div class="custom-container loan-option-text-info-section">
                <div class="loan-option-text-info-block">
                    <div class="first-col">
                        <div class="first-row-sub-child">
                            <div class="loan-text-dis-new-theme-block">
                                <div class="loan-new-theme-inner-block">
                                    <label for="loan_amt" class="loan-text"><?php echo esc_html($loan_amount_label, 'loan-calculator-wp'); ?> <i class="fa fa-info-circle" aria-hidden="true" tabindex="1"></i><span class="text-tooltip-disp"><?php echo esc_html($loan_amount_tooltip, 'loan-calculator-wp'); ?></span></label>
                                    <div class="loan-new-theme-range-slider">
                                        <input type="range" min="<?php echo esc_attr($loan_amount_min_value, 'loan-calculator-wp'); ?>" max="<?php echo esc_attr($loan_amount_max_value, 'loan-calculator-wp'); ?>" value="<?php echo esc_attr($loan_amount, 'loan-calculator-wp'); ?>" class="slider <?php if($remove_range_sliders =='1') { echo 'remove-cal-range-sliders'; } ?>" id="loan_amount_range" tabindex="3" >
                                    </div>
                                </div>
                                <div class="col-columns-20">
                                    <div class="input-container">
                                        <span class="extra-info"><?php echo esc_html($currency_symbols); ?></span>
                                        <input type="text" class="loan-right-input" name="loan_amount" id="loan_amount" value="" tabindex="2" oninput="validateInputLoanRate(this)" onkeydown="return onlyNos(event,'loan_amount')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="forth-row-sub-child">
                            <div class="loan-text-dis-new-theme-block">
                                <div class="loan-new-theme-inner-block">
                                    <label for="loan_terms" class="loan-text"><?php esc_html_e('Loan Terms', 'loan-calculator-wp'); ?> <i class="fa fa-info-circle" aria-hidden="true" tabindex="4"></i><span class="text-tooltip-disp"><?php echo esc_html($loan_terms_tooltip, 'loan-calculator-wp'); ?></span></label>
                                    <div class="loan-new-theme-range-slider">
                                        <input type="range" min="<?php echo esc_attr($loan_term_min_value, 'loan-calculator-wp'); ?>" max="<?php echo esc_attr($loan_term_max_value, 'loan-calculator-wp'); ?>" value="<?php echo esc_attr($loan_term, 'loan-calculator-wp'); ?>" class="slider <?php if($remove_range_sliders =='1') { echo 'remove-cal-range-sliders'; } ?>" id="loan_terms_range" tabindex="6" step="1">
                                        <input type="hidden" name="default_value" value="<?php echo esc_attr($loan_term, 'loan-calculator-wp'); ?>">
                                        <input type="hidden" name="min_value" value="<?php echo esc_attr($loan_term_min_value, 'loan-calculator-wp'); ?>">
                                        <input type="hidden" name="max_value" value="<?php echo esc_attr($loan_term_max_value, 'loan-calculator-wp'); ?>">
                                        <input type="hidden" name="current_repayment_freq" value="">
                                    </div>
                                </div>
                                <div class="col-columns-20">
                                    <div class="input-container-loan-terms">

                                        <input type="text" class="loan-right-input" name="loan_terms" id="loan_terms" value="" tabindex="5" onkeydown="return onlyNos(event,'loan_terms')" maxlength="5" autocomplete="off" />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Repayment Frequency options -->
                        <div class="sixth-row-sub-child">
                            <div class="first-row-main-child">
                                <div class="loan-new-theme-inner-block loan-btn-display-value">
                                    <div class="loan-new-theme-inner-block">
                                        <label for="loan_terms" class="loan-text"><?php esc_html_e('Repayment Frequency', 'loan-calculator-wp'); ?></label>

                                        <?php if($ww_loan_term_label== "1") { ?>

                                            <label id="label-for-freuency"></label> 

                                        <?php } ?>

                                    </div>
                                    <div class="col-columns-20">

                                        <div class="input-container">
                                            <?php $backgroud_arrow_logo = WW_LOAN_CALCULATOR_URL.'includes/images/down-arrow.svg'; ?>
                                            <style type="text/css"> .site-wrap-repayment-freq-section:after {background-image: url(<?php echo esc_attr($backgroud_arrow_logo); ?>); } </style>
                                            <?php if (!empty($get_repayment_frequency)) {
                                                $rpfclass = (count($get_repayment_frequency) == 1 ? 'single-val-option' : '');
                                                ?>
                                                <div class="site-wrap-repayment-freq-section">
                                                    <select name="repayment_freq" id="repayment_freq" class="payment-opt-drop <?php echo esc_attr($rpfclass); ?>">
                                                        <?php
                                                        foreach ($get_repayment_frequency as $key => $value) {
                                                            $selected = ($key == 0 ? 'selected' : '');
                                                            ?>
                                                            <option value="<?php echo esc_attr($value); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_attr($repayment_frequency_label[$value]); ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            <?php } else { ?>
                                                <div class="site-wrap-repayment-freq-section">
                                                    <select name="repayment_freq" id="repayment_freq" class="payment-opt-drop single-val-option">
                                                        <option value="Monthly" selected><?php echo esc_attr($repayment_frequency_label['Monthly']);?></option>
                                                    </select>
                                                </div>
                                            <?php } ?>
                                            <!-- <span class="select-arrow-main"><span class="select-arrow-wrap">❮</span></span> -->
                                            <input type="hidden" name="default_value" value="<?php echo esc_attr($loan_term, 'loan-calculator-wp'); ?>">
                                            <input type="hidden" name="min_value" value="<?php echo esc_attr($loan_term_min_value, 'loan-calculator-wp'); ?>">
                                            <input type="hidden" name="max_value" value="<?php echo esc_attr($loan_term_max_value, 'loan-calculator-wp'); ?>">
                                            <input type="hidden" name="current_repayment_freq" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Repayment Frequency options -->
                        <?php

                        if ($remove_decimal_point == 1) {
                            ?>
                            <div class="second-row-sub-child">
                                <div class="loan-text-dis-new-theme-block">
                                    <div class="loan-new-theme-inner-block">
                                        <label for="loan_amt" class="loan-text"><?php esc_html_e('Interest Rate', 'loan-calculator-wp'); ?> <i class="fa fa-info-circle" aria-hidden="true" tabindex="8"></i><span class="text-tooltip-disp"><?php echo esc_attr($interest_rates_tooltip, 'loan-calculator-wp'); ?></span></label>
                                        <div class="loan-new-theme-range-slider">
                                            <input type="range" min="<?php echo esc_attr(intval($interest_rate_min_value), 'loan-calculator-wp'); ?>" max="<?php echo esc_attr(intval($interest_rate_max_value), 'loan-calculator-wp'); ?>" value="<?php echo esc_attr(intval($interested_rate), 'loan-calculator-wp'); ?>" class="slider <?php if($interest_rates_adj_disable =='1') { echo 'disabled-rate-adj'; } ?> <?php if($remove_range_sliders =='1') { echo 'remove-cal-range-sliders'; } ?>" id="interest_rate_range" tabindex="10" step="1">
                                        </div>
                                    </div>
                                    <div class="col-columns-20">
                                        <div class="input-container">
                                            <input type="text" class="loan-right-input" name="interest_rates" id="interest_rates" value="" tabindex="9" autocomplete="off" <?php if($interest_rates_adj_disable =='1') { echo 'disabled'; } ?>/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } else { ?>
                            <div class="second-row-sub-child">
                                <div class="loan-text-dis-new-theme-block">
                                    <div class="loan-new-theme-inner-block">
                                        <label for="loan_amt" class="loan-text"><?php esc_html_e('Interest Rate', 'loan-calculator-wp'); ?> <i class="fa fa-info-circle" aria-hidden="true" tabindex="8"></i><span class="text-tooltip-disp"><?php echo esc_attr($interest_rates_tooltip, 'loan-calculator-wp'); ?></span></label>
                                        <div class="loan-new-theme-range-slider">
                                            <input type="range" min="<?php echo esc_attr($interest_rate_min_value, 'loan-calculator-wp'); ?>" max="<?php echo esc_attr($interest_rate_max_value, 'loan-calculator-wp'); ?>" value="<?php echo esc_attr($interested_rate, 'loan-calculator-wp'); ?>" class="slider <?php if($interest_rates_adj_disable =='1') { echo 'disabled-rate-adj'; } ?> <?php if($remove_range_sliders =='1') { echo 'remove-cal-range-sliders'; } ?>" id="interest_rate_range" tabindex="10" step="0.01">
                                        </div>
                                    </div>
                                    <div class="col-columns-20">
                                        <div class="input-container">
                                            <input type="text" class="loan-right-input" name="interest_rates" id="interest_rates" value="" tabindex="9" autocomplete="off" <?php if($interest_rates_adj_disable =='1') { echo 'disabled'; } ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($disable_ballon_amt == 1) { ?>
                            <div class="second-row-sub-child">

                                <div class="loan-text-dis">
                                    <input type="hidden" name="ballon_amounts" id="ballon_amounts" value="" tabindex="11" onkeydown="return onlyNos(event,'ballon_amounts')" />

                                    <input type="hidden" name="ballon_amounts_per" id="ballon_amounts_per" value="<?php echo esc_attr($ballon_per); ?>" tabindex="12" min="0" max="<?php echo esc_attr($ballon_per); ?>" />
                                </div>
                                <input type="hidden" id="ballon_amount_range" min="0" max="<?php echo esc_attr($ballon_per); ?>" tabindex="13" step="1" value="<?php echo esc_attr($ballon_per); ?>">
                            </div>
                        <?php } else {

                            try { ?>
                                <div class="fifth-row-sub-child">
                                    <div class="loan-text-dis-new-theme-block">
                                        <div class="loan-new-theme-inner-block">
                                            <label for="loan_amt" class="loan-text"><?php esc_html_e('Balloon Amount', 'loan-calculator-wp'); ?> <i class="fa fa-info-circle" aria-hidden="true" tabindex="8"></i><span class="text-tooltip-disp"><?php echo esc_attr($balloon_amount_tooltip, 'loan-calculator-wp'); ?></span></label>
                                            <div class="loan-new-theme-range-slider">
                                                <input type="range" min="0" value="<?php echo esc_attr($ballon_per); ?>" class="slider <?php if($remove_range_sliders =='1') { echo 'remove-cal-range-sliders'; } ?>" id="ballon_amount_range" max="<?php echo esc_attr($ballon_per); ?>" tabindex="13" step="1">
                                            </div>


                                            <input type="hidden" name="ballon_amounts" id="ballon_amounts" value="" tabindex="11" onkeydown="return onlyNos(event,'ballon_amounts')" readonly>

                                        </div>
                                        <div class="col-columns-20">
                                            <div class="input-container">
                                                <input type="text" class="loan-right-input" name="ballon_amounts_per" id="ballon_amounts_per" value="" tabindex="12"  onkeydown="return onlyNos(event,'ballon_amounts_per')" autocomplete="off">
                                                <span style="display: none;" id="ballon_amounts_per_dis" min="0" max="<?php echo esc_attr($ballon_per); ?>" class="rate_disp"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } catch (\Throwable $error) {
                                throw $error;
                            }
                            ?>
                        <?php  } ?>
                        <?php if($down_payment_option == '1') {   ?> 
                           <div class="fifth-row-sub-child down-payment-section">
                            <?php if($down_payment_mode == 'percentage'){ ?>     
                                <div class="loan-text-dis-new-theme-block dp-perc-mode">
                                    <div class="loan-new-theme-inner-block">
                                        <label for="down_payment" class="loan-text"><?php esc_html_e('Down Payment', 'loan-calculator-wp'); ?> <i class="fa fa-info-circle" aria-hidden="true" tabindex="8"></i><span class="text-tooltip-disp"><?php echo esc_attr($down_payment_tooltip, 'loan-calculator-wp'); ?></span></label>

                                        <div class="loan-new-theme-range-slider">
                                            <input type="range" min="0" value="0" class="slider <?php if($remove_range_sliders =='1') { echo 'remove-cal-range-sliders'; } ?>" id="down_payment_range" max="" tabindex="13" step="1">
                                        </div>


                                        <input type="hidden" name="down_payment" id="down_payment" value="" tabindex="11" onkeydown="return onlyNos(event,'down_payment')" readonly>

                                    </div>
                                    <div class="col-columns-20">
                                        <div class="input-container">
                                            <input type="text" class="loan-right-input" name="down_payment_per" id="down_payment_per" value="" tabindex="12" onkeydown="return onlyNos(event,'down_payment_per')" autocomplete="off">
                                            <span style="display: none;" id="down_payment_per_dis" min="0" max="" class="down_payment_rate_disp"></span>
                                        </div>
                                    </div>
                                </div>
                            <?php }else{ ?>

                                <div class="loan-text-dis-new-theme-block dp-fixed-mode">
                                    <div class="loan-new-theme-inner-block">
                                        <label for="down_payment" class="loan-text"><?php esc_html_e('Down Payment', 'loan-calculator-wp'); ?> <i class="fa fa-info-circle" aria-hidden="true" tabindex="8"></i><span class="text-tooltip-disp"><?php echo esc_attr($down_payment_tooltip, 'loan-calculator-wp'); ?></span></label>
                                    </div>
                                    <div class="col-columns-20">
                                        <div class="input-container">  
                                            <input type="text" class="loan-right-input" name="down_payment" id="down_payment" value="0" tabindex="11" onkeydown="return onlyNos(event,'down_payment')" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>    
                        </div>
                    <?php } ?>
                    <?php if($extra_payment_option == '1') {  ?>

                        <div class="fifth-row-sub-child extra-payment-section">

                            <div class="loan-text-dis-new-theme-block dp-fixed-mode">
                                <div class="loan-new-theme-inner-block">
                                    <label for="extra_payment" class="loan-text"><?php echo esc_attr('Extra Payment', 'loan-calculator-wp'); ?> <i class="fa fa-info-circle" aria-hidden="true" tabindex="8"></i><span class="text-tooltip-disp"><?php echo esc_attr($extra_payment_tooltip, 'loan-calculator-wp'); ?></span></label>
                                    <div class="loan-new-theme-range-slider">
                                        <input type="range" min="0" max="<?php echo esc_attr($extra_payment_max_val, 'loan-calculator-wp'); ?>" value="0" class="slider <?php if($remove_range_sliders =='1') { echo 'remove-cal-range-sliders'; } ?>" id="extra_payment_range" tabindex="16" step="1">
                                    </div>
                                </div>
                                <div class="col-columns-20">
                                    <div class="input-container">  
                                        <input type="text" name="extra_payment" id="extra_payment" class="loan-right-input" value="0" tabindex="14" onkeydown="return onlyNos(event,'extra_payment')" />
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    <?php } ?>
                    <div class="sixth-row-sub-child">
                        <div class="first-row-main-child">
                            <div class="loan-new-theme-inner-block loan-btn-display-value">
                                <div class="loan-new-theme-inner-block">
                                    <label for="loan_amt" class="loan-text"><?php esc_html_e('Payment Mode', 'loan-calculator-wp'); ?> <i class="fa fa-info-circle" aria-hidden="true" tabindex="8"></i><span class="text-tooltip-disp"><?php echo esc_attr($payment_mode_tooltip, 'loan-calculator-wp'); ?></span></label>
                                </div>

                                <div class="col-columns-20">

                                    <div class="input-container">
                                        <?php $backgroud_arrow_logo_code = WW_LOAN_CALCULATOR_URL.'includes/images/down-arrow.svg'; ?>
                                        <style type="text/css"> .site-wrap-payment-mode-section:after {background-image: url(<?php echo esc_attr($backgroud_arrow_logo_code); ?>); } </style>
                                        <?php if ($payment_mode_enable == '1' && $choose_default_payment_mode == 'In Arrears') { ?>
                                            <div class="first-row-main-child site-wrap-payment-mode-section">

                                                <select name="payment_type" id="payment_type" class="payment-opt-drop">
                                                    <option value="<?php echo esc_attr($choose_default_payment_mode, 'loan-calculator-wp'); ?>" selected> <?php esc_html_e('In Arrears', 'loan-calculator-wp'); ?></option>
                                                </select>
                                            </div>
                                        <?php  } else if ($payment_mode_enable == '1' && $choose_default_payment_mode == 'In Advanced') {
                                            ?>
                                            <div class="first-row-main-child site-wrap-payment-mode-section">

                                                <select name="payment_type" id="payment_type" class="payment-opt-drop">
                                                    <option value="<?php esc_attr_e('In Advance', 'loan-calculator-wp'); ?>" selected> <?php esc_html_e('In Advance', 'loan-calculator-wp'); ?></option>
                                                </select>
                                            </div>
                                        <?php } else {
                                            ?>
                                            <div class="first-row-main-child site-wrap-payment-mode-section">

                                                <select name="payment_type" id="payment_type" class="payment-opt-drop">
                                                    <option <?php echo ($choose_default_payment_mode == 'In Advanced') ? 'selected' : ''; ?> value="<?php esc_attr_e('In Advance', 'loan-calculator-wp'); ?>"><?php esc_html_e('In Advance', 'loan-calculator-wp'); ?></option>
                                                    <option <?php echo ($choose_default_payment_mode == 'In Arrears') ? 'selected' : ''; ?> value="<?php esc_attr_e('In Arrears', 'loan-calculator-wp'); ?>"><?php esc_html_e('In Arrears', 'loan-calculator-wp'); ?></option>
                                                </select>
                                            </div>
                                        <?php }
                                        ?>
                                        <!-- <span class="select-arrow-main"><span class="select-arrow-wrap">❮</span></span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php
    $full_width_cls = '';
    if ($enable_repayment_chart != 1 && $enable_video_tab != 1 && $enable_loan_mortisation_tab != 1) {
        $full_width_cls = 'full-width';
    }
    ?>
    <div class="loan-detail-section-right-content">
        <div class="loan-detail-section <?php echo esc_attr($full_width_cls); ?>">
            <div class="loan-detail-section-child">
                <div class="sub-main-tab">
                    <div class="container">
                        <div class="tabs">
                            <?php
                            $tab1_checked = $tab2_checked = $tab3_checked = "";
                            $tab1_checked = $tab2_checked = $tab3_checked = "";
                            if ($enable_repayment_chart == 1) {
                                $tab1_checked  = "checked";
                            } else if ($enable_video_tab == 1) {
                                $tab2_checked = "checked";
                            } else if ($enable_loan_mortisation_tab == 1) {
                                $tab3_checked = "checked";
                            }
                            if ($enable_repayment_chart == 1) {
                                ?>
                                <style type="text/css">
                                    label.tab2_icon {
                                        margin-left: 10px !important;
                                    }

                                    label.tab3_icon {
                                        border-top-right-radius: 16px !important;
                                        border-bottom-right-radius: 16px !important;
                                        border-top-left-radius: unset !important;
                                        border-bottom-left-radius: unset !important;
                                    }

                                    label.tab2_icon {
                                        border-radius: 16px !important;
                                    }

                                    label.tab1_icon {
                                        border-radius: 16px 0px 0px 16px !important;
                                    }
                                </style>
                                <input type="radio" name="tabs" id="tab1" <?php echo esc_attr($tab1_checked); ?>>
                                <label for="tab1" class="tab1_icon">
                                    <?php if ($disable_tabs_icon == "") { ?>
                                        <img src="<?php echo esc_attr(WW_LOAN_CALCULATOR_URL) ?>/includes/images/group-4.png">
                                        <span class="tooltip-disp"><?php echo esc_html($repayment_chart_heading, 'loan-calculator-wp'); ?></span>
                                    <?php } else { ?>
                                        <span><?php echo esc_html($repayment_chart_heading, 'loan-calculator-wp'); ?></span>
                                    <?php } ?>
                                </label>
                                <?php
                            }
                            if ($enable_loan_mortisation_tab == 1) {
                                ?>
                                <style type="text/css">
                                    label.tab2_icon {
                                        border-top-left-radius: 16px !important;
                                        border-bottom-left-radius: 16px !important;
                                    }

                                    label.tab1_icon {
                                        border-radius: 16px 0px 0px 16px !important;
                                    }
                                </style>
                                <input type="radio" name="tabs" id="tab3" <?php echo esc_attr($tab3_checked); ?>>
                                <label for="tab3" class="tab3_icon">
                                    <?php if ($disable_tabs_icon == "") { ?>
                                        <!-- <i class="fa fa-tasks"></i> -->
                                        <img src="<?php echo esc_attr(WW_LOAN_CALCULATOR_URL) ?>/includes/images/group-5.png">
                                        <span class="tooltip-disp"><?php echo esc_html($loan_table_heading, 'loan-calculator-wp'); ?></span>
                                    <?php } else { ?>
                                        <span class=""><?php echo esc_html($loan_table_heading, 'loan-calculator-wp'); ?></span>
                                    <?php } ?>
                                </label>
                                <?php

                            }
                            if ($enable_video_tab == 1 && !empty($youtube_video_link)) {
                                ?>
                                <style type="text/css">
                                    label.tab1_icon {
                                        border-radius: 16px 0px 0px 16px !important;
                                    }

                                    label.tab3_icon {
                                        border-radius: 0px 16px 16px 0px !important;
                                    }
                                </style>
                                <input type="radio" name="tabs" id="tab2" <?php echo esc_attr($tab2_checked); ?>>
                                <label for="tab2" class="tab2_icon">
                                    <?php if ($disable_tabs_icon == "") { ?>
                                        <img src="<?php echo esc_attr(WW_LOAN_CALCULATOR_URL) ?>/includes/images/play-video.png">
                                        <span class="tooltip-disp"><?php echo esc_html($video_heading, 'loan-calculator-wp'); ?></span>
                                    <?php } else { ?>
                                        <span><?php echo esc_html($video_heading, 'loan-calculator-wp'); ?></span>
                                    <?php } ?>
                                </label>
                                <?php
                            }
                            ?>
                            
                            <div id="tab-content1" class="tab-content">
                                <canvas id="loan-process-graph" width="800" height="1200"></canvas>
                            </div>
                            <div id="tab-content2" class="tab-content">
                                <?php
                                if (!empty($youtube_video_link)) {
                                    ?>
                                    <iframe height="415" src="<?php echo esc_url($youtube_video_link); ?>" style="width:100%;" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                <?php } ?>
                            </div>
                            <div id="tab-content3" class="tab-content">
                                <table id="loan-process-tbl">
                                    <thead>
                                        <tr>
                                            <th><?php esc_html_e('Period', 'loan-calculator-wp'); ?></th>
                                            <th><?php esc_html_e('Payment', 'loan-calculator-wp'); ?></th>
                                            <?php if($extra_payment_option=='1'){ ?>
                                                <th class="extra-payment-column"><?php echo esc_attr('Extra Payment', 'loan-calculator-wp'); ?></th>
                                            <?php } ?>
                                            <th><?php esc_html_e('Interest', 'loan-calculator-wp'); ?></th>
                                            <th><?php esc_html_e('Balance', 'loan-calculator-wp'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody id="loan_table_data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<section class="loan-option-text-info main-container-new-theme second-section-new-theme">
    <div class="custom-container loan-option-text-info-section-left-content">
        <div class="custom-container loan-option-text-info-section">
            <div class="loan-option-text-info-block">
                <div class="first-col">
                    <?php if ($disable_contactus_section == "") { 

                        $show_contact_sec = false;
                        if ($contact_type == "popup" && !empty($contact_popup_content)) { 
                            $show_contact_sec = true;  
                        }
                        else if($contact_type == "link" && !empty($contact_url)){
                            $show_contact_sec = true;    
                        }


                        if($show_contact_sec){ 

                            ?>
                            <div class="contact-us-section-new-theme">
                                <?php if ($contact_type == "popup") { ?>      
                                    <button style="<?php echo esc_attr($font_family_new_theme, 'loan-calculator-wp') ?>" class="contact-book-btn"><?php echo esc_html($contact_popup_button_heading, 'loan-calculator-wp'); ?></button>

                                <?php } else {  ?>     

                                    <a style="<?php echo esc_attr($font_family_new_theme, 'loan-calculator-wp') ?>" href="<?php echo esc_url($contact_url); ?>" target="_blank" class="contact-btn-link"><?php echo esc_html($contact_popup_button_heading, 'loan-calculator-wp'); ?></a>

                                <?php } ?>
                            </div>
                            <?php 
                        }
                    } 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    $full_width_cls = '';
    if ($enable_repayment_chart != 1 && $enable_video_tab != 1 && $enable_loan_mortisation_tab != 1) {
        $full_width_cls = 'full-width';
    }
    ?>
    <div class="loan-detail-section-right-content">
        <div class="loan-detail-section <?php echo esc_attr($full_width_cls); ?>">

            <div class="container loan-detail-section-child-container ">
                <div class="loan-detail-section-child">
                    <div class="loan-detail-cal-desc">
                        <div class="loan-cal-desc">
                            <div class="loan-cal-desc-heading main-heading">
                                <label id="regular_repayment_heading"><strong><?php echo esc_html($regular_repayment_heading, 'loan-calculator-wp'); ?></strong></label>
                            </div>
                            <div class="loan-cal-desc-val">
                                <label><span><small><?php echo esc_html($currency_symbols); ?></small><span id="per_month_amount"></span></span> <strong id="loan_amount_term_label"></strong><span id="loan_amount_year"></span> </span></label>
                            </div>

                        </div>
                        <?php if($ww_loan_total_interest_payable != '1'){ ?>
                            <div class="loan-cal-desc">
                                <div class="loan-cal-desc-heading">
                                    <label><span><?php echo esc_html($total_interests_payable_heading, 'loan-calculator-wp'); ?></span></label>
                                </div>
                                <div class="loan-cal-desc-val">
                                    <label><small><?php echo esc_html($currency_symbols); ?></small><span id="total_interests_amt"></span> <?php esc_html_e('over', 'loan-calculator-wp'); ?> <span id="total_interests_years"></span> </label>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="loan-cal-desc" id="ballon_amt_section">
                            <div class="loan-cal-desc-heading">
                                <label><span><?php echo esc_html($ballon_amt_heading, 'loan-calculator-wp'); ?> (<span id="bill_ballon_per"><?php echo esc_attr(number_format($ballon_per, 2), 'loan-calculator-wp'); ?></span>%)</span></label>
                            </div>
                            <div class="loan-cal-desc-val">
                                <label><small><?php echo esc_html($currency_symbols); ?></small><strong><span id="bill_ballon_amt"><?php echo esc_attr(number_format(($loan_amount * $ballon_per / 100), 2), 'loan-calculator-wp'); ?></span></strong></label>
                            </div>
                        </div> 
                        <?php if($down_payment_option=='1'){ ?>
                            <div class="loan-cal-desc" id="down_payment_section">
                                <div class="loan-cal-desc-heading">
                                    <label><span><?php echo esc_attr($down_payment_heading, 'loan-calculator-wp'); ?><?php if($down_payment_mode=='percentage'){ ?> (<span id="bottom_down_payment_per"></span>%)<?php } ?></span></label>
                                </div>
                                <div class="loan-cal-desc-val">
                                    <label><small><?php echo esc_attr($currency_symbols); ?></small><strong><span id="bottom_down_payment"></span></strong></label>
                                </div>
                            </div>
                        <?php } ?>  

                        <?php if($extra_payment_option=='1'){ ?>
                            <div class="loan-cal-desc" id="extra_payment_section">
                                <div class="loan-cal-desc-heading">
                                    <label><span><?php echo esc_attr($extra_payment_heading, 'loan-calculator-wp'); ?></span></label>
                                </div>
                                <div class="loan-cal-desc-val">
                                    <label><small><?php echo esc_attr($currency_symbols); ?></small><strong><span id="bottom_extra_payment"></span></strong> <strong id="extra_payment_loan_amount_term_label"></strong></label>
                                </div>
                            </div>
                            <?php if($hide_total_extra_payments != '1'){ ?>
                                <div class="loan-cal-desc" id="extra_payment_total_section">
                                    <div class="loan-cal-desc-heading">
                                        <label><span><?php echo esc_html($extra_payment_total_label); ?></span></label>
                                    </div>
                                    <div class="loan-cal-desc-val">
                                        <label><small><?php echo esc_attr($currency_symbols); ?></small><strong><span id="bottom_total_extra_payment"></span></strong></label>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($hide_save_time_extra_payments != '1'){ ?>
                                <div class="loan-cal-desc" id="extra_payment_saved_time_section">
                                    <div class="loan-cal-desc-heading">
                                        <label><span><?php echo esc_html($extra_payment_save_time_label); ?></span></label>
                                    </div>
                                    <div class="loan-cal-desc-val">
                                        <label><span id="time_save_for_extra_payment"></span></label>
                                    </div>
                                </div>
                            <?php } ?>                            
                            <?php if($hide_save_interest_extra_payments != '1'){ ?>
                                <div class="loan-cal-desc" id="extra_payment_saved_interest_section">
                                    <div class="loan-cal-desc-heading">
                                        <label><span><?php echo esc_html($extra_payment_save_interest_label); ?></span></label>
                                    </div>
                                    <div class="loan-cal-desc-val">
                                        <label><small><?php echo esc_attr($currency_symbols); ?></small>
                                            <strong><span id="interest_save_for_extra_payment"></span>
                                            </strong></label>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
                $total_regular_fees_amt = round(floatval(ceil($loan_term) * 120), 2);
                $total_fees_amt = floatval($total_regular_fees_amt) + floatval($application_fee);
                ?>
                <?php if ($calculation_fee_setting_enable == 1) { ?>
                    <div class="container loan-detail-section-child-container ">
                        <div class="loan-detail-fee-desc">
                            <div class="loan-detail-fee-block">
                                <div class="loan-detail-fee-heading">
                                    <h5><?php echo esc_html($application_fee_heading, 'loan-calculator-wp'); ?></h5>
                                </div>
                                <div class="loan-detail-fee-val">
                                    <p><?php echo esc_html($currency_symbols); ?></small><?php echo esc_html($application_fee, 'loan-calculator-wp'); ?></p>
                                </div>
                            </div>
                            <div class="loan-detail-fee-block">
                                <div class="loan-detail-fee-heading">
                                    <h5><?php echo esc_html($monthly_fee_heading, 'loan-calculator-wp'); ?></h5>
                                </div>
                                <div class="loan-detail-fee-val">
                                    <p><?php echo esc_html($currency_symbols); ?></small><?php echo esc_html($monthly_rate, 'loan-calculator-wp'); ?></p>
                                </div>
                            </div>
                            <div class="loan-detail-fee-block">
                                <div class="loan-detail-fee-heading">
                                    <h5><?php echo esc_html($total_regular_fees, 'loan-calculator-wp'); ?></h5>
                                </div>
                                <div class="loan-detail-fee-val">
                                    <p><?php echo esc_html($currency_symbols); ?></small><span id="total_regular_fee_amt"><?php echo esc_html(round($total_regular_fees_amt, 2), 'loan-calculator-wp'); ?></span></p>
                                </div>
                            </div>
                            <div class="loan-detail-fee-block">
                                <div class="loan-detail-fee-heading">
                                    <h5><?php echo esc_html($total_fees, 'loan-calculator-wp'); ?></h5>
                                </div>
                                <div class="loan-detail-fee-val">
                                    <p><?php echo esc_html($currency_symbols); ?></small><span id="total_fee_amt"><?php echo esc_html($total_fees_amt, 'loan-calculator-wp'); ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <div class="contact-us-popup" style="display:none;">
        <div class="contact-us-popup-body">
            <a href="javascript:void(0);" class="close-button" onclick="jQuery('.contact-us-popup').hide();jQuery('body').removeClass('body-overflow-hidden');">X</a>
            <?php echo do_shortcode($contact_popup_content); ?>
        </div>
    </div>
</section>
</div>
