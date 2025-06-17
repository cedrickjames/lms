
import $ from 'jquery';
window.$ = window.jQuery = $;

import './bootstrap';

import 'flowbite';

import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/jquery.dataTables.css'


$(document).ready(function() {
    let table = new DataTable('#myTable', {
    responsive: true,
     scrollY: '11vh'
});

    let table2 = new DataTable('#myTable2', {
    responsive: true,
     scrollY: '11vh'
});

    let table3 = new DataTable('#myTable3', {
    responsive: true,
     scrollY: '11vh'
});

    let table4 = new DataTable('#myTable4', {
    responsive: true,
     scrollY: '11vh'
});

});