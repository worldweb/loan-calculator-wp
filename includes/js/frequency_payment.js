function cal_emi_amount_frequency_payment_options(frp_option,lamount, interest_rates, nofpayment,ballon_amounts) {
  
  var newArr = [];
  if (frp_option === 'Quarterly') {
    
    var interest = interest_rates / (100 * 4);
    var emi_amount = ((lamount - ballon_amounts) * interest * Math.pow(1 + interest, parseInt(nofpayment))) / (Math.pow(1 + interest, parseInt(nofpayment)) - 1);
    var total_interests = (emi_amount * parseInt(nofpayment)) - lamount;
    //newArr['total_interest'] = total_interests.toFixed(2);
    

    if (setting_data.calculation_fee_setting_enable == 1) {

      var monthly_fee = parseFloat(setting_data.monthly_rate);

      if(Number.isNaN(monthly_fee)){
          monthly_fee = 0;
      }

      emi_amount = emi_amount + monthly_fee;     

    }      



    newArr['emi_amount'] = emi_amount.toFixed(2);





  } else if (frp_option === 'Monthly') {  


    var interest = interest_rates / (100 * 12);  


    var emi_amount = ((lamount - ballon_amounts) * interest * Math.pow(1 + interest, parseInt(nofpayment))) / (Math.pow(1 + interest, parseInt(nofpayment)) - 1);    

    
    
    if (setting_data.calculation_fee_setting_enable == 1) {

      var monthly_fee = parseFloat(setting_data.monthly_rate);

      if(Number.isNaN(monthly_fee)){
          monthly_fee = 0;
      }

      emi_amount = emi_amount + monthly_fee;

    }       


    newArr['emi_amount'] = emi_amount.toFixed(2);

  } else if (frp_option === 'Yearly') {
    
    var interest = interest_rates / 100;
    var emi_amount = (((lamount - ballon_amounts) * interest) * (Math.pow(1 + interest, parseInt(nofpayment))) / (Math.pow(1 + interest, parseInt(nofpayment)) - 1));
    var total_interests = emi_amount * parseInt(nofpayment) - lamount;
    //newArr['total_interest'] = total_interests.toFixed(2);
   
     if (setting_data.calculation_fee_setting_enable == 1) {

      var monthly_fee = parseFloat(setting_data.monthly_rate);

      if(Number.isNaN(monthly_fee)){
          monthly_fee = 0;
      }

      emi_amount = emi_amount + monthly_fee;
     

    }   



    newArr['emi_amount'] = emi_amount.toFixed(2);
  
  } else if (frp_option === 'Weekly') {
    
    var interest = interest_rates / (100 * 52);

    var emi_amount = (((lamount - ballon_amounts) * interest) * (Math.pow(1 + interest, parseInt(nofpayment))) / (Math.pow(1 + interest, parseInt(nofpayment)) - 1));


     if (setting_data.calculation_fee_setting_enable == 1) {

      var monthly_fee = parseFloat(setting_data.monthly_rate);

      if(Number.isNaN(monthly_fee)){
          monthly_fee = 0;
      }


      emi_amount = emi_amount + monthly_fee;
   

    }   



     newArr['emi_amount'] = emi_amount.toFixed(2);
       
  }
  else if(frp_option === 'Fortnight'){

    var interest = interest_rates / (100 * 26);

    var emi_amount = (((lamount - ballon_amounts) * interest) * (Math.pow(1 + interest, parseInt(nofpayment))) / (Math.pow(1 + interest, parseInt(nofpayment)) - 1));   


     if (setting_data.calculation_fee_setting_enable == 1) {

      var monthly_fee = parseFloat(setting_data.monthly_rate);

      if(Number.isNaN(monthly_fee)){
          monthly_fee = 0;
      }

      emi_amount = emi_amount + monthly_fee;      
      
    }  


    newArr['emi_amount'] = emi_amount.toFixed(2);

  }
  
  return newArr;
}

function cal_loan_terms_by_frequency_payment_option(frp_option, loan_terms_months) {  
  

  var label_star;

  var backend_repayment_label = setting_data.regular_repayment_heading;  


  if(backend_repayment_label == 'NULL' || backend_repayment_label == '' || backend_repayment_label == null){

    backend_repayment_label = "";

  }


  var selected_freq_text = jQuery('#repayment_freq option:selected').text();

  label_star = backend_repayment_label.replace("{frequency}", selected_freq_text);   


  jQuery("#regular_repayment_heading").html(label_star);

  if (frp_option === 'Quarterly') {    
     return parseInt(loan_terms_months * 3);
  } else if (frp_option === 'Monthly') {    
    return parseInt(loan_terms_months);
  } else if (frp_option === 'Yearly') {			
      return parseInt(loan_terms_months * 12);
  } else if (frp_option === 'Weekly') {      
      return parseInt(loan_terms_months * 12 / 52 );
  } else if (frp_option === 'Fortnight') {      
      return parseInt(loan_terms_months * 12 / 26);
  }

}

function cal_interest_amount_by_fre_payment_option(frp_option, loan_terms_months, pbalance, interest_rates,rmv_decimal) {
  var npbalance = 0;
  
  if(rmv_decimal){
    npbalance = parseInt(pbalance);
  }else{
    npbalance = pbalance;
  }
  
  if (frp_option === 'Quarterly') {
    
    var interest = interest_rates / (100 * 4);
    var quarterlyInterestAmount = npbalance * interest;

     if (setting_data.calculation_fee_setting_enable == 1) {

      var monthly_fee = parseFloat(setting_data.monthly_rate);

      if(Number.isNaN(monthly_fee)){
          monthly_fee = 0;
      }


      quarterlyInterestAmount = quarterlyInterestAmount + monthly_fee;      

     } 


    return quarterlyInterestAmount;

  } else if (frp_option === 'Monthly') {
    
    var interest = interest_rates / (100 * 12);
    var monthlyInterestAmount = npbalance * interest;


    if (setting_data.calculation_fee_setting_enable == 1) {

      var monthly_fee = parseFloat(setting_data.monthly_rate);

       if(Number.isNaN(monthly_fee)){
          monthly_fee = 0;
      }


      monthlyInterestAmount = monthlyInterestAmount + monthly_fee;      

    }  


    return monthlyInterestAmount;

  } else if (frp_option === 'Yearly') {
    
    var interest = interest_rates / 100;
    var yearlyInterestAmount = npbalance * interest;


    if (setting_data.calculation_fee_setting_enable == 1) {

      var monthly_fee = parseFloat(setting_data.monthly_rate);

       if(Number.isNaN(monthly_fee)){
          monthly_fee = 0;
      }

      yearlyInterestAmount = yearlyInterestAmount + monthly_fee;      

    }  


    return yearlyInterestAmount;

  } else if (frp_option === 'Weekly') {
    
    var interest = interest_rates / ( 100 * 52);
    var weeklyInterestAmount = npbalance * interest;


    if (setting_data.calculation_fee_setting_enable == 1) {

      var monthly_fee = parseFloat(setting_data.monthly_rate);

       if(Number.isNaN(monthly_fee)){
          monthly_fee = 0;
      }

      weeklyInterestAmount = weeklyInterestAmount + monthly_fee;      

    }  


    return weeklyInterestAmount;

  } else if (frp_option === 'Fortnight') {
    
    var interest = interest_rates / ( 100 * 26);
    var fortnightInterestAmount = npbalance * interest;

    if (setting_data.calculation_fee_setting_enable == 1) {

      var monthly_fee = parseFloat(setting_data.monthly_rate);

       if(Number.isNaN(monthly_fee)){
          monthly_fee = 0;
      }

      fortnightInterestAmount = fortnightInterestAmount + monthly_fee;      

    } 


    return fortnightInterestAmount;

  }

}

function loan_advance_interest_cal(frp_option, loan_amount, interest_rates) {

  var loan_advance_arry = [];
  var loan_advance_interest = 0;
  var loan_amount_c = 0;
  var interest = 0;

  if (frp_option === 'Quarterly') {
    
    interest = interest_rates / (100 * 4);
    loan_advance_interest = parseFloat(loan_amount * interest);
    loan_amount_c = loan_amount - parseFloat(loan_amount * interest);

  } else if (frp_option === 'Monthly') {
    
    interest = interest_rates / (100 * 12);
    loan_advance_interest = parseFloat(loan_amount * interest);
    loan_amount_c = loan_amount - parseFloat(loan_amount * interest);

  } else if (frp_option === 'Yearly') {
    
    interest = interest_rates / 100;
    loan_advance_interest = parseFloat(loan_amount * interest);
    loan_amount_c = loan_amount - parseFloat(loan_amount * interest);

  } else if (frp_option === 'Weekly') {
    
    interest = interest_rates / (100 * 52);
    loan_advance_interest = parseFloat(loan_amount * interest);
    loan_amount_c = loan_amount - parseFloat(loan_amount * interest);

  } else if (frp_option === 'Fortnight') {
    
    interest = interest_rates / (100 * 26);
    loan_advance_interest = parseFloat(loan_amount * interest);
    loan_amount_c = loan_amount - parseFloat(loan_amount * interest);

  }

  loan_advance_arry['loan_advance_interest'] = loan_advance_interest;
  loan_advance_arry['loan_amount'] = loan_amount_c;

  return loan_advance_arry;
}


function cal_numbers_of_payment_by_frequency_val(frp_option,old_repayment_freq,default_nop,min_nop,max_nop){


  var nop_values_array = [];
  var nop_default_value = nop_min_value = nop_max_value = 0;
  
  if (frp_option === 'Monthly') {
       /* nop_default_value = parseInt(default_nop / 1);*/   

        if(old_repayment_freq == 'Quarterly'){
           nop_default_value = parseInt(default_nop * 3);
           nop_min_value = parseInt(min_nop * 3);
           nop_max_value = parseInt(max_nop * 3);

        }else if(old_repayment_freq == 'Yearly'){
           nop_default_value = parseInt(default_nop * 12);
           nop_min_value = parseInt(min_nop * 12);
           nop_max_value = parseInt(max_nop * 12);

        }else if(old_repayment_freq == 'Weekly'){          

           nop_default_value = parseInt(default_nop * 12 / 52);
           nop_min_value = parseInt(min_nop * 12 / 52);
           nop_max_value = parseInt(max_nop * 12 / 52);

        }else if(old_repayment_freq == 'Fortnight'){          

           nop_default_value = parseInt(default_nop * 12 / 26);
           nop_min_value = parseInt(min_nop * 12 / 26);
           nop_max_value = parseInt(max_nop * 12 / 26);
        
        }else{
          nop_min_value = parseInt(min_nop / 1);
          nop_max_value = parseInt(max_nop / 1);
          nop_default_value = default_nop;
        }
  }

  if (frp_option === 'Quarterly') {
        //nop_default_value = parseInt(default_nop / 3);
        
        if(old_repayment_freq == 'Monthly'){

            nop_default_value = parseInt(default_nop / 3);
            nop_min_value = parseInt(min_nop / 3);
            nop_max_value = parseInt(max_nop / 3);

        }else if(old_repayment_freq == 'Yearly'){

           nop_default_value = parseInt(default_nop * 12 / 3);
           nop_min_value = parseInt(min_nop * 12 / 3);
           nop_max_value = parseInt(max_nop * 12 / 3);

        }else if(old_repayment_freq == 'Weekly'){  

           nop_default_value = parseInt(default_nop * 4 / 52);
           nop_min_value = parseInt(min_nop * 12 / 52 / 3);
           nop_max_value = parseInt(max_nop * 12 / 52 / 3);

        }else if(old_repayment_freq == 'Fortnight'){  

           nop_default_value = parseInt(default_nop * 4 / 26);
           nop_min_value = parseInt(min_nop * 12 / 26 / 3);
           nop_max_value = parseInt(max_nop * 12 / 26 / 3);

        }else{
          nop_min_value = parseInt(min_nop);
          nop_max_value = parseInt(max_nop);
          nop_default_value = default_nop;
        }
  }

  if (frp_option === 'Yearly') {
        /*nop_default_value = parseInt(default_nop / 12);*/
    
        /*nop_min_value = parseInt(min_nop / 12);
        nop_max_value = parseInt(max_nop / 12);*/

        if(old_repayment_freq == 'Quarterly'){
           
           nop_default_value = parseInt(default_nop *3 / 12);
           nop_min_value = parseInt(min_nop * 3 / 12);
           nop_max_value = parseInt(max_nop * 3 / 12);

        } else if(old_repayment_freq == 'Monthly'){
           
            nop_default_value = parseInt(default_nop / 12);
            nop_min_value = parseInt(min_nop / 12);
            nop_max_value = parseInt(max_nop / 12);

        }else if(old_repayment_freq == 'Weekly'){   
         
           nop_default_value = parseInt(default_nop * 1/52);
           nop_min_value = parseInt(min_nop * 12/ 52 / 12);
           nop_max_value = parseInt(max_nop * 12/ 52 / 12);

        }else if(old_repayment_freq == 'Fortnight'){   
         
           nop_default_value = parseInt(default_nop * 1/26);
           nop_min_value = parseInt(min_nop * 12/ 26 / 12);
           nop_max_value = parseInt(max_nop * 12/ 26 / 12);

        }else{

           nop_min_value = parseInt(min_nop / 1);
           nop_max_value = parseInt(max_nop / 1);
           nop_default_value = default_nop;
        }
  }


   if (frp_option === 'Weekly') {
       /* nop_default_value = parseInt(default_nop / 1);*/

        if(old_repayment_freq == 'Quarterly'){
           
           nop_default_value = parseInt(default_nop * 52 / 4);          
           nop_min_value = parseInt(min_nop * 12 / 4 * 52 / 12);
           nop_max_value = parseInt(max_nop * 12 / 4 * 52 / 12);


        }else if(old_repayment_freq == 'Yearly'){             

           nop_default_value = parseInt(default_nop * 52);
           nop_min_value = parseInt(min_nop * 12 * 52 / 12);
           nop_max_value = parseInt(max_nop * 12 * 52 / 12);

        }else if(old_repayment_freq == 'Monthly'){            

           nop_default_value = parseInt(default_nop * 52 / 12);  
           nop_min_value = parseInt(min_nop * 52 / 12);
           nop_max_value = parseInt(max_nop * 52 / 12);

        }else if(old_repayment_freq == 'Fortnight'){  

           nop_default_value = parseInt(default_nop * 52 / 26);  
           nop_min_value = parseInt(min_nop * 12 / 26 * 52 / 12);
           nop_max_value = parseInt(max_nop * 12 / 26 * 52 / 12);

        }else{
          
          nop_min_value = parseInt(min_nop);
          nop_max_value = parseInt(max_nop);
          nop_default_value = default_nop;
        }
   }


   if (frp_option === 'Fortnight') {
       /* nop_default_value = parseInt(default_nop / 1);*/

        if(old_repayment_freq == 'Quarterly'){           
           

           nop_default_value = parseInt(default_nop * 26 / 4);          
           nop_min_value = parseInt(min_nop * 12 / 4 * 26 / 12);
           nop_max_value = parseInt(max_nop * 12 / 4 * 26 / 12);


        }else if(old_repayment_freq == 'Yearly'){             

           nop_default_value = parseInt(default_nop * 26);
           nop_min_value = parseInt(min_nop * 12 * 26 / 12);
           nop_max_value = parseInt(max_nop * 12 * 26 / 12);

        }else if(old_repayment_freq == 'Monthly'){            

           nop_default_value = parseInt(default_nop * 26 / 12);  
           nop_min_value = parseInt(min_nop * 26 / 12);
           nop_max_value = parseInt(max_nop * 26 / 12);

        }else if(old_repayment_freq == 'Weekly'){            

           nop_default_value = parseInt(default_nop * 26 / 52);  
           nop_min_value = parseInt(min_nop * 12 / 52 * 26 / 12);
           nop_max_value = parseInt(max_nop * 12 / 52 * 26 / 12);

        }else{
          nop_min_value = parseInt(min_nop);
          nop_max_value = parseInt(max_nop);
          nop_default_value = default_nop;
        }
   }




  nop_values_array['nop_default_value'] = nop_default_value;
  nop_values_array['nop_min_value'] = nop_min_value;
  nop_values_array['nop_max_value'] = nop_max_value;

  return nop_values_array;
}


function cal_advance_loan_amount_by_frequency_val(frp_option,actual_loan_amount,interest_rates){
   var adv_loan_amount = 0;
    if(frp_option == 'Monthly'){
     adv_loan_amount = actual_loan_amount- parseInt(actual_loan_amount*interest_rates/(100 * 12));
    }
    if(frp_option == 'Quarterly'){
     adv_loan_amount = actual_loan_amount- parseInt(actual_loan_amount*interest_rates/(100 * 4));
    }
     if(frp_option == 'Yearly'){
     adv_loan_amount = actual_loan_amount- parseInt(actual_loan_amount*interest_rates/(100 * 1));
    }
     if(frp_option == 'Weekly'){
     adv_loan_amount = actual_loan_amount- parseInt(actual_loan_amount*interest_rates/(100 * 52));
    }
     if(frp_option == 'Fortnight'){
     adv_loan_amount = actual_loan_amount- parseInt(actual_loan_amount*interest_rates/(100 * 26));
    } 


    return adv_loan_amount;
}