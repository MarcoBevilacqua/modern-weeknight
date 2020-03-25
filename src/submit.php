<?php

namespace mw\src;

include './lib/dataParser.php';
include './lib/fileHandler.php';

use  mw\src\lib\FileHandler;

 $file = $_FILES['mw_file']['name'];

 if (!$file) {
   echo "file not found";
   return false;
 }

 $parser = new FileHandler($file);
 $lines = $parser->getLines();

 include('../views/template/head.html'); ?>
  <div class="container">  
    <table class="table">
      <thead>
        <tr class="header-row">
          <th>#</th>
          <th class="header-row line">Content</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($lines as $key => $line) {
            echo '<tr><td>' . ++$key . '</td><td>' . $line . '</td></tr>';
          } ?>        
      </tbody>
    </table>
    <div class="col text-center"><a href="../index.php" id="saveForm" class="btn btn-outline-secondary" >back</a></div>
  </div>    
<?php include('../views/template/footer.html'); ?> 
