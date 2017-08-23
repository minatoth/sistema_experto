@extends('layout')
@section('titulo')
Leishmaniasi Visceral
@stop
@section('cuerpo')
<form>
<fieldset style="border:solid #D8F781; width:935px; padding-top:1%; border-radius:1%;"><br>
<font size="4" style="padding-left:1%; color:#D8F781"><b> Nombre del paciente:</b></font><br>
<font size="4" style="padding-left:1%; color:#D8F781"><b>Resultado:</b></font><br><br>
<font size="4" style="padding-left:1%; color:#D8F781"><b>Descripción:</b></font><br>
<div style="width:450px; padding-left:1%;">
<font size="3"; color="#000" >La Leishmaniasis visceral es una enfermedad grave que afecta a personas y perros, se transmite a través de la picadura del vector Lutzomya de muy pequeño (2 a 4 mm) o conocido también como mosca de tierra,  cuando el vector pica a una persona infectada con el parásito que causa leishmaniasis, al tomar su sangre también lo ingiere.<br> La próxima vez que pique a otra persona, el parásito pasará al mismo infectandolo. 
No se transmite de persona a persona ni con el contacto directo con los perros.</font></div>
<div style="padding-right:2%; margin-bottom:0%; position:left;margin-left: 72%; ">
<img src="{{url('imagenes/visceral2.jpg')}}" style="height:250px; width:250px;"/></div>
<center>
 <button style="margin-bottom:2%" class="btn btn-primary">Generar tratamiento
       <span class="glyphicon glyphicon-trash"></span>
      </button>
      </center>
</fieldset>
</form>
@stop