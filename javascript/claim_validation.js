function getValue(element)
{
	return document.getElementById(element).value;
}
function addBatchValidation()
{
	if(getValue('claim_batch')=="" || getValue('claim_sector')=="" || getValue('claim_trade')=="" || getValue('claim_date')=="" || getValue('claim_candidate')=="" || getValue('claim_amount')=="")
		return false;
	else
		return true;
}