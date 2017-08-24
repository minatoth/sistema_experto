@extends('layout')
@section('titulo')
Diagnostico paciente
@stop
@section('cuerpo')
<script type="text/javascript">
  function calcular(valor,id)
  {
      var texto = "#text"+id;
      $(texto).val(valor);

  }
  function porcentaje(id, var1)
  {
    var res= "#resultado"+id;
    var con = 0;
    var total =0;
    var html='';
    for(var i=2; i<=40;i++)
    {
      var j=i-1;
      var texto = "#text"+i;
      if( $(texto).val()==1 )
      {
          console.log('no es no');
      }
       else{
        con = con+1;
        total = total + parseInt($(texto).val());
        var pregunta= {!! json_encode($sintomas->toArray()) !!};
        html=html+pregunta[j].desSin+'<br/>';
      }
    }
    if (con==0) {
      alert("El paciente tiene 0% de probabildad de tener una enfermedad tropical");
    }
    else
    {
        var por = total/con;
        console.log(total);
        console.log(con);
        $(res).val(por);
        var vent = 'ventana'+id;
        var resultados= 'resultados'+id;
        var elemento = document.getElementById(vent);
        document.getElementById(resultados).innerHTML = html+'<br/>';
      elemento.style.display=var1;

    }
  }
</script>

<form class="form-horizontal" role="form" action="registrarpaciente" method="post">
<div class="panel-heading titleform" style="background-color:#D8F781; top:100px; left:100px; width:940px; margin-bottom:1%; border-radius:5px;"><font color="white" size="4">Evaluación - Paciente: {{$pacientes->nomPac.' '.$pacientes->apePac}}</font> </div>
<div style="border:solid 1px; border-radius:5px; border-color:#D8F781;">

<div>
  <img src="{{url('imagenes/medico3.png')}}" style="height:350px; width:350px; margin-left: 5%; "/>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal1">INICIAR EVALUACIÓN</button>
   <input type="button" class="btn btn-success" value="ACTUALIZAR EVALUACIÓN" onclick="window.location.reload()" />
<!--PREGUNTA UNO-->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">Recide actualmente en la la Región de los Yungas o realizo un viaje en esta Región.</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal2" onclick="javascript:calcular('100','1');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal2" onclick="javascript:calcular('1','1');">NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!--ESTA PARTE ES LA DESICION SI TIENE FIEBRE PROLONGADA MODAL 2 SI ES SI MODAL 3 Y SI NO MODAL 4-->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta fiebre?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
          <?php
            for ($i=1; $i <= 40; $i++) {
              echo '<input type="hidden" id="text'.$i.'" name="text'.$i.'" value="1">';
            }
           ?>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal3" onclick="javascript:calcular('100','2');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal3" onclick="javascript:calcular('75','2');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal4" onclick="javascript:calcular('1','2');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal4" onclick="javascript:calcular('25','2');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!--FIN DEL MODAL 2-->
<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta dolor de cabeza?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal5" onclick="javascript:calcular('100','3');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal5" onclick="javascript:calcular('75','3');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal6" onclick="javascript:calcular('1','3');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal6" onclick="javascript:calcular('25','3');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!--MODAL 6 CHAGAS AGUDO-->
<div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta aumento de tamaño del abdomen? </font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal29" onclick="javascript:calcular('100','6');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal29" onclick="javascript:calcular('75','6');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal29" onclick="javascript:calcular('1','6');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal29" onclick="javascript:calcular('25','6');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal29" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta aumento de tamaño del higado?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal30" onclick="javascript:calcular('100','29');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal30" onclick="javascript:calcular('75','29');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal30" onclick="javascript:calcular('1','29');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal30" onclick="javascript:calcular('25','29');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal30" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta aumento de tamaño del bazo?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal31" onclick="javascript:calcular('100','30');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal31" onclick="javascript:calcular('75','30');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal31" onclick="javascript:calcular('1','30');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal31" onclick="javascript:calcular('25','30');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal31" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta perdida de apetito?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal32" onclick="javascript:calcular('100','31');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal32" onclick="javascript:calcular('75','31');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal32" onclick="javascript:calcular('1','31');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal32" onclick="javascript:calcular('25','31');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal32" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta perdida de peso?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal80" onclick="javascript:calcular('100','32');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal80" onclick="javascript:calcular('75','32');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal80" onclick="javascript:calcular('1','32');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal80" onclick="javascript:calcular('25','32');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal80" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Diagnóstico</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4"><font style="4">Presenta Leishmaniasis Visceral en un:</font></div>
        <div class="col-md-8"><button class="btn btn-danger btn-lg active" type="button" onclick="javascript:porcentaje('5','block');">Ver porcentaje</button>
          <div style="display:none" id="ventana5">
          <input type="text" id="resultado5" style="border:none;">
          </div>
          <div class="well" id="resultados5">
          </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--FIN DEL MODAL 6-->
<!--INICIO DEL MODAL 5-->
<div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta diarrea y vómito?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal7" onclick="javascript:calcular('100','5');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal7" onclick="javascript:calcular('75','5');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal8" onclick="javascript:calcular('1','5');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal8" onclick="javascript:calcular('25','5');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal7" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta coloracion amarillenta de la piel?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal9" onclick="javascript:calcular('100','7');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal9" onclick="javascript:calcular('75','7');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal10" onclick="javascript:calcular('1','7');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal10" onclick="javascript:calcular('25','7');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal9" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta aumento de tamaño del bazo?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal11" onclick="javascript:calcular('100','9');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal11" onclick="javascript:calcular('75','9');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal11" onclick="javascript:calcular('1','9');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal11" onclick="javascript:calcular('25','9');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal11" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta aumento de tamaño del higado? </font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal12" onclick="javascript:calcular('100','11');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal12" onclick="javascript:calcular('75','11');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal12" onclick="javascript:calcular('1','11');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal12" onclick="javascript:calcular('25','11');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal12" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta constantemente sueño o tiene dificultad para concentrarse?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal13" onclick="javascript:calcular('100','12');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal13" onclick="javascript:calcular('75','12');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal13" onclick="javascript:calcular('1','12');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal13" onclick="javascript:calcular('25','12');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal13" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta alteraciones de conducta?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal300" onclick="javascript:calcular('100','13');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal300" onclick="javascript:calcular('75','13');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal300" onclick="javascript:calcular('1','13');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal300" onclick="javascript:calcular('25','13');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal300" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Diagnóstico</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4"><font size="4">Presenta Malaria en un:</font></div>
        <div class="col-md-8"><button class="btn btn-danger btn-lg active" type="button" onclick="javascript:porcentaje('1','block');">Ver porcentaje</button>
          <div style="display:none" id="ventana1">
          <input type="text" id="resultado1" style="border:none;">
          <div class="well" id="resultados1">

          </div>
          </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--FIN DE LA ENFERMEDAD VISCERAL-->
<!--INICIO DEL MODAL 5-->
<div class="modal fade" id="modal10" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta dolor muscular?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal14" onclick="javascript:calcular('100','10');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal14" onclick="javascript:calcular('75','10');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal14" onclick="javascript:calcular('1','10');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal14" onclick="javascript:calcular('25','10');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal14" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta dolor articular?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal15" onclick="javascript:calcular('100','14');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal15" onclick="javascript:calcular('75','14');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal15" onclick="javascript:calcular('1','14');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal15" onclick="javascript:calcular('25','14');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal15" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta perdida de apetito?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal16" onclick="javascript:calcular('100','15');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal16" onclick="javascript:calcular('75','15');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal16" onclick="javascript:calcular('1','15');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal16" onclick="javascript:calcular('25','15');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal16" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta enrojecimiento de los ojos?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal17" onclick="javascript:calcular('100','16');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal17" onclick="javascript:calcular('75','16');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal17" onclick="javascript:calcular('1','16');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal17" onclick="javascript:calcular('25','16');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal17" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta erupciones cutaneas?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal200" onclick="javascript:calcular('100','17');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal200" onclick="javascript:calcular('75','17');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal200" onclick="javascript:calcular('1','17');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal200" onclick="javascript:calcular('25','17');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal200" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Diagnóstico</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4"><font size="4">Presenta Dengue Clasico en un:</font></div>
        <div class="col-md-8"><button class="btn btn-danger btn-lg active" type="button" onclick="javascript:porcentaje('2','block');">Ver porcentaje</button>
          <div style="display:none" id="ventana2" style="border:none;">
          <input type="text" id="resultado2">
          <div class="well" id="resultados2">

          </div>
          </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--FIN DE LA ENFERMEDAD DENGUE CLASICO-->
<!--INICIO DEL MODAL 8-->
<div class="modal fade" id="modal8" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta inoculacion en el ojo?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal18" onclick="javascript:calcular('100','8');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal18" onclick="javascript:calcular('75','8');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal19" onclick="javascript:calcular('1','8');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal19" onclick="javascript:calcular('25','8');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal18" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta area inflamada y enrojecida en donde se encuentra la picadura?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal20" onclick="javascript:calcular('100','18');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal20" onclick="javascript:calcular('75','18');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal20" onclick="javascript:calcular('1','18');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal20" onclick="javascript:calcular('25','18');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal20" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta aumento de tamaño del bazo?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal21" onclick="javascript:calcular('100','20');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal21" onclick="javascript:calcular('75','20');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal21" onclick="javascript:calcular('1','20');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal21" onclick="javascript:calcular('25','20');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal21" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta aumento de tamaño del higado?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal22" onclick="javascript:calcular('100','21');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal22" onclick="javascript:calcular('75','21');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal22" onclick="javascript:calcular('1','21');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal22" onclick="javascript:calcular('25','21');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal22" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">¿Presenta aumento de tamaño del bazo?</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta aumento de tamaño de los ganglios?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal23" onclick="javascript:calcular('100','22');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal23" onclick="javascript:calcular('75','22');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal23" onclick="javascript:calcular('1','22');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal23" onclick="javascript:calcular('25','22');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal23" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">¿Presenta aumento de tamaño del bazo?</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta perdida de apetito?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal100" onclick="javascript:calcular('100','23');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal100" onclick="javascript:calcular('75','23');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal100" onclick="javascript:calcular('1','23');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal100" onclick="javascript:calcular('25','23');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal100" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Diagnóstico</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4"><font size="4">Presenta Chagas Agudo en un:</font></div>
        <div class="col-md-8"><button class="btn btn-danger btn-lg active" type="button" onclick="javascript:porcentaje('3','block');">Ver porcentaje</button>
          <div style="display:none" id="ventana3">
          <input type="text" id="resultado3"  style="border:none;">
          <div class="well" id="resultados3">

          </div>
          </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--FIN DE LA ENFERMEDAD DENGUE CLASICO-->
<!--INICIO DEL MODAL 5-->
<div class="modal fade" id="modal19" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta sangrado de la nariz?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal24" onclick="javascript:calcular('100','19');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal24" onclick="javascript:calcular('75','19');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal24" onclick="javascript:calcular('1','19');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal24" onclick="javascript:calcular('25','19');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal24" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta sangrado en las encias?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal25" onclick="javascript:calcular('100','24');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal25" onclick="javascript:calcular('75','24');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal25" onclick="javascript:calcular('1','24');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal25" onclick="javascript:calcular('25','24');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal25" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Observo la presencia de sangre en las heces, orina u vomito?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal26" onclick="javascript:calcular('100','25');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal26" onclick="javascript:calcular('75','25');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal26" onclick="javascript:calcular('1','25');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal26" onclick="javascript:calcular('25','25');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal26" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta dolor abdominal?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal27" onclick="javascript:calcular('100','26');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal27" onclick="javascript:calcular('75','26');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal27" onclick="javascript:calcular('1','26');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal27" onclick="javascript:calcular('25','26');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal27" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta constantemente sueño o tiene dificultad para concentrarse?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal28" onclick="javascript:calcular('100','27');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal28" onclick="javascript:calcular('75','27');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal28" onclick="javascript:calcular('1','27');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal28" onclick="javascript:calcular('25','27');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal28" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta vomitos?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal90" onclick="javascript:calcular('100','28');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal90" onclick="javascript:calcular('75','28');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal90" onclick="javascript:calcular('1','28');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal90" onclick="javascript:calcular('25','28');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal90" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Diagnóstico</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4"><font size="4">Presenta Dengue Hemorragico en un:</font></div>
        <div class="col-md-8"><button class="btn btn-danger btn-lg active" type="button" onclick="javascript:porcentaje('4','block');">Ver porcentaje</button>
          <div style="display:none" id="ventana4">
          <input type="text" id="resultado4" style="border:none;">
          <div class="well" id="resultados4">

          </div>
          </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--FIN DE LA ENFERMEDAD DENGUE HEMORRAGICO-->
<!--INICIO DEL MODAL 4-->
<div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta dificultad al respirar?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal33" onclick="javascript:calcular('100','4');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal33" onclick="javascript:calcular('75','4');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal34" onclick="javascript:calcular('1','4');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal34" onclick="javascript:calcular('25','4');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal33" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta congestion nasal?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal35" onclick="javascript:calcular('100','33');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal35" onclick="javascript:calcular('75','33');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal35" onclick="javascript:calcular('1','33');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal35" onclick="javascript:calcular('25','33');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal35" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Sintomatología</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta ulceras redondeadas de 2 a 5 cm?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal70" onclick="javascript:calcular('100','35');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal70" onclick="javascript:calcular('75','35');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal36" onclick="javascript:calcular('1','35');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal36" onclick="javascript:calcular('25','35');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal70" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Diagnóstico</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4"><font style="4">Presenta Leishmaniasis Cutánea en un:</font></div>
        <div class="col-md-8"><button class="btn btn-danger btn-lg active" type="button" onclick="javascript:porcentaje('6','block');">Ver porcentaje</button>
          <div style="display:none" id="ventana6">
          <input type="text" id="resultado6" style="border:none;">
          <div class="well" id="resultados6">

          </div>
          </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--FIN DE LA ENFERMEDAD CUTANEA-->
<!--INICIO DEL MODAL 4-->
<div class="modal fade" id="modal36" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta dificultad al deglutir o al hablar?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal37" onclick="javascript:calcular('100','36');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal37" onclick="javascript:calcular('75','36');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal37" onclick="javascript:calcular('1','36');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal37" onclick="javascript:calcular('25','36');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal37" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta ulceras y erosion en el rostro?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal60" onclick="javascript:calcular('100','37');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal60" onclick="javascript:calcular('75','37');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal60" onclick="javascript:calcular('1','37');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal60" onclick="javascript:calcular('25','37');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal60" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Diagnóstico</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">Presenta Leishmaniasis Mucocutánea en un:</div>
        <div class="col-md-8"><button class="btn btn-danger btn-lg active" type="button" onclick="javascript:porcentaje('7','block');">Ver porcentaje</button>
          <div style="display:none" id="ventana7">
          <input type="text" id="resultado7" style="border:none;">
          <div class="well" id="resultados7">

          </div>
          </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--FIN DE LA ENFERMEDAD MUCOCUTANEA-->
<!--INICIO DEL MODAL 4-->
<div class="modal fade" id="modal34" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta pulso cardiaco irregular o hinchazon en los pies y tobillos?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal38" onclick="javascript:calcular('100','34');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal38" onclick="javascript:calcular('75','34');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal38" onclick="javascript:calcular('1','34');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal38" onclick="javascript:calcular('25','34');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal38" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta aleteos en el pecho o siente mareos?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal39" onclick="javascript:calcular('100','38');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal39" onclick="javascript:calcular('75','38');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal39" onclick="javascript:calcular('1','38');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal39" onclick="javascript:calcular('25','38');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal39" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta diarrea cronica?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal40" onclick="javascript:calcular('100','39');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal40" onclick="javascript:calcular('75','39');">PROBABLEMENTE SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal40" onclick="javascript:calcular('1','39');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal40" onclick="javascript:calcular('25','39');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal40" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Conteste las siguientes preguntas</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" style="margin-top:20%;float:right; height:50px; width:350px;"><font size="5">¿Presenta formacion de una bolsa lateral en donde se acumulan los alimentos?</font></div>
          <div> <img src="{{url('imagenes/movimiento.gif')}}" style="height:270px; width:190px; float:left; margin-left:7%;"/></div>
        </div>
      </div>
      <div class="modal-footer">
        <button  data-dismiss="modal" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal50" onclick="javascript:calcular('100','40');">SI</button>
        <button  data-dismiss="modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal50" onclick="javascript:calcular('75','40');">PROBABLEMENTE SI</button>S
        <button  data-dismiss="modal" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal50" onclick="javascript:calcular('1','40');">NO</button>
        <button  data-dismiss="modal" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal50" onclick="javascript:calcular('25','40');">PROBABLEMENTE NO</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal50" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="margin-top:130px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#D8F781;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><font color="white">Diagnóstico</font></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">Presenta Chagas Cronico en un:</div>
        <div class="col-md-8"><button class="btn btn-danger btn-lg active" type="button" onclick="javascript:porcentaje('8','block');">Ver porcentaje</button>
          <div style="display:none" id="ventana8">
          <input type="text" id="resultado8" style="border:none;">
          <div class="well" id="resultados8">

          </div>
          </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--FIN DE LA ENFERMEDAD CHAGA CRONICO-->
</div>
</div>
</form>
@stop
