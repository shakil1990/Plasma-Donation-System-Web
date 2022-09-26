<?php
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

    <title>Plasma Donation Management System</title>
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
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }
    </style>

</head>

<body>

    <!-- Navigation -->
<?php include('includes/header.php');?>
<?php include('includes/slider.php');?>
   
    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4">Welcome To Plasma Donation Management System</h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">The need for Plasma</h4>
                   
                        <p class="card-text" style="padding-left:2%">Plasma is a critical part of the treatment for many serious health problems. This is why there are blood drives asking people to donate blood plasma.

Along with water, salt, and enzymes, plasma also contains important components. These include antibodies, clotting factors, and the proteins albumin and fibrinogen. When you donate blood, healthcare providers can separate these vital parts from your plasma. These parts can then be concentrated into various products. These products are then used as treatments that can help save the lives of people suffering from burns, shock, trauma, and other medical emergencies. </p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">COVID-19 and Convalescent plasma therapy</h4>
                   
                        <p class="card-text" style="padding-left:2%">Convalescent plasma therapy uses blood from people who've recovered from an illness to help others recover.

The U.S. Food and Drug Administration (FDA) authorized convalescent plasma therapy for people with coronavirus disease 2019 (COVID-19). The FDA is allowing its use during the pandemic because there's no approved treatment for COVID-19. As the number o COVID infected patient is rising, the need for plasma is also rising.

Blood donated by people who've recovered from COVID-19 has antibodies to the virus that causes it. The donated blood is processed to remove blood cells, leaving behind liquid (plasma) and antibodies. These can be given to people with COVID-19 to boost their ability to fight the virus.</p>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">Tips for donation</h4>
                   
                        <p class="card-text" style="padding-left:2%">Donating plasma is similar to giving blood. A needle is placed into a  vein in your arm. Plasma is collected through a process call plasmapheresis and is conducted in cycles that may take up to an hour. Whole blood is drawn. The plasma is separated from the red blood cells and other cellular components. These are returned to your body with sterile saline solution to help the body replace the plasma     removed from the whole blood.
                        A healthy person can donate plasma every 28 days, up to 13 times a year. 
                         </p>
                </div>
            </div>

            
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <!--<h2>Some of the Donar</h2> -->

        <div class="row">
                   <?php 
$status=1;
$sql = "SELECT * from tblblooddonars where status=:status order by rand() limit 6";
$query = $dbh -> prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top img-fluid" src="images/p3.jpg" alt="" ></a>
                    <div class="card-block">
                        <h4 class="card-title"><a href="#"><?php echo htmlentities($result->FullName);?></a></h4>
<p class="card-text"><b>  Gender :</b> <?php echo htmlentities($result->Gender);?></p>
<p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->BloodGroup);?></p>

                    </div>
                </div>
            </div>

            <?php }} ?>
          
 



        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-6">
                <h2>BLOOD GROUPS</h2>
          <p>  blood group of any human being will mainly fall in any one of the following groups.</p>
                <ul>
                
                
<li>A positive or A negative</li>
<li>B positive or B negative</li>
<li>O positive or O negative</li>
<li>AB positive or AB negative.</li>
                </ul>
                <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="images/p9.jpg" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
            <h4>UNIVERSAL DONORS AND RECIPIENTS</h4>
                <p>
To donate plasma, donors must meet all of the requirements for whole blood donation. There are four major blood groups: A, B, AB and O. Donors who are blood group AB are special plasma donors because their plasma can be given to any of the other blood types. Because of this, AB plasma is frequently in high demand.

Donors can donate plasma every 28 days</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="become-donar.php">Become a Donar</a>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
  <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
