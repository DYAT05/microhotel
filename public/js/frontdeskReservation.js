    // script for date
    const check_in_date = document.getElementById('check_in_date');
    const check_out_date = document.getElementById('check_out_date');
    check_in_date.min = new Date().toISOString().split('T')[0];
    check_out_date.min = new Date().toISOString().split('T')[0];



    //  script for counting of nights
    const checkInDate = document.getElementById('check_in_date');
    const checkOutDate = document.getElementById('check_out_date');
    const numberOfNights = document.getElementById('number_of_nights');
    checkOutDate.addEventListener('change', function() {
      const oneDay = 24 * 60 * 60 * 1000; // hours * minutes * seconds * milliseconds
      const checkIn = new Date(checkInDate.value);
      const checkOut = new Date(checkOutDate.value);
      const diffDays = Math.round(Math.abs((checkOut - checkIn) / oneDay));
      numberOfNights.value = diffDays;
    });
  
    // script for add and suctract of extra_bed and additional_person
    function subtract(inputId) {
      var inputElement = document.getElementById(inputId);
      var currentValue = parseInt(inputElement.value);
      if (currentValue > 1) {
        inputElement.value = currentValue - 1;
      }
    }
    function add(inputId) {
      var inputElement = document.getElementById(inputId);
      var currentValue = parseInt(inputElement.value);
      // if(currentValue <= 6){
        inputElement.value = currentValue + 1;
      // }
    }



    // display room_types and room id


    $(document).ready(function() {
        // Listen for changes in the payment method radio buttons
        $('input[name=payment_method]').change(function() {
          if ($(this).val() === 'Cash') {
            // If cash is selected, unselect the department charge and hide its options
            $('input[name=payment_method_dept]').prop('checked', false);
            $('#department_charge_options').hide();
          } else if ($(this).val() === 'Department Charge') {
            // If department charge is selected, unselect the cash and show its options
            $('input[name=payment_method_cash]').prop('checked', false);
            $('#department_charge_options').show();
          }
        });
      });