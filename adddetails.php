<?php
	include('db.php');
	
	$uid = $_POST["uid"];	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$mobile = $_POST["mobile"];
	$DOB = $_POST["DOB"];
	$university = $_POST["university"];
	$company = $_POST["company"];
	$landline = $_POST["landline"];
	$address = $_POST["address"];
	$skill = json_encode($_POST["skill"]);	
	$insertquery = $DBcon->prepare("INSERT INTO details(uid,name,email,mobile,DOB,university,company,landline,address,skills) VALUES(:uid, :name, :email, :mobile, :DOB, :university, :company, :landline, :address, :skill)");
	
	$insertquery->bindparam(':uid', $uid);
	$insertquery->bindparam(':name', $name);
	$insertquery->bindparam(':email', $email);
	$insertquery->bindparam(':mobile', $mobile);
	$insertquery->bindparam(':DOB', $DOB);
	$insertquery->bindparam(':university', $university);
	$insertquery->bindparam(':company', $company);
	$insertquery->bindparam(':landline', $landline);
	$insertquery->bindparam(':address', $address);
	$insertquery->bindparam(':skill', $skill);
		
	if($insertquery->execute())
	{
		$res="Details updated successfully.";
		echo json_encode($res);
	}
	else
	{
		$error="Couldn't update details. Please try again later.";
		echo json_encode($error);
	}
?>