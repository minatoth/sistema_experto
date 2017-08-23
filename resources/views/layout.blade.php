<!DOCTYPE html>
<html lang="es">
	<head>
	<title>@yield('titulo')</title>
		<meta charset="utf-8">
		{!! Html::style('css/login.css') !!}
		{!! Html::script('js/jquery.js') !!}
		{!! Html::script('assets/js/bootstrap.min.js') !!}
		{!! Html::style('assets/css/bootstrap.min.css') !!}
		<!--<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">-->
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<!--es de wow slider-->
		<meta name="keywords" content="WOW Slider, CSS Scroller, Scroller HTML" />
		<meta name="description" content="WOWSlider created with WOW Slider, a free wizard program that helps you easily generate beautiful web slideshow" />
		{!! Html::style('engine1/style.css') !!}
    {!! Html::style('css/layout.css') !!}
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/table/jquery.dataTables.css') !!}
    {!! Html::style('css/table/shCore.css') !!}
    {!! Html::style('css/table/demo.css') !!}
   		 <!--es de la tabla-->
    {!! Html::script('js/jquery-1.6.js') !!}
    {!! Html::script('js/cufon-yui.js') !!}
    {!! Html::script('js/cufon-replace.js') !!}
	  {!! Html::script('js/Vegur_300.font.js') !!}
    {!! Html::script('js/PT_Sans_700.font.js') !!}
    {!! Html::script('js/PT_Sans_400.font.js') !!}
		{!! Html::script('js/tms-0.3.js') !!}
    {!! Html::script('js/tms_presets.js') !!}
    {!! Html::script('js/jquery.easing.1.3.js') !!}
    {!! Html::script('js/atooltip.jquery.js') !!}
		<!-- inicio de WOWSLIDER XD -->
    {!! Html::script('engine1/jquery.js') !!}
	  {!! Html::script('engine1/wowslider.js') !!}
	  {!! Html::script('engine1/script.js') !!}
		<!-- Start WOWSlider.com HEAD section -->
		<!--es de la tabla-->
		<script type="text/javascript" language="javascript" src="<?php echo asset('js/table/jquery.js')?>"></script>
    	<script type="text/javascript" language="javascript" src="<?php echo asset('js/table/jquery.dataTables.js')?>"></script>
    	<script type="text/javascript" language="javascript" src="<?php echo asset('js/table/shCore.js')?>"></script>
    	<script type="text/javascript" language="javascript" class="init">
      	$(document).ready(function() {
    
        $('#example').DataTable();
      	});
    	</script>
    	
		<!--[if lt IE 9]>
		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
		<![endif]-->
		<!--[if lt IE 7]>
			<div style=' clear: both; text-align:center; position: relative;'>
				<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a>
			</div>
		<![endif]-->
	</head>
	<body id="page1">
		<div class="main">
<!--header --><div class="wrapper" ><br/>
					<img src="{{url('imagenes/cinco.png')}}" style="height:65px;"/><a style="color:#A7A1A1; margin-top:40px;" size="4"><strong style="margin-top:40px;">TROPICAL DIAGNOSIS</strong></a>
				</div>
			<header>
				<nav class="navbar navbar-inverse" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><!--<img src="{{url('imagenes/cuatro.jpg')}}" style="height:60px; width:130px; position-bottom:30%;">--></a>
  </div>
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class=""><a href="{{url('/')}}">Inicio</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Registro de paciente <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{url('listapaciente')}}">Lista de paciente</a></li>
          <li><a href="{{url('regpaciente')}}">Añadir paciente</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Diagnóstico<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{url('diagpaciente')}}">Evaluación</a></li>
          <li><a href="#"></a></li>
          <li><a href="{{url('vis')}}">Tratamiento</a></li>
          <li class="divider"></li>
          <li><a href="#">Historial</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-left">
      <li class="dropdown">
        <a href="" class="dropdown-toggle" data-toggle="dropdown">
          Reportes <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Por paciente</a></li>
          <li><a href="#">Por fecha</a></li>
        </ul>
      </li>
 	  	<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
       Bienvenido(a):
          {{ Auth::user()->nomUsu.' '.Auth::user()->apeUsu}}<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Ver perfil</a></li>
          <li><a href="#"></a></li>
          <li><a href="logout">Cerrar sesión</a></li>
        </ul>
        </li>
    </ul>
  </div>
</nav>
	<div class="contenido">
		@yield('cuerpo')	
	</div>
	</header>
<!--header end-->
<!--content -->
		</div>
		<div class="bg1">
			<div class="main">
			</div>
		</div>
		<div class="main">
<!--content end-->
<!--footer -->
			<footer>
			</footer>
<!--footer end-->
		</div>
	</body>
</html>