<html>
	<head>
		<?php
				include_once '../connection/connection.php';
				include_once '../class/controller.php';
		?>
                <script src="../lib/jquery.min.js"></script>
                <script src="../lib/jquery.table2excel.js"></script>
                <script>
               
       
                 $(document).ready(function()
                 {
                    $("#table2excel").table2excel({
   
   
    name: "Worksheet Name",
    filename: "KYA USER DETAIL" 
  });                  });
                </script>
	</head>
	<body>
		<table id="table2excel">
			<tr>
				<td><b>Name</b></td>
				<td><b>Date Of Birth</b></td>
                                <td><b>Gender</b></td>
				<td><b>Present Address</b></td>
				<td><b>Permanent Address</b></td>
				<td><b>Adhar</b></td>
				<td><b>Voter ID</b></td>
				<td><b>PAN</b></td>
				<td><b>Account Number<b></td>
				<td><b>Bank Name</b></td>
                                <td><b>IFC Code<b></td>
				<td><b>Contact</b></td>
			</tr>
                       <?php
                                $object = new accessorOperations();
                                $result = $object->KyaAllUserDetailReport();
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<tr>";
                                    echo "<td>".$row['user_name']."</td>";
                                    echo "<td>".$row['dob']."</td>";
                                    echo "<td>".$row['gender']."</td>";
                                    echo "<td>".$row['present_address']."</td>";
                                    echo "<td>".$row['permanent_address']."</td>";
                                    echo "<td>".$row['adhar']."</td>";
                                    echo "<td>".$row['voterid']."</td>";
                                    echo "<td>".$row['pan']."</td>";
                                    echo "<td>".$row['account_number']."</td>";
                                    echo "<td>".$row['branch_name']."</td>";
                                    echo "<td>".$row['ifc_code']."</td>";
                                    echo "<td>".$row['contact']."</td>";
                                }
                       ?>
		</table>
	</body>
</html>