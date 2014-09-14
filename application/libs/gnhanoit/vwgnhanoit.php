
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>fhanoit</title>
    <!-- css -->
    <link href="<?php echo URL; ?>/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>/public/css/style.css" rel="stylesheet">

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">FPHANOIT</a>
        </div>
        <div class="navbar-collapse collapse">
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12col-md-12 main">
          <h1 class="page-header">Auto Generador Código</h1>
          <form action="gnhanoit/crear" method="post">
            <div class="form-group">
              <select name="table" class="form-control">
                <option value="">Seleccione Tabla</option>
                <?php echo $Table; ?>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Crear Crud</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>/public/js/application.js"></script>
    <script src="<?php echo URL; ?>/public/js/bootstrap.min.js"></script>
  </body>
</html>