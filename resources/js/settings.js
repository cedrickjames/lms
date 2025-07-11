
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




window.populateEditForm = function (button) {
    document.getElementById('userNameSettings').value = button.getAttribute('data-user-name');
    document.getElementById('fullNameSettings').value = button.getAttribute('data-full-name');
    document.getElementById('emailSettings').value = button.getAttribute('data-email');
    $('#departmentSetting').val(button.getAttribute('data-department')).trigger('change');
    $('#typeSettings').val(button.getAttribute('data-usertype')).trigger('change');

          
      const status = button.getAttribute('data-status');
        const statusSwitch = document.getElementById('statusSwitch');
        statusSwitch.checked = status === '1';



    // Optionally store user ID in a hidden field if needed for update
    document.getElementById('userIdSettings').value = button.getAttribute('data-user-id');
}



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





window.openEditTypeOfLoaModal = function (button) {
  const requirements = JSON.parse(button.getAttribute('data-requirements'));
  console.log(requirements);

  
// Uncheck all checkboxes first
   document.querySelectorAll('input[name="requirements[]"]').forEach(checkbox => {
   checkbox.checked = false;
   });


   
// Check only the ones in the array
   requirements.forEach(reqId => {
  console.log(reqId);

   const checkbox = document.getElementById(reqId);
  if (checkbox) {
   checkbox.checked = true;
   }

  });


  
  //  <input type="hidden" name="typeOfLoaIdOld" id="typeOfLoaIdOld">
  //               <input type="hidden" name="typeOfLoaNameOld" id="typeOfLoaNameOld">
  //               <input type="hidden" name="typeOfLoaNameIdOld" id="typeOfLoaNameIdOld">
  //               <input type="hidden" name="typeOfLoaLegendOld" id="typeOfLoaLegendOld"></input>



   const typeId = button.getAttribute('data-id');
  const typeNameId = button.getAttribute('data-typeId');
  const typeName = button.getAttribute('data-typeName');
  const legend = button.getAttribute('data-legend');

  
    document.getElementById('typeNameEdit').value = typeName;
  document.getElementById('typeIdEdit').value = typeNameId;
  document.getElementById('legendEdit').value = legend;

    document.getElementById('typeOfLoaIdOld').value = typeId;
    document.getElementById('typeOfLoaNameOld').value = typeName;
    document.getElementById('typeOfLoaNameIdOld').value = typeNameId;
    document.getElementById('typeOfLoaLegendOld').value = legend;





  

}

window.openEditRequirementModal = function (button) {

   const requirementId = button.getAttribute('data-id');
  const requirementName = button.getAttribute('data-requirementName');
  const requirementNameId = button.getAttribute('data-requirementId');
  
  

  //  <input type="hidden" name="requirementId" id="requirementId">
  //               <input type="hidden" name="requirementNameOld" id="requirementNameOld">
  //               <input type="hidden" name="requirementNameIdOld" id="requirementNameIdOld">

  document.getElementById('requirementIdOld').value = requirementId;
    document.getElementById('requirementNameOld').value = requirementName;
  document.getElementById('requirementNameIdOld').value = requirementNameId;

  document.getElementById('requirementNameEdit').value = requirementName;
  document.getElementById('requirementIdEdit').value = requirementNameId;




}
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
   



  
    

  let tableUsers= new DataTable('#myTableUsers', {
    responsive: true,
    pageLength: 3000,
    responsive: true,
             scrollCollapse: false,
             
    scrollY: '50vh'
});

  let tableTypeOfLoa = new DataTable('#myTableTypeOfLoa', {
    responsive: true,
    pageLength: 3000,
    responsive: true,
             scrollCollapse: false,
             
    scrollY: '50vh'
});

  let tableSuppliers = new DataTable('#myTableSupplier', {
    responsive: true,
    pageLength: 3000,
    responsive: true,
             scrollCollapse: false,
             
    scrollY: '50vh'
});

  let tableRequirement = new DataTable('#myTableRequirement', {
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