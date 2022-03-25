@extends ("../layout")

@section('content')
	<div class="container-fluid">
		<div>
			<input type="text" class="form-control" id="recherche_liste" placeholder="Tapez votre cle de recherche">
		</div><hr>
		<div id="contenu_result_liste">
		</div>
		<div class="alert alert-default" id="block-loader-ajax">
			<span><img src="{{ asset('asset/images/loader.gif') }}" class="loader_gif"> Recherche....</span>
		</div>
	</div>
@endsection