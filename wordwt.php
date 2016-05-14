<html lang="en">
<head>
  
  <title>wordwt</title>
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
   <center><h1>Webpage Parser</h1></center><br/><br/>
   <div class="container">
   <form action="" method="get">
   <input type="text" name="url" class="form-control" placeholder="Enter Url Of Webpage" required>
   <center> <button class="btn btn-default" type="submit">Parse</button></center>
   </form>
   </div>
   <div class="container text-center">
     <?php
     if(isset($_GET["url"])){
    
function getocurence($arr,$wod)
        {
            
            $positions = array();
            $i=1;
            $k=0;
            foreach ($arr as $z) {
               if ($z==$wod)
               {
                $positions[$k]=$i;
                $k=$k+1;
               }
               $i=$i+1;
            }
          
            return $positions;
        }

  echo"<h2>Keywords Extracted</h2>";
     $url=$_GET["url"];
     $str = file_get_contents($url);
     //contains all the words in array in sequence as they were in page
$b=str_word_count(strip_tags(strtolower($str)), 1);
     $keywords=(array_count_values(str_word_count(strip_tags(strtolower($str)), 1)));
           
 
    foreach($keywords as $key => $key_count) {
    echo  "<mark>".$key."</mark>";
    echo ", ";
        }
     }
   ?>
   </div>
    <div class="container text-center">
     <?php
     if(isset($_GET["url"])){
     $save=array();
     $newarr=array();
     $servername = "localhost";
$username = "root";
$password = "";
$dbname = "********";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM education";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        array_push($save,$row["terms"]);
    }
} else {
    echo "0 results";
}

//print_r($save);
        require_once("porter_stemming.php");
        echo "<h2>Stemmed Keywords</h2><br/>";
        $stemit = new Stemmer();
        foreach($keywords as $key => $key_count) {
         //echo "<mark>".$stemit->stem($key)."</mark>, ";
         $mac=$stemit->stem($key);
          /* Stop words to filter out. Not comprehensive though  */
    $stop_words = array("the", "and", "a", "to", "of", "in", "i", "is",
                         "that", "it", "on", "you", "this", "for", "but",
                         "with", "are", "have","has", "be", "at", "or", "as",
                         "was", "so", "if", "out", "not", "am");
 /* Remove stop words */
        if(!in_array($mac, $stop_words)) {
          echo "<mark>".$mac."</mark> ";
          array_push($newarr,$mac);
            
        }
}

 while ($fruit = current($newarr)) {
    //because word is present as a key
       echo $fruit."    ";
 print_r(getocurence($b,$fruit));
    echo "<br>";

    
    next($newarr);
}
$result=array_intersect($save,$newarr);
$len=count($result);
$total=count($save);
echo "<br>".$len."  length of words matched<br>";

if($total!=0)
{
  if (($len*100)/$total>=80)
{
  echo " above 80 <br> ";
  

}
elseif(($len*100)/$total>=50 && ($len*100)/$total<80)
echo " above 50 and below 80 <br> ";
else
{
echo " below 50 <br>";
}
}

$conn->close();



      }

   ?>
   </div>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </body>
  </html>
