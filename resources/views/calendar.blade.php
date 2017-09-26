@extends('layouts.app')

@section('content')
	<calendar events-json="{{ $eventsJson }}"></calendar>
@endsection