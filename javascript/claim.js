/*
	Function : addTotal
	Parameter : no parameter.
	Use : calculate the total amount.
	author : satya prakash nandy.
*/
function addTotal()
{
	var sum = 0;
	var one = document.getElementById("amount_one").value;
	var two = document.getElementById("amount_two").value;
	var three = document.getElementById("amount_three").value;
	var four = document.getElementById("amount_four").value;
	var five = document.getElementById("amount_five").value;
	var six = document.getElementById("amount_six").value;
	
	if(one!="")
		sum+=parseInt(one);
	if(two!="")
		sum+=parseInt(two);
	if(three!="")
		sum+=parseInt(three);
	if(four!="")
		sum+=parseInt(four);
	if(five!="")
		sum+=parseInt(five);
	if(six!="")
		sum+=parseInt(six);
	document.getElementById("amount").value=sum;
	addbalance();
}
function addbalance()
{
	sum=0;
	var amount = document.getElementById("amount").value;
	var less = document.getElementById("less").value;
	if(less!="")
		sum=parseInt(amount)-parseInt(less);
	else
		sum=parseInt(amount)-0;
	document.getElementById("balance").value=sum;
}