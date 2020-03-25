<?php 
namespace mw\src\lib;
use mw\lib\DataParser;

class FileHandler {
    
    private $fileName;
    private $dataParser; 

    function __construct(string $fileName) {

        $this->fileName = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $fileName;
        $this->dataParser = new DataParser();         
    }

    private function getHandler()
    {
        $handler = fopen($this->fileName, "r") or exit("Unable to open file!");
        return $handler;        
    }

    private function close($fileHandler) {
        return fclose($fileHandler);
    }

    /**
     * return document lines as array
     * @param $fileHandler
     * @return array
     */
    public function getLines()
    {   
        
        $fileHandler = $this->getHandler();

        if(!$fileHandler) {
          exit("Cannot get File Handler");  
        }

        $lines = [];
        $lineCounter = 0;
                
        while (!feof($fileHandler)) {
            //get the line
            $line = fgets($fileHandler);            

            //check if line is not empty
            if(strlen(trim($line)) >= 2) {

                // check if line should be attached to previous line                 
                if ($this->dataParser->shouldAppendLine($line)) {
                    //append content to last line and skip loop
                    $lines[$lineCounter-1] .= $line;                                        
                    continue;           
                }                                

                //put line into array
                $lines[$lineCounter] = $line;
                //counter increment            
                $lineCounter++;
            }            
        }

        $this->close($fileHandler);
        return $lines;
    }

}