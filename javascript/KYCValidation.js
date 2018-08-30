/*
Author: Satya Prakash Nandy
Objective : To validate KYC Form (Image Size And Format) & Enable and Disable extra option in KYC Form
*/
$(document).ready(function(){
	$("#organization_name").hide();
	$("#organization_relationship").hide();
	$('input[type=radio][name=rwo]').change(function(){
		if(this.value=="no")
		{
			$("#organization_name").hide();
			$("#organization_relationship").hide();
		}
		else
		{
			$("#organization_name").show();
			$("#organization_relationship").show();
		}
	});
	/*$(".pic_url").change(function(){
		if((this.files[0].size>200000) || (this.files[0].type!="image/jpeg"))
		{
			$(".pic_error").show();
			$(".submit").prop('disabled', true);
		}
		else
		{
			$(".pic_error").hide();
			if(getFile())
				$(".submit").prop('disabled', false);
		}
	});
	$(".adhar_url").change(function(){
		if((this.files[0].size>200000) || (this.files[0].type!="image/jpeg"))
		{
			$(".adhar_error").show();
			$(".submit").prop('disabled', true);
		}
		else
		{
			$(".adhar_error").hide();
			if(getFile())
				$(".submit").prop('disabled', false);
		}
	});
	$(".pan_url").change(function(){
		if((this.files[0].size>200000) || (this.files[0].type!="image/jpeg"))
		{
			$(".pan_error").show();
			$(".submit").prop('disabled', true);
		}
		else
		{
			$(".pan_error").hide();
			if(getFile())
				$(".submit").prop('disabled', false);
		}
	});*/
});
function getFile()
{
	var pan_url = document.getElementById("pan_url");
	var adhar_url = document.getElementById("adhar_url");
	var pic_url = document.getElementById("pic_url");
	if(pan_url.files[0].size>200000 || adhar_url.files[0].size>200000 || pic_url.files[0].size>200000 || pan_url.files[0].type!="image/jpeg" || adhar_url.files[0].type!="image/jpeg" || pic_url.files[0].type!="image/jpeg")
	{
	
		return false;
	}
	else
	{
		return true;
	}
}
function checkVoterId()
{
	var voter_url = document.getElementById("voterid_url");
	if(voter_url.value.length>0)
	{
		if(voter_url.files[0].size>200000 || voter_url.files[0].type!="image/jpeg")
		{
			document.getElementById("voterid_error").style.display = "table-row";
			return false;
		}
		else
		{
			return true;
		}
	}
	else
	{
		return true;
	}
}