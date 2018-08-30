function updateClaim(id){
	var data = {};
	data['ID']			= $("#"+id+"ID").val();
	data['batch']		= $("#"+id+"batch").val();
	data['sector']		= $("#"+id+"sector").val();
	data['trade']		= $("#"+id+"trade").val();
	data['date']		= $("#"+id+"date").val();
	data['candidate']	= $("#"+id+"candidate").val();
	data['amount']		= $("#"+id+"amount").val();
	console.log(data);
	$.post("updateClaim.php",data,function(result,status){
		var message = (result=='success' && status=='success') ? 'Data Updated Successfully !' : 'Something Went Wrong !';
		alert(message);
	});
}
