<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte</title>
	
<style>
	label{
		font-family: Arial, Helvetica, sans-serif;
   		 font-size: x-small;
	}
	body {
   		 font-family: Arial, Helvetica, sans-serif;
   		 font-size: small;
	}

	table {
	    border-collapse: collapse;
	    width: 100%;
	}
	th, td {
	    text-align: left;
	    padding: 6px;
	    font-size: xx-small;
	}
	tr:nth-child(even){background-color: #f2f2f2}
	th {
		text-align:center;
	    background-color: #000;
	    color: white;
	}
	
	td {
		text-align:center;
	    font-weight: lighter !important;
	}
	.text-foo {
		 font-size: xx-small;
	  color: #555555;
	  text-align:center;
	  font-weight: bold;
   	}
	}
	.text-det {
		 font-size: xx-small;
	  color: #555555;
	}
	.text-success {
	  color: #3c763d;
	}
	.text-success {
	  color: #3c763d;
	}
	.text-primary {
	  color: #428bca;
	}
	.text-info {
	  color: #31708f;
	}
	.text-danger {
	  color: #a94442;
	}
	.text-warning {
  	  color: #8a6d3b;
	}
	.cabecera {
   		  background-color: #dedede;
	}
	.secundario {
   		  color: #428bca;
   		  text-align: right;
			font-size: xx-small;
	}
	.filtro {
   		  color: #787878;
   		  text-align: center;
		  font-size: xx-small;
	}
	.tituloRep {
   		  text-align: center;
   		  font-weight: bold;
   	}
   	.tituloRep2 {
   		font-size: small;
   		  text-align: center;
   		  font-weight: bold;
	}
	.titulo{
		color: red;
   		text-align: right;
   		font-weight: bold;
	}
	h5 {
    
    text-align: center;
	}
	p {
    text-indent: 50px;
}


* {
    box-sizing: border-box;
}

}
.row::after {
    content: "";
    clear: both;
    display: table;
}
[class*="col-"] {
    float: left;
    padding: 0px;
    
}
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}


</style>

</head>
	<body>
		<div>
	  		<div class="titulo">TOYOSA S.A.</div>
	  		<div class="secundario">{{ Auth::user()->nombre }}  |  <?php date_default_timezone_set('America/La_Paz'); $time = time(); echo date("d-m-Y H:i:s", $time);?>
	  		</div>
	  	</div>
	  

	  	<section >
	  		@yield('content')
		</section>
	<script src="{{ asset('plugins/jquery/js/jquery.js')}}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>