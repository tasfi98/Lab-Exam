<style type="text/css">
	div{
		width: 100%;
		padding: 10px 0px;
		text-align: center;
		background-color: green;
		color: white;
		font-size: 20px;
		font-weight: 800;
	}
</style>

<?php
session_start();

if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){?>
	<div>
		<p>User Home</p>
	</div>
	
	<h1>Hello: <?php echo $_SESSION["uname"]; ?></h1>
	<br/><br/>
	<a href="edit.php">Edit Profile</a><br/>
	<a href="logout.php">Log Out</a><br/>
	
<?php
}
else{
	header("Location:logout.php");
}
?>