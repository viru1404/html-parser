<?php
//contains link of page
$str = file_get_contents('page.html');
//contains all the words in array in sequence as they were in page 
$b=str_word_count(strip_tags(strtolower($str)), 1);
print_r($b);
echo "<br>";
//contains only count of words and word as key and count as value (removed duplicates)
$a=array_count_values(str_word_count(strip_tags(strtolower($str)), 1));
print_r($a);
// to get positions in an array
/*
Use strtolower() to make everything lower case.
Strip HTML tags using strip_tags()
Create an array of words used using str_word_count(). The strtolower returns an array containing all the words found inside the string.
Use array_count_values() to capture words used more than once by counting the occurrence of each value in your array of words.
Use print_r() to display the results.
*/
?>
