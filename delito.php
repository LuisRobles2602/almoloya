<!DOCTYPE html>
<html lang="es">
<head>
	   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Delito</title>
	<style type="text/css">
		{
			margin: 0px;
			padding: 0px;
		}
		body{ background-image: url(descarga.png); 
		

		}
		form{ background: #D6DBDF ;
			width: 990px;
		    border: 1px solid #4e4d4d;
		    border-radius: 5px;	
		    -moz-border-radius:3px;
		    -webkit -border-radius:3px;
		    box-shadow: inset 0 0 10px #000;
		    margin: 35px auto;

		}
		form h2{
			text-align: center;
			color: #17202A  ;
			font-weight: normal;
			font-size: 40pt;
			margin: 30px 0px;
		}
		form input{
			width: 280px;
			height: 35px;
			padding: 0px 0px;
			margin: 10px 10px;
			color: #6d6d6d;
			background-color: #FDFEFE  ;
			text-align: center;
			 border-radius: 5px;
		}
		form p{
			margin: 10px 75px;
			font-family: 'Arial';
			line-height: 1.4;
		}
		form textarea{
			margin: 0px 0px;
			max-width: 920px;
			border-radius: 5px;
		}
		form button{
			width: 135px;
			margin: 20px 0px 30px 30px ;
			height: 50px;
			background: #17C9C9;
		}
		form button:hover{
			background: #B9B1B1;
		}
		@media (max-width: 960px){
			form{
				width: 100%;
			}
		}
	
		* {
				margin:0px
				padding:0px ;
			}
			
			#header {
				margin:auto;
				width:500px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav {
				width:500px; /*Le establecemos un ancho*/
				margin:10px 70px; /*Centramos automaticamente*/
			}
 
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}

		
	</style>

		<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<script type="text/javascript"> function esInteger(e) {
var charCode 
charCode = e.keyCode 
status = charCode 
if (charCode > 31 && (charCode < 48 || charCode > 57)) {
return false
}
return true
}
    </script>

</head>
<body >
<div id="header">
			<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
				<ul class="nav">
					<li><a href="">Infractor</a>
						<ul>
							<li><a href="menuEditarI.html">Editar</a></li>
							<li><a href="menuBuscarI.html">Buscar</a></li>
							<li><a href="VerInfractor.php">Ver Todos</a></li>
							</li>
						</ul>
					</li>

					<li><a href="">Delito</a>
						<ul>
							<li><a href="EditarDel.html">Editar</a></li>
							<li><a href="BuscarDel.html">Buscar</a></li>
							<li><a href="VerDelito.php">Ver Todos</a></li>
							</li>
						</ul>
					</li>
					<li><a href="">Afectado</a>
						<ul>
							<li><a href="menuEditarA.html">Editar</a></li>
							<li><a href="menuBuscarA.html">Buscar</a></li>
							<li><a href="VerAfectado.php">Ver Todos</a></li>
						</ul>
					</li>
					
				</ul>
			</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
		</div>
<br>
<?php
			

			$link=mysql_connect("localhost","root","p1234567") or die("No se pudo conectar al Servidor");
			mysql_select_db("almoloya",$link) or die ("No se pudo conectar a la B.D");
			$query=mysql_query("SELECT  * from delito order by folio desc limit 1",$link) or die(mysql_error());
			
			 if ($row=mysql_fetch_array($query)){
			 	$val=$row[0]+1;
			}
			else{
				$val=1;
			}
			?>

<form name="formularios" action="php/guardarDelito.php" method="get" autocomplete="off">
	<form name="formulariotarea">
	<h2>Delito</h2>
	
	<p>Folio<input type="number" name="dto" placeholder="Folio del Delito" required class="form-control" readonly="readonly" value="<?php echo"".$val;?>"  style='width:130px; height:35px'/>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Fecha<input type="date" name="fecha" placeholder="Nombre" required class="form-control"  style='width:140px; height:35px'/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Hora<input type="time" name="hora" placeholder="Nombre" required class="form-control"  style='width:140px; height:35px'/>

</p>
	<p>Tipo de Delito<input type="text" name="tipo" placeholder="Tipo de Delito" required class="form-control" maxlength="150" onkeypress="return soloLetras(event)"> 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Lugar<input type="text" name="lugar" placeholder="Lugar del Delito" required class="form-control" max="150"></p>
	<p>Descripci&oacute;n<br><textarea name="desc" placeholder="Descripci&oacute;n del Delito " required class="form-control" cols="112" rows="10" maxlength="250"></textarea></p>
	<p>N°.Afectados<input type="text" name="nafec" placeholder="N&uacute;mero de Afectados" required class="form-control" maxlength="10"  onkeypress="return esInteger(event)">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Status<input type="text" name="status" placeholder="Satus del Delito" required class="form-control" maxlength="200" >
	</p>
		<!--<p>Afectado<input type="text" name="afectado" placeholder="Nombre del Afectado" required class="form-control">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Infractor<input type="text" name="delin" placeholder="Nombre del Infractor" required class="form-control">



		</p>-->
        <br>
	      <center><input type="reset" value="Limpiar" name="limpiar" id="limpiar" style='width:120px; height:35px'/>
	      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="submit" value="Guardar" name="guardar" id="guardar" style='width:120px; height:35px'/></center><br><br>
		</form>
    </form>  
  
</body>
</html>