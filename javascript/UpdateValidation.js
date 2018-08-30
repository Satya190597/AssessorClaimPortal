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
	$(".pic_url").change(function(){
		if((this.files[0].size>200000) || (this.files[0].type!="image/jpeg"))
		{
			$(".pic_error").show();
			$(".submit").prop('disabled', true);
		}
		else
		{
			$(".pic_error").hide();
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
			$(".submit").prop('disabled', false);
		}
	});
	$(".voterid_url").change(function(){
		if((this.files[0].size>200000) || (this.files[0].type!="image/jpeg"))
		{
			$(".voterid_error").show();
			$(".submit").prop('disabled', true);
		}
		else
		{
			$(".voterid_error").hide();
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
			$(".submit").prop('disabled', false);
		}
	});
});