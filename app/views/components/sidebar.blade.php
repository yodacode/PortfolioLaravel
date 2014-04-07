<div class="col-md-4">
	<ul class="list-group">
	  <li class="list-group-item">
	    <div class="panel-body">
	    	{{ Form::label('tags', 'Tags') }}
	    	{{ Form::text('tags', null, array('class' => 'form-control input-sm', 'placeholder' =>  'Add Tags here')) }}
  		</div>
	    <div class="panel-body">
            @foreach ($listTags as $tag)
    			<span class="label label-default">
    				<a href="#" style="color:#FFF">{{ $tag->title }}</a>
    			</span>&nbsp
    		@endforeach
		</div>
	  </li>
	</ul>

</div>