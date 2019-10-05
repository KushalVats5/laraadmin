@extends('admin/layouts.default')



@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">All Services</h4>
                  <p class="card-category"> Here is a list service</p>
                </div>
                <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                  <div class="table-responsive">
                    <!-- <table class="table" id="example1"> -->
                    <table class="table" id="servicelist">
                    <thead class="text-warning">
                    <tr>
                        <th width="80px">No</th>
                        <th>Title</th>
                        <th>Excerpt</th>
                        <th width="140px" class="text-center">
                            <a class="btn btn-warning btn-sm" href="{{ route('services.create') }}"><i class="material-icons">post_add</i> Add New</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($services as $service)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{!! $service->excerpt !!}</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="" class="btn btn-warning btn-link btn-sm" data-original-title="Preview">
                            <a class="text-info" href="{{ route('services.show',$service->id) }}"><i class="material-icons">visibility</i></a></button>
                            <button type="button" rel="tooltip" title="" class="btn btn-warning btn-link btn-sm" data-original-title="Edit">
                            <a class="text-warning" href="{{ route('services.edit',$service->id) }}"><i class="material-icons">edit</i></a></button>
                            {!! Form::open(['method' => 'DELETE','route' => ['services.destroy', $service->id],'style'=>'display:inline']) !!}
                            <button type="submit" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Delete">
                            <i class="material-icons">close</i>
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                </tbody>
                <!-- <tfoot>
                    <tr>
                        <th width="80px">No</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th width="140px" class="text-center">Action</th>
                    </tr>
                </tfoot> -->
            </table>
        </div>
    </div>
    <div class="pull-right">{!! $services->render() !!}</div>
</div>
            </div>

          </div>
        </div>
      </div>
@endsection
