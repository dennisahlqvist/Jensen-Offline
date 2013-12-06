<?php
//include("dbconnect.php");


function addUserToList($firstname,$lastname,$email,$tel,$num){
  echo('<div class="row add-user-row">
    <div class="col-sm-6">
      <h3>Användare</h3>
      <div class="form-group">
        <label for="inputFname'.$num.'" class="control-label">Förnamn</label>
        <div class="">
          <input type="text" class="form-control" id="inputFname'.$num.'" placeholder="Inklusive mellannamn" value="'.$firstname.'">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEname'.$num.'" class="control-label">Efternamn</label>
        <div class="">
          <input type="text" class="form-control" id="inputEname'.$num.'" placeholder="" value="'.$lastname.'">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail'.$num.'" class="control-label">Privat&nbsp;email</label>
        <div class="">
          <input type="email" class="form-control" id="inputEmail'.$num.'" placeholder="exempel@domän.se" value="'.$email.'">
        </div>
      </div>
      <div class="form-group">
        <label for="inputTelephone'.$num.'" class="control-label">Telefon</label>
        <div class="">
          <input type="tel" class="form-control" id="inputTelephone'.$num.'" placeholder="+46 ..." value="'.$tel.'-'.$num.'">
      </div>
      </div>
      <div class="form-group">
        <label for="inputAccess'.$num.'" class="control-label">Behörighet</label>
        <div class="">
        <select id="inputAccess'.$num.'" class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="jensen-account-info">
        <h3>Användarkonto</h3>
        <p>Användarnamn: <span class="user-name">-</span></p>
        <p>Jensen mail: <span class="jensen-email">-</span></p>
      </div>
    </div>
  </div>');
}



?><!DOCTYPE html>
<html>
<head>
  <title>Jensen offline</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<header>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container"><!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>
        
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">  
          <li class="active"><a href="#">Start</a></li>
          <li><a href="#">Hantera konton</a></li>
          <li><a href="#">Boka dator</a></li>
          <li><a href="#">Boka lokal</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>  
</header>

<div class="container">
<div class="add-user-nav">
  <ul class="nav nav-tabs navbar-left">
    <li class="active"><a href="#">Kontouppgifter</a></li>
    <li><a href="#">Program</a></li>
    <li><a href="#">Kurser & betyg</a></li>
    <li><a href="#">LIA</a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="import_users.php">Importera</a></li>
  </ul>
</div>

<form class="form add-user-form" role="form">
  

<?php

$allowedExts = array("csv", "lol", "tst", "txt");
$target_path = "./";
//print_r($_FILES);
if(isset($_FILES['inputFile'])){
  $target_path = $target_path . basename( $_FILES['inputFile']['name']); 

  $temp = explode(".", $_FILES["inputFile"]["name"]);
  $extension = end($temp);
  unset($temp);
  if(!in_array($extension, $allowedExts)){die("Felaktig Fil!");}
  $row = 0;
  if (($handle = fopen($_FILES['inputFile']['tmp_name'], "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          //$num = count($data);
         // echo "<p> $num fields in line $row: <br /></p>\n";
          /*for ($c=0; $c < $num; $c++) {
              echo $data[$c] . "<br />\n";
          }^*/

        addUserToList($data[0],$data[1],$data[3],$data[4],$row);
        //sleep(1);//uncomment to enable enterprise mode
        $row++;
      }
      fclose($handle);
  }



}else{
addUserToList('','','','',0);


}



/*
addUserToList('Ozell','Nicholson','MxzueK@iPawIS.edu','4799322574',0);
addUserToList('Ozell','Nicholson','MxzueK@iPawIS.edu','4799322574',1);
addUserToList('Ozell','Nicholson','MxzueK@iPawIS.edu','4799322574',2);
addUserToList('Ozell','Nicholson','MxzueK@iPawIS.edu','4799322574',3);
addUserToList('Ozell','Nicholson','MxzueK@iPawIS.edu','4799322574',4);
addUserToList('Ozell','Nicholson','MxzueK@iPawIS.edu','4799322574',5);
*/







?>
  <div class="row save-button-row">
    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-default">Spara och generera Jensenkonton</button>
      </div>
    </div>
  </div>
</form>

</div> <!-- // .container -->

<footer>
  <p>support@jensenoffline.com</p>
  <p>The footer will be moved down a bit with js. Not implemented in mockup</p>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>