<div class="col-md-4">
	<ul class="list-group" id="sidebar" data-id-post="{{ $currentIdPost }}">
		<li class="list-group-item">
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

		<li class="list-group-item">
			{{ Form::label('categories', 'Categories') }} ({{ $countCategories }})
			<form class="app-form-categories">
				{{ Form::text('categories', null, array('class' => 'form-control input-sm app-category-input', 'placeholder' =>  'Add Categories here')) }}
			</form>			
		</li>

	</ul>
</div>