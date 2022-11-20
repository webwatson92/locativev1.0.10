@extends('layouts.base')
@section('styles')
<style>
span {cursor:pointer; }
.number{
			margin:100px;
	}
	.minus, .plus{
			width:20px;
			height:20px;
			background:#f2f2f2;
			border-radius:4px;
			padding:8px 5px 8px 5px;
			border:1px solid #ddd;
      display: inline-block;
      vertical-align: middle;
      text-align: center;
	}
	input{
			height:34px;
      width: 100px;
      text-align: center;
      font-size: 26px;
			border:1px solid #ddd;
			border-radius:4px;
      display: inline-block;
      vertical-align: middle;
	}

</style>
@stop
@section('content')
<div class="page-wrapper">
		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- MAIN CONTENT-->
            @livewire('menu.caisse.type-mouvement-component')
		</div>
		<!-- END PAGE CONTAINER-->
	</div>
	
@stop
@section('scripts')
$(document).ready(function() {
	$('.minus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$('.plus').click(function () {
		var $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});
});
@stop