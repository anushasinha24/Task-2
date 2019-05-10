<?php
	include('db.php');
	
	$skill=$_POST["uid"];
	$searchquery = $DBcon->prepare("SELECT * FROM details WHERE skills LIKE '%$skill%'");
	$res="";
	$searchquery->bindparam(':uid', $skill);	
	
	if($searchquery->execute())
	{	
		while($result=$searchquery->fetch())
		{
			$skillset=array(json_decode($result["skills"]));
			$length=sizeof($skillset);
			$flag=0;
			for($i=0; $i<$length; $i++)
			{
				$l=sizeof($skillset[$i]);
				for($j=0; $j<$l; $j++)
				{	
					if(strcmp($skillset[$i][$j],$skill)==0)
					{
						$flag=1;
					}	
				}
			}
			
			if($flag==1)
			{
				$res=$res."<tr><td>".$result["uid"]."</td><td>".$result["name"]."</td><td>".$result["email"]."</td><td>".$result["mobile"]."</td><td>".$result["DOB"]."</td><td>".$result["university"]."</td><td>".$result["company"]."</td><td>".$result["landline"]."</td><td>".$result["address"]."</tr>";
			}
		}
		echo json_encode($res);
	}
	else
	{
		$error="Couldn't fetch details. Please try again later.";
		echo json_encode($error);
	}
?>