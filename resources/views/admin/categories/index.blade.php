@extends('admin/layouts.default')



@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title ">All Posts</h4>
                  <p class="card-category"> Here is a list post</p>
                </div>
                <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                  <div class="table-responsive">
                    <!-- <table class="table" id="example1"> -->
                    <table class="table" id="postlist">
                    <thead class="text-danger">
                    <tr>
                        <th width="80px">No</th>
                        <th>Title</th>
                        <th>Excerpt</th>
                        <th width="140px" class="text-center">
                            <a class="btn btn-danger btn-sm" href="{{ route('posts.create') }}"><i class="material-icons">post_add</i> Add New</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{!! $post->excerpt !!}</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="" class="btn btn-warning btn-link btn-sm" data-original-title="Preview">
                            <a class="text-info" href="{{ route('posts.show',$post->id) }}"><i class="material-icons">visibility</i></a>
                            <div class="ripple-container"></div></button>
                            <button type="button" rel="tooltip" title="" class="btn btn-warning btn-link btn-sm" data-original-title="Edit">
                            <a class="text-warning" href="{{ route('posts.edit',$post->id) }}"><i class="material-icons">edit</i></a>
                            <div class="ripple-container"></div></button>
                            {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
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
    <div class="pull-right">{!! $posts->render() !!}</div>
</div>
            </div>

          </div>
        </div>
      </div>
@endsection
