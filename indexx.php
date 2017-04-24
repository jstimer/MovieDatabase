<html>
<body>
<p><center>
<h3>Alphabetical Search in PHP</h3>

<form action="indexx.php" method="post" name="search" onclick="submit">
<a href="indexx.php?letter=A">A</a> |
<a href="indexx.php?letter=B">B</a> |
<a href="indexx.php?letter=C">C</a> |
<a href="indexx.php?letter=D">D</a> |
<a href="indexx.php?letter=E">E</a> |
<a href="indexx.php?letter=F">F</a> |
<a href="indexx.php?letter=G">G</a> |
<a href="indexx.php?letter=H">H</a> |
<a href="indexx.php?letter=I">I</a> |
<a href="indexx.php?letter=J">J</a> |
<a href="indexx.php?letter=K">K</a> |
<a href="indexx.php?letter=L">L</a> |
<a href="indexx.php?letter=M">M</a> |
<a href="indexx.php?letter=N">N</a> |
<a href="indexx.php?letter=O">O</a> |
<a href="indexx.php?letter=P">P</a> |
<a href="indexx.php?letter=Q">Q</a> |
<a href="indexx.php?letter=R">R</a> |
<a href="indexx.php?letter=S">S</a> |
<a href="indexx.php?letter=T">T</a> |
<a href="indexx.php?letter=U">U</a> |
<a href="indexx.php?letter=V">V</a> |
<a href="indexx.php?letter=W">W</a> |
<a href="indexx.php?letter=X">X</a> |
<a href="indexx.php?letter=Y">Y</a> |
<a href="indexx.php?letter=Z">Z</a> |
<a href="indexx.php?letter=range('A', 'Z')">View All</a>
</form>

<br />

</center></p>
</body>
</html>
<?php

if(isset($_GET['letter']))
{
$con=mysql_connect('willy','comp305_grp2','Scrumbags1!', 'comp305_grp2');
if(!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db('comp305_grp2',$con);
$char=$_GET['letter'];

if($char)
{
$query = "SELECT * FROM Film WHERE film_name LIKE '$char%' ";
$result = mysql_query($query);
$count=mysql_num_rows($result);
if($count >= 1)
{
?>
<center>
<table cellpadding="1" cellspacing="0" border="1" width="35%" >
<tr>
<th>Name</th>
<th>Release</th>
<th>Rating</th>
</tr>
<?php
while($row = mysql_fetch_array($result))
{

?>
<tr>
<td align="center"><?php echo $row['film_name']; ?></td>
<td align="center"><?php echo $row['film_release']; ?></td>
<td align="center"><?php echo $row['mpaa_rating']; ?></td>
</tr>
<?php
}
?>
</table>
<center>
<?php
}
else
{
echo 'Records Not Found';
}
}
else
{
$query = "SELECT * FROM Film";
$result = mysql_query($query);
?>
<center>
<table cellpadding="1" cellspacing="0" border="1" width="35%" >
<tr>
<th>Film</th>
<th>Release</th>
<th>Rating</th>
</tr>
<?php
while($row = mysql_fetch_array($result))
{

?>
<tr>
<td align="center"><?php echo $row['film_name']; ?></td>
<td align="center"><?php echo $row['film_release']; ?></td>
<td align="center"><?php echo $row['mpaa_rating']; ?></td>
</tr>
<?php
}
?>
</table>
</center>
<?php
}
}
?>
