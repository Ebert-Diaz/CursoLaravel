@extends('layouts.app')

@section('content')

<a href="{{ route('note.index') }}">Back</a>

<form method="POST" action="{{ route('note.store') }}" >
	@csrf
	<label > Title:</label>
	<input name="title" type="text" /> <br/>
	@error('title')
		<p style="color:red;">{{ $message }}</p>
	@enderror

	<label >Description</label>
	<input name="description" type="text" /> <br/>
	@error('description')
		<p style="color:red;">{{ $message }}</p>
	@enderror
	<input type="submit" value="Create" /> 
</form>
@endsection