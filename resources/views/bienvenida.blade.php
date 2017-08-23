@extends('layout')

@section('titulo')
Bienvenida al medico
@stop

@section('cuerpo')
	<div id="wowslider-container1">
		<div class="ws_images"><ul>
			<li><img src="data1/images/naturalezaylaudatosi.jpg" alt="naturaleza-y-laudato-si" title="naturaleza-y-laudato-si" id="wows1_0"/></li>
			<li><img src="data1/images/banner2.jpg" alt="banner-2" title="banner-2" id="wows1_1"/></li>
			<li><img src="data1/images/mc1guadalajara.jpg" alt="MC1guadalajara" title="MC1guadalajara" id="wows1_2"/></li>
		</ul></div>
	<div class="ws_bullets"><div>
	<a href="#" title="naturaleza-y-laudato-si"><img src="data1/tooltips/naturalezaylaudatosi.jpg" alt="naturaleza-y-laudato-si"/>1</a>
	<a href="#" title="banner-2"><img src="data1/tooltips/banner2.jpg" alt="banner-2"/>2</a>
	<a href="#" title="MC1guadalajara"><img src="data1/tooltips/mc1guadalajara.jpg" alt="MC1guadalajara"/>3</a>
	</div></div>
	<span class="wsl"><a href="http://wowslider.com">Carousel CSS3</a> by WOWSlider.com v3.8</span>
	<div class="ws_shadow"></div>
	</div>
	<center>
    Bienvenido(a):
          {{ Auth::user()->nomUsu.' '.Auth::user()->apeUsu}}
  </center>
@stop