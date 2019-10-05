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
<button type="submit" class="btn btn-primary pull-right">Save</button>
<div class="clearfix"></div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'content' );
    CKEDITOR.replace( 'excerpt' );
</script>


