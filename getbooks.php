<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  background: white;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  background: white;
}

th {text-align: left;}
</style>
</head>
<body>
<?php
$q = $_REQUEST["q"];

$con = mysqli_connect('localhost','root','mysql','adlw4');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}


$sql="SELECT * FROM books WHERE title like '%".$q."%' or author like '%".$q."%' or ISBN like '%".$q."%'";
$result = mysqli_query($con,$sql);

echo "<center><table>
<tr>
<th>Title</th>
<th>Author</th>
<th>ISBN</th>
<th>Cost</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['author'] . "</td>";
  echo "<td>" . $row['ISBN'] . "</td>";
  echo "<td>" . $row['cost'] . "</td>";
  echo "</tr>";
}
echo "</table></center>";
mysqli_close($con);
?>
</body>
</html>
