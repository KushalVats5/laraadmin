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
            <label>Content</label>
            <div class="form-group">
            <label class="bmd-label-floating"> Add Content</label>
            {!! Form::textarea('content', null, array('id' => 'content', 'class' => 'form-control editor1','style'=>'height:100px')) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Excerpt</label>
            <div class="form-group">
            <label class="bmd-label-floating"> Add Excerpt</label>
            {!! Form::textarea('excerpt', null, array('id' => 'excerpt', 'class' => 'form-control editor1','style'=>'height:100px')) !!}
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
                    @if( !empty($post->id))
                    <img src="{!! asset('uploads/posts/large/'.$post->featured_image) !!}" class="img-fluid"
                        alt="example placeholder">
                        <input type="hidden" name="hidden_image" value="{{ $post->featured_image }}" />
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

<button type="submit" class="btn btn-primary pull-right">Save</button>
<div class="clearfix"></div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'content' );
    CKEDITOR.replace( 'excerpt' );
</script>


