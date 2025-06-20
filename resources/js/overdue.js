
import $ from 'jquery';
window.$ = window.jQuery = $;

import './bootstrap';

import 'flowbite';

import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/jquery.dataTables.css'


$(document).ready(function() {
        let table = new DataTable('#myTable', {
    responsive: true
});
   $('#sidebarListOfLoa').addClass('activeNav');
   $('#sidebarDashboard').removeClass('activeNav');

      $('#overdueNav').addClass('activeNavChildOverdue');
//    $('#sidebarDashboard').removeClass('activeNav');


});