@if(isset($liste) and $liste->count() > 0)
<table class="table table-striped table-bordered table-sm">
    <thead>
      	<tr>
      	<th width="10%" class="text-center">N°</th>
      	@if(isset($colnn))
      		@foreach($colnn as $colnns => $c)
      			@if($c->Field !== "id" and $c->Field !== "slug")
	        	<th width="10%" class="text-center">{{ $c->Field }}</th>
	        	@endif
	        @endforeach
	        <th width="10%" class="text-center">Action</th>
	    @endif
      	</tr>
    </thead>
    <tbody>
		@php $i=0; @endphp
		@foreach($liste as $listes => $l)
		@php $i++; @endphp
		    <tr>
		    	@if(isset($colnn))
		    		<td>{{ $i }}</td>
						@foreach($colnn as $colnns => $c)
							@if($c->Field !== "id" and $c->Field !== "slug")
		        		<td>{{ $l->{$c->Field} }}</td>
		        		@endif
			        @endforeach
			        <td class="text-center"><a href="{{ Route('mask') }}?pers=@php echo$l->slug; @endphp&nmpg={{ isset($iPges) ? $iPges: 0 }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a></td>
		        @endif
		    </tr>
	    @endforeach
    </tbody>
</table>
@else
	<div class="alert alert-danger info-aucune">
	  	Aucun liste qui commence en <strong><i>{{ isset($cleRch) ? $cleRch : "" }}</i></strong>
	</div>
@endif