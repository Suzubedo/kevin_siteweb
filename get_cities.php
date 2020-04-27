<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','pr0jetEsgi2020','siteannuel');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"siteannuel");
$sql="SELECT city FROM service WHERE city = '".$q."'";
$result = mysqli_query($con,$sql);

echo $result;
 mysqli_close($con);

?>
