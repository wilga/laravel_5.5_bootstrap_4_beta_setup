@extends('layouts.app')

@section('styles')
{{-- 	<style type="text/css">
		body { 
		    padding-top: 0px; 
		}
	</style> --}}
@endsection

@section('content')
    <div class="jumbotron-fluid h-100 d-flex flex-column align-items-center justify-content-center" style="min-height: 25rem">
        <h1 class="display-3">{{ config('app.name', 'Laravel') }}</h1>
        <p class="lead">Bootstap 4 Beta</p>
    </div>
	<contact class="h-100" style="min-height: 52rem"></contact>
@endsection
