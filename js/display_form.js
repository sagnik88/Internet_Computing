 
 
 
 
$(document).ready(function(){
	
	
	$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return $.getUrlVars()[name];
  }
});

// Get object of URL parameters
var allVars = $.getUrlVars();

// Getting URL var by its nam
var byName = $.getUrlVar('Item_id')
	
	
	//alert(byName);
var url="display_form.php?Item_id="+byName;
$.getJSON(url,function(json){
// loop through the members here
$.each(json,function(i,dat){
$("#msg").append(


'<tr rowspan="4">'+'<td colspan="2">'+
'<div style="height: 250px">'+



                '<img style="width: 100%;max-height: 100%" src="data:image;base64,'+dat.file+'"/>'+'</div>'+

       






'</td>'+'</tr>'+

'<tr  >'+
  '<td class="requiredLabel">Lease Owner:</td>'+
  '<td >'
  +dat.lease_owner+'</td>'+
'</tr>'+
'<tr  >'+
  '<td >Address.:</td>'+
  '<td >'+dat.address+'</td>'+
'</tr>'+
	'<tr>'+
	  '<td >'+'<label>Accomodation Type</label>'+'</td>'+
		'<td>'+dat.type+'</td>'+
	'</tr>'+
	'<tr>'+
	  '<td >'+
	  '<label>From Date</label>'
	  +'</td>'+'<td>'+dat.start_date+'</td>'+
	  '</tr>'+
	  '<tr>'+'<td >'+
'<label>To Date</label>'+'</td>'+'<td>'+dat.end_date+'</td>'+'</tr>'+'<tr>'+'<td >Expected Rent</td>'+
'<td>'+dat.rent+'</td>'+'</tr>'+'<tr>'+'<td >Deposit</td>'+
'<td>'+dat.is_deposit+'</td>'+'</tr>'+
'<tr>'+'<td >'+'<label >Notes</label>'+'</td>'+
'<td>'+dat.notes+'</td>'+'</tr>'


);
});
});
});