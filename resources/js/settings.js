
import $ from 'jquery';
window.$ = window.jQuery = $;

import './bootstrap';

import 'flowbite';

import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/jquery.dataTables.css';
import select2 from 'select2';
import 'select2/dist/css/select2.css';


select2($);

$('.select2').select2();

// resources/js/settings.js



window.openAddModal = function () {
    
 var username = $('#accountHolderAdd').find(':selected').data('accout-holder-user-name');
$('#accountHolderUserNameAdd').val(username);

 var accountHolderName = $('#accountHolderAdd').find(':selected').data('accout-holder-name');
$('#accountHolderNameAdd').val(accountHolderName);

 var accountHolderEmail = $('#accountHolderAdd').find(':selected').data('accout-holder-email');
$('#accountHolderEmailAdd').val(accountHolderEmail);


}

$('#accountHolderAdd').on('change', function () {
 var username = $('#accountHolderAdd').find(':selected').data('accout-holder-user-name');
$('#accountHolderUserNameAdd').val(username);

 var accountHolderName = $('#accountHolderAdd').find(':selected').data('accout-holder-name');
$('#accountHolderNameAdd').val(accountHolderName);

 var accountHolderEmail = $('#accountHolderAdd').find(':selected').data('accout-holder-email');
$('#accountHolderEmailAdd').val(accountHolderEmail);

});
window.openEditModal = function (button) {
  const supplierId = button.getAttribute('data-id');
  const supplierName = button.getAttribute('data-supplier');
  const userId = button.getAttribute('data-user-id');
  

  document.getElementById('supplierId').value = supplierId;
  document.getElementById('supplierName').value = supplierName;

  document.getElementById('supplierNameOld').value = supplierName;
  document.getElementById('supplierAccountHolderOld').value = userId;




$('#accountHolder').val(userId).trigger('change');

 var username = $('#accountHolder').find(':selected').data('accout-holder-user-name');
$('#accountHolderUserName').val(username);

 var accountHolderName = $('#accountHolder').find(':selected').data('accout-holder-name');
$('#accountHolderName').val(accountHolderName);

 var accountHolderEmail = $('#accountHolder').find(':selected').data('accout-holder-email');
$('#accountHolderEmail').val(accountHolderEmail);

};




$('#accountHolder').on('change', function () {
 var username = $('#accountHolder').find(':selected').data('accout-holder-user-name');
$('#accountHolderUserName').val(username);

 var accountHolderName = $('#accountHolder').find(':selected').data('accout-holder-name');
$('#accountHolderName').val(accountHolderName);

 var accountHolderEmail = $('#accountHolder').find(':selected').data('accout-holder-email');
$('#accountHolderEmail').val(accountHolderEmail);
})

$(document).ready(function() {
   





  let tableSuppliers = new DataTable('#myTableSupplier', {
    responsive: true,
    pageLength: 3000,
    responsive: true,
             scrollCollapse: false,
             
    scrollY: '50vh'
});
        
setTimeout(() => {
    const toast = document.getElementById('toast-success');
     if (toast) toast.style.display = 'none';
     }, 5000); // 5 seconds

     
        let table = new DataTable('#myTable', {
    responsive: true
});
   $('#sidebarSettings').addClass('activeNav');
   $('#sidebarDashboard').removeClass('activeNav');

   const activeNavId = $('#activeNavSettings').val();
   $('#' + activeNavId).addClass('activeSettings');


//    $('#sidebarDashboard').removeClass('activeNav');





});