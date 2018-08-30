<?php
	include_once 'connection/connection.php';
	include_once 'class/controller.php';
	if(isset($_GET["function"]))
	{
		$function = $_GET["function"];
		switch ($function) {
			case '1':
				$object = new accessorOperations();
				echo $object->selectPendingClaims();
			break;
			case '2':
				$object = new accessorOperations();
				echo $object->selectApprovedClaims();
			break;
			case '3':
				if(isset($_GET["claimid"]))
					$object = new accessorOperations();
					$object->approvClaim($_GET["claimid"]);
			break;
			case '4':
				if(isset($_GET["claimid"]))
					$object = new accessorOperations();
					$object->deapprovClaim($_GET["claimid"]);
			break;
			case '5':
				$object = new accessorOperations();
				echo $object->request();
			break;
			case '6':
				if(isset($_GET["adhar"]))
					$object = new accessorOperations();
					echo $object->SelectKYCKJSON($_GET["adhar"]);
			break;
			case '7':
				if(isset($_GET["adhar"]))
					$object = new accessorOperations();
					echo $object->selectClaimsTracker($_GET["adhar"],$_GET["month"],$_GET["year"]);
			break;
			case '8':
				if(isset($_GET["adhar"]))
					$object = new accessorOperations();
					echo $object->block($_GET["adhar"]);
			break;
			case '9':
				if(isset($_GET["adhar"]))
					$object = new accessorOperations();
					echo $object->unblock($_GET["adhar"]);
			break;
			case '10':
				$object = new accessorOperations();
				echo $object->allKYC();
			break;
			case '11':
				$object = new accessorOperations();
				echo $object->DeletePic($_GET["adhar"],$_GET["field"],$_GET["url"]);
			break;
			case '12':
				$object = new accessorOperations();
				echo $object->GetAllClaim();
			break;
			case '13':
				$object = new accessorOperations();
				echo $object->DeleteClaim($_GET["claimid"]);
			break;
			default:
				# code...
			break;
		}
	}
?>