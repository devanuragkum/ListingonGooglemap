<?php	
	include_once('header.php'); 
	include_once('config/config.php'); 	
	
	function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
           $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
       return $randomString;
       }
	   
	function insertPost($conn,$name, $phone, $email,$website,$category,$address,$requirement,$auto_password){			
			
		    // prepare and bind
			$stmt = $conn->prepare("INSERT INTO post(name, phone, email, website, category, location, requirement,auto_password,date) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?,CURDATE())");
			$stmt->bind_param("ssssssss", $name, $phone, $email,$website,$category,$address,$requirement,$auto_password);  
			$stmt->execute();		
			$stmt->close();
	    }

	
	function deletePost($conn,$emailid,$deleteid){				
		$stmt = $conn->prepare("DELETE FROM post WHERE email= ? AND auto_password= ?");
		$stmt->bind_param('ss',$emailid,$deleteid);
		$stmt->execute(); 
		$stmt->close();

		echo  '<div class="row" style="margin-left:500px; margin-top:200px;">'.
			  '<div class="col s12 m5">'.
				'<div class="card-panel teal">'.
				  '<span class="white-text">'.
					'Your post has been deleted and is no longer active. Thank you for posting. Have a nice day'.					  
				  '</span>'.
				'</div>'.
			  '</div>'.
			'</div>';
		
	}
	if(@$_GET['deleteid']){
		deletePost($conn,@$_GET['emailid'],@$_GET['deleteid']);
	}
	
	function sendMail($email,$name,$address,$requirement){
		$auto_password = generateRandomString();
		
		$to = $email;
		$subject = "Thank you for posting on Required";
		$txt = 'Name:'.' '.$name.' | '. 'email '.$email.' | '. 'Address '. $address.'|'.'Requirement '.$requirement.'|'.'To delete this posting click here '.'https://required.co.in/thanks.php?deleteid='.$auto_password.'&emailid='.$email;
		$headers = "From: Required@required.co.in" . "\r\n" .
		"CC: anuragambraham@gmail.com";

		mail($to,$subject,$txt,$headers);		
		
	}
	
	if(isset($_POST['action'])){
			
		$name = $_POST['name'];	
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$website = $_POST['website'];	
		$category = $_POST['category'];	
		$address = $_POST['address'];	
		$requirement = $_POST['requirement'];			
		$auto_password = generateRandomString();
		
		if(!empty($name) && !empty($email) && !empty($category) && !empty($address) && !empty($requirement)){
			insertPost($conn,$name, $phone, $email,$website,$category,$address,$requirement,$auto_password);
			
			echo
			 '<div class="row" style="margin-left:500px; margin-top:200px;">'.
			  '<div class="col s12 m5">'.
				'<div class="card-panel teal">'.
				  '<span class="white-text">'.
					'Thank You for posting your requirements. Expert people will contact you via phone or email. Keep cheking them. <br>Thank You.'.'<br>'.' <a href="http://required.co.in/">Go back</a>';		;						  
				  '</span>'.
				'</div>'.
			  '</div>'.
			'</div>';
			sendMail($email,$name,$address,$requirement);
			
		}else{
			echo 
			 '<div class="row" style="margin-left:500px; margin-top:200px;">'.
				  '<div class="col s12 m5">'.
					'<div class="card-panel teal">'.
					  '<span class="white-text">'.
						'Please fill all the required fields.'.' <a href="http://required.co.in/">Go back</a>';					  
					  '</span>'.
					'</div>'.
				  '</div>'.
				'</div>';
		}
		
			
		
	}		

		
	include_once('footer.php');	  
?>	

		