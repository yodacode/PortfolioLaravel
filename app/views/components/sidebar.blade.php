<div class="col-md-4">
	<ul class="list-group" id="app-sidebar" data-id-post="{{ $currentIdPost }}">
		<li class="list-group-item app-tags">

			{{ Form::label('tags', 'Tags') }} ({{ $countTags }})
			<div class="input-group">
				{{ Form::text('tags', null, array('class' => 'form-control input-sm app-tag-input', 'placeholder' =>  'Add Tags here')) }}
				<span class="input-group-btn">
					<button class="btn btn-default btn-sm app-tag-btn" type="button">Go!</button>
				</span>
			</div>
			@if (isset($post))
				@foreach ($listTags as $tag)
					<span class="label {{{ $tag->active ? 'label-success' : 'label-default' }}}">
						<a href="{{ URL::to('posts/' . $post->id . '/' . $tag->id . '/attach-tag') }}">{{ $tag->title }}</a>&nbsp
						<a href="{{ URL::to('tags/' . $tag->id . '/destroy') }}">x</a>
					</span>&nbsp
				@endforeach
			@else
				<div class="tags-list">
					@foreach ($tags as $tag)
						<span  data-id="{{$tag->id}}" class="label label-default item">
							{{ $tag->title }}
						</span>&nbsp
					@endforeach
				</div>
			@endif
		</li>
	</ul>
</div>