<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<title>Reporte SIGERI</title>	
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-flex.min.css" >
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" >
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="css/app.css">

   
</head>
<body>

	<!-- Título -->
	<header id="" class="titulo">
		<div class="row">
			<div class="col-xs text-xs-center">
				<h2> <strong>Reporte de Atenciones SIGERI</strong></h>
			</div>			
		</div>
	</header>
	<!-- /Título -->

	<!-- Filtros -->
	<form action="" id="formFiltro">
		<div class="filtro-container">
			<div class="container">
				<div class="row">				
						<label for="example-date-input" class="col-xs-3 col-sm-1 col-md-1 col-form-label label-xs">Desde:</label>
					  	<div class="col-xs-9 col-sm-4 col-md-4 ">
					    	<input class="form-control" type="date" value="2011-08-19" id="dtDesde">
					  	</div>
						<label for="example-date-input" class="col-xs-3 col-sm-1 offset-sm-2 col-md-1 offset-md-2 col-form-label label-xs">Hasta:</label>
					  	<div class="col-xs-9 col-sm-4 col-md-4">
					   		<input class="form-control" type="date" value="2011-08-19" id="dtHasta">
					  	</div>				  	
				</div>

				<div class="row">				
						<label for="" class="col-xs-3 col-sm-1 col-form-label">Agent:</label>
						<div class="col-xs-9 col-sm-11">
							<select name="select" class="form-control">
							  <option value="value1">Value 1</option> 
							  <option value="value2" selected>Value 2</option>
							  <option value="value3">Value 3</option>
							</select>
						</div>
				</div>

				<div class="row ">
					<div class="col-xs-12 col-sm-2 ">
						<button class="btn btn-primary form-text">
							Buscar
						</button>					
					</div>
					<div class="col-xs-12 col-sm-2 ">
						<button class="btn btn-primary form-text">
							Exportar
						</button>					
					</div>				
				</div>
			</div>
		</div>
	</form>
	<!-- /Filtros -->

	<!-- Tabla resultado -->

	<div class="contiene-tabla">
		<div class="container">
			<div class="row tabla">
				<table class="col-xs-12 table table-striped">
				    <thead>
				        <tr>
				            <th>Nro REQ</th>
				            <th>Sistema</th>
				            <th>Asunto</th>
				            <th>Tipo REQ</th>
				            <th>Estado</th>
				            <th>Fecha Inicio</th>
				            <th>Fecha Cierre</th>
				        </tr>
				    </thead>
				    <tbody>
				        <tr>
				            <td>1</td>
				            <td>Rocky</td>
				            <td>Balboa</td>
				            <td>rockybalboa@mail.com</td>
				            <td>Rocky</td>
				            <td>Balboa</td>
				            <td>rockybalboa@mail.com</td>
				        </tr>
				        <tr>
				            <td>2</td>
				            <td>Peter</td>
				            <td>Parker</td>
				            <td>peterparker@mail.com</td>
				            <td>Rocky</td>
				            <td>Balboa</td>
				            <td>rockybalboa@mail.com</td>
				        </tr>
				        <tr>
				            <td>3</td>
				            <td>John</td>
				            <td>Rambo</td>
				            <td>johnrambo@mail.com</td>
				            <td>Rocky</td>
				            <td>Balboa</td>
				            <td>rockybalboa@mail.com</td>
				        </tr>
				    </tbody>
				</table>
			</div>
		</div>
		<div class="row">
              <div id="paginator-container" class="col-xs text-xs-center ">
                <nav>
                  <ul class="pagination">
                    <li class="page-item disabled">
                      <a href="#" class="page-link">
                        &laquo;
                      </a>
                    </li>
                    <li class="page-item active">
                      <a href="#" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link">5</a>
                    </li>
                    <li class="page-item disabled">
                      <a href="#" class="page-link">
                        &raquo;
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
	</div>
	

	<!-- /Tabla resultado -->

		

	<!-- /Grilla -->




	<!-- jQuery first, then Tether, then Bootstrap JS. -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap-datetimepicker.min.js" ></script>
	<script src="js/app.js" ></script>
	<!--
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->

    <script type="text/javascript">
	  $(function() {
	    $('#datetimepicker1').datetimepicker({
	      language: 'pt-BR'
	    });
	  });
	</script>
</body>
</html>