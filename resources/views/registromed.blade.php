<!DOCTYPE html>
<html>
<head>
{!! Html::style('css/login.css') !!}
{!! Html::script('js/jquery.js') !!}
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::style('assets/css/bootstrap.min.css') !!}
	<title>Registro medico</title>
</head>
<body class="fondo">
<div class="principal2">
	<div class="content2">
		<div class="logo"> <img src="{{url('imagenes/cinco.png')}}"><font style="color:#A7A1A1;" size="4"><strong>TROPICAL DIAGNOSIS</strong></font></div>
		<form class="form-horizontal" role="form" action="enviar" method="post">
 <div class="form-group">
    <label  class="col-lg-2 control-label">Nombre(s):</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" 
             placeholder="Nombre(s)" name="nomusu">
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">Paterno:</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" placeholder="Apellido paterno" name="apausu">
    </div>
    <label class="col-lg-2 control-label">Materno:</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" placeholder="Apellido materno" name="amausu">
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">CI:</label>
   <div class="col-lg-7">
     <input type="number" class="form-control" 
             placeholder="CI" name="ciusu">
    </div>
    <label class="col-lg-0 control-label"></label>
    <div class="col-lg-3">
    <select class="form-control" name="expusu">
        <option>LP</option>
        <option>OR</option>
        <option>PO</option>
        <option>CB</option>
        <option>TA</option>
        <option>CH</option>
        <option>SC</option>
        <option>BE</option>
        <option>PA</option>
      </select>
    </div>
    </div>
    <div class="form-group">
    <label class="col-lg-2 control-label">Fecha de nacimiento:</label>
      <div class="col-lg-10">
      <input type="date" name="fecusu" class="form-control" value="<?=old("fec_nac")?>" id="">
    </div>
  </div>
 <div class="form-group">
    <label  class="col-lg-2 control-label">Nick:</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" 
             placeholder="Nick" name="nickusu">
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">Contraseña:</label>
    <div class="col-lg-10">
      <input type="password" class="form-control" id="ejemplo_password_3" 
             placeholder="Contraseña" name="pass">
    </div>
  </div>
  <div class="form-group" style="padding-left:12%;">
    <div class="col-lg-offset-3 col-lg-10">
      <button type="submit" class="btn btn-primary" role="button">Registrarse</button>
      <a href="inicio" class="btn btn-danger" role="button">Identificarse</a>
    </div>
  </div>
</form>
	</div>
</div>
</body>
</html>
