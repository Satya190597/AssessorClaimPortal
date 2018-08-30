/*
Author: Satya Prakash Nandy
Technology : AngularJS
Objective : To Fetch Data (KYC,CLAIM) & To Insert Data(CLAIM)
*/
var app=angular.module("assessor",[]);
app.controller("mycontroller",function($scope,$http,$document,$window){

	$scope.alluser = {},
	$scope.claimpending = {}
	$scope.claimapproved = {}
	$scope.sendData = {};
	$scope.request = {};
	$scope.kyc = {};
	$scope.claimTrcaker = {};
	$scope.reply = {};
	$scope.allclaim = {};
	
	$scope.noamount;
	$scope.nocandidates;
	$scope.totalclaim;
	$scope.messageblockUnblock;
	
	$http.get("process.php?function=10").then(function(response){
	$scope.alluser = response.data;
	},function(error)
	{

	});
	
	$scope.getAllRequest = function()
	{
		$http.get("process.php?function=5").then(function(response){
		$scope.request = response.data;
		},function(error)
		{
	
		});
	}
	
	$scope.getAllClaim = function()
	{
		$scope.allclaim = {};
		$http.get("process.php?function=12").then(function(response){
			$scope.allclaim = response.data;
		},function(error){
		
		});
	}
	
	$scope.getApprove = function()
	{
		$scope.claimpending = {};
		$http.get("process.php?function=1").then(function(response){
		$scope.claimpending = response.data;
		},function(error)
		{

		});
	}
	$scope.getKYC = function(adhar)
	{
		$scope.kyc = {};
		$http.get("process.php?function=6&adhar="+adhar).then(function(response){
		$scope.kyc = response.data;
		},function(error)
		{

		});
	}
	$scope.getDeapprove = function()
	{
		$scope.claimapproved = {};
		$http.get("process.php?function=2").then(function(response){
			$scope.claimapproved = response.data;
		},function(error)
		{

		});
	}
	$scope.approvedClaim = function(id){
		$http.get("process.php?function=3&claimid="+id).then(function(response){
			$scope.getApprove();
			$scope.getApprove();
		},function(error)
		{

		});
	}
	$scope.deapprovedClaim = function(id){
		$http.get("process.php?function=4&claimid="+id).then(function(response){
			$scope.getDeapprove();
			$scope.getDeapprove();
		},function(error)
		{

		});
	}
	$scope.getClaimTracker = function(adhar,mydate){
		var tempdate = new Date(mydate);
		var month = (tempdate.getMonth()+1);
		var myday = tempdate.getDate()+"";
		var myyear = tempdate.getFullYear()+"";
		var finaldate = myyear+"-"+month+"-"+myday;
		$http.get("process.php?function=7&adhar="+adhar+"&month="+month+"&year="+myyear).then(function(response){
		$scope.claimTrcaker = response.data;
		$scope.noamount = $scope.claimTrcaker[0].totalamount;
		$scope.nocandidates = $scope.claimTrcaker[0].totalcandidates;
		$scope.totalclaim = $scope.claimTrcaker[0].total;
		},function(error)
		{

		});
	}
	$scope.block = function(adhar)
	{
		$http.get("process.php?function=8&adhar="+adhar).then(function(response){
			$scope.messageblockUnblock = response.data.message;
		},function(error)
		{

		});
	}
	$scope.unblock = function(adhar)
	{
		$http.get("process.php?function=9&adhar="+adhar).then(function(response){
			$scope.messageblockUnblock = response.data.message;
		},function(error)
		{

		});
	}
	
	// Description : Used to send a reply to a particular user
	
	$scope.sendReply = function(adhar,requestId)
	{
		$scope.reply.adhar = adhar;
		$scope.reply.reply = $document[0].getElementById("reply_"+adhar).value;
		$scope.reply.requestId = requestId;

		$http.post("sendReply.php",$scope.reply).then(function(response){
			alert('Reply send successfully !');
			$document[0].getElementById("reply_"+adhar).value = "";
			$scope.reply = {};
			$scope.getAllRequest();
		},function(error)
		{
		});
		
	}
	$scope.DeleteImage = function(adhar,field,url)
	{
		if(confirm("Select Ok To Confirm !"))
		{
			$http.get("process.php?function=11&adhar="+adhar+"&field="+field+"&url="+url).then(function(reponse){
				$window.location.href="http://assessor.competency.co.in/admindashboard.php?message=Data Deleted&navigate=update";
			},function(error)
			{
			});
		}
	}
	$scope.DeleteClaim = function(claimid)
	{
		if(confirm("Select Ok To Confirm !"))
		{
			$http.get("process.php?function=13&claimid="+claimid).then(function(response){
			
				alert("Calim Deleted Successfully!");
				$scope.getAllClaim();
				
			},function(error){
			
			});
		}
	}
});