@extends('../layout')

@section('title')
	<h1>ListeLink</h1>
@endsection

@section('content')

	<div class="container-fluid">
		@if(Session::has('message'))
			<div class="alert alert-success">
				{{ Session::get('message') }}
			</div>
		@endif
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th class="text-center">N°</th>
		        <th class="text-center">Nom page</th>
		        <th class="text-center">Etat</th>
		       	<th class="text-center">Date Modif</th>
		        <th class="text-center">Date Insertion</th>
		        <th class="text-center">Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    @php $i=0; @endphp
		    @foreach ($page as $pages)
		    @php $i++ @endphp
		      <tr>
		        <td>{{ $i }}</td>
		        <td>{{ $pages->nom_page }}</td>
		        <td>{{ $pages->etat }}</td>
		       	<td>{{ $pages->updated_at }}</td>
		        <td>{{ $pages->created_at }}</td>
		        <td class="text-center">

		        </td>
		      </tr>
		     @endforeach
		    </tbody>
		  </table>
	</div>
@endsection