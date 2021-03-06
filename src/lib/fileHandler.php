<?php 
namespace myscript\lib;

class FileHandler {

    private $fileName;

    function __construct(string $fileName) {

        $this->fileName = $fileName;        
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

        $lines;
        $lineCounter = 0;
                
        while (!feof($fileHandler)) {
            //get the line
            $line = fgets($fileHandler);            

            //check if line is not empty
            if(strlen(trim($line)) >= 2) {

                // check if line starts with a number; if not it should be attached to previous line 
                if (!is_numeric(substr(ltrim($line), 0, 1))) {
                    $temporaryLine = $lines[$lineCounter-1];
                    $temporaryLine .= $line;
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