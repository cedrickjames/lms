
import $ from 'jquery';
window.$ = window.jQuery = $;

import './bootstrap';

import 'flowbite';

import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/jquery.dataTables.css'


$(document).ready(function() {
        let table = new DataTable('#myTable', {
      responsive: true,
        pageLength: 3000,
    responsive: true,
             scrollCollapse: false,
             
    scrollY: '50vh'
});
   $('#sidebarListOfLoa').addClass('activeNav');
   $('#sidebarDashboard').removeClass('activeNav');

      $('#approachingNav').addClass('activeNavChildApproaching');
//    $('#sidebarDashboard').removeClass('activeNav');


});