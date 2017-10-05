<?php
include 'ParseClass.php';
include 'SaveClass.php';

$view = '';
$alert = '';
if(isset($_POST['data']))
{
    $pc = new ParseClass();
    $pc->data = $_POST['data'];
    $parse = $pc->getParseData();

    $view = '<table class="table table-bordered">
              <tr>
                  <td>Nama</td>
                  <td>'.$parse['nama'].'</td>
              </tr>
              <tr>
                  <td>Alamat</td>
                  <td>'.$parse['alamat'].'</td>
              </tr>
              <tr>
                  <td>Kode Pos</td>
                  <td>'.$parse['kode_pos'].'</td>
              </tr>
              <tr>
                  <td>Telepon</td>
                  <td>'.$parse['telepon'].'</td>
              </tr>
    </table>';

    //save to db;

    $sc = new SaveClass();
    $sc->nama = $parse['nama'];
    $sc->alamat = $parse['alamat'];
    $sc->kode_pos = $parse['kode_pos'];
    $sc->telepon = $parse['telepon'];
    if($sc->save())
    {
        $alert = '<div class="alert alert-success" role="alert">New record created successfully</div>';
    }
    else
    {
      $alert = '<div class="alert alert-success" role="alert">New record created successfully</div>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Test</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container">
        <div class="row">
            <div class="col-md-6"> 
                <?=$alert?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="index.php" method="post">
                  <div class="form-group">
                    <label for="data">Data</label>
                    <input type="text" class="form-control" id="data" name="data" value="MURIBUDIMAN Taman Surya 5 Blok GG4 No. 57 Jakarta Barat Indonesia 11730 Tel. +62818-53-0817" placeholder="Data">
                  </div>
                  <button type="submit" class="btn btn-default">OK</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?=$view?>
            </div>
        </div>
      </div>
  </body>
</html>