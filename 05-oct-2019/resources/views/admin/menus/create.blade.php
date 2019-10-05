@extends('admin/layouts.default')



@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New</h4>
                  <p class="card-category">Add New Menu</p>
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
                {!! Form::open(array('route' => 'menus.store','method'=>'POST')) !!}
                @include('admin.menus.form')
                {!! Form::close() !!}
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
@endsection
