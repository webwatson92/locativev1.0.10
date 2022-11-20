@extends('layouts.base')
@section('content')
@section('styles')
    <style></style>
@stop
<div class="page-wrapper">
		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- MAIN CONTENT-->
         	@livewire('menu.fonction.client-component') 
		</div>
		<!-- END PAGE CONTAINER-->

	</div>
	
@stop