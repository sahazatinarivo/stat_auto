@extends('../layout')

@section('title')
	<h1>Detail page</h1>
@endsection

@section('content')
	<h1>Detail page</h1>
	<div class="detail">
		<span>Nom: {{ $page->nom_page }}</span>
		<span>Etat: {{ $page->etat }}</span>
		<span>Nom: {{ $page->updated_at }}</span>
		<span>Etat: {{ $page->created_at }}</span>
	</div>
@endsection