<?php
	
		require("db.php");
		
		@$id 			= $_POST['deduction_id'];
		@$med_alw 	    = $_POST['philhealth'];
		@$pf 			= $_POST['bir'];
		@$esi 			= $_POST['gsis'];
		@$pt 			= $_POST['pag_ibig'];
		@$hra    		= $_POST['loans'];


		$sql = mysqli_query($conn,"UPDATE deductions SET bir='$pf', gsis='$esi', pag_ibig='$pt', loans='$hra', philhealth='$med_alw' WHERE deduction_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Deductions successfully updated...');
		            window.location.href='home_deductions.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>