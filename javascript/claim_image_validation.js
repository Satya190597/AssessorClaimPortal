$(document).ready(function(){
	$(".pic_error").hide();
	$(".claim_pic").change(function(){
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
});