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