<div class="container-fluid">
    <div class="btn-group btn-group-justified">
    	@if($page)
    		@foreach($page as $pages)
    			@php 
                    if(session()->get('saisie_user') == 'uns'){
                        $etat = $pages->etat_active_uns; 
                    }else{
                        $etat = $pages->etat_active_deuxs; 
                    }
    				$sPg = $pages->slug;
    			@endphp

	        	<a @if($etat == 0) disabled @endif href="@if($etat == 0) javascript:void(0) @else {{ Route('mask') }}?pers={{$pers}}&nmpg={{ $sPg }}@endif" class="btn @if($getp == $pages->id) btn-default @else btn-primary @endif">
	        	@if($etat == 1)
	        	<i class="fa fa-check-circle" style="float: left;"></i>
	        	@else
	        	<i class="fa fa-ban" style="float: left;"></i>
	        	@endif
	        	 {{ $pages->nom_page }}</a>
	        @endforeach
        @endif
    </div> 
</div>