<?php

session_start();


include("db_config.php");

$page_title = "Ajout utilisateur";

include("header.php");

if (!isset($_POST["login"]) || !isset($_POST["password"]) ||
	!isset($_POST["password2"])||!isset($_POST["fname"])||!isset($_POST["lname"])|| !isset($_POST["age"]) ||
	empty($_POST["login"])||empty($_POST["password"]) || 
	empty($_POST["fname"])||empty($_POST["lname"]) ||empty($_POST["age"]) ){

		echo "<p>Remplissez le formulaire</p>";
		include("reg_form.php");
	 	exit();
}
 
$login = $_POST["login"];
$passwd = $_POST["password"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$age = $_POST["age"];

$SQL = "SELECT ID FROM users WHERE login=$login";
$res = $db->query($SQL);
if ($res && $res->rowCount()>0) 
{
	echo "<p>Le login existe\n";
	include("reg_form.php"); 
	include("footer.php");
	exit(); 
}

$SQL = sprintf("INSERT INTO user VALUES ('%s','%s','%s','%s','%s','%s')",$login, $passwd, $fname, $lname, $age, NULL);
$res = $db->query($SQL);

if (!$res) die('Error: ' . $db->errorInfo()[2]); 

echo "<p>Utilisateur $login ajouté\n";
$SQL = "SELECT * FROM user";

echo 
"<table>
 <thead>
   <tr>
	   <th>id</th>
	   <th>login</th>
	   <th>password</th>
	   <th>first_name</th>
	   <th>last_name</th>
	   <th>age</th>
	</tr>
 </thead>
 <tbody>
";
if ($res=$db->query($SQL)){
	while ($row = $res->fetch()){ 
		  echo "    
		  			<tr>
						  <td>$row[id]</td>
						  <td>$row[login]</td>
						  <td>$row[password]</td>
						  <td>$row[first_name]</td>
						  <td>$row[last_name]</td>
						  <td>$row[age]</td>
					</tr> \n";
	} 
}

echo "</tbody></table>";

include("footer.php");

?>