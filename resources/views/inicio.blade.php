<!DOCTYPE html>
<html>
<head>
{!! Html::style('css/login.css') !!}
{!! Html::script('js/jquery.js') !!}
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::style('assets/css/bootstrap.min.css') !!}
	<title>HOL</title>
</head>
<body class="fondo">
<div class="principal">
	<div class="content"><br>
 
	 <div class="wrapper"> <img src="{{url('imagenes/cinco.png')}}"><font style="color:#A7A1A1;" size="4"><strong>TROPICAL DIAGNOSIS</strong></font></div>
    <br>
    <form class="form-horizontal" role="form" action="login" method="post">
  <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Nombre:</label>
    <div class="col-lg-8">
      <input type="" class="form-control" id="" name="nickUsu" 
             placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-3 control-label">Contraseña:</label>
    <div class="col-lg-8">
      <input type="password" class="form-control" id="password" name="password" 
             placeholder="Contraseña">
    </div>
  </div>
  <br/>
  <div class="form-group" style="padding-left:5%;">
    <div class="col-lg-offset-3 col-lg-10">
  
      <button type="submit" class="btn btn-primary">Entrar</button>
      <a class="btn btn-danger" href="regmed" role="button">Registrarse</a></button>
    </div>
  </div>
</form>
	</div>
</div>
</body>
</html>