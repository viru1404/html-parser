<html lang="en">
<head>

  <title>Parser</title>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>
      <div class="container">
       <center><h1>Page-Ranking</h1></center><br/><br/>
       <div class="container">
        
       </div>
       <div class="container text-center">
        <table border="1" style="width:100%">



         <?php

         $q=array('http://localhost/searchengine/webpages/java/java1.html','http://localhost/searchengine/webpages/java/java2.html','http://localhost/searchengine/webpages/java/java3.html','http://localhost/searchengine/webpages/java/java4.html','http://localhost/searchengine/webpages/java/java5.html','http://localhost/searchengine/webpages/java/java6.html','http://localhost/searchengine/webpages/java/java7.html','http://localhost/searchengine/webpages/java/java8.html','http://localhost/searchengine/webpages/java/java9.html','http://localhost/searchengine/webpages/java/java10.html','http://localhost/searchengine/webpages/java/java11.html','http://localhost/searchengine/webpages/java/java12.html');
         $pos=array();
         $prerank=array();
         for($i=0;$i<12;$i++)
         {
 // echo "<th>".$q[$i]."</th>";
         }
//echo "</tr>";
         for($i=0;$i<12;$i++)
         {
          $prerank[$q[$i]]=1;
        }
        $currentrank=array(); 
        for($i=0;$i<12;$i++)
        {
          $currentrank[$q[$i]]=1;
        }
        echo "<tr>";
        for($i=0;$i<12;$i++)
        {
          echo "<td> ".$currentrank[$q[$i]]." </td>";
        }
        echo "</tr>";
//echo "<br><br><br>";
        for($zq=0;$zq<24;$zq++)
        {
          echo "<tr>";
          for($ii=0;$ii<12;$ii++)
          {
   //echo $q[$ii]." ";
 //$q=$_GET['url'];
     // to count no of links redirect  of page
           $count=0;
           $d=0.85;
           $sum=0;
//$pr=(1-$d)+d*(pr(p1)/o(p1));
           $servername = "localhost";
           $username = "root";
           $password = "";
           $dbname = "*****";

// Create connection
           $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
           if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          } 

          $sql = "SELECT * FROM links WHERE outlink='$q[$ii]'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
    // output data of each row
            while($row = $result->fetch_assoc()) {
              $count+=1;
              $inlink=$row['link'];
              $countlink=0;
              $sql1 = "SELECT * FROM links WHERE link='$inlink'";
              $result1 = $conn->query($sql1);

              if ($result1->num_rows > 0) {
    // output data of each row
                while($row1 = $result1->fetch_assoc()) {
                  $countlink+=1;

                }
              } else {
   // echo "0 results";
              }
              $rankinlink=$prerank[$q[$ii]];


//echo "<br>".$countlink." link inside inlink ".(1.0*$rankinlink)/$countlink."<br>";
              $sum+=(1.0*$rankinlink)/$countlink;

            }
          } else {
   // echo "0 results";
          }
//echo "sum is ".$sum."<br>";
          $pr=(1-.85)+.15*$sum;
//echo "total inlinks are ".$count."<br>";
          echo "<td> ".$pr." </td>";
          $currentrank[$q[$ii]]=$pr;
        }
        for($ad=0;$ad<12;$ad++)
        {
         $prerank[$q[$ad]]=$currentrank[$q[$ad]];
       }
       echo "</tr>";
//echo "<br><br><br><br>";
     }
     ?>

   </table>

 </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
</html>
