'use strict';

jQuery(document).ready(function (jQuery) {

	jQuery(document).on('click', '#calculation_fee_setting_enable', function () {
		if (jQuery('input[id="calculation_fee_setting_enable"]').is(':checked')) {
			jQuery(".calculation-fee-display-section").show();
		} else {
			jQuery(".calculation-fee-display-section").hide();
		}
	});

	jQuery(document).on('click', '#enable_repayment_chart', function () {
		if (jQuery('input[id="enable_repayment_chart"]').is(':checked')) {
			jQuery(".repayment_chart_heading_lbl").show();
		} else {
			jQuery(".repayment_chart_heading_lbl").hide();
		}
	});

	jQuery(document).on('click', '#enable_video_tab', function () {
		if (jQuery('input[id="enable_video_tab"]').is(':checked')) {
			jQuery(".video_heading_lbl").show();
		} else {
			jQuery(".video_heading_lbl").hide();
		}
	});

	jQuery(document).on('click', '#enable_loan_mortisation_tab', function () {
		if (jQuery('input[id="enable_loan_mortisation_tab"]').is(':checked')) {
			jQuery(".loan_table_heading_lbl").show();
		} else {
			jQuery(".loan_table_heading_lbl").hide();
		}
	});

	jQuery('#print_option_enable').on('change', function () {
		if (this.checked) {
			jQuery('.print-option-heading').show(); //checked
		} else {
			jQuery('.print-option-heading').hide(); //checked
		}
	}).trigger('change');

	jQuery(document).on('click', '#delete_setting', function () {
		if (jQuery('input[id="delete_setting"]').is(':checked')) {
			if (!confirm("Are you sure you want to delete data on plugin uninstall/deactivate?")) {
				return false;
			}
		}
	});

	jQuery(document).on('click', '.contact-type-btn', function () {
		if (jQuery(this).val() == "popup") {
			jQuery("#contact-popup-section").show();
			jQuery("#contact-url-section").hide();
		} else {
			jQuery("#contact-popup-section").hide();
			jQuery("#contact-url-section").show();
		}
	});

	jQuery('#disable_ballon_amt').on('change', function () {
		if (this.checked) {
			jQuery('#ballon_amt_per_text_section').hide(); //checked
		} else {
			jQuery('#ballon_amt_per_text_section').show(); //checked
		}
	}).trigger('change');


	var loan_term_min_value = parseInt(jQuery('#loan_term_min_value').val());
	var loan_term_max_value = parseInt(jQuery('#loan_term_max_value').val());

	jQuery('#loan_term_min_value').on('change', function (event) {
		event.preventDefault();
		var new_min_value = parseInt(jQuery(this).val());

		if (new_min_value >= loan_term_max_value) {
			alert("Loan min value should be less than loan max value");
			jQuery(this).val(loan_term_min_value); // Reset the min value to the previous valid value
		} else {
			loan_term_min_value = new_min_value;
		}
	});

	jQuery('#loan_term_max_value').on('change', function (event) {
		event.preventDefault();
		var new_max_value = parseInt(jQuery(this).val());

		if (new_max_value <= loan_term_min_value) {
			alert("Loan max value should be greater than loan min value");
			jQuery(this).val(loan_term_max_value); // Reset the max value to the previous valid value
		} else {
			loan_term_max_value = new_max_value;
		}
	});

	// loan_term_min_value and loan_term_max_value validation end

	/**
	 * If clicked No/Avoid for the review then we will store the data 
	 *
	 */
	jQuery('.notice_avoid_yes').on('click', function () {
		jQuery(".admin_notice_hide").css("display", "none");
		jQuery.ajax({
			url: admin_setting_data.ajaxurl,
			type: 'POST',
			data: {
				action: 'avoid_admin_notice',
			},
			success: function (response) {
				if (response.success == true) {
					// Display the popup here
					var message = '<div class="update-nag notice notice-success inline">' +
						response.data.message +
						'</div>';
					jQuery(message).insertBefore(".admin_notice_hide");

					jQuery(".admin_notice_hide").css("display", "none");
				} else {
					var message = '<div class="update-nag notice notice-warning inline">' +
						response.data.message +
						'</div>';
					jQuery(message).insertBefore(".admin_notice_hide");
				}
			},
		});
	});

	jQuery('.notice-dismiss').on('click', function () {
		jQuery(".admin_notice_hide").css("display", "none");
		jQuery.ajax({
			url: admin_setting_data.ajaxurl,
			type: 'POST',
			data: {
				action: 'avoid_admin_notice',
			},
			success: function (response) {
				if (response.success == true) {
					// Display the popup here
					jQuery(".admin_notice_hide").css("display", "none");
				}
			}
		});
	});

	/**
	 *  If Clicked on Yes then redirect to review page  
	 *
	 */
	jQuery('#ww_loan_calculator_response_yes').on('click', function () {
		jQuery(".admin_notice_hide").hide()
		jQuery.ajax({
			url: admin_setting_data.ajaxurl,
			type: 'POST',
			data: {
				action: 'plugin_notice_review_yes',
			},
			success: function (response) {
				if (response.success == true) {
					jQuery(".admin_notice_hide").hide();
					window.open('https://wordpress.org/plugins/loan-calculator-wp/#reviews', '_blank')
				}
				jQuery(".admin_notice_hide").hide()
			}
		});
	});
});


function onlyNos(evt, txt_name) {

	var theEvent = evt || window.event;
	var key = theEvent.keyCode || theEvent.which;
	var keyCode = key;
	key = String.fromCharCode(key);


	// Add condition to allow left and right arrow keys
	if (keyCode == 37 || keyCode == 39) {
		return;
	}

	if ((theEvent.ctrlKey || theEvent.metaKey) && key.toLowerCase() === 'v') {
		return;
	}

	if (theEvent.key == "!" || theEvent.key == "@" || theEvent.key == "#" || theEvent.key == "$" || theEvent.key == "&" || theEvent.key == "%" || theEvent.key == "^" || theEvent.key == "*" || theEvent.key == ")" || theEvent.key == "(") {
		return false;
	}

	if (keyCode == 67 || keyCode == 86 || keyCode == 88 || keyCode == 65) {
		return;
	}

	var txt_value = jQuery("#" + txt_name).val();
	if (txt_value.length >= 1 && txt_value.charAt(0) == "." && theEvent.key == ".") {
		return false;
	}

	if (key.length == 0) return;
	var regex = /^[0-9.,\b]+$/;
	if (keyCode == 188 || keyCode == 190 || keyCode == 110 || keyCode == 9 || (keyCode >= 96 && keyCode <= 105)) {
		return;
	} else {
		if (!regex.test(key)) {
			theEvent.returnValue = false;
			if (theEvent.preventDefault) theEvent.preventDefault();
		}
	}
}

