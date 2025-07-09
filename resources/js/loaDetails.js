
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
      responsive: true,
        pageLength: 3000,
    responsive: true,
             scrollCollapse: false,
             
    scrollY: '50vh'
});
   $('#sidebarListOfLoa').addClass('activeNav');
   $('#sidebarDashboard').removeClass('activeNav');

    //   $('#overallNav').addClass('activeNavChild');
//    $('#sidebarDashboard').removeClass('activeNav');

    const status = document.getElementById('loa-status').value;
    if(status =="Approaching the Deadline"){
        
         $('#approachingNav').addClass('activeNavChildApproaching');
    }
    else if(status =="Overdue"){
        $('#overdueNav').addClass('activeNavChildOverdue');
    }
    else{
        $('#overallNav').addClass('activeNavChild');
    }
});