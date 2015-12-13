window.onload = function(){

var mainForm = document.getElementById("mainForm");

//alert('1');

mainForm.onsubmit = function(e){
 var requiredInputs = document.querySelectorAll(".required");
 for (var i=0; i < requiredInputs.length; i++){
 if(isBlank(requiredInputs[i]) ){
 e.preventDefault();
 requiredInputs[i].style.backgroundColor="#AA0000";
 }
 }
}


        }







function isBlank(inputField){
    
    
    
    
 if (inputField.value=="" ){
     
     
 return true;
 }
    
    
    
    
 return false;
}

function OnChangeCheckbox()
{
    

if (document.getElementById("pos_name_check").checked == true)
{

if (document.getElementById("name").value!='')
{//alert('1');
document.getElementById("pos_name").value=document.getElementById("name").value;}

else 
{alert('Enter Name on Lease')}
    
}

if (document.getElementById("pos_name_check").checked == false)
{

document.getElementById("pos_name").value='';

    
}



}



function check_date()
{
	
	var passedDate1 = new Date(document.getElementById("start").value);
var passedDate2 = new Date(document.getElementById("end").value);


    
    var date1 = new Date(document.getElementById("start").value);
    //alert('date1');
//alert(document.GetElementById("start").value);
//alert(document.GetElementById("end").value);
if (passedDate1=='')
{
alert('Please enter start date');	
}

else if (passedDate1>passedDate2)
{
alert('Please enter correct dates');
}
}
