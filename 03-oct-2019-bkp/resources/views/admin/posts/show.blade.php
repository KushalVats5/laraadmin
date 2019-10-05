@extends('admin/theme.default')



@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Preview</h4>
                  <p class="card-category">Post</p>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Title</label>
                          <div class="form-group">
                            <!-- <label class="bmd-label-floating"> {{ $post->content}}</label> -->
                            {{ $post->title}}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Description</label>
                          <div class="form-group">
                            <!-- <label class="bmd-label-floating"> {{ $post->content}}</label> -->
                            {!! $post->content !!}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Excerpt</label>
                          <div class="form-group">
                            <!-- <label class="bmd-label-floating"> {{ $post->content}}</label> -->
                            {!! $post->excerpt !!}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="{!! asset('theme/assets/img/faces/marc.jpg') !!}" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
