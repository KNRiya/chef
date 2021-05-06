<?php
function conectionStart()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cheif_information";
    $connection = mysqli_connect($servername, $username, $password,
        $dbname);
    
    if(!$connection){
       echo "connection failed";
    }
    return $connection;
}

function conectionEnd($value)
{
    mysqli_close($value);
}
function fetch($value='')
{
    $connection = conectionStart();
    $sql = "SELECT * FROM chefs WHERE name LIKE '%".$value."%' OR experienceYear LIKE '%".$value."%' OR expectedSalary LIKE '%".$value."%'";
$result = mysqli_query($connection, $sql);
if($result) {

    echo "<table>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Name</th>";
echo "<th>Experience Year</th>";
echo "<th>Expected Salary</th>";

echo "</tr>";
while ($row = mysqlI_fetch_assoc($result)) {
    $a=$row['id'];
    echo "<tr>";

echo "<td>".$row['id']."</td>";
echo "<td ><a href='profile.php?id=".$row['id']."'>".$row['name']."</a></td>";
echo "<td>".$row['experienceYear']."</td>";
echo "<td>".$row['expectedSalary']."</td>";

echo "</tr>";
}
echo "</table>";
} else {
    echo "Error :".$sql."<br>".mysqli_error($connection);
}
conectionEnd($connection);
}
if (isset($_GET['search'])) {
    fetch($_GET['search']);
}
?>