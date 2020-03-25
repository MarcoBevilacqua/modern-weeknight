<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Modern Weeknight</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h2 class="title form-title">Ugly lines beautifier</h2>
      </div>
    </div>
    <div class="row">      
      <div class="col">
        <form id="mw_form" class="mw_form form" enctype="multipart/form-data" method="post" action="./src/submit.php">
          <div class="form-group">
            <label for="mw_file">Upload a File</label>
            <input id="mw_file" name="mw_file" class="form-control" type="file" />
          </div>
          <div class="col text-center">
            <input id="saveForm" class="btn btn-primary" type="submit" name="submit" value="Parse" />
          </div>        
        </form>        
      </div>
    </div>
  </div>
</body>
</html>