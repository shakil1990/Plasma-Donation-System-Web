<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Plasma Donation Management System | Become A Donar</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
        <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.cc{
    margin-left: auto;
    margin-right: auto;
}


    </style>


</head>

<body>

<?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3" style="text-align: center;">Search Donor</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Search  Donor</li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->

        <form name="donar" method="post">
<div class="row cc">



<div class="col-sm-9 mb-4">
<div class="font-italic">Blood Group<span style="color:red">*</span> </div>
<div><select name="bloodgroup" class="form-control" required>
<?php $sql = "SELECT * from  tblbloodgroup ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
<?php }} ?>
</select>
</div>
</div>
</div>


<div class="row cc">
<div class="col-sm-9 mb-4">
<div class="font-italic">Location(District)<span style="color:red">*</span> </div>
<div><textarea class="form-control" name="location"></textarea></div>
</div></div>

<div class="row cc">
<div class="col-sm-9 mb-4">
<div class="font-italic">Minimum Age<span style="color:red">*</span></div>
<div><input type="text" name="age" class="form-control" required></div>
</div>
</div>

<div class="row cc">
<div class="col-sm-9 mb-4">
<div class="font-italic">Last Covid Negative<span style="color:red">*</span></div>
<div><input type="date" name="lastnegative" class="form-control"></div>
</div>

</div>





<div class="row cc">
<div class="col-sm-9 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>
</div>
       <!-- /.row -->



</form>   


        <div class="row ">
<?php 
if(isset($_POST['submit']))
{
$status=1;
$bloodgroup=$_POST['bloodgroup'];
$location=$_POST['location'];
$age=$_POST['age'];
$_SESSION['bloodgroup'] = $bloodgroup;
$_SESSION['age'] = $age;
$_SESSION['location'] = $location;

$sql = "SELECT * from tblblooddonars where Age >= '$age' and BloodGroup = '$bloodgroup' and Address='$location'";
$query = $dbh -> prepare($sql);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':bloodgroup',$bloodgroup,PDO::PARAM_STR);
$query->bindParam(':location',$location,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{

foreach($results as $result)
{ ?>


            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top img-fluid" src="images/p7.jpg" alt="" ></a>
                    <div class="card-block">
                        <h4 class="card-title"><a href="#"><?php echo htmlentities($result->FullName);?></a></h4>

                        <p class="card-text"><b>  Mobile No :</b> <?php echo htmlentities($result->MobileNumber);?></p>

                        <p class="card-text"><b>Email Id :</b> 
                        <?php if($result->EmailId=="")
                        {
                        echo htmlentities(NA);
                        } else {
echo htmlentities($result->EmailId);
}
?>
</p>

<p class="card-text"><b>  Gender :</b> <?php echo htmlentities($result->Gender);?></p>
<p class="card-text"><b> Age:</b> <?php echo htmlentities($result->Age);?></p>
<p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->BloodGroup);?></p>
<p class="card-text"><b>Address :</b>                  
<?php if($result->Address=="")
{
echo htmlentities('NA');
} else {
echo htmlentities($result->Address);
}
?>
</p>
     <p class="card-text"><b>Message :</b> <?php echo htmlentities($result->Message);?></p>

                    </div>
                </div>

            </div>

        <?php 
        }

        }
else
{
echo htmlentities("No Record Found");

}
    } 
    ?>
          
 </div>

<form method="POST" name = "donar1">

<div class="row cc">
<div class="col-sm-8 mb-4">
<div><input type="submit" name="msg" class="btn btn-primary" value="Send Message" style="cursor:pointer"></div>
</div>
</div>
</form>

 

 </div>

<?php

if(isset($_POST["msg"]))
{

$bloodgroup=$_SESSION['bloodgroup'];
$age = $_SESSION['age'];
$location = $_SESSION['location'];


$dblink = mysqli_connect("localhost", "root", "", "bbdms");

if (mysqli_connect_errno()) {
    echo "Could  not connect to database: Error: ".mysqli_connect_error();
    exit();
}

$sql = "SELECT * from tblblooddonars where Age >= '$age' and BloodGroup = '$bloodgroup' and Address='$location'";
$query = $dblink ->query($sql);
$to = "";
if($query->num_rows > 0)
{

while($result = $query -> fetch_assoc())
{ 
    $num= $result['MobileNumber'];
    $to = "$num, $to";
}


$token = "0cdec0364947b9c595b5fbebd74d1935";
$message = "'$bloodgroup' plasma is needed urgently nearby your area. If you are available, then please kindly
try to donate plasma and possibly help to rise another COVID winner. Call helpline 01234353310 if you are available.
Thank you.";

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
//echo $smsresult;

//Error Display
//echo curl_error($ch);

echo "<script type='text/javascript'>alert('Message Sent!');</script>";

}else
{
    echo "<script type='text/javascript'>alert('Empty list!');</script>";

}
    }

?>

  <?php include('includes/footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
