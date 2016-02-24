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
   <center><h1>Webpage Parser</h1></center><br/><br/>
   <div class="container">
   <form action="" method="get">
   <spam>Enter http before link must</spam>
   <input type="text" name="url" class="form-control" placeholder="Enter Url Of Webpage" required>
   <center> <button class="btn btn-default" type="submit">Parse</button></center>
   </form>
   </div>
   <div class="container text-center">
     <?php
     if(isset($_GET["url"])){
     $q=$_GET['url'];
     $htmlpage = file_get_contents($q);
//Create a new DOM document
$dom = new DOMDocument;

//Parse the HTML. The @ is used to suppress any parsing errors
//that will be thrown if the $html string isn't valid XHTML.
@$dom->loadHTML($htmlpage);

//Get all links. You could also use any other tag name here,
//like 'img' or 'table', to extract other tags.
$alllinks = $dom->getElementsByTagName('a');

//Iterate over the extracted links and display their URLs
foreach ($alllinks as $link){
   //Extract and show the "href" attribute.
    // data written
        // echo $link->nodeValue."<br>";
         //link
   // echo $link->getAttribute('href').'<br>';

  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "searchengine";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$a=$link->getAttribute('href');
if(substr($a,0,4)!="http")
{
$a=$q.$a;
}
$sql = "INSERT INTO links (link, outlink)
VALUES ('$q', '$a')";

if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
   echo $a.'<br>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


}
      
     }
   ?>
   </div>
    
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </body>
  </html>
  
