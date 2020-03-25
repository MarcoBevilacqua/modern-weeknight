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

# var_dump($lines);

 include('../views/template/head.html'); ?>
  <div class="container">
  <div class="col text-center"><a href="../index.php" id="saveForm" class="btn btn-outline-secondary" >back</a></div>
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
  </div>    
<?php include('../views/template/head.html'); ?> 
