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

        <li class="list-group-item">
            {{ Form::label('medias', 'Medias') }} ({{ $countMedias }})
            <form class="app-form-categories">
                <button class="btn btn-block btn-sm" data-toggle="modal" data-target="#attachMedias">Link medias</button>
            </form>
            @foreach ($listMedias as $media)
                @if ($media->active)
                    <a href="#" data-id="{{$media->id}}">
                       <img src="/uploads/thumbs/{{$media->name}}" class="img-thumbnail thumb"> 
                    </a>
                @endif
            @endforeach
        </li>

    </ul>
</div>


<!-- Modal -->
<div class="modal fade" id="attachMedias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Select Medias to attach</h4>
                </div>
                <div class="modal-body">
                    @foreach ($listMedias as $media)                        
                        <a href="#">
                           <img src="/uploads/thumbs/{{$media->name}}" data-id="{{$media->id}}" class="img-thumbnail thumb {{{ $media->active ? 'selected' : '' }}}"> 
                        </a>
                    @endforeach
                </div>
                <div class="modal-footer">            
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>