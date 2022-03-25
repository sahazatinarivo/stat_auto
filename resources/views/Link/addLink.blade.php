@extends('../layout')

@section('title')
	<h1>AddLink</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form method="post" action="{{ isset($page->slug) ? route('editePg',['slug'=>$page->slug]) : route('savePage') }}">
			<h1>Add Page</h1>
			<div class="form-graoup">
				<input type="text" name="nom_page" class="form-control" placeholder="Nom du page" 
				value="{{ isset($page) ? $page->nom_page : ''}}">
			</div><br>
			<div class="form-graoup">
				<input type="text" name="etat" class="form-control" placeholder="Etat du page" value="{{ isset($page) ? $page->etat : ''}}">
			</div><br>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-graoup">
				<button type="submit" name="save_page" class="btn btn-success">Save Page</button>
			</div>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
@endsection