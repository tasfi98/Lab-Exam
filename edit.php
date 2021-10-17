<?php session_start();

if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){
?>
<form action="change_in_file.php" method="post"><pre>
U Name:
<input type="text" value="<?php echo $_SESSION["uname"];?>" name="uname" ><br/>
Password:
<input type="password" value='<?php echo $_SESSION["pass"];?>' name="pass"><br/>
E Mail:
<input type="text" value='<?php echo $_SESSION["email"];?>' name="email"><br/>
User Type:
<input type="text" value='<?php echo $_SESSION["user_type"];?>' name="user_type"><br/>
<input type="submit" name="sbt" value="submit" />
</pre>
</form>
<a href="home.php">Home</a><br/>
<?php 
}
else{
	header("Location:logout.php");
}
?>