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
            <label>Title</label>
            <div class="form-group">
            <label class="bmd-label-floating"> Add SubTitle</label>
            {!! Form::text('subtitle', null, array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Content</label>
            <div class="form-group">
            <label class="bmd-label-floating"> Add Intro</label>
            {!! Form::textarea('intro', null, array('id' => 'itro', 'class' => 'form-control editor1','style'=>'height:100px')) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Description</label>
            <div class="form-group">
            <label class="bmd-label-floating"> Add Description</label>
            {!! Form::textarea('description', null, array('id' => 'description', 'class' => 'form-control editor1','style'=>'height:100px')) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Parent Menu</label>
            <div class="form-group">
            <label class="bmd-label-floating">Select Parent Menu</label>
                <select name="parent_id" class="form-control">
                    <option value="0">None</option>
                    @if (count($items) > 0 )
                        @foreach($items as $k => $v)
                            <option value="{{ $k }}" {{ ( !empty($menu) && $k == $menu->parent_id ) ? 'selected' : '' }} >{{ $v }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
<div class="clearfix"></div>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    // CKEDITOR.replace( 'content' );
    // CKEDITOR.replace( 'excerpt' );
</script>


