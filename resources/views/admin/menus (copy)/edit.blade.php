@extends('admin/layouts.default')



@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit</h4>
                  <p class="card-category">Edit Menu</p>
                </div>
                <div class="card-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::model($menu, ['method' => 'PATCH','route' => ['menus.update', $menu->id]]) !!}
                @include('admin.menus.form')
                {!! Form::close() !!}
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <!-- <img class="img" src="{!! asset('theme/assets/img/faces/marc.jpg') !!}" /> -->
                  <div id="image">
                        <img id="preview_image" width="100%" height="100%" id="preview_image" src="{!! asset('theme/assets/img/faces/marc.jpg') !!}"/>
                        <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
                    </div>
                    <input type="file" id="file" style="display: none"/>
                    <input type="hidden" id="file_name"/>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="javascript:;" onclick="changeProfile()" class="btn btn-primary btn-round"> <i class="fa fa-edit"></i> Upload</a>
                    <a href="javascript:" onclick="removeFile()" class="btn btn-danger btn-round">
                        <i class="fa fa-trash"></i> Remove
                    </a>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
@endsection
