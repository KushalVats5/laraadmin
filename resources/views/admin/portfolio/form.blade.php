<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Title</label>
            <div class="form-group">
            <label class="bmd-label-floating"> Add Title</label>
            {!! Form::text('title', null, array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Add Content</label>
            <div class="form-group">
            <!-- <label class="bmd-label-floating"> Add Content</label> -->
            {!! Form::textarea('content', null, array('id' => 'content', 'class' => 'form-control editor1','style'=>'height:100px')) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Add Excerpt</label>
            <div class="form-group">
            <!-- <label class="bmd-label-floating"> Add Excerpt</label> -->
            {!! Form::textarea('excerpt', null, array('id' => 'excerpt', 'class' => 'form-control editor1','style'=>'height:100px')) !!}
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Tags:</label>
            @if( !empty($portfolio->id))
                @foreach($portfolio->tags as $tag)
                    <span class="tag-itmes">
                        <label class="btn btn-primary btn-sm">{{ $tag->name }}</label>
                    </span>
                @endforeach
                @if( !empty($portfolio->tags->toArray()) )
                <a href="javascript:" onclick="removeTags('{{ route('portfolio.destroy.tags', $portfolio->id) }}')" class="remove-tags btn btn-danger btn-round">
                    <i class="fa fa-trash"></i> Remove All
                <div class="ripple-container"></div></a>
                @endif
            @endif
            <div class="form-group">
            <!-- <label class="bmd-label-floating"> Add Tags</label> -->
            <input data-role="tagsinput" type="text" name="tags" placeholder="Add tags">
            @if ($errors->has('tags'))
                <span class="text-danger">{{ $errors->first('tags') }}</span>
                <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
            @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Featured Image</label>
            <div class="form-group">
            <!-- <label class="bmd-label-floating"> Featured Image</label> -->
                <!-- <input type="file" name="featured_image" /> -->
                <div class="file-field">
                    <div class="z-depth-1-half mb-4">
                    @if( !empty($portfolio->id))
                    <img src="{!! asset('uploads/portfolio/large/'.$portfolio->featured_image) !!}" class="img-fluid"
                        alt="example placeholder">
                        <input type="hidden" name="hidden_image" value="{{ $portfolio->featured_image }}" />
                    @else
                    <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" class="img-fluid"
                        alt="example placeholder">
                    @endif
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="btn btn-mdb-color btn-rounded float-left">
                        <span>Choose file</span>
                        <input type="file" name="featured_image">
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
<div class="clearfix"></div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'content' );
    CKEDITOR.replace( 'excerpt' );
</script>
