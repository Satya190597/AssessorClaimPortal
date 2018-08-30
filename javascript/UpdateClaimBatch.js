function updateClaim(id){
	var data = {};
	data['ID']			= $("#"+id+"ID").val();
	data['name']		= $("#"+id+"batch").val();
	data['sector']		= $("#"+id+"sector").val();
	data['trade']		= $("#"+id+"trade").val();
	data['candidate']	= $("#"+id+"candidate").val();
	data['amount']		= $("#"+id+"amount").val();
	console.log(data);
	$.post("updateClaim.php",data,function(result,status){
		console.log(result+" "+status);
	});
}