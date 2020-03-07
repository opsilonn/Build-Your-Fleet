<?php 

include("Database.php");

if(isset($_GET['name']))
{
	$name = htmlspecialchars($_GET['name']);
	$req1 = $DATABASE->prepare("SELECT * FROM customer WHERE L_Name=? LIMIT 10");
	$req1->execute(array($name));

	while($val = $req1->fetch())
	{
		echo $val['F_Name']."|".$val['Email']."<hr>";
	}
}
echo "<br><br>";
echo "<br><br>";
echo "<br><br>";

$req=$DATABASE->query("SELECT * FROM customer LIMIT 100");
while($val = $req->fetch())
{
	for($i=0; $i<10; $i++) echo $val[$i]." ";
		echo "<hr>";
}


?>