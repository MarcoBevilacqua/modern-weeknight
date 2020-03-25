<?php 

namespace mw\lib;

class DataParser {

    /**
     * regex pattern to use
     */
    
    private $yearRegex = '/(?:(?:19|20)[0-9]{2})/';
    private $ordinalNumberRegex = '/(\d+)\)/';
    private $authorRegex = '/^(in coll.$/';

    function __construct()
    {
        
    }

    public function parse(string $line)
    {
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

    }
}