<?php

$dblink = mysqli_connect("localhost", "root", "", "bbdms");
/* If connection fails throw an error */
if (mysqli_connect_errno()) {
    echo "Could  not connect to database: Error: ".mysqli_connect_error();
    exit();
}

$sql = "SELECT * from tblblooddonars where BloodGroup='O+'";

$query = $dblink ->query($sql);


if($query->num_rows > 0)
{

while($result = $query -> fetch_assoc())
{ 
    $to = $result['MobileNumber'];
    
    echo $to . "<br>";

}
}

 /*  $sqlquery = "SELECT number FROM table_name";
if ($result = mysqli_query($dblink, $sqlquery)) {
    while ($row = mysqli_fetch_assoc($result)) {
    $number = $row["number"];
    $to = "$number,$to";
    }
}  */

/*

$token = "0cdec0364947b9c595b5fbebd74d1935";
$message = "Test SMS From Using API";

$url = "http://api.greenweb.com.bd/api2.php";


$data= array(
'to'=>"$to",
'message'=>"$message",
'token'=>"$token"
); // Add parameters in key value
$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$smsresult = curl_exec($ch); 

//Result
echo $smsresult;

//Error Display
echo curl_error($ch);*/

?>