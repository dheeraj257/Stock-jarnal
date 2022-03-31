
<?php 
    session_start();
    if(!isset($_SESSION['username'])){
    header("location:index.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>Trading journal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="shortout icon" type="image/x-icon" href="icon.ico">
      <meta name="description" content="Enter your trade jurnal and track your performance">
      <meta name="keywords" content="stocks journal,Trading,stock marketing,hmstocks">
      <meta name="author" content="Dheeraj Kumar">
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
</head>

 <body onload="myfun()">        
   <div id="loading">
       <style>
           #loading{
               position:fixed;
               width:100%;
               height:100vh;
               z-index:999;
               background:#fff url(loading.gif) no-repeat center;
           }
       </style>
       
   </div>
        
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
        <div style="margin-left: 10px;" class="container"><a style="font-family: 'Bungee Inline', cursive; font-size:35px;" class="navbar-brand">TRADING JOURNAL</a>
            <button style="background-color: black;" class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse"><span
                class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span></button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="users/post.php">Journal</a></li>
                    <li class="nav-item"><a class="nav-link" href="users/post.php">Trades</a></li>
                    <li class="nav-item">
                    <a class="nav-link " style="cursor:pointer" data-toggle="collapse" data-target="#demo">profile</a>
                        <div id="demo" class="profile collapse">
                        
                        <?php 
                        error_reporting(0);
                        if(isset($_SESSION['username'])){
                            echo "<div style='background-color:#19e; border-radius:10px; padding:3px;' class='container'>".
                            "Name:- ".$_SESSION['username'].
                            "<br>Email Id:- ".$_SESSION['email'].
                            "<br>Phone:- ".$_SESSION['mobile'].
                            "</div>";
                          }else {
                            echo "You are in guest mode";
                          }               
                        ?>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a><hr></li>
                    
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="users/logout.php" style="color: black;" class="btn btn-info my-2 my-sm-0 text-uppercase">LOGOUT</a> &nbsp;
                </form>
            </div>
        </div>
    </nav>
    <br>
    <style>
        .das th {
            text-align: center;
            font-size: 50px;
        }
        
        .das td {
            padding: 10px 10px;
        }
    </style>
    <div class="container-fluid gtco-banner-area">
        <div class="container">
            <div class="row">
                <div style="border-radius:5px ; box-shadow: 0px 0px 20px 5px #6c757d71; padding-top:10px ;" class="col-lg-6 col-12">
                    <table border="2" style="border: none;" class=" das col-12">
                        <thead>
                            <tr>
                                <th colspan="2" style="text-align: center;">
                                    <h2><?php echo $_SESSION['username'];?> </h2>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td style="text-align: left;"><h4>Profit</h4></td>
                                <td style="text-align: left;"><h4>Loss</h4></td>
                            </tr>
                            <tr>
                                <td style="text-align: left; color: #28a745;"><?php
                                include "users/config.php";
                                 $user=$_SESSION['user_id'];
                                      
                                 session_reset();
                                 // page division end::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
                                 $sql="select * from post where user_id='$user'";
                                 $result=mysqli_query($con,$sql) or die("Query failed...");
                                   if(mysqli_num_rows($result)>0){
                                       $b=0;
                                    while($row=mysqli_fetch_assoc($result)){
                                        if($row['profitloss']>0)
                                      $b=$b+$row['profitloss'];
                                    
                                    }
                                }
                                echo $b;
                                ?>
                                </td>
                                <td style="text-align: left; color: #ff073a;">
                                <?php
                                include "users/config.php";
                                 $user=$_SESSION['user_id'];
                                      
                                 session_reset();
                                 // page division end::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
                                 $sql="select * from post where user_id='$user'";
                                 $result=mysqli_query($con,$sql) or die("Query failed...");
                                   if(mysqli_num_rows($result)>0){
                                       $b=0;
                                    while($row=mysqli_fetch_assoc($result)){
                                        if($row['profitloss']<0)
                                      $b=$b+$row['profitloss'];
                                    
                                    }
                                }
                                echo $b;
                                ?>
                            </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" colspan="2"><h4>Net profit/loss:</h4> 
                                <?php
                                include "users/config.php";
                                 $user=$_SESSION['user_id'];
                                      
                                 session_reset();
                                 // page division end::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
                                 $sql="select * from post where user_id='$user'";
                                 $result=mysqli_query($con,$sql) or die("Query failed...");
                                   if(mysqli_num_rows($result)>0){
                                       $b=0;
                                    while($row=mysqli_fetch_assoc($result)){
                                      $b=$b+$row['profitloss'];
                                    
                                    }
                                }
                                error_reporting(0);
                                if($b<0)
                                
                                echo "<span style='color:red;'>$b</span>";
                                else
                                echo "<span style='color:green;'>$b</span>";
                                ?>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <hr style="height: 10px; color: black;">
                    
                   <div class="col-lg-12 col-12"  style="padding:0px 0px;">
                        <h4> Your Performance </h4>
                        <a href="" style="padding:0px 5px;">Refresh</a>
                   </div>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                         google.charts.load('current', {'packages':['corechart']});
                          google.charts.setOnLoadCallback(drawChart);
                    
                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ['Profit', 'Time', 'Loss','NetProfit'],
                              <?php
                                    include "users/config.php";
                                    $sql="select * from post where user_id='$user'";
                                   
                                    $result = mysqli_query($con, $sql);
                                    $a=$b=0;
                                    while($row = mysqli_fetch_array($result)){
                                        if($row['profitloss']>0){
                                                $a=$a+$row['profitloss'];
                                        }
                                        else if($row['profitloss']<0){
                                                $b=$b+$row['profitloss'];
                                        }
                                        $date1=$row['date'];
                                        $profit=$a;
                                        $loss=-$b;
                                        $np=$a+$b;
                                        ?>
                                        ['<?php echo $date1;?>', <?php echo $profit;?>,<?php echo $loss;?>,<?php echo $np;?>],
                                    
                                <?php 
                                }
                                ?>
                            ]);
                    
                            var options = {
                              title: 'Your Performance',
                              vAxis: {minValue: 0},
                              curveType: 'function',
                              legend: 'none',
                              hAxis: { minValue: 0, maxValue: 9 },
                              curveType: 'function',
                              pointSize: 2,
                              resize: true,
                              colors: ['#097138', '#a52714','rgb(68,68,68)'],
                            };
                            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                            chart.draw(data, options);
                          }
                    </script>
                    
                     <style>
                         .linebar{
                             width: 100%;
                             height: 400px;
                         }
                                @media screen and (max-width: 600px) {

                                .linebar{
                                height: 400px;
                                width: 100%;
                            }
                                }
                     </style>
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <div id="chart_div" class=" linebar col-12 col-lg-12 col-md-12"  ></div>
                            
                            
                            <?php 
                            include "config.php";
                            $query = "SELECT * FROM post where user_id='$user' ";
                            $result = mysqli_query($con, $query);
                            $chart_data = '';
                            $a=$b=0;
                            while($row = mysqli_fetch_array($result))
                            {
                                 if($row['profitloss']>0){
                                                $a=$row['profitloss'];
                                        }
                                        else if($row['profitloss']<0){
                                                $b=$row['profitloss'];
                                        }
                                        $date1=$row['date'];
                                        $profit=$a;
                                        $loss=-$b;
                                
                               $chart_data .= "{ year1:'".$row["date"]."', profit:".$profit.", loss:".$loss."},";
                               $a=$b=0;
                            }
                            
                            $chart_data = substr($chart_data, 0, -1);
                            ?>
                              <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
                              <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
                              <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
                              <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
                           
                               <div id="chart" class="linebar col-12 col-lg-12 col-md-12"></div>
                            <script>
                            Morris.Bar({
                             element : 'chart',
                             data:[<?php echo $chart_data; ?>],
                             xkey:['year1'],
                             ykeys:['profit', 'loss'],
                             labels:['Profit', 'loss'],
                             hideHover:'auto',
                             xLabelAngle: 70,
                             barColors:['#097138','#a52714'],
                             stacked:true
                            });
                            </script>
                      </div>         
             <style>
                 @media screen and (max-width: 600px) {
                            .tradetable{
                 padding: 0 0;
                width: 100%;
            }
                }
            </style>
            <div class="tradetable col-lg-6" >
                <style>
                   table{
                       margin: 0%;
                   }
                    .content-table td {
                        border: 1px solid black;
                        text-align: center;
                        padding: 5px 5px;
                    }
                    
                    .content-table th {
                        border: 1px solid black;
                        text-align: center;
                        padding: 5px 5px;
                        color: white;
                    }
                    
                    .content-table th a {
                        border: 1px solid black;
                        text-align: center;
                        padding: 2px 2px;
                    }
                </style>
                <br>
                <table class="content-table col-12">
                    <thead>
                        <tr>
                            <th style="text-align: left; border: none;" colspan="5">
                                <h2 style="box-shadow:2px 2px 5px #19e; border-radius:30px; text-align: center; color:black;">Last 30 TRADES</h2>
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align: left; border: none;" colspan="5">
                           <a style="background:default; color: black;" href="users/add-post.php"><img width="20px" height="20px" src="https://img.icons8.com/carbon-copy/100/000000/plus--v1.png" />Add trade</a>    
                            </th>
                        </tr>
                        <th style="background-color:#191919;">S.No.</th>
                        <th style="background-color:#191919;">Date</th>
                        <th style="background-color:#191919;">Stocks</th>
                        <th style="background-color:#191919;">Quantity</th>
                        <th style="background-color:#191919;">profit</th>
                    </thead>
                    <tbody>

                    <?php
                        include "users/config.php";
                        // page division::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
                        $limit=30;
                        $user=$_SESSION['user_id'];
                        
                        session_reset();
                        // page division end::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
                        $sql="select * from post where user_id='$user' ORDER BY id DESC LIMIT $limit";
                        $result=mysqli_query($con,$sql) or die("Query failed...");
                            if(mysqli_num_rows($result)>0){
                                $i=0;
                                $a=0;
                            while($row=mysqli_fetch_assoc($result)){
                            $a=$a+$row['profitloss'];
                                $i=$i+1;
                    ?>
                        <tr>
                            <td style="background-color: #537DA3;"><?php echo $i;?></td>
                            <td style="background-color: #537DA3;"><?php echo $row['date'];?></td>
                            <td style="background-color: #537DA3;"><?php echo $row['company'];?></td>
                            <td style="background-color: #537DA3;"><?php echo $row['qt'];?></td>
                            <?php 
                            if($row['profitloss']<0)
                           {
                            echo '<td style="background-color: rgba(255,7,58,.6);">';
                            echo $row["profitloss"];
                            echo '</th>';
                           }
                           else
                           {
                            echo '<td style="background-color:rgba(40,167,69,.6);">';
                            echo $row["profitloss"];
                            echo '</th>';
                           }
                            ?>

                        </tr>
                        <?php
                                }
                            }
                            else{
                                echo "<h1 align='center'>Records not found</h1>";
                            }
                        ?>    
                        <tr> 
                            <td colspan="3">Total P&L</td>
                            <td colspan="2"><?php 
                              error_reporting(0);
                              if($a<0)
                              
                              echo "<span style='color:red;'>$a</span>";
                              else
                              echo "<span style='color:green;'>$a</span>";
                            ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <br><br>
    <footer class="container-fluid" id="gtco-footer">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6" id="contact">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <h4>Contact Us</h4>
                            <ul class="nav flex-column company-nav">
                                <li class="nav-item"><a class="nav-link">+91-9128382255</a></li>
                                <li class="nav-item"><a class="nav-link">sahdheeraj518@gmail.com</a></li>
                                
                            </ul>
                             <style>
                            @media screen and (max-width: 600px) {
                                .followus{
                                 display:none;
                                   }
                                }
                            </style>
                            <h4 class="followus mt-5">Fllow Us</h4>
                            <ul class="followus nav follow-us-nav">
                                <li class="nav-item"><a class="nav-link pl-0" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>    
                           
                        </div>
                    </div>
                </div>
                <script>
                    function val1(){
                        alert('Thank You for your golden feddback');
                    }
                    </script>
                <div class="col-lg-6">
                   <form onsubmit="return(val1())" action="feedback.php" method="POST" autocomplete="on" enctype="multipart/form-data">
                    <h4> Give us your feedback </h4>
                    <input type="hidden" name="feedname" value="<?php echo $_SESSION['username'];?>" class="form-control" placeholder="Full Name">
                    <input type="hidden" name="feedemail" value="<?php echo $_SESSION['email'];?>" class="form-control" placeholder="Email Address">
                 
                    <textarea class="form-control" name="feedmessage" placeholder="Message" required></textarea>
                    <input type="submit" name="submit2" value="Send" class="submit-button"/>
                    </form>
                </div>
                 <div class="col-12">
                            <p>&copy; 2020. All Rights Reserved. Design by <a href="" target="_blank">D-compute</a>.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- owl carousel js-->
    <script src="owl-carousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
            function myfun(){
                var var1=document.getElementById('loading');
                var1.style.display='none';
            }
        </script>
</body>

</html>