<?php
session_start();
echo $_REQUEST["pass"];
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){
	if(!isset($_REQUEST["pass"])){
		echo "Invalid Parameter";
	}
	else{
		$myfile = fopen("cred.txt", "r") or die("Unable to open file!");
		$data=array();
		//loads the array with file data
		while($line=fgets($myfile)) {
			$line=trim($line);
			$ar=explode("-",$line);
			$temp["uname"]=$ar[0];
			$temp["pass"]=$ar[1];
			$temp["email"]=$ar[2];
			$temp["user_type"]=$ar[3];
			$data[]=$temp;
		}
		//print_r($data);
		fclose($myfile);

		/*Change info in array*/
		$i=0;
		foreach($data as $row){
			if($row["uname"]==$_SESSION["uname"] && $row["pass"]==md5($_REQUEST["pass"])){
				$row["pass"]=md5($_REQUEST["pass"]);
				$row["email"]=$_REQUEST["email"];
				$row["user_type"]=$_REQUEST["user_type"];
			}
			$data[$i]=$row;
			$i++;
		}
		/*End of change info in array*/
		$str="";
		foreach($data as $row){
			$str.=$row["uname"]."-".$row["pass"]."-".$row["email"]."-".$row["user_type"]."\r\n";
		} //prepare data for writing into file
		$str=trim($str);

		$myfile = fopen("cred.txt", "w") or die("Unable to open file!");
		echo fwrite($myfile,$str); //writes array data into file
		echo " characters written to file";
		fclose($myfile);
		?>
		<br/><a href="home.php">Home</a>
		<?php 
	}
}
else{
	header("Location:logout.php");
}
?>