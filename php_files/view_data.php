<?php 
	// include connection file
	require 'config.php';

	// fetch data from database table
	$sql = "SELECT * FROM account_information";
	$account_information= $conn->query($sql);

		// database table empty check
		if($account_information->num_rows > 0){
			$i=1;

			// fetch all data using foreach loop
			foreach ($account_information as $info) {

				// check gender status
				if($info['gender']==1){$gender = "Male";}else{$gender ="Female";}

				// check empty image
				if($info['image']==""){$image = "./assets/images/avatar.png";}else{$image =$info['image'];}

				echo " <tr>
						<td> ".$i."</td>
						<td class='user_profile_image'> <img src=".$image." class='user_profile_image' /> </td>
						<td>".$info['first_name'].' '.$info['last_name']."</td>
						<td>".$gender."</td>
						<td>".$info['email']."</td>
						<td>".$info['address']."</td>
					</tr>";
				$i++;	
			} //end foreach loop

		}else{
			
			echo '<td colspan="6">
				<div class="text-center sorry_text">
					<i class="fa fa-frown-o"></i>
					<h3>Sorry Data not found</h3>
				</div>
			</td>';
	
		} // end if


 ?>