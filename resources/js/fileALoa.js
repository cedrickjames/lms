
import $ from 'jquery';
window.$ = window.jQuery = $;

import './bootstrap';

import 'flowbite';

import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/jquery.dataTables.css'
import select2 from 'select2';
import 'select2/dist/css/select2.css';

select2($);

$(document).ready(function() {
        let table = new DataTable('#myTable', {
    responsive: true
});
   $('#sidebarListOfLoa').addClass('activeNav');
   $('#sidebarDashboard').removeClass('activeNav');

      $('#overallNav').addClass('activeNavChild');
//    $('#sidebarDashboard').removeClass('activeNav');


$('.select2').select2();



});