<div class="col-md-4">
	<ul class="list-group" id="sidebar" data-id-post="{{ $currentIdPost }}">
		<li class="list-group-item app-tags">

			{{ Form::label('tags', 'Tags') }} ({{ $countTags }})
			<form class="app-form-tags">
				{{ Form::text('tags', null, array('class' => 'form-control input-sm app-tag-input', 'placeholder' =>  'Add Tags here')) }}
			</form>
			<div class="app-tags-list">
				@foreach ($listTags as $tag)
					<span  data-id="{{$tag->id}}" class="label label-default {{{ $tag->active ? 'label-success' : '' }}} item">
						{{ $tag->title }}
					</span>
				@endforeach
			</div>
		</li>
	</ul>
</div>