<!---------------------------------------------------------------------------
Example client script for JQUERY:AJAX -> PHP:MYSQL example
---------------------------------------------------------------------------->

<html>
  <head>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
  </head>
  <body>

  <!-------------------------------------------------------------------------
  1) Create some html content that can be accessed by jquery
  -------------------------------------------------------------------------->
  <h2> Client example </h2>
  <h3>Output: </h3>
  <div id="msg">this will be the element that will be accessed by jquery and this text will be replaced</div>

<script type="text/javascript">
 
$(document).ready(function(){
var url="api2.php";


var tr_tags = $("<tr>");
var table_tags = $("<table>");
var tr_close = $("</tr>");
var table_close = $("</table>");


$.getJSON(url,function(json){

$("#msg").append('<table border="1"><tr><th>Lease Owner</th><th>Request Poster</th><th>email</th><th>address</th><th>start date</th><th>end date</th><th>expected rent</th><th>deposit</th><th>notes</th></tr></table>'
);

// loop through the members here

$.each(json,function(i,dat){
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
});


});
});
 
</script>


  </body>
</html>
