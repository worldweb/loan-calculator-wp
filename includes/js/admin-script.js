'use strict';

jQuery(document).ready(function (jQuery) {


	jQuery("#back_ground_color, #selected_color, #background_light_color, #border_color, #graph_color, #graph_border_color, #graph_color_sub, #graph_border_color_sub, #balance_border_color_graph, #balance_point_background_color_graph, #extra_payment_graph_color,#summary_chart_principal_fill_color,#summary_chart_interest_fill_color,#summary_chart_ballon_payment_fill_color,#summary_chart_down_payment_fill_color,#summary_chart_extra_payment_fill_color").hide();

	jQuery("#back_ground_color, #selected_color, #background_light_color, #border_color, #graph_color, #graph_border_color, #graph_color_sub, #graph_border_color_sub, #balance_border_color_graph, #balance_point_background_color_graph, #extra_payment_graph_color,#summary_chart_principal_fill_color,#summary_chart_interest_fill_color,#summary_chart_ballon_payment_fill_color,#summary_chart_down_payment_fill_color,#summary_chart_extra_payment_fill_color").wpColorPicker();

	jQuery("#back_ground_color, #selected_color, #background_light_color, #border_color, #graph_color, #graph_border_color, #graph_color_sub, #graph_border_color_sub, #balance_border_color_graph, #balance_point_background_color_graph, #extra_payment_graph_color,#summary_chart_principal_fill_color,#summary_chart_interest_fill_color,#summary_chart_ballon_payment_fill_color,#summary_chart_down_payment_fill_color,#summary_chart_extra_payment_fill_color").show();
	
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



	// jQuery('#disable_ballon_amt').on('change', function () {

	// 	if (this.checked) {

	// 		jQuery('#ballon_amt_per_text_section').hide(); //checked

	// 	} else {

	// 		jQuery('#ballon_amt_per_text_section').show(); //checked

	// 	}

	// }).trigger('change');





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


	jQuery('#down_payment_option').on('change', function () {

		if (this.checked) {

			jQuery('.down-payment-fields-row').show(); //checked

		} else {

			jQuery('.down-payment-fields-row').hide(); //checked

		}

	});



	jQuery('#extra_payment_option').on('change', function () {

		if (this.checked) {

			jQuery('.extra-payment-fields-row').show(); //checked

		} else {

			jQuery('.extra-payment-fields-row').hide(); //checked

		}

	});




	if(jQuery('#chart_types').val()=='stacked_bar'){

			jQuery('#balance-border-color-graph').show();
			jQuery('#balance-point-background-color-graph').show();
			jQuery('#extra-payment-graph-color').show();

	}
	else{

		jQuery('#balance-border-color-graph').hide();
		jQuery('#balance-point-background-color-graph').hide();
		jQuery('#extra-payment-graph-color').hide();

	}


	jQuery('#chart_types').on('change', function () {

		if(jQuery(this).val()=='stacked_bar'){

			jQuery('#balance-border-color-graph').show();
			jQuery('#balance-point-background-color-graph').show();
			jQuery('#extra-payment-graph-color').show();

		}
		else{

			jQuery('#balance-border-color-graph').hide();
			jQuery('#balance-point-background-color-graph').hide();
			jQuery('#extra-payment-graph-color').hide();

		}
	});



	jQuery('#summary_chart_option').on('change', function () {

		if (this.checked) {

			jQuery('.summary-chart-options').show(); //checked

		} else {

			jQuery('.summary-chart-options').hide(); //checked

		}

	});


	/* admin setting fields validation code */
	jQuery('#loan_calculator_form_settings').validate({

		 rules: {
		    "ww_loan_option\[loan_amount_label\]": {
		      required: true		     
		    },
		    "ww_loan_option\[loan_amount\]": {
		      required: true,
		      maxlength: 20,
		      min:1		     
		    },
		    "ww_loan_option\[loan_amount_min_value\]": {
		       required: true,
		       maxlength: 20,
		       min:1		     
		     },
		    "ww_loan_option\[loan_amount_max_value\]": {
		       required: true,
		       maxlength: 20,
		       min:1		     
		     },
		     "ww_loan_option\[interested_rate\]": {
		       required: true,
		       min:0.5,
		       max:40,
		       maxlength: 5  		     
		     },
		     "ww_loan_option\[interest_rate_min_value\]": {
		       required: true,
		       maxlength: 5,
		       min:0.5,
		       max:40  		     
		     },
		     "ww_loan_option\[interest_rate_max_value\]": {
		       required: true,
		       maxlength: 5,
		       min:0.5,
		       max:40     		     
		     },
		      "ww_loan_option\[ballon_per\]": {
		       min:1,
		       max:80 ,
		       required: function () {
	          			return !jQuery("#disable_ballon_amt").prop("checked");
	           }      
		     },
		     "ww_loan_option\[extra_payment_max_per\]": {
		       min:1,
		       max:100,
		       required: function () {
          			return jQuery("#extra_payment_option").prop("checked");
        	   }     
		     },		
		     "ww_loan_option\[application_fee\]": {
		       min:1,
		       max:50000,
		       required: function () {
          			return jQuery("#calculation_fee_setting_enable").prop("checked");
        	   }      
		     },	
		     "ww_loan_option\[monthly_rate\]": {
		       min:1,
		       max:50000,
		       required: function () {
          			return jQuery("#calculation_fee_setting_enable").prop("checked");
        	   }     
		     },	
		     "ww_loan_option\[regular_repayment_heading\]": {
		       maxlength: 200,
		       required: true      
		     },	
		      "ww_loan_option\[total_interests_payable_heading\]": {
		       maxlength: 200,
		       required: function () {
          			return !jQuery("#ww_loan_total_interest_payable").prop("checked");
        	   }       
		     },	
		     "ww_loan_option\[ballon_amt_heading\]": {
		       maxlength: 200,
		       required: function () {
          			return !jQuery("#disable_ballon_amt").prop("checked");
        	   }       
		     },	
		      "ww_loan_option\[down_payment_heading\]": {
		       maxlength: 200,
		       required: function () {
          			return jQuery("#down_payment_option").prop("checked");
        	   }        
		     },	
		      "ww_loan_option\[extra_payment_heading\]": {
		       maxlength: 200,
		       required: function () {
          			return jQuery("#extra_payment_option").prop("checked");
        	   }       
		     },	
		      "ww_loan_option\[extra_payment_save_time_label\]": {
		       maxlength: 200,
		       required: function () {
          			return !jQuery("#hide_save_time_extra_payments").prop("checked");
        	   }        
		     },	
		      "ww_loan_option\[extra_payment_total_label\]": {
		       maxlength: 200,
		       required: function () {
          			return !jQuery("#hide_total_extra_payments").prop("checked");
        	   }       
		     },	
		     "ww_loan_option\[extra_payment_save_interest_label\]": {
		       maxlength: 200,
		       required: function () {
          			return !jQuery("#hide_save_interest_extra_payments").prop("checked");
        	   }       
		     },	
		     "ww_loan_option\[application_fee_heading\]": {
		       maxlength: 50,
		       required: function () {
          			return jQuery("#calculation_fee_setting_enable").prop("checked");
        	   }       
		     },	
		     "ww_loan_option\[monthly_fee_heading\]": {
		       maxlength: 50,
		       required: function () {
          			return jQuery("#calculation_fee_setting_enable").prop("checked");
        	   }       
		     },	
		      "ww_loan_option\[total_regular_fees\]": {
		       maxlength: 50,
		        required: function () {
          			return jQuery("#calculation_fee_setting_enable").prop("checked");
        	   }       
		     },	
		      "ww_loan_option\[total_fees\]": {
		       maxlength: 50,
		        required: function () {
          			return jQuery("#calculation_fee_setting_enable").prop("checked");
        	   }      
		     },	
		      "ww_loan_option\[calculator_heading\]": {
		       maxlength: 300      
		     },	
		     "ww_loan_option\[about_this_calculator\]": {
		       maxlength: 100,
		        required: function () {
          			return !jQuery("#about_this_calculator_disable").prop("checked");
        	   }       
		     },	
		     "ww_loan_option\[print_option_heading\]": {
		       maxlength: 100, 
		        required: function () {
          			return jQuery("#print_option_enable").prop("checked");
        	   }        
		     },	
		     "ww_loan_option\[repayment_chart_heading\]": {
		       maxlength: 60,
		       required: function () {
          			return jQuery("#enable_repayment_chart").prop("checked");
        	   }       
		     },	
		      "ww_loan_option\[loan_table_heading\]": {
		       maxlength: 60,
		       required: function () {
          			return jQuery("#enable_loan_mortisation_tab").prop("checked");
        	   }       
		     },	
		      "ww_loan_option\[video_heading\]": {
		       maxlength: 60,
		       required: function () {
          			return jQuery("#enable_video_tab").prop("checked");
        	   }       
		     },	
		     "ww_loan_option\[youtube_video_link\]": {
		       maxlength: 200,
		       required: function () {
          			return jQuery("#enable_video_tab").prop("checked");
        	   }       
		     },
		      "ww_loan_option\[contact_popup_button_heading\]": {
		       maxlength: 200,
		       required: function () {
          			return !jQuery("#disable_contactus_section").prop("checked");
        	   }       
		     },
		      "ww_loan_option\[calculator_disclaimer_heading\]": {
		       maxlength: 50      
		     },
		      "ww_loan_option\[summary_chart_label\]": {
		       maxlength: 50,
		       required: function () {
          			return jQuery("#summary_chart_option").prop("checked");
        	   }      
		     },
		     "ww_loan_option\[contact_popup_content\]": {		       
		       required: function () {
          			return (jQuery("#popup-type").prop("checked") && !jQuery("#disable_contactus_section").prop("checked"));
        	   }      
		     },
		     "ww_loan_option\[contact_url\]": {		       
		       required: function () {
          			return (jQuery("#link-type").prop("checked") && !jQuery("#disable_contactus_section").prop("checked"));
        	   }      
		     },
		     "ww_loan_option\[down_payment_label\]": {
		       maxlength: 50,
		       required: function () {
          			return jQuery("#down_payment_option").prop("checked");
        	   }      
		     },
		     "ww_loan_option\[down_payment_max_per\]": {
		       min:1,
		       max:100,
		       required: function () {
          			return jQuery("#down_payment_option").prop("checked");
        	   }     
		     },
		     "ww_loan_option\[loan_term_field_label\]": {
		      required: true		     
		     },
		     "ww_loan_option\[balloon_amount_field_label\]": {
		      required: true		     
		     },
		     "ww_loan_option\[extra_payment_field_label\]": {
		      required: true		     
		     },
		     "ww_loan_option\[interest_rate_field_label\]": {
		      required: true		     
		     },
		     "ww_loan_option\[payment_mode_field_label\]": {
		      required: true		     
		     },
		     "ww_loan_option\[repayment_frequency_field_label\]": {
		      required: true		     
		     },
		  },
		  messages: {
		  	"ww_loan_option\[loan_amount_label\]": {
		    	required: admin_setting_data.enter_loan_amt_label_msg
		    },
		    "ww_loan_option\[loan_amount\]": {
		    	required: admin_setting_data.enter_loan_amt_msg
		    },
		    "ww_loan_option\[loan_amount_min_value\]": {
		    	required: admin_setting_data.enter_loan_amt_min_msg
		    },
		    "ww_loan_option\[loan_amount_max_value\]": {
		    	required: admin_setting_data.enter_loan_amt_max_msg
		    },
		     "ww_loan_option\[interested_rate\]": {
		    	required: admin_setting_data.enter_interest_rate_msg
		    },
		     "ww_loan_option\[interest_rate_min_value\]": {
		    	required: admin_setting_data.enter_interest_rate_min_msg
		    },
		     "ww_loan_option\[interest_rate_max_value\]": {
		    	required: admin_setting_data.enter_interest_rate_max_msg
		    },
		     "ww_loan_option\[application_fee\]": {
		    	required: admin_setting_data.enter_application_fee_msg
		    },
		     "ww_loan_option\[monthly_rate\]": {
		    	required: admin_setting_data.enter_monthly_rate_msg
		    },
		     "ww_loan_option\[about_this_calculator\]": {
		    	required: admin_setting_data.enter_about_calcultor_label
		    },
		     "ww_loan_option\[print_option_heading\]": {
		    	required: admin_setting_data.enter_print_label
		    },
		     "ww_loan_option\[summary_chart_label\]": {
		    	required: admin_setting_data.enter_summery_chart_label
		    },
		    "ww_loan_option\[ballon_per\]": {
		    	required: admin_setting_data.enter_ballon_amt_per
		    },
		    "ww_loan_option\[regular_repayment_heading\]": {
		    	required: admin_setting_data.regular_repayment_heading
		    },
		    "ww_loan_option\[total_interests_payable_heading\]": {
		    	required: admin_setting_data.total_interest_payable_label
		    },
		    "ww_loan_option\[ballon_amt_heading\]": {
		    	required: admin_setting_data.enter_ballon_amt_heading
		    },
		    "ww_loan_option\[down_payment_heading\]": {
		    	required: admin_setting_data.enter_down_payment_heading
		    },
		    "ww_loan_option\[extra_payment_heading\]": {
		    	required: admin_setting_data.enter_extra_payment_heading
		    },
		    "ww_loan_option\[extra_payment_save_time_label\]": {
		    	required: admin_setting_data.enter_extra_payment_save_time_label
		    },
		    "ww_loan_option\[extra_payment_total_label\]": {
		    	required: admin_setting_data.enter_extra_payment_total_label
		    },
		    "ww_loan_option\[extra_payment_save_interest_label\]": {
		    	required: admin_setting_data.enter_extra_payment_save_interest_label
		    },
		    "ww_loan_option\[application_fee_heading\]": {
		    	required: admin_setting_data.enter_application_fee_heading
		    },
		    "ww_loan_option\[monthly_fee_heading\]": {
		    	required: admin_setting_data.enter_monthly_fee_heading
		    },
		    "ww_loan_option\[total_regular_fees\]": {
		    	required: admin_setting_data.enter_total_regular_fees
		    },
		    "ww_loan_option\[total_fees\]": {
		    	required: admin_setting_data.enter_total_fees
		    },
		    "ww_loan_option\[repayment_chart_heading\]": {
		    	required: admin_setting_data.enter_repayment_chart_heading
		    },
		    "ww_loan_option\[loan_table_heading\]": {
		    	required: admin_setting_data.enter_loan_table_heading
		    },
		    "ww_loan_option\[video_heading\]": {
		    	required: admin_setting_data.enter_video_heading
		    },
		    "ww_loan_option\[youtube_video_link\]": {
		    	required: admin_setting_data.enter_youtube_video_link
		    },
		    "ww_loan_option\[contact_popup_button_heading\]": {
		    	required: admin_setting_data.enter_contact_popup_button_heading
		    },
		    "ww_loan_option\[contact_popup_content\]": {
		    	required: admin_setting_data.enter_contact_popup_content
		    },
		    "ww_loan_option\[contact_url\]": {
		    	required: admin_setting_data.enter_contact_url
		    },
		    "ww_loan_option\[down_payment_label\]": {
		    	required: admin_setting_data.enter_down_payment_label
		    },
		    "ww_loan_option\[down_payment_max_per\]": {
		    	required: admin_setting_data.enter_down_payment_max_per
		    },
		    "ww_loan_option\[extra_payment_max_per\]": {
		    	required: admin_setting_data.enter_extra_payment_max_per
		    },
		     "ww_loan_option\[loan_term_field_label\]": {
		    	required: admin_setting_data.enter_loan_term_field_label_msg
		    },
		    "ww_loan_option\[balloon_amount_field_label\]": {
		    	required: admin_setting_data.enter_balloon_amount_field_label_msg
		    },
		    "ww_loan_option\[extra_payment_field_label\]": {
		    	required: admin_setting_data.enter_extra_payment_field_label_msg
		    },
		    "ww_loan_option\[interest_rate_field_label\]": {
		    	required: admin_setting_data.enter_interest_rate_field_label_msg
		    },
		    "ww_loan_option\[payment_mode_field_label\]": {
		    	required: admin_setting_data.enter_payment_mode_field_label_msg
		    },
		    "ww_loan_option\[repayment_frequency_field_label\]": {
		    	required: admin_setting_data.repayment_frequency_field_label_msg
		    },		    

		  },
		  submitHandler: function(form) {
		    	form.submit();
		  }

	});	
	
	/* ballon amout section hide show start */

	jQuery('#disable_ballon_amt').on('change', function () {

		if (this.checked) {

			jQuery('#ballon_amt_per_text_section').hide(); 
			jQuery('#ballon_amt_tooltip_section').hide(); 
			

		} else {

			jQuery('#ballon_amt_per_text_section').show(); 
			jQuery('#ballon_amt_tooltip_section').show(); 

		}

	});


	if(jQuery("#disable_ballon_amt").prop('checked') == true){

		jQuery('#ballon_amt_per_text_section').hide();
		jQuery('#ballon_amt_tooltip_section').hide(); 

	}
	else{

		jQuery('#ballon_amt_per_text_section').show(); 
		jQuery('#ballon_amt_tooltip_section').show(); 

	}

	/* ballon amout section hide show end */ 


	jQuery('#hide_payment_mode').on('change', function () {

		if (this.checked) {

			jQuery('.payment-mode-field-row').hide(); //checked

		} else {

			jQuery('.payment-mode-field-row').show(); //checked

		}

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

	if (keyCode == 67 || keyCode == 86 || keyCode == 88 || keyCode == 65 || keyCode==38 || keyCode == 40) {

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



