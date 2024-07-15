jQuery(document).ready(function ($) {
	"use strict";
  
	jQuery(".contact-book-btn").click(function () {
	  jQuery(".contact-us-popup").show();
	  jQuery("body").addClass("body-overflow-hidden");
	});
  
	/*****************************************************************************************/
	/** Attention!!! This JS for Default theme and New theme (In If elase condition)||********/
	/*****************************************************************************************/
  
	const element = document.getElementById("main-sec");
  
	/*****************************************************************************************/
	/******************** START : Condition For New theme ************************************/
	/*****************************************************************************************/
  
	if (element.classList.contains("new-theme-template-section")) {
	  //Condition For New theme
	  function loan_calculation_process() {
		var currency_symbol = setting_data.currency_symbols;
		var loan_amount = jQuery("#loan_amount").val();
		var monthly_payment = 0;
		var repayment_frequency_val = jQuery("#repayment_freq").val();	

  
		jQuery("input[name='current_repayment_freq']").val(
		  repayment_frequency_val
		);
  
		if (!loan_amount.startsWith(currency_symbol)) {
		  jQuery("#loan_amount").val(
			currency_symbol + jQuery("#loan_amount").val()
		  );
		}
  
		var ballon_amounts_per_sign = jQuery("#ballon_amounts_per").val();
		if (!ballon_amounts_per_sign.endsWith("%")) {
		  jQuery("#ballon_amounts_per").val(ballon_amounts_per_sign + "%");
		}
  
		var interest_rates_sign = jQuery("#interest_rates").val();
		if (!interest_rates_sign.endsWith("% p.a.")) {
		  jQuery("#interest_rates").val(interest_rates_sign + "% p.a.");
		}
  
		var loan_amount = jQuery("#loan_amount")
		  .val()
		  .replaceAll(currency_symbol, "");
  
		if (setting_data.remove_decimal_point == 1) {
		  loan_amount = parseInt(loan_amount.replaceAll(",", ""));
		} else {
		  loan_amount = parseFloat(loan_amount.replaceAll(",", ""));
		}
  
		if (setting_data.remove_decimal_point == 1) {
		  var interest_rates = parseInt(jQuery("#interest_rates").val());
		} else {
		  var interest_rates = parseFloat(
			jQuery("#interest_rates").val().replaceAll("% p.a.", "")
		  );
		}
  
		var ballon_amounts_per = jQuery("#ballon_amounts_per")
		  .val()
		  .replaceAll("%", "");
		var loan_terms_month = 0;
		var total_months_terms = 0;
  
		var loan_terms = jQuery("#loan_terms").val();
  
		if (loan_terms > 0) {
		  total_months_terms = cal_loan_terms_by_frequency_payment_option(
			repayment_frequency_val,
			loan_terms
		  );
		  loan_terms_month = loan_terms;
		}



		/* display loan terms as year and months start */

		if (loan_terms > 0) {			

			convert_total_terms_to_year_month(loan_terms,repayment_frequency_val);

		}


		/* display loan terms as year and months end */


  
		document.getElementById("ballon_amount_range").max = 80;
  
		var payment_type = jQuery("#payment_type").val();
  
		var loan_advance_interest = 0;
		var adloan_amount = 0;
		if (payment_type == "In Advance") {
		  if (setting_data.remove_decimal_point == 1) {
			adloan_amount = cal_advance_loan_amount_by_frequency_val(
			  repayment_frequency_val,
			  loan_amount,
			  interest_rates
			);
			var advance_cal = loan_advance_interest_cal(
			  repayment_frequency_val,
			  adloan_amount,
			  interest_rates
			);
			loan_advance_interest = parseInt(advance_cal.loan_advance_interest);
			loan_amount = adloan_amount;
		  } else {
			adloan_amount = cal_advance_loan_amount_by_frequency_val(
			  repayment_frequency_val,
			  loan_amount,
			  interest_rates
			);
			var advance_cal = loan_advance_interest_cal(
			  repayment_frequency_val,
			  adloan_amount,
			  interest_rates
			);
			loan_advance_interest = advance_cal.loan_advance_interest;
			loan_amount = adloan_amount;
		  }
		}
		if (setting_data.remove_decimal_point == 1) {
		  var ballon_amounts =
			parseInt(
			  (parseInt(loan_amount) + parseInt(loan_advance_interest)) *
				parseInt(ballon_amounts_per)
			) / 100;
		  jQuery("#bill_ballon_per").html(parseInt(ballon_amounts_per));
		  jQuery("#bill_ballon_amt").html(addCommas(parseInt(ballon_amounts)));
		} else {
		  var ballon_amounts =
			parseFloat(
			  (parseFloat(loan_amount) + parseFloat(loan_advance_interest)) *
				parseFloat(ballon_amounts_per)
			) / 100;
		  jQuery("#bill_ballon_per").html(
			parseFloat(ballon_amounts_per).toFixed(2)
		  );
		  jQuery("#bill_ballon_amt").html(addCommas(ballon_amounts.toFixed()));
		}
		if (setting_data.remove_decimal_point == 1) {
		  jQuery("#ballon_amounts").val(addCommas(parseInt(ballon_amounts)));
		} else {
		  jQuery("#ballon_amounts").val(
			addCommas(parseFloat(ballon_amounts).toFixed(2))
		  );
		}
  
		if (parseFloat(ballon_amounts) > parseFloat(loan_amount)) {
		  if (setting_data.remove_decimal_point == 1) {
			var new_ballon_amt =
			  parseInt(
				(parseInt(loan_amount) + parseInt(loan_advance_interest)) *
				  parseInt(ballon_amounts_per)
			  ) / 100;
			jQuery("#ballon_amounts").val(addCommas(parseInt(new_ballon_amt)));
			jQuery("#bill_ballon_amt").html(addCommas(parseInt(ballon_amounts)));
		  } else {
			var new_ballon_amt =
			  parseFloat(
				(parseFloat(loan_amount) + parseFloat(loan_advance_interest)) *
				  parseFloat(ballon_amounts_per)
			  ) / 100;
			jQuery("#ballon_amounts").val(addCommas(new_ballon_amt.toFixed(2)));
			jQuery("#bill_ballon_amt").html(addCommas(ballon_amounts.toFixed(2)));
		  }
		}
  
		var ballon_amounts = jQuery("#ballon_amounts").val();
		ballon_amounts = ballon_amounts.replaceAll(",", "");
		if (ballon_amounts == "") {
		  ballon_amounts = 0;
		}
		if (ballon_amounts > 0) {
		  jQuery("#ballon_amt_section").show();
		} else {
		  jQuery("#ballon_amt_section").hide();
		}
		if (setting_data.remove_decimal_point == 1) {
		  ballon_amounts_per = parseInt(ballon_amounts_per);
		  jQuery("#interest_rate_range_dis").html(
			jQuery("#interest_rates").val() + "% p.a."
		  );
		  jQuery("#ballon_amounts_per_dis").html(ballon_amounts_per + "%");
		} else {
		  ballon_amounts_per = parseFloat(ballon_amounts_per);
		  jQuery("#interest_rate_range_dis").html(
			jQuery("#interest_rates").val() + "% p.a."
		  );
		  jQuery("#ballon_amounts_per_dis").html(
			ballon_amounts_per.toFixed(2) + "%"
		  );
		}
  
		var loan_amount_range = document.getElementById("loan_amount_range");
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((loan_amount_range.value - loan_amount_range.min) /
			  (loan_amount_range.max - loan_amount_range.min)) *
			  100
		  );
		} else {
		  var value =
			((loan_amount_range.value - loan_amount_range.min) /
			  (loan_amount_range.max - loan_amount_range.min)) *
			100;
		}
		loan_amount_range.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, " +
		  setting_data.back_ground_color +
		  " 100%)";
  
		var interest_rate_range = document.getElementById("interest_rate_range");
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((interest_rate_range.value - interest_rate_range.min) /
			  (interest_rate_range.max - interest_rate_range.min)) *
			  100
		  );
		} else {
		  var value =
			((interest_rate_range.value - interest_rate_range.min) /
			  (interest_rate_range.max - interest_rate_range.min)) *
			100;
		}
		interest_rate_range.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, " +
		  setting_data.back_ground_color +
		  " 100%)";
  
		var loan_terms_range = document.getElementById("loan_terms_range");
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((loan_terms_range.value - loan_terms_range.min) /
			  (loan_terms_range.max - loan_terms_range.min)) *
			  100
		  );
		} else {
		  var value =
			((loan_terms_range.value - loan_terms_range.min) /
			  (loan_terms_range.max - loan_terms_range.min)) *
			100;
		}
		loan_terms_range.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, " +
		  setting_data.back_ground_color +
		  " 100%)";
  
		var ballon_amount_range = document.getElementById("ballon_amount_range");
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((ballon_amount_range.value - ballon_amount_range.min) /
			  (ballon_amount_range.max - ballon_amount_range.min)) *
			  100
		  );
		  ballon_amount_range.style.background =
			"linear-gradient(to right, #555555 0%, #555555 " +
			value +
			"%, #fff " +
			value +
			"%, " +
			setting_data.back_ground_color +
			" 100%)";
		  loan_terms = parseInt(loan_terms / 12);
		  loan_terms = parseInt(loan_terms);
		} else {
		  var value =
			((ballon_amount_range.value - ballon_amount_range.min) /
			  (ballon_amount_range.max - ballon_amount_range.min)) *
			100;
		  ballon_amount_range.style.background =
			"linear-gradient(to right, #555555 0%, #555555 " +
			value +
			"%, #fff " +
			value +
			"%, " +
			setting_data.back_ground_color +
			" 100%)";
		  loan_terms = parseFloat(loan_terms / 12).toFixed(2);
		  loan_terms = parseFloat(loan_terms);
		}
  
		if (setting_data.remove_decimal_point == 1) {
		  var emi_cal = cal_emi_amount_frequency_payment_options(
			repayment_frequency_val,
			loan_amount,
			interest_rates,
			loan_terms_month,
			ballon_amounts
		  );
  
		  monthly_payment = emi_cal.emi_amount;
  
		  var total_interests = monthly_payment * loan_terms_month - loan_amount;
  
		  var per_month_ballon_amt = 0;
		  var ballon_amt_interest = 0;
		  if (ballon_amounts > 0) {
			
				ballon_amt_interest = (ballon_amounts * interest_rates) / 100;

				if(repayment_frequency_val=='Fortnight'){				

				var total_months_terms_fortnight = 26;
				per_month_ballon_amt = ballon_amt_interest / total_months_terms_fortnight;				

				}
				else if(repayment_frequency_val=='Weekly'){

				var total_months_terms_weekly = 52;
				per_month_ballon_amt = ballon_amt_interest / total_months_terms_weekly;

				}
				else{

				per_month_ballon_amt = ballon_amt_interest / total_months_terms;

				}

			
		  }
		} else {
		  var emi_cal = cal_emi_amount_frequency_payment_options(
			repayment_frequency_val,
			loan_amount,
			interest_rates,
			loan_terms_month,
			ballon_amounts
		  );
		  monthly_payment = emi_cal.emi_amount;
  
		  var total_interests = monthly_payment * loan_terms_month - loan_amount;
  
		  var per_month_ballon_amt = 0;
		  var ballon_amt_interest = 0;
		  if (ballon_amounts > 0) {
			
			ballon_amt_interest = (ballon_amounts * interest_rates) / 100;			


			if(repayment_frequency_val=='Fortnight'){				

				var total_months_terms_fortnight = 26;
				per_month_ballon_amt = ballon_amt_interest / total_months_terms_fortnight;				

			}
			else if(repayment_frequency_val=='Weekly'){

				var total_months_terms_weekly = 52;
				per_month_ballon_amt = ballon_amt_interest / total_months_terms_weekly;

			}
			else{

				per_month_ballon_amt = ballon_amt_interest / total_months_terms;

			}

		  }
		}
  
		var loan_terms = jQuery("#loan_terms").val();
  
		if (setting_data.remove_decimal_point == 1) {  

			  if(repayment_frequency_val=='Fortnight'){

				  	loan_terms = parseInt(loan_terms / 26);

			  }
			  else if(repayment_frequency_val=='Weekly'){


			  	loan_terms = parseInt(loan_terms / 52);

			  }
			  else{

			  	 loan_terms = parseInt(loan_terms / 12);

			  }




			  total_interests =
				parseInt(total_interests) +
				parseInt(ballon_amounts) +
				parseInt(ballon_amt_interest) * loan_terms;
			  monthly_payment =
				parseInt(monthly_payment) + parseInt(per_month_ballon_amt);
		

		} else {

			  	if(repayment_frequency_val=='Fortnight'){
				  	

				  	loan_terms = parseFloat(loan_terms / 26).toFixed(2);

				}
				else if(repayment_frequency_val=='Weekly'){


				  	loan_terms = parseFloat(loan_terms / 52).toFixed(2);			  	

				}
				else{

				  	loan_terms = parseFloat(loan_terms / 12).toFixed(2);				  	 

				}

				  
			  loan_terms = parseFloat(loan_terms);
			  total_interests =
				parseFloat(total_interests) +
				parseFloat(ballon_amounts) +
				parseFloat(ballon_amt_interest) * loan_terms;
			  monthly_payment =
				parseFloat(monthly_payment) + parseFloat(per_month_ballon_amt);
		}
  
		/* START: Total Fee Calculation */
		jQuery("#loan_terms_range").val();
		var monthly_fee = setting_data.monthly_rate;
		var application_fee = setting_data.application_fee;
		if (setting_data.calculation_fee_setting_enable == 1) {
		  
		  if (setting_data.remove_decimal_point == 1) {

			var loan_terms_for_fee = 0 ;


		  	  if(repayment_frequency_val=='Fortnight'){


				  	loan_terms_for_fee = parseInt(loan_terms * 26 / 12);

			  }
			  else if(repayment_frequency_val=='Weekly'){


			  	     loan_terms_for_fee = parseInt(loan_terms * 52 / 26);

			  }
			  else{


			  		loan_terms_for_fee = parseInt(loan_terms)

			  }
				

				var total_regular_fee_amt = parseInt(loan_terms_for_fee) * 120;
				total_regular_fee_amt = parseInt(total_regular_fee_amt).toFixed(2);
				jQuery("#total_regular_fee_amt").html(total_regular_fee_amt);
	  
				var total_fee =
				  parseInt(application_fee) + parseInt(total_regular_fee_amt);
				jQuery("#total_fee_amt").html(total_fee);


		  } else {


		  	var loan_terms_for_fee = 0 ;


	  		if(repayment_frequency_val=='Fortnight'){
			  	

			  	loan_terms_for_fee = parseFloat(loan_terms * 26 / 12).toFixed(2);

			}
			else if(repayment_frequency_val=='Weekly'){


			  	loan_terms_for_fee = parseFloat(loan_terms * 52 / 12).toFixed(2);			  	

			}
			else{

				loan_terms_for_fee = parseFloat(loan_terms).toFixed(2);;


			}

			var total_regular_fee_amt = parseFloat(loan_terms_for_fee) * 120;
			total_regular_fee_amt = parseFloat(total_regular_fee_amt).toFixed(2);
			jQuery("#total_regular_fee_amt").html(total_regular_fee_amt);
  
			var total_fee =
			  parseFloat(application_fee) + parseFloat(total_regular_fee_amt);
			jQuery("#total_fee_amt").html(total_fee);
		  }
		}
		/* END : Total Fee Calculation*/

		/* check for the inifinity and NAN value */

		if(monthly_payment==Infinity || monthly_payment == 'NaN' || Number.isNaN(monthly_payment) == Number.isNaN(NaN)){

			monthly_payment = 0;
		}

  
		if (setting_data.remove_decimal_point == 1) {

		  if (setting_data.calculation_fee_setting_enable == 1) {			

			jQuery("#per_month_amount").html(
			  addCommas(
				Math.round(parseInt(monthly_payment))
			  )
			);


		  } else {
			jQuery("#per_month_amount").html(
			  addCommas(Math.round(parseInt(monthly_payment)))
			);
		  }
		} else {

		  if (setting_data.calculation_fee_setting_enable == 1) {

			jQuery("#per_month_amount").html(
			  addCommas(
				parseFloat(monthly_payment).toFixed(2)
			  )
			);


		  } else {
			jQuery("#per_month_amount").html(
			  addCommas(parseFloat(monthly_payment).toFixed(2))
			);
		  }
		}
  
		/* STRAT : Interests Field Fill*/
  	  		

		convert_total_terms_to_year_month(loan_terms_month,repayment_frequency_val);

  
		//var loan_amount_term_label = 'per ' + repayment_frequency_val.slice(0, -2) + ' for ';
		var loan_amount_term_label = "";
		if (repayment_frequency_val == "Yearly") {
		  loan_amount_term_label = setting_data.repay_freq_per_year_label;
		} else if (repayment_frequency_val == "Quarterly") {
		  loan_amount_term_label = setting_data.repay_freq_per_quarter_label;
		} else if (repayment_frequency_val == "Weekly") {
		  loan_amount_term_label = setting_data.repay_freq_per_week_label;
		} else if (repayment_frequency_val == "Fortnight") {
		  loan_amount_term_label = setting_data.repay_freq_per_fortnight_label;
		} else {
		  loan_amount_term_label = setting_data.repay_freq_per_month_label;
		}
  
		jQuery("#loan_amount_term_label").html(loan_amount_term_label);
  
		if (setting_data.remove_decimal_point == 1) {
		  jQuery("#loan_amount_rate").html(interest_rates);

		  	var total_int_amt = addCommas(
			  Math.round(
				parseInt(total_interests) - parseInt(loan_advance_interest)
			  )
			)

		  	/* check for NAN value */

			 if(total_int_amt=='NaN'){
			 	total_int_amt = 0;
			 }


		  jQuery("#total_interests_amt").html(total_int_amt);


		} else {
		  jQuery("#loan_amount_rate").html(interest_rates.toFixed(2));
		  if (interest_rates === 0) {
			jQuery("#total_interests_amt").html(
			  addCommas(Math.round(parseFloat(0) - parseFloat(0)))
			);
		  } else {

			var total_sum_interests =
			  total_interests < loan_advance_interest
				? addCommas(
					  parseFloat(total_interests).toFixed(2)
					)
				: addCommas(
					(
					  parseFloat(total_interests) -
					  parseFloat(loan_advance_interest)
					).toFixed(2)
				  );


			 /* check for NAN value */	
			 if(total_sum_interests=='NaN'){
			 	total_sum_interests = '0.00';
			 }

			jQuery("#total_interests_amt").html(total_sum_interests);
		  }
		}
  
		//jQuery("#total_interests_years").html(display_year_str);
  
		var currency_symbols = setting_data.currency_symbols;
  
		var balance = loan_amount;
		var table_data = "";
		var rmv_decimal = 0;
		var is_advanced = "";
		var count = loan_terms_month;
  
		for (var i = 1; i <= loan_terms_month; i++) {
		  if (setting_data.remove_decimal_point == 1) {
			rmv_decimal = 1;
		  } else {
			rmv_decimal = 0;
		  }
  
		  if (payment_type == "In Advance" && i == 1) {
			is_advanced = ' <span style="font-weight: bold;">(Advanced)</span>';
		  } else {
			is_advanced = "";
		  }
  
		  count = loan_terms_month - i;
  
		  var interest = cal_interest_amount_by_fre_payment_option(
			repayment_frequency_val,
			count,
			balance,
			interest_rates,
			rmv_decimal
		  );
  
		  if (setting_data.remove_decimal_point == 1) {
			var principal = parseInt(monthly_payment) - parseInt(interest);
		  } else {
			var principal =
			  parseFloat(monthly_payment) - parseFloat(interest).toFixed(2);
		  }
  
		  balance = balance - principal;
  
		  table_data += "<tr>";
		  table_data += "<td>" + i + "</td>";
		  if (setting_data.remove_decimal_point == 1) {
			var display_monthly_payment = Math.ceil(monthly_payment);
		  } else {
			var display_monthly_payment = monthly_payment;
		  }
		  if (i == loan_terms_month) {
			if (setting_data.remove_decimal_point == 1) {
			  display_monthly_payment =
				parseInt(display_monthly_payment) + parseInt(ballon_amounts);
			} else {
			  display_monthly_payment =
				parseFloat(display_monthly_payment) + parseFloat(ballon_amounts);
			}
		  }
  
		  if (interest < 0) {
			interest = 0;
		  }
  
		  if (setting_data.remove_decimal_point == 1) {
			table_data +=
			  "<td>-" +
			  currency_symbols +
			  parseInt(display_monthly_payment) +
			  "</td>";
		  } else {
			table_data +=
			  "<td>-" +
			  currency_symbols +
			  parseFloat(display_monthly_payment).toFixed(2) +
			  "</td>";
		  }
  
		  if (setting_data.remove_decimal_point == 1) {
			table_data +=
			  "<td>" +
			  currency_symbols +
			  parseInt(interest) +
			  is_advanced +
			  "</td>";
		  } else {
			table_data +=
			  "<td>" +
			  currency_symbols +
			  interest.toFixed(2) +
			  is_advanced +
			  "</td>";
		  }
  
		  if (i == loan_terms_month) {
			balance = 0;
		  }
		  var display_balance = balance;
		  if (
			display_balance < 0 ||
			(display_balance > 0 && display_balance < 1)
		  ) {
			display_balance = 0.0;
		  }
		  if (setting_data.remove_decimal_point == 1) {
			display_balance = parseInt(display_balance);
		  } else {
			display_balance = parseFloat(display_balance).toFixed(2);
		  }
  
		  if (parseInt(balance) < 0) {
			table_data += "<td>0.00</td>";
		  } else {
			table_data += "<td>" + currency_symbols + display_balance + "</td>";
		  }
  
		  table_data += "</tr>";
		}
  
		jQuery("#loan_table_data").html(table_data);
  
		/* END : Loan Table Section */
  
		/* START : Loan Chart Section */
		var balance_arr = [];
		var remainig_interests = [];
		var balance = loan_amount;
  
		var graph_type = "Years";
		if (loan_terms_month <= 12) {
		  graph_type = "Months";
		}
		graph_type = "Months";
  
		for (var p = 1; p <= loan_terms_month; p++) {
		  if (p == 1) {
			if (setting_data.remove_decimal_point == 1) {
			  remainig_interests.push(parseInt(total_interests));
			  balance_arr.push(parseInt(balance));
			} else {
			  remainig_interests.push(parseFloat(total_interests.toFixed(2)));
			  balance_arr.push(parseFloat(balance.toFixed(2)));
			}
		  }
  
		  if (setting_data.remove_decimal_point == 1) {
			rmv_decimal = 1;
		  } else {
			rmv_decimal = 0;
		  }
		  count = loan_terms_month - p;
		  var interest = cal_interest_amount_by_fre_payment_option(
			repayment_frequency_val,
			count,
			balance,
			interest_rates,
			rmv_decimal
		  );
  
		  var principal = monthly_payment - parseFloat(interest.toFixed(2));
  
		  if (p == loan_terms_month) {
			balance = balance - principal - ballon_amounts;
		  } else {
			balance = balance - principal;
		  }
  
		  var total_interests = total_interests - interest;
		  if (balance < 0 || (balance > 0 && balance < 1)) {
			balance = 0;
		  }
		  if (
			total_interests < 0 ||
			(total_interests > 0 && total_interests < 1)
		  ) {
			total_interests = 0;
		  }
  
		  if (loan_terms_month > 120) {
			if (p % 12 == 0) {
			  if (setting_data.remove_decimal_point == 1) {
				remainig_interests.push(parseInt(total_interests));
				balance_arr.push(parseInt(balance));
			  } else {
				remainig_interests.push(parseFloat(total_interests.toFixed(2)));
				balance_arr.push(parseFloat(balance.toFixed(2)));
			  }
			}
		  } else {
			if (setting_data.remove_decimal_point == 1) {
			  remainig_interests.push(parseInt(total_interests));
			  balance_arr.push(parseInt(balance));
			} else {
			  remainig_interests.push(parseFloat(total_interests.toFixed(2)));
			  balance_arr.push(parseFloat(balance.toFixed(2)));
			}
		  }
		  // total_interests
		}
  
		/* START : PREPARE CHART JS DATA */
		var loan_data = [];
		const interests = [];
		const principal_arr = [];
		const xData = [];
  
		for (var p = 0; p < remainig_interests.length; p++) {
		  principal_arr.push(balance_arr[p]);
		  if (setting_data.remove_decimal_point == 1) {
			interests.push(parseInt(remainig_interests[p]));
		  } else {
			interests.push(parseFloat(remainig_interests[p]));
		  }
		  xData.push(p);
		}
  
		var graphColor = $("#loan-process-graph").css("--calc-graph-color");
		var graph_color_sub = $("#loan-process-graph").css(
		  "--calc-graph-color-sub"
		);
		var graph_border_color = $("#loan-process-graph").css(
		  "--calc-graph-border-color"
		);
		var graph_border_color_sub = $("#loan-process-graph").css(
		  "--calc-graph-border-color-sub"
		);
  
		const colors = {
		  green: {
			fill: "#e0eadf",
			stroke: "#5eb84d",
		  },
  
		  lightBlue: {
			stroke: "#6fccdd",
		  },
  
		  darkBlue: {
			fill: graphColor,
			stroke: graph_border_color,
		  },
  
		  purple: {
			fill: graph_color_sub,
			stroke: graph_border_color_sub,
		  },
		};
  
		const data = {
		  labels: xData,
		  datasets: [
			{
			  //  label: "Interest",
			  label: setting_data.interest_label,
			  fill: true,
			  backgroundColor: colors.purple.fill,
			  pointBackgroundColor: colors.purple.stroke,
			  borderColor: colors.purple.stroke,
			  pointHighlightStroke: colors.purple.stroke,
			  borderCapStyle: "butt",
			  data: interests,
			},
  
			{
			  // label: "Principal",
			  label: setting_data.principal_label,
			  fill: true,
			  backgroundColor: colors.darkBlue.fill,
			  pointBackgroundColor: colors.darkBlue.stroke,
			  borderColor: colors.darkBlue.stroke,
			  pointHighlightStroke: colors.darkBlue.stroke,
			  borderCapStyle: "butt",
			  data: principal_arr,
			},
		  ],
		};
  
		Chart.Tooltip.positioners.custom = function (elements, position) {
		  //debugger;
		  return {
			x: position.x,
			y: position.y,
		  };
		};
  
		var ctx = document.getElementById("loan-process-graph").getContext("2d");
	  
		var graph_new_theme = Chart.getChart("loan-process-graph");
  
		if (graph_new_theme) {
		  graph_new_theme.destroy();
		}
  
		graph_new_theme = new Chart(ctx, {
		  type: setting_data.chart_types,
		  data: data,
		  responsive: true,
		  options: {
			title: {
			  display: true,
			  text: "Loan Calculator",
			},
			layout: {
			  padding: 32,
			},
			tooltips: {
			  mode: "index",
			  intersect: true,
			  position: "custom",
			  yAlign: "bottom",
			},
			scales: {
			  xAxes: [
				{
				  stacked: true,
				  gridLines: {
					display: false,
				  },
				  // display:false,
				  scaleLabel: {
					display: true,
					labelString: "Term (Months)",
				  },
				},
			  ],
			  yAxes: [
				{
				  stacked: true,
				  gridLines: {
					display: false,
				  },
				  // display:false,
  
				  scaleLabel: {
					display: true,
					labelString: "Amount Owing ($)",
				  },
				},
			  ],
			},
		  },
		});
  
		/* END : PREPARE CHART JS DATA */
	  } /* END : Loan Calculation Process */
  
	  /* START : Textbox Blur Event*/
	  jQuery("#loan_amount").blur(function () {
		var currency_symbol = setting_data.currency_symbols;
		var loan_amount = jQuery("#loan_amount")
		  .val()
		  .replaceAll(currency_symbol, "");
		jQuery("#loan_amount").val(
		  addCommas(jQuery("#loan_amount").val().replaceAll(currency_symbol, ""))
		);
		loan_amount = loan_amount.replaceAll(",", "");
		if (loan_amount == "" || loan_amount == ".") {
		  jQuery("#loan_amount").val(
			addCommas(setting_data.loan_amount_min_value)
		  );
		}
		if (parseFloat(loan_amount) < setting_data.loan_amount_min_value) {
		  jQuery("#loan_amount").val(
			addCommas(setting_data.loan_amount_min_value)
		  );
		}
		if (parseFloat(loan_amount) >= setting_data.loan_amount_max_value) {
		  jQuery("#loan_amount").val(
			addCommas(setting_data.loan_amount_max_value)
		  );
		}
		var loan_amount = jQuery("#loan_amount")
		  .val()
		  .replaceAll(currency_symbol, "");
  
		loan_amount = loan_amount
		  .replaceAll(",", "")
		  .replaceAll(currency_symbol, "");
  
		jQuery("#loan_amount_range").val(parseFloat(loan_amount));
		loan_calculation_process();
	  });
  
	  jQuery("#loan_terms").on("blur", function () {
		/*on filled input check min max values 6-7-2023*/
		var repayment_freq = jQuery("#repayment_freq option:selected").val();
		var old_repayment_freq = jQuery(
		  "input[name='current_repayment_freq']"
		).val();
		var default_nop_value = jQuery("input[name='loan_terms']").val();
  
		/* nop = number of payments */
		var min_nop_value = jQuery("input[name='min_value']").val();
		var max_nop_value = jQuery("input[name='max_value']").val();
  
		var numbers_of_payments = cal_numbers_of_payment_by_frequency_val(
		  repayment_freq,
		  old_repayment_freq,
		  default_nop_value,
		  min_nop_value,
		  max_nop_value
		);
  
		var loan_terms = jQuery("#loan_terms").val();
		jQuery("input[name='current_repayment_freq']").val(repayment_freq);
  
		if (loan_terms == "" || loan_terms == ".") {
		  jQuery("#loan_terms").val(numbers_of_payments.nop_min_value);
		}
  
		if (parseFloat(loan_terms) < numbers_of_payments.nop_min_value) {
		  jQuery("#loan_terms").val(numbers_of_payments.nop_min_value);
		}
		if (parseFloat(loan_terms) > numbers_of_payments.nop_max_value) {
		  jQuery("#loan_terms").val(numbers_of_payments.nop_max_value);
		}
		if (setting_data.disable_ballon_amt !== "1") {
		  var ballon_amount_range = document.getElementById(
			"ballon_amount_range"
		  );
		  if (
			parseFloat(ballon_amount_range.value) == 0 ||
			parseInt(ballon_amount_range.value) == 0
		  ) {
			document.getElementById("ballon_amounts").value = 0 + "%";
			document.getElementById("ballon_amounts_per").value = 0 + "%";
			document.getElementById("ballon_amounts_per_dis").text = 0 + "%";
		  }
		}
  
		jQuery("#loan_terms_range").val(jQuery("#loan_terms").val());
		var monthly_fee = jQuery("#monthly_fee").val();
		var application_fee = jQuery("#application_fee").val();
		var loan_terms = jQuery("#loan_terms").val();
		var total_regular_fee_amt = parseFloat(loan_terms) * 120;
		jQuery("#total_regular_fee_amt").html(total_regular_fee_amt);
		if (setting_data.remove_decimal_point == 1) {
		  var total_fee =
			parseInt(application_fee) + parseInt(total_regular_fee_amt);
		} else {
		  var total_fee =
			parseFloat(application_fee) + parseFloat(total_regular_fee_amt);
		}
  
		jQuery("#total_fee_amt").html(total_fee);
		loan_calculation_process();
	  });
  
	  jQuery("#interest_rates").blur(function () {
		var interest_rates = jQuery("#interest_rates")
		  .val()
		  .replaceAll("% p.a.", "");
		if (setting_data.remove_decimal_point == 1) {
		  if (interest_rates == "" || interest_rates == ".") {
			jQuery("#interest_rates").val(parseInt(setting_data.interested_rate));
		  }
		  if (parseFloat(interest_rates) < setting_data.interest_rate_min_value) {
			jQuery("#interest_rates").val(
			  parseInt(setting_data.interest_rate_min_value)
			);
		  }
		  if (parseFloat(interest_rates) > setting_data.interest_rate_max_value) {
			jQuery("#interest_rates").val(
			  parseInt(setting_data.interest_rate_max_value)
			);
		  }
		} else {
		  if (
			interest_rates == "" ||
			interest_rates == "." ||
			isNaN(interest_rates)
		  ) {
			jQuery("#interest_rates").val(
			  parseFloat(setting_data.interested_rate).toFixed(2)
			);
		  }
		  if (parseFloat(interest_rates) < setting_data.interest_rate_min_value) {
			jQuery("#interest_rates").val(
			  parseFloat(setting_data.interest_rate_min_value).toFixed(2)
			);
		  }
		  if (parseFloat(interest_rates) > setting_data.interest_rate_max_value) {
			jQuery("#interest_rates").val(
			  parseFloat(setting_data.interest_rate_max_value).toFixed(2)
			);
		  }
		}
  
		var interest_rates = jQuery("#interest_rates").val();
  
		if (setting_data.remove_decimal_point == 1) {
		  jQuery("#interest_rates").val(parseInt(interest_rates));
		} else {
		  jQuery("#interest_rates").val(parseFloat(interest_rates).toFixed(2));
		}
  
		jQuery("#interest_rate_range").val(jQuery("#interest_rates").val());
		jQuery("#interest_rate_range_dis").html(
		  jQuery("#interest_rates").val() + "% p.a."
		);
		loan_calculation_process();
	  });
	  jQuery("#ballon_amounts_per").blur(function () {
		var currency_symbol = setting_data.currency_symbols;
		jQuery("#ballon_amount_range").val(
		  jQuery("#ballon_amounts_per").val().replaceAll("%", "")
		);
		var loan_amount = jQuery("#loan_amount")
		  .val()
		  .replaceAll(currency_symbol, "");
		loan_amount = loan_amount.replaceAll(",", "");
		var ballon_amounts_per = jQuery("#ballon_amounts_per")
		  .val()
		  .replaceAll("%", "");
  
		if (setting_data.remove_decimal_point == 1) {
		  var ballon_amounts =
			parseInt(parseInt(loan_amount) * parseInt(ballon_amounts_per)) / 100;
		} else {
		  var ballon_amounts =
			parseFloat(parseFloat(loan_amount) * parseFloat(ballon_amounts_per)) /
			100;
		}
  
		if (ballon_amounts_per == "" || ballon_amounts_per == ".") {
		  jQuery("#ballon_amounts_per").val(
			setting_data.default_balloon_amount + "%"
		  );
		  jQuery("#ballon_amount_range").val(setting_data.default_balloon_amount);
		  ballon_amounts_per = setting_data.default_balloon_amount;
		}
  
		jQuery("#ballon_amounts").val(ballon_amounts);
		jQuery("#bill_ballon_amt").html(ballon_amounts);
		jQuery("#interest_rate_range_dis").html(
		  jQuery("#interest_rates").val() + "% p.a."
		);
		jQuery("#ballon_amounts_per_dis").html(ballon_amounts_per + "%");
		loan_calculation_process();
	  });
  
	  jQuery("#ballon_amounts").blur(function () {
		var currency_symbol = setting_data.currency_symbols;
		jQuery("#ballon_amount_range").val(
		  jQuery("#ballon_amounts_per").val().replaceAll("%", "")
		);
		var loan_amount = jQuery("#loan_amount")
		  .val()
		  .replaceAll(currency_symbol, "");
		loan_amount = loan_amount.replaceAll(",", "");
		var ballon_amounts = jQuery("#ballon_amounts").val();
		if (ballon_amounts == "" || ballon_amounts == ".") {
		  jQuery("#ballon_amounts").val(0);
		}
  
		ballon_amounts = ballon_amounts.replaceAll(",", "");
  
		if (ballon_amounts == "" || ballon_amounts == ".") {
		  ballon_amounts = 0;
		  ballon_amounts_per = 0;
		} else {
		  if (setting_data.remove_decimal_point == 1) {
			var ballon_amounts_per = parseInt(
			  (parseInt(ballon_amounts) * 100) / parseInt(loan_amount)
			);
		  } else {
			var ballon_amounts_per = parseFloat(
			  (parseFloat(ballon_amounts) * 100) / parseFloat(loan_amount)
			);
		  }
		}
  
		jQuery("#ballon_amounts_per").val(ballon_amounts_per);
		jQuery("#ballon_amount_range").val(ballon_amounts_per);
		jQuery("#bill_ballon_per").val(ballon_amounts_per);
		jQuery("#bill_ballon_amt").html(ballon_amounts);
		jQuery("#bill_ballon_per").html(ballon_amounts_per);
		jQuery("#ballon_amounts_per_dis").html(ballon_amounts_per + "%");
		loan_calculation_process();
	  });
	  /* END : Textbox Blur Event*/
  
	  var loan_amount_range = document.getElementById("loan_amount_range");
	  jQuery("#loan_amount").val(addCommas(loan_amount_range.value)); // Display the default slider value
	  if (setting_data.remove_decimal_point == 1) {
		var value = parseInt(
		  ((loan_amount_range.value - loan_amount_range.min) /
			(loan_amount_range.max - loan_amount_range.min)) *
			100
		);
	  } else {
		var value = parseFloat(
		  ((loan_amount_range.value - loan_amount_range.min) /
			(loan_amount_range.max - loan_amount_range.min)) *
			100
		);
	  }
	  loan_amount_range.style.background =
		"linear-gradient(to right, #555555 0%, #555555 " +
		value +
		"%, #fff " +
		value +
		"%, " +
		setting_data.back_ground_color +
		" 100%)";
  
	  // Update the current slider value (each time you drag the slider handle)
	  loan_amount_range.oninput = function () {
		jQuery("#loan_amount").val(addCommas(this.value));
		loan_calculation_process();
	  };
  
	  var loan_terms_range = document.getElementById("loan_terms_range");
	  jQuery("#loan_terms").val(loan_terms_range.value); // Display the default slider value
	  if (setting_data.remove_decimal_point == 1) {
		var value = parseInt(
		  ((loan_terms_range.value - loan_terms_range.min) /
			(loan_terms_range.max - loan_terms_range.min)) *
			100
		);
	  } else {
		var value = parseFloat(
		  ((loan_terms_range.value - loan_terms_range.min) /
			(loan_terms_range.max - loan_terms_range.min)) *
			100
		);
	  }
	  loan_terms_range.style.background =
		"linear-gradient(to right, #555555 0%, #555555 " +
		value +
		"%, #fff " +
		value +
		"%, " +
		setting_data.back_ground_color +
		" 100%)";
  
	  // Update the current slider value (each time you drag the slider handle)
	  loan_terms_range.oninput = function () {
		jQuery("#loan_terms").val(this.value);
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		} else {
		  var value = parseFloat(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		}
		this.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, " +
		  setting_data.back_ground_color +
		  " 100%)";
		loan_calculation_process();
	  };
  
	  var interest_rate_range = document.getElementById("interest_rate_range");
	  if (setting_data.remove_decimal_point == 1) {
		var interest_rate_range_val = parseInt(interest_rate_range.value);
		jQuery("#interest_rates").val(interest_rate_range_val);
	  } else {
		var interest_rate_range_val = parseFloat(interest_rate_range.value);
		jQuery("#interest_rates").val(interest_rate_range_val.toFixed(2));
	  }
	  jQuery("#interest_rate_range_dis").html(
		interest_rate_range.value + "% p.a."
	  );
	  if (setting_data.remove_decimal_point == 1) {
		var value = parseInt(
		  ((interest_rate_range.value - interest_rate_range.min) /
			(interest_rate_range.max - interest_rate_range.min)) *
			100
		);
	  } else {
		var value = parseFloat(
		  ((interest_rate_range.value - interest_rate_range.min) /
			(interest_rate_range.max - interest_rate_range.min)) *
			100
		);
	  }
	  interest_rate_range.style.background =
		"linear-gradient(to right, #555555 0%, #555555 " +
		value +
		"%, #fff " +
		value +
		"%, " +
		setting_data.back_ground_color +
		" 100%)";
	  // Update the current slider value (each time you drag the slider handle)
	  interest_rate_range.oninput = function () {
		var interest_rate_range_val = this.value;
		jQuery("#interest_rates").val(interest_rate_range_val);
		jQuery("#interest_rate_range_dis").html(this.value + "% p.a.");
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		} else {
		  var value = parseFloat(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		}
		this.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, " +
		  setting_data.back_ground_color +
		  " 100%)";
		loan_calculation_process();
	  };
  
	  var ballon_amount_range = document.getElementById("ballon_amount_range");
	  jQuery("#ballon_amounts_per").val(ballon_amount_range.value);
	  jQuery("#ballon_amounts_per_dis").html(ballon_amount_range.value + "%");
	  if (setting_data.remove_decimal_point == 1) {
		var value = parseInt(
		  ((ballon_amount_range.value - ballon_amount_range.min) /
			(ballon_amount_range.max - ballon_amount_range.min)) *
			100
		);
	  } else {
		var value = parseFloat(
		  ((ballon_amount_range.value - ballon_amount_range.min) /
			(ballon_amount_range.max - ballon_amount_range.min)) *
			100
		);
	  }
	  ballon_amount_range.style.background =
		"linear-gradient(to right, #555555 0%, #555555 " +
		value +
		"%, #fff " +
		value +
		"%, " +
		setting_data.back_ground_color +
		" 100%)";
  
	  // Update the current slider value (each time you drag the slider handle)
	  ballon_amount_range.oninput = function () {
		jQuery("#ballon_amounts_per").val(this.value);
		jQuery("#ballon_amounts_per_dis").html(this.value + "%");
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		} else {
		  var value = parseFloat(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		}
		this.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, " +
		  setting_data.back_ground_color +
		  " 100%)";
		loan_calculation_process();
	  };
  
	  /*************** || Print Code [PDF] || *****************/
  
	  
	  jQuery(".print-table").click(function () {
		// Set the paper size to A3 using jQuery
		jQuery("#main-sec").css({
		  "@media print": {
			"@page": {size: "297mm 420mm"},
			"-webkit-print-color-adjust": "exact !important",
			"-moz-print-color-adjust": "exact !important",
			"-ms-print-color-adjust": "exact !important",
			"print-color-adjust": "exact !important",
			"color-adjust": "exact !important"
		  }
		});
		jQuery("#main-sec").print(/*options*/);
	  });
	  
	
   
	  // Attach change event handler to the payment_type dropdown
	  $("#payment_type").change(function () {
		// Call loan_calculation_process when the dropdown changes
		loan_calculation_process();
	  });
	  $(document).on("input", "#repayment_freq", function () {
		/*========start 6-7-2023=========*/
		var repayment_freq = jQuery("#repayment_freq option:selected").val();
		var old_repayment_freq = jQuery(
		  "input[name='current_repayment_freq']"
		).val();
  
		var default_nop_value = jQuery("input[name='loan_terms']").val();
		/* nop = number of payments */
		var min_nop_value = jQuery("input[name='min_value']").val();
		var max_nop_value = jQuery("input[name='max_value']").val();
		var numbers_of_payments = cal_numbers_of_payment_by_frequency_val(
		  repayment_freq,
		  old_repayment_freq,
		  default_nop_value,
		  min_nop_value,
		  max_nop_value
		);
  
		/*set payments range and min / max values in input range*/
		jQuery("#loan_terms_range").attr(
		  "value",
		  numbers_of_payments.nop_default_value
		);
		jQuery("#loan_terms_range").attr(
		  "min",
		  numbers_of_payments.nop_min_value
		);
		jQuery("#loan_terms_range").attr(
		  "max",
		  numbers_of_payments.nop_max_value
		);
		jQuery("#loan_terms").val(numbers_of_payments.nop_default_value);
  
		jQuery("input[name='min_value']").val(numbers_of_payments.nop_min_value);
		jQuery("input[name='max_value']").val(numbers_of_payments.nop_max_value);
		jQuery("input[name='default_value']").val(
		  numbers_of_payments.nop_default_value
		);
  
		/*reset range slider after select payment frequency option last changes*/
		document.getElementById("loan_terms_range").value =
		  numbers_of_payments.nop_default_value;
  
		var loan_terms_range = document.getElementById("loan_terms_range");
		var value1 =
		  ((numbers_of_payments.nop_default_value -
			numbers_of_payments.nop_min_value) /
			(numbers_of_payments.nop_max_value -
			  numbers_of_payments.nop_min_value)) *
		  100;
  
		loan_terms_range.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value1 +
		  "%, #fff " +
		  value1 +
		  "%, " +
		  setting_data.back_ground_color +
		  " 100%)";
  
		/*========End 6-7-2023=========*/
		loan_calculation_process();
	  });
  
	  loan_calculation_process(); // call function
	} else {
	  /*****************************************************************************************/
	  /******************* START : Condition For Default theme *********************************/
	  /*****************************************************************************************/
  
	  function loan_calculation_process() {	  	

		var monthly_payment = 0;
		var repayment_frequency_val = jQuery("#repayment_freq").val();
  
		jQuery("input[name='current_repayment_freq']").val(
		  repayment_frequency_val
		);



  
		var loan_amount = jQuery("#loan_amount").val();
		if (setting_data.remove_decimal_point == 1) {
		  loan_amount = parseInt(loan_amount.replaceAll(",", ""));
		} else {
		  loan_amount = parseFloat(loan_amount.replaceAll(",", ""));
		}
  
		if (setting_data.remove_decimal_point == 1) {
		  var interest_rates = parseInt(jQuery("#interest_rates").val());
		} else {
		  var interest_rates = parseFloat(jQuery("#interest_rates").val());
		}
  
		var ballon_amounts_per = jQuery("#ballon_amounts_per").val();
		var loan_terms_month = 0;
		var total_months_terms = 0;
		jQuery("#loan_terms").val(Math.round(jQuery("#loan_terms").val()));
  
		var loan_terms = parseFloat(jQuery("#loan_terms").val());	

  
		if (loan_terms > 0) {
		  total_months_terms = cal_loan_terms_by_frequency_payment_option(
			repayment_frequency_val,
			loan_terms
		  );
		  loan_terms_month = loan_terms;
		}


		/* display loan terms as year and months start */

		if (loan_terms > 0) {	

			convert_total_terms_to_year_month(loan_terms,repayment_frequency_val);

		}


		/* display loan terms as year and months end */
		
  
		document.getElementById("ballon_amount_range").max = 80;
  
		var payment_type = jQuery("#payment_type").val();
		var loan_advance_interest = 0;
		var adloan_amount = 0;
		if (payment_type == "In Advance") {
		  if (setting_data.remove_decimal_point == 1) {
			adloan_amount = cal_advance_loan_amount_by_frequency_val(
			  repayment_frequency_val,
			  loan_amount,
			  interest_rates
			);
			var advance_cal = loan_advance_interest_cal(
			  repayment_frequency_val,
			  adloan_amount,
			  interest_rates
			);
			loan_advance_interest = parseInt(advance_cal.loan_advance_interest);
			loan_amount = adloan_amount;
		  } else {
			adloan_amount = cal_advance_loan_amount_by_frequency_val(
			  repayment_frequency_val,
			  loan_amount,
			  interest_rates
			);
			var advance_cal = loan_advance_interest_cal(
			  repayment_frequency_val,
			  adloan_amount,
			  interest_rates
			);
			loan_advance_interest = advance_cal.loan_advance_interest;
			loan_amount = adloan_amount;
		  }
		}
  
		if (setting_data.remove_decimal_point == 1) {
		  var ballon_amounts =
			parseInt(
			  (parseInt(loan_amount) + parseInt(loan_advance_interest)) *
				parseInt(ballon_amounts_per)
			) / 100;
		  jQuery("#bill_ballon_per").html(parseInt(ballon_amounts_per));
		  jQuery("#bill_ballon_amt").html(addCommas(parseInt(ballon_amounts)));
		} else {
		  var ballon_amounts =
			parseFloat(
			  (parseFloat(loan_amount) + parseFloat(loan_advance_interest)) *
				parseFloat(ballon_amounts_per)
			) / 100;
		  jQuery("#bill_ballon_per").html(
			parseFloat(ballon_amounts_per).toFixed(2)
		  );
		  jQuery("#bill_ballon_amt").html(addCommas(ballon_amounts.toFixed()));
		}
		if (setting_data.remove_decimal_point == 1) {
		  jQuery("#ballon_amounts").val(addCommas(parseInt(ballon_amounts)));
		} else {
		  jQuery("#ballon_amounts").val(
			addCommas(parseFloat(ballon_amounts).toFixed())
		  );
		}
  
		if (parseFloat(ballon_amounts) > parseFloat(loan_amount)) {
		  if (setting_data.remove_decimal_point == 1) {
			var new_ballon_amt =
			  parseInt(
				(parseInt(loan_amount) + parseInt(loan_advance_interest)) *
				  parseInt(ballon_amounts_per)
			  ) / 100;
			jQuery("#ballon_amounts").val(addCommas(parseInt(new_ballon_amt)));
			jQuery("#bill_ballon_amt").html(addCommas(parseInt(ballon_amounts)));
		  } else {
			var new_ballon_amt =
			  parseFloat(
				(parseFloat(loan_amount) + parseFloat(loan_advance_interest)) *
				  parseFloat(ballon_amounts_per)
			  ) / 100;
			jQuery("#ballon_amounts").val(addCommas(new_ballon_amt.toFixed(2)));
			jQuery("#bill_ballon_amt").html(addCommas(ballon_amounts.toFixed(2)));
		  }
		}
  
		var ballon_amounts = jQuery("#ballon_amounts").val();
		ballon_amounts = ballon_amounts.replaceAll(",", "");
		if (ballon_amounts == "") {
		  ballon_amounts = 0;
		}
		if (ballon_amounts > 0) {
		  jQuery("#ballon_amt_section").show();
		} else {
		  jQuery("#ballon_amt_section").hide();
		}
		if (setting_data.remove_decimal_point == 1) {
		  ballon_amounts_per = parseInt(ballon_amounts_per);
		  jQuery("#ballon_amounts_per_dis").html(ballon_amounts_per + "%");
		  jQuery("#interest_rate_range_dis").html(
			jQuery("#interest_rates").val() + "% p.a."
		  );
		} else {
		  ballon_amounts_per = parseFloat(ballon_amounts_per);
		  jQuery("#ballon_amounts_per_dis").html(
			ballon_amounts_per.toFixed(2) + "%"
		  );
		  jQuery("#interest_rate_range_dis").html(
			jQuery("#interest_rates").val() + "% p.a."
		  );
		}
  
		var loan_amount_range = document.getElementById("loan_amount_range");
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((loan_amount_range.value - loan_amount_range.min) /
			  (loan_amount_range.max - loan_amount_range.min)) *
			  100
		  );
		} else {
		  var value =
			((loan_amount_range.value - loan_amount_range.min) /
			  (loan_amount_range.max - loan_amount_range.min)) *
			100;
		}
		loan_amount_range.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, " +
		  setting_data.back_ground_color +
		  " 100%)";
  
		var interest_rate_range = document.getElementById("interest_rate_range");
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((interest_rate_range.value - interest_rate_range.min) /
			  (interest_rate_range.max - interest_rate_range.min)) *
			  100
		  );
		} else {
		  var value =
			((interest_rate_range.value - interest_rate_range.min) /
			  (interest_rate_range.max - interest_rate_range.min)) *
			100;
		}
		interest_rate_range.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, " +
		  setting_data.back_ground_color +
		  " 100%)";
  
		var loan_terms_range = document.getElementById("loan_terms_range");
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((loan_terms_range.value - loan_terms_range.min) /
			  (loan_terms_range.max - loan_terms_range.min)) *
			  100
		  );
		} else {
		  var value =
			((loan_terms_range.value - loan_terms_range.min) /
			  (loan_terms_range.max - loan_terms_range.min)) *
			100;
		}
		loan_terms_range.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, " +
		  setting_data.back_ground_color +
		  " 100%)";
  
		var ballon_amount_range = document.getElementById("ballon_amount_range");
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((ballon_amount_range.value - ballon_amount_range.min) /
			  (ballon_amount_range.max - ballon_amount_range.min)) *
			  100
		  );
		  ballon_amount_range.style.background =
			"linear-gradient(to right, #555555 0%, #555555 " +
			value +
			"%, #fff " +
			value +
			"%, " +
			setting_data.back_ground_color +
			" 100%)";
		  loan_terms = parseInt(loan_terms / 12);
		  loan_terms = parseInt(loan_terms);
		} else {
		  var value =
			((ballon_amount_range.value - ballon_amount_range.min) /
			  (ballon_amount_range.max - ballon_amount_range.min)) *
			100;
		  ballon_amount_range.style.background =
			"linear-gradient(to right, #555555 0%, #555555 " +
			value +
			"%, #fff " +
			value +
			"%, " +
			setting_data.back_ground_color +
			" 100%)";
		  loan_terms = parseFloat(loan_terms / 12).toFixed(2);
		  loan_terms = parseFloat(loan_terms);
		}
  
		if (setting_data.remove_decimal_point == 1) {
		  var emi_cal = cal_emi_amount_frequency_payment_options(
			repayment_frequency_val,
			loan_amount,
			interest_rates,
			loan_terms_month,
			ballon_amounts
		  );
  
		  monthly_payment = parseInt(emi_cal.emi_amount);
  
		  var total_interests =
			parseInt(monthly_payment) * loan_terms_month - loan_amount;
		  var per_month_ballon_amt = 0;
		  var ballon_amt_interest = 0;		  

		  if (ballon_amounts > 0) {

		  	//console.log('interest_rates'+interest_rates);
		  	//console.log('total_months_terms'+total_months_terms);


			ballon_amt_interest = (ballon_amounts * interest_rates) / 100;				


			if(repayment_frequency_val=='Fortnight'){				

				var total_months_terms_fortnight = 26;
				per_month_ballon_amt = ballon_amt_interest / total_months_terms_fortnight;				

			}
			else if(repayment_frequency_val=='Weekly'){

				var total_months_terms_weekly = 52;
				per_month_ballon_amt = ballon_amt_interest / total_months_terms_weekly;

			}
			else{

				per_month_ballon_amt = ballon_amt_interest / total_months_terms;

			}

			


		  }
		} else {
		  var emi_cal = cal_emi_amount_frequency_payment_options(
			repayment_frequency_val,
			loan_amount,
			interest_rates,
			loan_terms_month,
			ballon_amounts
		  );
  
		  monthly_payment = emi_cal.emi_amount;
  
		  var total_interests = monthly_payment * loan_terms_month - loan_amount;
  
		  var per_month_ballon_amt = 0;
		  var ballon_amt_interest = 0;

		  if (ballon_amounts > 0) {


			ballon_amt_interest = (ballon_amounts * interest_rates) / 100;


			if(repayment_frequency_val=='Fortnight'){				

				var total_months_terms_fortnight = 26;
				per_month_ballon_amt = ballon_amt_interest / total_months_terms_fortnight;				

			}
			else if(repayment_frequency_val=='Weekly'){

				var total_months_terms_weekly = 52;
				per_month_ballon_amt = ballon_amt_interest / total_months_terms_weekly;

			}
			else{

				per_month_ballon_amt = ballon_amt_interest / total_months_terms;

			}
			
		  }
		}
  
		var loan_terms = jQuery("#loan_terms").val();
  
		if (setting_data.remove_decimal_point == 1) { 


			  
		  
			  if(repayment_frequency_val=='Fortnight'){


			  	loan_terms = parseInt(loan_terms / 26);

			  }
			  else if(repayment_frequency_val=='Weekly'){


			  	loan_terms = parseInt(loan_terms / 52);

			  }
			  else{

			  	 loan_terms = parseInt(loan_terms / 12);

			  }


			  loan_terms = parseInt(loan_terms);
			 

			  total_interests =
				parseInt(total_interests) +
				parseInt(ballon_amounts) +
				parseInt(ballon_amt_interest) * loan_terms;
			  monthly_payment =
				parseInt(monthly_payment) + parseInt(per_month_ballon_amt);		


		} else {		  
			  


			  if(repayment_frequency_val=='Fortnight'){
			  	

			  	loan_terms = parseFloat(loan_terms / 26).toFixed(2);

			  }
			  else if(repayment_frequency_val=='Weekly'){


			  	loan_terms = parseFloat(loan_terms / 52).toFixed(2);			  	

			  }
			  else{

			  	loan_terms = parseFloat(loan_terms / 12).toFixed(2);				  	 

			  }

			  loan_terms = parseFloat(loan_terms);
			  total_interests =
				parseFloat(total_interests) +
				parseFloat(ballon_amounts) +
				parseFloat(ballon_amt_interest) * loan_terms;
			  monthly_payment =
				parseFloat(monthly_payment) + parseFloat(per_month_ballon_amt);
				

		}
  
		/* START: Total Fee Calculation */	

		/* check for the inifinity and NAN value */

		if(monthly_payment==Infinity || monthly_payment =='NaN' || Number.isNaN(monthly_payment) == Number.isNaN(NaN)){
			monthly_payment = 0;
		}


		
		jQuery("#loan_terms_range").val(jQuery("#loan_terms").val());
		var monthly_fee = setting_data.monthly_rate;
		var application_fee = setting_data.application_fee;
		if (setting_data.calculation_fee_setting_enable == 1) {
		  if (setting_data.remove_decimal_point == 1) {

		  	  
		  	  var loan_terms_for_fee = 0 ;


		  	  if(repayment_frequency_val=='Fortnight'){


				  	loan_terms_for_fee = parseInt(loan_terms * 26 / 12);

			  }
			  else if(repayment_frequency_val=='Weekly'){


			  	     loan_terms_for_fee = parseInt(loan_terms * 52 / 26);

			  }
			  else{


			  		loan_terms_for_fee = parseInt(loan_terms)

			  }


			var total_regular_fee_amt = parseInt(loan_terms_for_fee) * 120;
			total_regular_fee_amt = parseInt(total_regular_fee_amt).toFixed(2);
			jQuery("#total_regular_fee_amt").html(total_regular_fee_amt);
  
			var total_fee =
			  parseInt(application_fee) + parseInt(total_regular_fee_amt);
			jQuery("#total_fee_amt").html(total_fee);
		  


		  } else {
		  	

		  	var loan_terms_for_fee = 0 ;


	  		if(repayment_frequency_val=='Fortnight'){
			  	

			  	loan_terms_for_fee = parseFloat(loan_terms * 26 / 12).toFixed(2);

			}
			else if(repayment_frequency_val=='Weekly'){


			  	loan_terms_for_fee = parseFloat(loan_terms * 52 / 12).toFixed(2);			  	

			}
			else{

				loan_terms_for_fee = parseFloat(loan_terms).toFixed(2);


			}

			


			var total_regular_fee_amt = parseFloat(loan_terms_for_fee) * 120;
			total_regular_fee_amt = parseFloat(total_regular_fee_amt).toFixed(2);		

			jQuery("#total_regular_fee_amt").html(total_regular_fee_amt);
  
			var total_fee =
			  parseFloat(application_fee) + parseFloat(total_regular_fee_amt);
			jQuery("#total_fee_amt").html(total_fee);
		  }
		}
		/* END : Total Fee Calculation*/
  
		/* STRAT : Interests Field Fill*/

		if (setting_data.remove_decimal_point == 1) {
		  if (setting_data.calculation_fee_setting_enable == 1) {
			
			/* jQuery("#per_month_amount").html(
			  addCommas(
				Math.round(parseInt(monthly_payment + Number(monthly_fee)))
			  )
			); */

			jQuery("#per_month_amount").html(
			  addCommas(
				Math.round(parseInt(monthly_payment))
			  )
			);


		  } else {
			jQuery("#per_month_amount").html(
			  addCommas(Math.round(parseInt(monthly_payment)))
			);
		  }
		} else {
		  if (setting_data.calculation_fee_setting_enable == 1) {
			
			/* jQuery("#per_month_amount").html(
			  addCommas(
				parseFloat(monthly_payment + Number(monthly_fee)).toFixed(2)
			  )
			); */

			jQuery("#per_month_amount").html(
			  addCommas(
				parseFloat(monthly_payment).toFixed(2)
			  )
			);



		  } else {	  	


			jQuery("#per_month_amount").html(
			  addCommas(parseFloat(monthly_payment).toFixed(2))
			);
		  }
		}  
	

		convert_total_terms_to_year_month(loan_terms_month,repayment_frequency_val);

  
		//var loan_amount_term_label = 'per ' + repayment_frequency_val.slice(0, -2) + ' for ';
		var loan_amount_term_label = "";
		if (repayment_frequency_val == "Yearly") {
		  loan_amount_term_label = setting_data.repay_freq_per_year_label;
		} else if (repayment_frequency_val == "Quarterly") {
		  loan_amount_term_label = setting_data.repay_freq_per_quarter_label;
		} else if (repayment_frequency_val == "Weekly") {
		  loan_amount_term_label = setting_data.repay_freq_per_week_label;
		} else if (repayment_frequency_val == "Fortnight") {
		  loan_amount_term_label = setting_data.repay_freq_per_fortnight_label;
		} else {
		  loan_amount_term_label = setting_data.repay_freq_per_month_label;
		}
  
		jQuery("#loan_amount_term_label").html(loan_amount_term_label);
  
		if (setting_data.remove_decimal_point == 1) {
		  jQuery("#loan_amount_rate").html(interest_rates);		  

		 	var total_int_amt = addCommas(
			  Math.round(
				parseInt(total_interests) - parseInt(loan_advance_interest)
			  )
			);	

		 	/* check for NAN value */

			 if(total_int_amt=='NaN'){
			 	total_int_amt = 0;
			 }


		  jQuery("#total_interests_amt").html(total_int_amt);
		} else {
		  jQuery("#loan_amount_rate").html(interest_rates.toFixed(2));
		  if (interest_rates === 0) {		  	

			jQuery("#total_interests_amt").html(
			  addCommas(Math.round(parseFloat(0) - parseFloat(0)))
			);
		  } else {


			var total_sum_interests =
			  total_interests < loan_advance_interest
				? addCommas(
					  parseFloat(total_interests).toFixed(2)
					)
				: addCommas(
					(
					  parseFloat(total_interests) -
					  parseFloat(loan_advance_interest)
					).toFixed(2)
				  );			
			

			/* check for NAN value */	
			if(total_sum_interests=='NaN'){
			 	total_sum_interests = '0.00';
			 }

			jQuery("#total_interests_amt").html(total_sum_interests);
		  }
		}
		
		//jQuery("#total_interests_years").html(display_year_str);
  
		var currency_symbols = setting_data.currency_symbols;
  
		/* END : Interests Field Fill*/
  
		/* START : Loan Table Section */
		var balance = loan_amount;
		var table_data = "";
		var rmv_decimal = 0;
		var is_advanced = "";
		var count = loan_terms_month;
  
		for (var i = 1; i <= loan_terms_month; i++) {
		  if (setting_data.remove_decimal_point == 1) {
			rmv_decimal = 1;
		  } else {
			rmv_decimal = 0;
		  }
  
		  if (payment_type == "In Advance" && i == 1) {
			is_advanced = ' <span style="font-weight: bold;">(Advanced)</span>';
		  } else {
			is_advanced = "";
		  }
  
		  count = loan_terms_month - i;
  
		  var interest = cal_interest_amount_by_fre_payment_option(
			repayment_frequency_val,
			count,
			balance,
			interest_rates,
			rmv_decimal
		  );
  
		  if (setting_data.remove_decimal_point == 1) {
			var principal = parseInt(monthly_payment) - parseInt(interest);
		  } else {
			var principal =
			  parseFloat(monthly_payment) - parseFloat(interest).toFixed(2);
		  }
  
		  balance = balance - principal;
  
		  table_data += "<tr>";
		  table_data += "<td>" + i + "</td>";
		  if (setting_data.remove_decimal_point == 1) {
			var display_monthly_payment = Math.ceil(monthly_payment);
		  } else {
			var display_monthly_payment = monthly_payment;
		  }
		  if (i == loan_terms_month) {
			if (setting_data.remove_decimal_point == 1) {
			  display_monthly_payment =
				parseInt(display_monthly_payment) + parseInt(ballon_amounts);
			} else {
			  display_monthly_payment =
				parseFloat(display_monthly_payment) + parseFloat(ballon_amounts);
			}
		  }
  
		  if (interest < 0) {
			interest = 0;
		  }
  
		  if (setting_data.remove_decimal_point == 1) {
			table_data +=
			  "<td>-" +
			  currency_symbols +
			  parseInt(display_monthly_payment) +
			  "</td>";
		  } else {
			table_data +=
			  "<td>-" +
			  currency_symbols +
			  parseFloat(display_monthly_payment).toFixed(2) +
			  "</td>";
		  }
  
		  if (setting_data.remove_decimal_point == 1) {
			table_data +=
			  "<td>" +
			  currency_symbols +
			  parseInt(interest) +
			  is_advanced +
			  "</td>";
		  } else {
			table_data +=
			  "<td>" +
			  currency_symbols +
			  interest.toFixed(2) +
			  is_advanced +
			  "</td>";
		  }
  
		  if (i == loan_terms_month) {
			balance = 0;
		  }
		  var display_balance = balance;
		  if (
			display_balance < 0 ||
			(display_balance > 0 && display_balance < 1)
		  ) {
			display_balance = 0.0;
		  }
		  if (setting_data.remove_decimal_point == 1) {
			display_balance = parseInt(display_balance);
		  } else {
			display_balance = parseFloat(display_balance).toFixed(2);
		  }
  
		  if (parseInt(balance) < 0) {
			table_data += "<td>0.00</td>";
		  } else {
			table_data += "<td>" + currency_symbols + display_balance + "</td>";
		  }
  
		  table_data += "</tr>";
		}
  
		jQuery("#loan_table_data").html(table_data);
  
		/* END : Loan Table Section */
  
		/* START : Loan Chart Section */
		var balance_arr = [];
		var remainig_interests = [];
		var balance = loan_amount;
  
		var graph_type = "Years";
		if (loan_terms_month <= 12) {
		  graph_type = "Months";
		}
		graph_type = "Months";
  
		for (var p = 1; p <= loan_terms_month; p++) {
		  if (p == 1) {
			if (setting_data.remove_decimal_point == 1) {
			  remainig_interests.push(parseInt(total_interests));
			  balance_arr.push(parseInt(balance));
			} else {
			  remainig_interests.push(parseFloat(total_interests.toFixed(2)));
			  balance_arr.push(parseFloat(balance.toFixed(2)));
			}
		  }
  
		  if (setting_data.remove_decimal_point == 1) {
			rmv_decimal = 1;
		  } else {
			rmv_decimal = 0;
		  }
		  //var interest = balance * interest_rates / 1200;
		  count = loan_terms_month - p;
		  var interest = cal_interest_amount_by_fre_payment_option(
			repayment_frequency_val,
			count,
			balance,
			interest_rates,
			rmv_decimal
		  );
  
		  var principal = monthly_payment - parseFloat(interest.toFixed(2));
  
		  if (p == loan_terms_month) {
			balance = balance - principal - ballon_amounts;
		  } else {
			balance = balance - principal;
		  }
  
		  var total_interests = total_interests - interest;
		  if (balance < 0 || (balance > 0 && balance < 1)) {
			balance = 0;
		  }
		  if (
			total_interests < 0 ||
			(total_interests > 0 && total_interests < 1)
		  ) {
			total_interests = 0;
		  }
  
		  if (loan_terms_month > 120) {
			if (p % 12 == 0) {
			  if (setting_data.remove_decimal_point == 1) {
				remainig_interests.push(parseInt(total_interests));
				balance_arr.push(parseInt(balance));
			  } else {
				remainig_interests.push(parseFloat(total_interests.toFixed(2)));
				balance_arr.push(parseFloat(balance.toFixed(2)));
			  }
			}
		  } else {
			if (setting_data.remove_decimal_point == 1) {
			  remainig_interests.push(parseInt(total_interests));
			  balance_arr.push(parseInt(balance));
			} else {
			  remainig_interests.push(parseFloat(total_interests.toFixed(2)));
			  balance_arr.push(parseFloat(balance.toFixed(2)));
			}
		  }
		  // total_interests
		}
  
		/* START : PREPARE CHART JS DATA */
		var loan_data = [];
		const interests = [];
		const principal_arr = [];
		const xData = [];
  
		for (var p = 0; p < remainig_interests.length; p++) {
		  principal_arr.push(balance_arr[p]);
		  if (setting_data.remove_decimal_point == 1) {
			interests.push(parseInt(remainig_interests[p]));
		  } else {
			interests.push(parseFloat(remainig_interests[p]));
		  }
		  xData.push(p);
		}
  
		var graphColor = $("#loan-process-graph").css("--calc-graph-color");
		var graph_color_sub = $("#loan-process-graph").css(
		  "--calc-graph-color-sub"
		);
		var graph_border_color = $("#loan-process-graph").css(
		  "--calc-graph-border-color"
		);
		var graph_border_color_sub = $("#loan-process-graph").css(
		  "--calc-graph-border-color-sub"
		);
  
		const colors = {
		  green: {
			fill: "#e0eadf",
			stroke: "#5eb84d",
		  },
  
		  lightBlue: {
			stroke: "#6fccdd",
		  },
  
		  darkBlue: {
			fill: graphColor,
			stroke: graph_border_color,
		  },
  
		  purple: {
			fill: graph_color_sub,
			stroke: graph_border_color_sub,
		  },
		};
  
		const data = {
		  labels: xData,
		  datasets: [
			{
			  //  label: "Interest",
			  label: setting_data.interest_label,
			  fill: true,
			  backgroundColor: colors.purple.fill,
			  pointBackgroundColor: colors.purple.stroke,
			  borderColor: colors.purple.stroke,
			  pointHighlightStroke: colors.purple.stroke,
			  borderCapStyle: "butt",
			  data: interests,
			},
  
			{
			  // label: "Principal",
			  label: setting_data.principal_label,
			  fill: true,
			  backgroundColor: colors.darkBlue.fill,
			  pointBackgroundColor: colors.darkBlue.stroke,
			  borderColor: colors.darkBlue.stroke,
			  pointHighlightStroke: colors.darkBlue.stroke,
			  borderCapStyle: "butt",
			  data: principal_arr,
			},
		  ],
		};
  
		Chart.Tooltip.positioners.custom = function (elements, position) {
		  //debugger;
		  return {
			x: position.x,
			y: position.y,
		  };
		};
  
		// setTimeout(() => {
		var ctx = $("#loan-process-graph").get(0).getContext("2d");
	   
		var default_theme_chart = Chart.getChart("loan-process-graph");
	  
  
		if (default_theme_chart) {
		  default_theme_chart.destroy();
		}
  
		default_theme_chart = new Chart(ctx, {
		  type: setting_data.chart_types,
		  data: data,
		  responsive: true,
		  options: {
			title: {
			  display: true,
			  text: "Loan Calculator",
			},
			layout: {
			  padding: 32,
			},
			tooltips: {
			  mode: "index",
			  intersect: true,
			  position: "custom",
			  yAlign: "bottom",
			},
			scales: {
			  xAxes: [
				{
				  stacked: true,
				  gridLines: {
					display: false,
				  },
				  // display:false,
				  scaleLabel: {
					display: true,
					labelString: "Term (Months)",
				  },
				},
			  ],
			  yAxes: [
				{
				  stacked: true,
				  gridLines: {
					display: false,
				  },
				  // display:false,
  
				  scaleLabel: {
					display: true,
					labelString: "Amount Owing ($)",
				  },
				},
			  ],
			},
		  },
		});

		
	  // }, 50);
		/* END : PREPARE CHART JS DATA */
	  } /* END : Loan Calculation Process */
  
	  /* START : Textbox Blur Event*/
	  jQuery("#loan_amount").blur(function () {
		var loan_amount = jQuery("#loan_amount").val();
  
		jQuery("#loan_amount").val(addCommas(jQuery("#loan_amount").val()));
		loan_amount = loan_amount.replaceAll(",", "");
		if (loan_amount == "" || loan_amount == ".") {
		  jQuery("#loan_amount").val(
			addCommas(setting_data.loan_amount_min_value)
		  );
		}
		if (parseFloat(loan_amount) < setting_data.loan_amount_min_value) {
		  jQuery("#loan_amount").val(
			addCommas(setting_data.loan_amount_min_value)
		  );
		}
		if (parseFloat(loan_amount) >= setting_data.loan_amount_max_value) {
		  jQuery("#loan_amount").val(
			addCommas(setting_data.loan_amount_max_value)
		  );
		}
		if (setting_data.disable_ballon_amt !== "1") {
		  var ballon_amount_range = document.getElementById(
			"ballon_amount_range"
		  );
		  if (
			parseFloat(ballon_amount_range.value) == 0 ||
			parseInt(ballon_amount_range.value) == 0
		  ) {
			document.getElementById("ballon_amounts").value = 0 + "%";
			document.getElementById("ballon_amounts_per").value = 0 + "%";
			document.getElementById("ballon_amounts_per_dis").text = 0 + "%";
		  }
		}
		var loan_amount = jQuery("#loan_amount").val();
		loan_amount = loan_amount.replaceAll(",", "");
  
		jQuery("#loan_amount_range").val(parseFloat(loan_amount));
		loan_calculation_process();
	  });
  
	  jQuery("#loan_terms").on("blur", function () {
		/*on filled input check min max values 6-7-2023*/
		var repayment_freq = jQuery("#repayment_freq option:selected").val();
		var old_repayment_freq = jQuery(
		  "input[name='current_repayment_freq']"
		).val();
		var default_nop_value = jQuery("input[name='loan_terms']").val();
  
		/* nop = number of payments */
		var min_nop_value = jQuery("input[name='min_value']").val();
		var max_nop_value = jQuery("input[name='max_value']").val();
  
		var numbers_of_payments = cal_numbers_of_payment_by_frequency_val(
		  repayment_freq,
		  old_repayment_freq,
		  default_nop_value,
		  min_nop_value,
		  max_nop_value
		);
  
		var loan_terms = jQuery("#loan_terms").val();
		jQuery("input[name='current_repayment_freq']").val(repayment_freq);
  
		if (loan_terms == "" || loan_terms == ".") {
		  jQuery("#loan_terms").val(numbers_of_payments.nop_min_value);
		}
  
		if (parseFloat(loan_terms) < numbers_of_payments.nop_min_value) {
		  jQuery("#loan_terms").val(numbers_of_payments.nop_min_value);
		}
		if (parseFloat(loan_terms) > numbers_of_payments.nop_max_value) {
		  jQuery("#loan_terms").val(numbers_of_payments.nop_max_value);
		}
		if (setting_data.disable_ballon_amt !== "1") {
		  var ballon_amount_range = document.getElementById(
			"ballon_amount_range"
		  );
		  if (
			parseFloat(ballon_amount_range.value) == 0 ||
			parseInt(ballon_amount_range.value) == 0
		  ) {
			document.getElementById("ballon_amounts").value = 0 + "%";
			document.getElementById("ballon_amounts_per").value = 0 + "%";
			document.getElementById("ballon_amounts_per_dis").text = 0 + "%";
		  }
		}
  
		jQuery("#loan_terms_range").val(jQuery("#loan_terms").val());
		var monthly_fee = jQuery("#monthly_fee").val();
		var application_fee = jQuery("#application_fee").val();
		var loan_terms = jQuery("#loan_terms").val();
		var total_regular_fee_amt = parseFloat(loan_terms) * 120;
		jQuery("#total_regular_fee_amt").html(total_regular_fee_amt);
		if (setting_data.remove_decimal_point == 1) {
		  var total_fee =
			parseInt(application_fee) + parseInt(total_regular_fee_amt);
		} else {
		  var total_fee =
			parseFloat(application_fee) + parseFloat(total_regular_fee_amt);
		}
  
		jQuery("#total_fee_amt").html(total_fee);
		loan_calculation_process();
	  });
  
	  jQuery("#interest_rates").blur(function () {
		var interest_rates = jQuery("#interest_rates").val();
		if (setting_data.remove_decimal_point == 1) {
		  if (interest_rates == "" || interest_rates == ".") {
			jQuery("#interest_rates").val(
			  parseInt(setting_data.interest_rate_min_value)
			);
		  }
		  if (parseFloat(interest_rates) < setting_data.interest_rate_min_value) {
			jQuery("#interest_rates").val(
			  parseInt(setting_data.interest_rate_min_value)
			);
		  }
		  if (parseFloat(interest_rates) > setting_data.interest_rate_max_value) {
			jQuery("#interest_rates").val(
			  parseInt(setting_data.interest_rate_max_value)
			);
		  }
		} else {
		  if (interest_rates == "" || interest_rates == ".") {
			jQuery("#interest_rates").val(
			  parseFloat(setting_data.interest_rate_min_value).toFixed(2)
			);
		  }
		  if (parseFloat(interest_rates) < setting_data.interest_rate_min_value) {
			jQuery("#interest_rates").val(
			  parseFloat(setting_data.interest_rate_min_value).toFixed(2)
			);
		  }
		  if (parseFloat(interest_rates) > setting_data.interest_rate_max_value) {
			jQuery("#interest_rates").val(
			  parseFloat(setting_data.interest_rate_max_value).toFixed(2)
			);
		  }
		}
		if (setting_data.disable_ballon_amt !== "1") {
		  var ballon_amount_range = document.getElementById(
			"ballon_amount_range"
		  );
		  if (
			parseFloat(ballon_amount_range.value) == 0 ||
			parseInt(ballon_amount_range.value) == 0
		  ) {
			document.getElementById("ballon_amounts").value = 0 + "%";
			document.getElementById("ballon_amounts_per").value = 0 + "%";
			document.getElementById("ballon_amounts_per_dis").text = 0 + "%";
		  }
		}
  
		var interest_rates = jQuery("#interest_rates").val();
  
		if (setting_data.remove_decimal_point == 1) {
		  jQuery("#interest_rates").val(parseInt(interest_rates));
		} else {
		  jQuery("#interest_rates").val(parseFloat(interest_rates).toFixed(2));
		}
  
		jQuery("#interest_rate_range").val(jQuery("#interest_rates").val());
		jQuery("#interest_rate_range_dis").html(
		  jQuery("#interest_rates").val() + "% p.a."
		);
  
		loan_calculation_process();
	  });
  
	  jQuery("#ballon_amounts_per").blur(function () {
		var currency_symbol = setting_data.currency_symbols;
		jQuery("#ballon_amount_range").val(
		  jQuery("#ballon_amounts_per").val().replaceAll("%", "")
		);
		var loan_amount = jQuery("#loan_amount")
		  .val()
		  .replaceAll(currency_symbol, "");
		loan_amount = loan_amount.replaceAll(",", "");
		var ballon_amounts_per = jQuery("#ballon_amounts_per")
		  .val()
		  .replaceAll("%", "");
  
		if (setting_data.remove_decimal_point == 1) {
		  var ballon_amounts =
			parseInt(parseInt(loan_amount) * parseInt(ballon_amounts_per)) / 100;
		} else {
		  var ballon_amounts =
			parseFloat(parseFloat(loan_amount) * parseFloat(ballon_amounts_per)) /
			100;
		}
  
		if (ballon_amounts_per == "" || ballon_amounts_per == ".") {
		  jQuery("#ballon_amounts_per").val(
			setting_data.default_balloon_amount + "%"
		  );
		  jQuery("#ballon_amount_range").val(setting_data.default_balloon_amount);
		  ballon_amounts_per = setting_data.default_balloon_amount;
		}
  
		jQuery("#ballon_amounts").val(ballon_amounts);
		jQuery("#bill_ballon_amt").html(ballon_amounts);
		jQuery("#interest_rate_range_dis").html(
		  jQuery("#interest_rates").val() + "% p.a."
		);
		jQuery("#ballon_amounts_per_dis").html(ballon_amounts_per + "%");
		loan_calculation_process();
	  });
  
	  jQuery("#ballon_amounts").blur(function () {
		var ballon_amount_range = document.getElementById("ballon_amount_range");
		if (
		  parseFloat(ballon_amount_range.value) == 0 ||
		  parseInt(ballon_amount_range.value) == 0
		) {
		  document.getElementById("ballon_amounts").value = 0 + "%";
		  document.getElementById("ballon_amounts_per").value = 0 + "%";
		  document.getElementById("ballon_amounts_per_dis").text = 0 + "%";
		}
		var ballon_amounts = $(this).val();
		var ballon_amounts_per = jQuery("#ballon_amounts_per").val();
		ballon_amount_range.value = ballon_amounts_per;
		var loan_amount = jQuery("#loan_amount").val();
		loan_amount = loan_amount.replaceAll(",", "");
  
		if (ballon_amounts == "" || ballon_amounts == ".") {
		  jQuery("#ballon_amounts").val(0);
		}
  
		ballon_amounts = ballon_amounts.replaceAll(",", "");
  
		if (ballon_amounts == "" || ballon_amounts == ".") {
		  ballon_amounts = 0;
		  ballon_amounts_per = 0;
		} else {
		  if (setting_data.remove_decimal_point == 1) {
			var ballon_amounts_per = parseInt(
			  (parseInt(ballon_amounts) * 100) / parseInt(loan_amount)
			);
		  } else {
			var ballon_amounts_per = parseFloat(
			  (parseFloat(ballon_amounts) * 100) / parseFloat(loan_amount)
			);
		  }
		}
		jQuery("#ballon_amounts_per").val(Math.round(ballon_amounts_per));
		document.getElementById("ballon_amount_range").value = ballon_amounts_per;
		jQuery("#bill_ballon_per").val(ballon_amounts_per);
		jQuery("#bill_ballon_amt").html(ballon_amounts);
		jQuery("#bill_ballon_per").html(ballon_amounts_per);
		jQuery("#ballon_amounts_per_dis").text(ballon_amounts_per + "%");
		loan_calculation_process();
	  });
	  /* END : Textbox Blur Event*/
  
	  var loan_amount_range = document.getElementById("loan_amount_range");
	  jQuery("#loan_amount").val(addCommas(loan_amount_range.value)); // Display the default slider value
	  if (setting_data.remove_decimal_point == 1) {
		var value = parseInt(
		  ((loan_amount_range.value - loan_amount_range.min) /
			(loan_amount_range.max - loan_amount_range.min)) *
			100
		);
	  } else {
		var value = parseFloat(
		  ((loan_amount_range.value - loan_amount_range.min) /
			(loan_amount_range.max - loan_amount_range.min)) *
			100
		);
	  }
	  loan_amount_range.style.background =
		"linear-gradient(to right, #555555 0%, #555555 " +
		value +
		"%, #fff " +
		value +
		"%, " +
		setting_data.back_ground_color +
		" 100%)";
  
	  // Update the current slider value (each time you drag the slider handle)
	  loan_amount_range.oninput = function () {
		jQuery("#loan_amount").val(addCommas(this.value));
		if (setting_data.disable_ballon_amt !== "1") {
		  var ballon_amount_range = document.getElementById(
			"ballon_amount_range"
		  );
		  if (
			parseFloat(ballon_amount_range.value) == 0 ||
			parseInt(ballon_amount_range.value) == 0
		  ) {
			document.getElementById("ballon_amounts").value = 0 + "%";
			document.getElementById("ballon_amounts_per").value = 0 + "%";
			document.getElementById("ballon_amounts_per_dis").text = 0 + "%";
		  }
		}
  
		loan_calculation_process();
	  };
  
	  var loan_terms_range = document.getElementById("loan_terms_range");
	  
	  jQuery("#loan_terms").val(loan_terms_range.value); // Display the default slider value
	  if (setting_data.remove_decimal_point == 1) {
		var value = parseInt(
		  ((loan_terms_range.value - loan_terms_range.min) /
			(loan_terms_range.max - loan_terms_range.min)) *
			100
		);
	  } else {
		var value = parseFloat(
		  ((loan_terms_range.value - loan_terms_range.min) /
			(loan_terms_range.max - loan_terms_range.min)) *
			100
		);
	  }
	  loan_terms_range.style.background =
		"linear-gradient(to right, #555555 0%, #555555 " +
		value +
		"%, #fff " +
		value +
		"%, white 100%)";
  
	  // Update the current slider value (each time you drag the slider handle)
	  loan_terms_range.oninput = function () {

		jQuery("#loan_terms").val(this.value);
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		} else {
		  var value = parseFloat(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		}
		if (setting_data.disable_ballon_amt !== "1") {
		  var ballon_amount_range = document.getElementById(
			"ballon_amount_range"
		  );
		  if (
			parseFloat(ballon_amount_range.value) == 0 ||
			parseInt(ballon_amount_range.value) == 0
		  ) {
			document.getElementById("ballon_amounts").value = 0 + "%";
			document.getElementById("ballon_amounts_per").value = 0 + "%";
			document.getElementById("ballon_amounts_per_dis").text = 0 + "%";
		  }
		}
  
		this.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, white 100%)";
  
		loan_calculation_process();
	  };
  
	  loan_terms_range.onchange = function () {



		jQuery("#loan_terms").val(this.value);
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		} else {
		  var value = parseFloat(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		}
		if (setting_data.disable_ballon_amt !== "1") {
		  var ballon_amount_range = document.getElementById(
			"ballon_amount_range"
		  );
		  if (
			parseFloat(ballon_amount_range.value) == 0 ||
			parseInt(ballon_amount_range.value) == 0
		  ) {
			document.getElementById("ballon_amounts").value = 0 + "%";
			document.getElementById("ballon_amounts_per").value = 0 + "%";
			document.getElementById("ballon_amounts_per_dis").text = 0 + "%";
		  }
		}
		this.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, white 100%)";
  
		loan_calculation_process();
	  };
  
	  var interest_rate_range = document.getElementById("interest_rate_range");
	  if (setting_data.remove_decimal_point == 1) {
		var interest_rate_range_val = parseInt(interest_rate_range.value);
		jQuery("#interest_rates").val(interest_rate_range_val);
	  } else {
		var interest_rate_range_val = parseFloat(interest_rate_range.value);
		jQuery("#interest_rates").val(interest_rate_range_val.toFixed(2));
	  }
	  jQuery("#interest_rate_range_dis").html(
		interest_rate_range.value + "% p.a."
	  );
	  if (setting_data.remove_decimal_point == 1) {
		var value = parseInt(
		  ((interest_rate_range.value - interest_rate_range.min) /
			(interest_rate_range.max - interest_rate_range.min)) *
			100
		);
	  } else {
		var value = parseFloat(
		  ((interest_rate_range.value - interest_rate_range.min) /
			(interest_rate_range.max - interest_rate_range.min)) *
			100
		);
	  }
	  interest_rate_range.style.background =
		"linear-gradient(to right, #555555 0%, #555555 " +
		value +
		"%, #fff " +
		value +
		"%, white 100%)";
	  // Update the current slider value (each time you drag the slider handle)
	  interest_rate_range.oninput = function () {
		var interest_rate_range_val = this.value;
		jQuery("#interest_rates").val(interest_rate_range_val);
		jQuery("#interest_rate_range_dis").html(this.value + "% p.a.");
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		} else {
		  var value = parseFloat(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		}
		if (setting_data.disable_ballon_amt !== "1") {
		  var ballon_amount_range = document.getElementById(
			"ballon_amount_range"
		  );
		  if (
			parseFloat(ballon_amount_range.value) == 0 ||
			parseInt(ballon_amount_range.value) == 0
		  ) {
			document.getElementById("ballon_amounts").value = 0 + "%";
			document.getElementById("ballon_amounts_per").value = 0 + "%";
			document.getElementById("ballon_amounts_per_dis").text = 0 + "%";
		  }
		}
  
		this.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, white 100%)";
		loan_calculation_process();
	  };
  
	  var ballon_amount_range = document.getElementById("ballon_amount_range");
	  jQuery("#ballon_amounts_per").val(ballon_amount_range.value);
	  jQuery("#ballon_amounts_per_dis").html(ballon_amount_range.value + "%");
	  if (setting_data.remove_decimal_point == 1) {
		var value = parseInt(
		  ((ballon_amount_range.value - ballon_amount_range.min) /
			(ballon_amount_range.max - ballon_amount_range.min)) *
			100
		);
	  } else {
		var value = parseFloat(
		  ((ballon_amount_range.value - ballon_amount_range.min) /
			(ballon_amount_range.max - ballon_amount_range.min)) *
			100
		);
	  }
	  ballon_amount_range.style.background =
		"linear-gradient(to right, #555555 0%, #555555 " +
		value +
		"%, #fff " +
		value +
		"%, white 100%)";
  
	  // Update the current slider value (each time you drag the slider handle)
	  ballon_amount_range.oninput = function (e) {
		jQuery("#ballon_amounts_per").val(this.value);
		jQuery("#ballon_amounts_per_dis").html(this.value + "%");
		if (setting_data.remove_decimal_point == 1) {
		  value = parseInt(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		} else {
		  value = parseFloat(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		}
		this.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value +
		  "%, #fff " +
		  value +
		  "%, white 100%)";
		loan_calculation_process();
	  };
  
	  var loan_terms = document.getElementById("loan_terms");
  
	  loan_terms.onchange = function () {
		if (setting_data.remove_decimal_point == 1) {
		  var value = parseInt(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		} else {
		  var value = parseFloat(
			((this.value - this.min) / (this.max - this.min)) * 100
		  );
		}
		// this.style.background = 'linear-gradient(to right, #555555 0%, #555555 ' + value + '%, #fff ' + value + '%, white 100%)'
		if (setting_data.disable_ballon_amt !== "1") {
		  var ballon_amount_range = document.getElementById(
			"ballon_amount_range"
		  );
		  var ballon_amount_range = document.getElementById(
			"ballon_amount_range"
		  );
		  if (
			parseFloat(ballon_amount_range.value) == 0 ||
			parseInt(ballon_amount_range.value) == 0
		  ) {
			document.getElementById("ballon_amounts").value = 0 + "%";
			document.getElementById("ballon_amounts_per").value = 0 + "%";
			document.getElementById("ballon_amounts_per_dis").text = 0 + "%";
		  }
		}
		// this.style.background = 'linear-gradient(to right, #555555 0%, #555555 ' + value + '%, #fff ' + value + '%, white 100%)'
		loan_calculation_process();
	  };
  
	  /******************|| Print Code || **********************/
  
	  jQuery(".print-table").click(function () {
		// Set the paper size to A3 using jQuery
		jQuery("#main-sec").css({
		  "@media print": {
			"@page": {size: "297mm 420mm"},
			"-webkit-print-color-adjust": "exact !important",
			"-moz-print-color-adjust": "exact !important",
			"-ms-print-color-adjust": "exact !important",
			"print-color-adjust": "exact !important",
			"color-adjust": "exact !important"
		  }
		});
		jQuery("#main-sec").print(/*options*/);
	  });
  
	  // Attach change event handler to the payment_type dropdown
	  $("#payment_type").change(function () {
		// Call loan_calculation_process when the dropdown changes
		loan_calculation_process();
	  });
  
	  $(document).on("input", "#repayment_freq", function () {
		/*========start 6-7-2023=========*/
		var repayment_freq = jQuery("#repayment_freq option:selected").val();
  
		var old_repayment_freq = jQuery(
		  "input[name='current_repayment_freq']"
		).val();
  
		var default_nop_value = jQuery("input[name='loan_terms']").val();
  
		/* nop = number of payments */
		var min_nop_value = jQuery("input[name='min_value']").val();
  
		var max_nop_value = jQuery("input[name='max_value']").val();
  
		



		var numbers_of_payments = cal_numbers_of_payment_by_frequency_val(
		  repayment_freq,
		  old_repayment_freq,
		  default_nop_value,
		  min_nop_value,
		  max_nop_value
		);
  
		/*set payments range and min / max values in input range*/
		jQuery("#loan_terms_range").attr(
		  "value",
		  numbers_of_payments.nop_default_value
		);
		jQuery("#loan_terms_range").attr(
		  "min",
		  numbers_of_payments.nop_min_value
		);
		jQuery("#loan_terms_range").attr(
		  "max",
		  numbers_of_payments.nop_max_value
		);
			

		jQuery("#loan_terms").val(numbers_of_payments.nop_default_value);
  
		jQuery("input[name='min_value']").val(numbers_of_payments.nop_min_value);
		jQuery("input[name='max_value']").val(numbers_of_payments.nop_max_value);
		jQuery("input[name='default_value']").val(
		  numbers_of_payments.nop_default_value
		);
  
		/*reset range slider after select payment frequency option last changes*/
		document.getElementById("loan_terms_range").value =
		  numbers_of_payments.nop_default_value;
  
		var loan_terms_range = document.getElementById("loan_terms_range");
		var value1 =
		  ((numbers_of_payments.nop_default_value -
			numbers_of_payments.nop_min_value) /
			(numbers_of_payments.nop_max_value -
			  numbers_of_payments.nop_min_value)) *
		  100;
  
		loan_terms_range.style.background =
		  "linear-gradient(to right, #555555 0%, #555555 " +
		  value1 +
		  "%, #fff " +
		  value1 +
		  "%,  #c9a208 100%)";
  
		/*========End 6-7-2023=========*/
		loan_calculation_process();
	  });
	  loan_calculation_process();
	} /********** END: This condition for Default theme and New theme change *************/
  }); //End jQuery(document).ready(function ($)
  
  /* START : Add Commas in amonut function*/
  function addCommas(nStr) {
	nStr += "";
	var x = nStr.split(".");
	var x1 = x[0];
	var x2 = x.length > 1 ? "." + x[1] : "";
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
	  x1 = x1.replace(rgx, "$1" + "," + "$2");
	}
	return x1 + x2;
  }
  
  /* START : Validation for only enter number with some special charcter */
  function onlyNos(evt, txt_name) {
	var theEvent = evt || window.event;
	var key = theEvent.keyCode || theEvent.which;
	var keyCode = key;
	key = String.fromCharCode(key);
  
	if (keyCode == 37 || keyCode == 39) {
	  return;
	}
  
	if (keyCode == 67 || keyCode == 86 || keyCode == 88 || keyCode == 65) {
	  return;
	}
  
	if (
	  theEvent.key == "!" ||
	  theEvent.key == "@" ||
	  theEvent.key == "#" ||
	  theEvent.key == "$" ||
	  theEvent.key == "&" ||
	  theEvent.key == "%" ||
	  theEvent.key == "^" ||
	  theEvent.key == "*" ||
	  theEvent.key == ")" ||
	  theEvent.key == "("
	) {
	  return false;
	}
	var txt_value = jQuery("#" + txt_name).val();
	if (
	  txt_value.length >= 1 &&
	  txt_value.charAt(0) == "." &&
	  theEvent.key == "."
	) {
	  return false;
	}
  
	if (key.length == 0) return;
	var regex = /^[0-9.,\b]+$/;
	if (
	  keyCode == 188 ||
	  keyCode == 190 ||
	  keyCode == 110 ||
	  keyCode == 9 ||
	  (keyCode >= 96 && keyCode <= 105)
	) {
	  return;
	} else {
	  if (!regex.test(key)) {
		theEvent.returnValue = false;
		if (theEvent.preventDefault) theEvent.preventDefault();
	  }
	}
  }
  
  function validateInputBallon(input) {
	var value = parseFloat(input.value);
	// Check if the value is a number and within the specified range
	if (isNaN(value) || value < 0) {
	  // Display an error message or take appropriate action
	  console.log(
		"Invalid input. Please enter a number greater than or equal to 0."
	  );
	} else if (value > setting_data.default_balloon_amount) {
	  // Truncate the value to 100 if it exceeds the maximum allowed
	  input.value = setting_data.default_balloon_amount;
	  document.getElementById("ballon_amounts_per_dis").textContent = input.value;
	} else {
	  // Update the hidden span element with the valid value
	  document.getElementById("ballon_amounts_per_dis").textContent = value;
	}
  }
  
  function validateInputInterestRate(input) {
	var value = parseFloat(input.value);
  
	// Check if the value is a number and within the specified range
	if (isNaN(value) || value < 0) {
	  // Display an error message or take appropriate action
	  console.log(
		"Invalid input. Please enter a number greater than or equal to 0."
	  );
	} else if (value > setting_data.interest_rate_max_value) {
	  // Truncate the value to 100 if it exceeds the maximum allowed
	  input.value = setting_data.interest_rate_max_value;
	  document.getElementById("interest_rates").textContent = input.value;
	} else {
	  // Update the hidden span element with the valid value
	  document.getElementById("interest_rates").textContent = value;
	}
  }
  
  function validateInputLoanRate(input) {
	var value = parseFloat(input.value);
  
	// Check if the value is a number and within the specified range
	if (isNaN(value) || value < 0) {
	  // Display an error message or take appropriate action
	  console.log(
		"Invalid input. Please enter a number greater than or equal to 0."
	  );
	} else if (value > setting_data.loan_amount_max_value) {
	  // Truncate the value to 100 if it exceeds the maximum allowed
	  input.value = setting_data.loan_amount_max_value;
	  document.getElementById("loan_amount").textContent = input.value;
	} else {
	  // Update the hidden span element with the valid value
	  document.getElementById("loan_amount").textContent = value;
	}
  }


  function convert_total_terms_to_year_month(loan_terms,repayment_frequency_val){	


	var years = 0;
	var months = 0;	
	var remains = 0; 

	
	if(repayment_frequency_val == "Weekly"){	
		
		
		years = parseInt(loan_terms / 52);

		remains = loan_terms - (years * 52);

		months = parseInt(remains / 4);


	}
	else if(repayment_frequency_val == "Fortnight"){
	
		years = parseInt(loan_terms / 26);

		remains = loan_terms - (years * 26);

		months = parseInt(remains / 2);		

	}
	else if(repayment_frequency_val == "Monthly"){		

		years = parseInt(loan_terms / 12);

		remains = loan_terms - (years * 12);		

		months = parseInt(remains);	
	}
	else if(repayment_frequency_val == "Quarterly"){

		years = parseInt(loan_terms / 4);

		remains = loan_terms - (years * 4);		

		months = parseInt(remains * 3);	

	}
	else if(repayment_frequency_val == "Yearly"){

		years = parseInt(loan_terms);		
		months = 0;

	}	


	var display = years + " years and " + months + " months";	

	jQuery('#label-for-freuency').text(display);

	if(months <= 0){

		var display_year_months_loan_det_sec = years + " <label>"+setting_data.year_label+" </label>";	
 
   }
   else{

   		var display_year_months_loan_det_sec = years + " <label>"+setting_data.year_label+" </label>" + months + " <label>"+setting_data.month_label+" </label>";	
   }


	jQuery('#loan_amount_year').html(display_year_months_loan_det_sec);

	jQuery("#total_interests_years").html(display_year_months_loan_det_sec);



  }


