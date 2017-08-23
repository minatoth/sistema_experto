@extends('layout')

@section('titulo')
Registro de paciente
@stop

@section('cuerpo')

<form class="form-horizontal" role="form" action="registrarpac" method="post">
<div class="panel-heading titleform" style="background-color:#D8F781; top:100px; left:100px; width:940px; margin-bottom:1%; border-radius:5px;"><font size="4" color="white">Formulario de registro de pacientes</font> </div>
  <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-2 control-label">Nombre:</label>
    <div class="col-lg-5">
      <input type="text" class="form-control" name="nombrepac" 
             placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-2 control-label">Apellido paterno:</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" name="paternopac" 
             placeholder="Apellido paterno">
    </div>
    <label for="ejemplo_password_3" class="col-lg-2 control-label">Apellido materno:</label>
    <div class="col-lg-4">
      <input type="" class="form-control" name="maternoopac" 
             placeholder="Apellido materno">
    </div>
  </div>
  <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-2 control-label">Fecha de nacimiento:</label>
   <div class="col-lg-4">
      <input type="date" name="fechapac" class="form-control" value="<?=old("fechapac")?>">
    </div>
    <label for="ejemplo_password_3" class="col-lg-2 control-label">Género:</label>
    <div class="col-lg-4">
    <select class="form-control" name="sexpac">
  		<option value="Masculino">Masculino</option>
  		<option value="Femenino">Femenino</option>
	</select>
    </div>
  </div>
  <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-2 control-label">Cédula de identidad:</label>
   <div class="col-lg-2">
     <input type="number" class="form-control" name="carnetpac" 
             placeholder="CI">
    </div>
    <label for="ejemplo_password_3" class="col-lg-0 control-label"></label>
    <div class="col-lg-2">
    <select class="form-control" name="expac">
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
    <label for="ejemplo_password_3" class="col-lg-2 control-label">Telefono:</label>
    <div class="col-lg-4">
      <input type="number" class="form-control" name="telefonopac" 
             placeholder="Telefono del paciente">
    </div>
  </div>
   <div class="form-group">
    <label for="ejemplo_password_3" class="col-lg-2 control-label">Ocupación:</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" name="ocupacionpac" 
             placeholder="Ocupación">
    </div>
    <label for="ejemplo_email_3" class="col-lg-2 control-label">Dirección:</label>
    <div class="col-lg-4">
      <textarea class="form-control" rows="3" placeholder="Dirección del paciente" name="direccionpac"></textarea>
    </div>
  </div>
  <center>
   <div class="form-group">
    <div>
      <button type="submit" class="btn btn-danger" role="button">Registrar paciente
       <span class="glyphicon glyphicon-plus-sign"></span>
      </button>
      <button class="btn btn-primary">Limpiar datos
       <span class="glyphicon glyphicon-trash"></span>
      </button>
    </div>
    </div>
    </center>
</form>
@stop