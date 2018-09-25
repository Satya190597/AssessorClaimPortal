$(document).ready(function(){
	$(".pic_error").hide();
	$(".claim_pic").change(function(){
		if(this.files[0].size<=2000000)
		{
			$(".pic_error").hide();
			$(".submit").prop('disabled', false);
		}
		else
		{
			$(".pic_error").show();
			$(".submit").prop('disabled', true);
		}
	});
});