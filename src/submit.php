<?php

namespace myscript;

include './lib/dataParser.php';
use myscript\lib\FileHandler;
include './lib/fileHandler.php';

 $file = $_FILES['file_1']['name'];

 if (!$file) {
   echo "file not found";
   return false;
 }

 $parser = new FileHandler($file);

 $lines = $parser->getLines();

 var_dump($lines);

 $regex = '/(?:(?:19|20)[0-9]{2})/';

 $regex2 = '/(\d+)\)/';

 $regex3 = '/^(in coll.$/';
//read file lines
 $fileRead = fopen($file, "r") or exit("Unable to open file!");
 //Output a line of the file until the end is reached
 $matches = [];
 $lines;
 $years;
 $entries;
 $yearFound;
 $entryFound;
 $result;
 $count = 0;
 while(!feof($fileRead))
  {
    //get the line
    $line = fgets($fileRead);

    if(strlen(trim($line)) >= 2) {
      //check for year
      if(preg_match($regex, $line, $years) ) {
        $yearFound = $years[0];        
      }

      //check for ordinal number (e.g. '1)')
      if(preg_match($regex2, $line, $entries) ) {
        $entryFound = $entries[0];      
      }

      //put the found entry into ordinal number at year index
      if ($yearFound && $entryFound) {
        #echo "Putting " . $entryFound . "into " . $yearFound . "\n";
        $purgedLine = str_replace($entryFound, "", $line);
        $result[$yearFound][] = $purgedLine;
      }
      $lines[$count] = $line;
    }
    $count++;
   }
 fclose($fileRead);

 if(count($lines) == 0) {
   die("no lines found");
 }

 /*foreach ($lines as $line) {
   if(preg_match($regex, $line, $matches)) {
     $years[$matches[0]][] = $line;
   }
 }*/
 ?>
 <html>
  <body>
    <div class="container">
      <?php
      foreach ($result as $year => $list) {
        echo "<h1>" . $year . "</h1><ul style=\"list-style-type:none\" class=\"entries\">"; 
          foreach ($list as $value) {
            echo "<li>" . $value . "</li>";
          }
          echo "</ul>"; 
        }
        ?>        
    </div>  
  </body>
 </html>
