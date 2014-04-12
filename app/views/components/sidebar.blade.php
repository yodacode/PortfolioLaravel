<div class="col-md-4">
	<ul class="list-group" id="sidebar" data-id-post="{{ $currentIdPost }}">
		<li class="list-group-item app-tags">

			{{ Form::label('tags', 'Tags') }} ({{ $countTags }})
			<div class="input-group">
				{{ Form::text('tags', null, array('class' => 'form-control input-sm app-tag-input', 'placeholder' =>  'Add Tags here')) }}
				<span class="input-group-btn">
					<button class="btn btn-default btn-sm app-tag-btn" type="button">Go!</button>
				</span>
			</div>
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