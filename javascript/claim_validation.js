function getValue(element)
{
	return document.getElementById(element).value;
}
function addBatchValidation()
{
	if(getValue('claim_batch')=="" || getValue('claim_sector')=="" || getValue('claim_trade')=="" || getValue('claim_date')=="" || getValue('claim_candidate')=="" || getValue('claim_amount')=="")
	{
		alert('Complete All The Batch Details Before Adding A New Batch !');
		return false;
	}	
	else
	{
		return true;
	}
}
function addClaimValidation()
{
	if(getValue('lessbalance_cliam')=="" || getValue('projectclaimunder_claim')=="" || getValue('baselocation_claim')=="" || getValue('forMonthOf')=="" || getValue('date_claim')=="" || getValue('destinationlocation_claim')=="")
	{
		alert('Complete All The Claim Details Before Submition !');
		return false;
	}
	else
	{
		return true;
	}
}
function enable(id)
{
	var batch = id+"batch";
	var sector = id+"sector";
	var trade = id+"trade";
	var date = id+"date";
	var candidate = id+"candidate";
	var amount = id+"amount";
	var update = id+"update";
	document.getElementById(batch).disabled=!document.getElementById(batch).disabled;
	document.getElementById(sector).disabled=!document.getElementById(sector).disabled;
	document.getElementById(trade).disabled=!document.getElementById(trade).disabled;
	document.getElementById(date).disabled=!document.getElementById(date).disabled;
	document.getElementById(candidate).disabled=!document.getElementById(candidate).disabled;
	document.getElementById(amount).disabled=!document.getElementById(amount).disabled;
	document.getElementById(update).disabled=!document.getElementById(update).disabled;
}