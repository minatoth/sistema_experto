@extends('layout')
@section('titulo')
Lista pacientes
@stop
@section('cuerpo')
<div style="width:90%; color:#000; font-size: 12px; padding-left:2%; margin-left: 4%;">
<div class="panel panel-info cuerpo" style="padding: 20px 0px 0px 10px;">
	<fieldset>
<div class="panel-heading titleform" style="background-color:#D8F781; top:10px; left:10px; width:810px; margin-bottom:1%; margin-top:1px; border-radius:5px;"><font size="4" color="white">Lista de pacientes</font> </div>
	<table id="example" class="table table-bordered table-striped" style="float:left; border:1px #fff solid; width: 810px;  ">
	<thead >
		<tr class="success">
			<th style="width:10%;">CI</th>
      <th style="width:10%;">PACIENTE</th>
      <th style="width:10%;">APELLIDOS</th>
      <th style="width:10%;">DIRECCIÓN</th>
			<th data-orderable="false">ACCIONES </th>
		</tr>
	</thead>
	<tbody style="font-size:11px;">
     <?php
	
		 if(count($pacientes)>0):?>
      <tr>
        <?php
          foreach ($pacientes as $paciente):
          ?>
            <th><?php echo $paciente->ciPac;?></th>
            <th><?php echo $paciente->nomPac;?></th>
            <th><?php echo $paciente->apePac;?></th>
            <th><?php echo $paciente->dirPac;?></th>
            <th  style="width:40%;">
            <center>
            <!-- Trigger the modal with a button -->
            <div>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><font size="2">Modificar</font><span class="glyphicon glyphicon-pencil"></span></button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog" style="margin-top:120px;">
            <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header" style="background-color:#D8F781;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <font size="1" color="white">Modificar datos del paciente</font>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" role="form" action="registrarpac" method="post">
              <div class="form-group">
              <label for="ejemplo_email_3" class="col-lg-2 control-label">Nombre:</label>
                <div class="col-lg-5">
                  <input type="text" class="form-control" name="nombrepac2"
                  placeholder="Nombre">
                </div>
              </div>
              <div class="form-group">
              <label for="ejemplo_password_3" class="col-lg-2 control-label">Apellido paterno:</label>
                <div class="col-lg-4">
                  <input type="text" class="form-control" name="paternopac2"
                    placeholder="Apellido paterno">
                </div>
              <label for="ejemplo_password_3" class="col-lg-2 control-label">Apellido materno:</label>
                <div class="col-lg-4">
                  <input type="" class="form-control" name="maternoopac2"
                    placeholder="Apellido materno">
                  </div>
              </div>
              <div class="form-group">
                <label for="ejemplo_password_3" class="col-lg-2 control-label">Fecha de nacimiento:</label>
              <div class="col-lg-4">
                <input type="date" name="fechapac2" class="form-control" value="<?=old("fechapac")?>">
              </div>
              <label for="ejemplo_password_3" class="col-lg-2 control-label">Género:</label>
              <div class="col-lg-4">
                <select class="form-control" name="sexpac2">
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </div>
              </div>
              <div class="form-group">
                <label for="ejemplo_password_3" class="col-lg-2 control-label">Cédula de identidad:</label>
              <div class="col-lg-2">
                <input type="number" class="form-control" name="carnetpac2"
                placeholder="CI">
              </div>
                <label for="ejemplo_password_3" class="col-lg-0 control-label"></label>
              <div class="col-lg-2">
                <select class="form-control" name="expac2">
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
                <input type="number" class="form-control" name="telefonopac2"
                placeholder="Telefono del paciente">
              </div>
              </div>
              <div class="form-group">
              <label for="ejemplo_password_3" class="col-lg-2 control-label">Ocupación:</label>
              <div class="col-lg-4">
                <input type="text" class="form-control" name="ocupacionpac2"
                placeholder="Ocupación">
              </div>
                <label for="ejemplo_email_3" class="col-lg-2 control-label">Dirección:</label>
              <div class="col-lg-4">
                <textarea class="form-control" rows="3" placeholder="Dirección del paciente" name="direccionpac2"></textarea>
              </div>
              </div>
            </form>
            </div>
            <div class="modal-footer" style="padding-right:30%;">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Modificar <span class="glyphicon glyphicon-ok"></span></button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar <span class="glyphicon glyphicon-remove"></span></button>
            </div>
            </div>
            </div>
            </div>
            <button class="btn btn-primary"><font size="2">Eliminar</font>
            <span class="glyphicon glyphicon-trash"></span>
            </button>
              <a class="btn btn-warning" href="{{$paciente->id}}/diagpaciente"><font size="2">Evaluacion</font><span class="glyphicon glyphicon-th-list"></span></a>
            </th>
            </div>
            </center>
      </tr>
        <?php endforeach; endif;
      ?>
	</tbody>
</table>
</fieldset>
</div>
</div>

@stop
