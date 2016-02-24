<?php
$htmlpage = file_get_contents('http://localhost/web/index.html');
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
         echo $link->nodeValue."<br>";
         //link
    echo $link->getAttribute('href'), '<br>';
}
?>
