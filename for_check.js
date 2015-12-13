 
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
+
'<td><a href="register.php?Item_id='+dat.request_id+'>View</a></td></tr>'
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
'<td>'+dat.notes+'</td>'+
'<td><a href="page.php?Item_id='+dat.request_id+'">View</a></td>'
+
'<td><a href="update.php?Item_id='+dat.request_id+'">Update</a></td>'
+
'<td><a href="delete.php?Item_id='+dat.request_id+'">Delete</a></td>'
+'</tr>';


});

$("#msg").append(trHTML);
});
});