function setHeader(message)
{
	document.getElementById("mychangeheader").innerHTML=message;
}
var flagDate=true;
function checkImage()
{
	var ImageOne=document.getElementById("ImageOne");
	var ImageTwo=document.getElementById("ImageTwo");
	var ImageThree=document.getElementById("ImageThree");
	var ImageFour=document.getElementById("ImageFour");
	var ImageFive=document.getElementById("ImageFive");
	var ImageSix=document.getElementById("ImageSix");
	if(ImageOne.value.length>0)
	{
		if(ImageOne.files[0].size>500000)
		{
			document.getElementById("imageone_error").style.display = "block";
			return false;
		}
		else
		{
			document.getElementById("imageone_error").style.display = "none";
		}
	}
	if(ImageTwo.value.length>0)
	{
		if(ImageTwo.files[0].size>500000)
		{
			document.getElementById("imagetwo_error").style.display = "block";
			return false;
		}
		else
		{
			document.getElementById("imagetwo_error").style.display = "none";
		}
	}
	if(ImageThree.value.length>0)
	{
		if(ImageThree.files[0].size>500000)
		{
			document.getElementById("imagethree_error").style.display = "block";
			return false;
		}
		else
		{
			document.getElementById("imagethree_error").style.display = "none";
		}
	}
	if(ImageFour.value.length>0)
	{
		if(ImageFour.files[0].size>500000)
		{
			document.getElementById("imagefour_error").style.display = "block";
			return false;
		}
		else
		{
			document.getElementById("imagefour_error").style.display = "none";
		}
	}
	if(ImageFive.value.length>0)
	{
		if(ImageFive.files[0].size>500000)
		{
			document.getElementById("imagefive_error").style.display = "block";
			return false;
		}
		else
		{
			document.getElementById("imagefive_error").style.display = "none";
		}
	}
	if(ImageSix.value.length>0)
	{
		if(ImageSix.files[0].size>500000)
		{
			document.getElementById("imagesix_error").style.display = "block";
			return false;
		}
		else
		{
			document.getElementById("imagesix_error").style.display = "none";
		}
	}
	return true;
}
function checkDate()
{
	var months = ["JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER"];
	var monthOne = document.getElementById("forMonthOf").value;
	for(var i=0;i<12;i++)
	{
		if(monthOne == months[i])
		{
			monthOne = i+1;
			break;
		}
	}
	
	var dateTwo = new Date();
	/*var monthOne = dateOne.getMonth()+1;
	var yearOne = dateOne.getFullYear();
	var dayOne = dateOne.getDate();*/
	var dayTwo = dateTwo.getDate();
	var monthTwo = dateTwo.getMonth()+1;
	var yearTwo = dateTwo.getFullYear();
	console.log(monthTwo-monthOne+" "+dayTwo);
	if((monthTwo-monthOne==1) ||  (monthTwo-monthOne==0))
	{
		document.getElementById("claimsubmit").disabled=false;
		document.getElementById("date_error").style.display="none";
	}
	/*if(yearOne==yearTwo || monthOne==12)
	{
		if(monthOne+1==monthTwo)
		{
			flagDate=false;
			if(!flagDate)
				document.getElementById("claimsubmit").disabled=false;
			document.getElementById("date_error").style.display="none";
		}
		else if((monthOne==monthTwo || monthOne==12) && dayOne<=10)
		{
			flagDate=false;
			if(!flagDate)
				document.getElementById("claimsubmit").disabled=false;
			document.getElementById("date_error").style.display="none";
		}
		else
		{
			document.getElementById("claimsubmit").disabled=true;
			document.getElementById("date_error").style.display="block";
			flagDate=true;
		}
	}*/
	else
	{
		document.getElementById("claimsubmit").disabled=true;
		document.getElementById("date_error").style.display="block";
		flagDate=true;
	}
}