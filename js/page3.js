

function checkdate()
{

	if(document.Form.app.value==2)
	{
		alert('This Leave Can not Update');
		return false;
	}
	else
	{
		get_element("c_from").className = "tfvNormal";
		get_element("c_to").className = "tfvNormal";

		var date1st=document.Form.fld_from.value;
		var array1=date1st.split("-");
		var date2nd=document.Form.fld_to.value;
		var array2=date2nd.split("-");
		var expire1=new Date(array1[2],array1[1],array1[0]);
		var expire2=new Date(array2[2],array2[1],array2[0]);
	
		if (expire1.getTime()>expire2.getTime())
		{
			alert("From Date cannot be greater than To Date");	
			get_element("c_from").className ="tfvHighlight";
			get_element("c_to").className ="tfvHighlight";
			return false;
		}
		var m=v.exec()
		if(m==true)
		{
		///////////////////////////	
		}
		else
		{
			return false;
		}
//		return v.exec()
	}
}

function datepic1()
{
	alert(document.Form.fld_from_date);
	
	var Planned_From_date=document.Form.fld_from_date;
	var cal1 = new calendar2(Planned_From_date);
	cal1.year_scroll = true;
	cal1.time_comp = false;
	cal1.popup();
	//document.Form.fld_days.value=document.Form.fld_days_check.value;
}

function datepic2()
{
	var Planned_From_date1=document.getElementById("fld_from");//document.Form.fld_from;
	var cal1 = new calendar2(Planned_From_date1);
	cal1.year_scroll = true;
	cal1.time_comp = false;
	cal1.popup();
	//document.Form.fld_days.value=document.Form.fld_days_check.value;
}

function datepic3()
{
	var Planned_From_date2=document.Form.fld_to;
	var cal1 = new calendar2(Planned_From_date2);
	cal1.year_scroll = true;
	cal1.time_comp = false;
	cal1.popup();
	document.Form.fld_days.value=document.Form.fld_days_check.value;
	leave_balance([Currentstaff_id,QueryString],'[fld_to,Form]');
}




//window.onload = mid;
// JavaScript Document