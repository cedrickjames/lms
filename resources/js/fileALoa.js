
import $ from 'jquery';
window.$ = window.jQuery = $;

import './bootstrap';

import 'flowbite';

import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/jquery.dataTables.css'
import select2 from 'select2';
import 'select2/dist/css/select2.css';

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

select2($);

$(document).ready(function() {


    
setTimeout(() => {
    const toast = document.getElementById('toast-success');
     if (toast) toast.style.display = 'none';
     }, 5000); // 5 seconds



        let table = new DataTable('#myTable', {
    responsive: true
});
   $('#sidebarFileALoa').addClass('activeNav');
   $('#sidebarDashboard').removeClass('activeNav');

    //   $('#overallNav').addClass('activeNavChild');
//    $('#sidebarDashboard').removeClass('activeNav');






$('#supplier').on('change', function () {
 var accountHolderId = $(this).find(':selected').data('account-holder');

// $('#accountHolder').val(accountHolderId).trigger('change');

$('#accountHolder option').each(function () {
    if ($(this).data('account-holder-id') == accountHolderId) {
        $(this).prop('selected', true);
        
        $('#accountHolder').trigger('change.select2'); // Trigger Select2 update if needed
        return false; // Exit loop once found
    }
});

$('#accountHolderEmail option').each(function () {
    if ($(this).data('account-holder-email-id') == accountHolderId) {
        $(this).prop('selected', true);
        
        $('#accountHolderEmail').trigger('change.select2'); // Trigger Select2 update if needed
        return false; // Exit loop once found
    }
});


// $('#accountHolderEmail').val(accountHolderId).trigger('change');


 });



$('#accountHolder').on('change', function () {

        var accountHolderEmail = $('#accountHolder').find(':selected').data('account-holder-id');
        console.log("ceaeas0", accountHolderEmail)

        $('#accountHolderEmail option').each(function () {
            if ($(this).data('account-holder-email-id') == accountHolderEmail) {
                $(this).prop('selected', true);
        
                $('#accountHolderEmail').trigger('change.select2'); // Trigger Select2 update if needed
                return false; // Exit loop once found
    }
});


    var selectedDept = $(this).find(':selected').data('account-holder-department');

    // Store all options initially (if not already stored)
    if (!$('#accountHolderDeptHead').data('all-options')) {
        $('#accountHolderDeptHead').data('all-options', $('#accountHolderDeptHead option').clone());
    }

    var allOptions = $('#accountHolderDeptHead').data('all-options');
    var filteredOptions = allOptions.filter(function () {
        return $(this).data('account-head-department') == selectedDept;
    });

    $('#accountHolderDeptHead').empty().append(filteredOptions).trigger('change.select2');

    var accountHolderIdDept = $('#accountHolderDeptHead').find(':selected').data('account-head-department-id');

    $('#accountHolderDeptHeadEmail').val(accountHolderIdDept).trigger('change');

    


});


$('#accountHolderDeptHead').on('change', function () {
var accountHolderIdDept = $(this).val()

    $('#accountHolderDeptHeadEmail').val(accountHolderIdDept).trigger('change');

});

// $('#accountHolder').on('change', function () {
// var accountHolderId = $(this).val()

//     $('#accountHolderEmail').val(accountHolderId).trigger('change');

// });



$('.select2').select2();


flatpickr("#expiry", {
 dateFormat: "F j, Y", // e.g., June 20, 2025
});
flatpickr("#deadline", {
 dateFormat: "F j, Y", // e.g., June 20, 2025
});
flatpickr("#personIncharge", {
 dateFormat: "F j, Y", // e.g., June 20, 2025
});


});

