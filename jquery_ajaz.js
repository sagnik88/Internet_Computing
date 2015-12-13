 
$(document).ready(function(){
var url="api2.php";





$.getJSON(url,function(json){



// loop through the members here
var trHTML = '';

$.each(json,function(i,dat){

/*
$("#msg").append('<tr><td>'+dat.lease_owner+'</td>'+
'<td>'+dat.request_poster+'</td>'+
'<td>'+dat.email+'</td>'+
'<td>'+dat.address+'</td>'+
'<td>'+dat.start_date+'</td>'+
'<td>'+dat.end_date+'</td>'+
'<td>'+dat.expected_rent+'</td>'+
'<td>'+dat.is_deposit+'</td>'+
'<td>'+dat.notes+'</td></tr>'
); 
*/


trHTML +='<tr><td>'+dat.lease_owner+'</td>'+
'<td>'+dat.request_poster+'</td>'+
'<td>'+dat.email+'</td>'+
'<td>'+dat.address+'</td>'+
'<td>'+dat.start_date+'</td>'+
'<td>'+dat.end_date+'</td>'+
'<td>'+dat.expected_rent+'</td>'+
'<td>'+dat.is_deposit+'</td>'+
'<td>'+dat.notes+'</td></tr>';


});

$("#msg").append(trHTML);
});
});