<div class="col-md-4">
	<ul class="list-group">
		<li class="list-group-item">
			<div class="panel-body">
				{{ Form::label('tags', 'Tags') }} ({{ $countTags }})
				{{ Form::text('tags', null, array('class' => 'form-control input-sm', 'placeholder' =>  'Add Tags here')) }}
				</div>
				<div class="panel-body">
				@if (isset($post))
					@foreach ($listTags as $tag)
						<span class="label {{{ $tag->active ? 'label-success' : 'label-default' }}}">
							<a href="{{ URL::to('posts/' . $post->id . '/' . $tag->id . '/attach-tag') }}" style="color:#FFF">{{ $tag->title }}</a>&nbsp
							<a href="{{ URL::to('tags/' . $tag->id . '/' . $post->id . '/destroy') }}" style="color:#FFF">x</a>
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
			</div>
		</li>
	</ul>
</div>