
import $ from 'jquery';
window.$ = window.jQuery = $;

import './bootstrap';

import 'flowbite';

import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/jquery.dataTables.css'


$(document).ready(function() {

        
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