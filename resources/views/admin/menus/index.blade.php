@extends('admin/layouts.default')



@section('content')

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title ">All Menus</h4>
                  <p class="card-category"> Here is a list menu</p>
                </div>
                <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif


                @foreach(App\Menu::orderBy('order','asc')->get() as $menuItem)

                @if( $menuItem->parent_id == 0 )
                <li {{ $menuItem->url ? '' : "class=dropdown" }}>
                <a href="{{ $menuItem->children->isEmpty() ? $menuItem->url : "#" }}"{{ $menuItem->children->isEmpty() ? '' : "class=dropdown-toggle data-toggle=dropdown role=button aria-expanded=false" }}>
                    {{ $menuItem->title }}
                </a>
                @endif

                @if( ! $menuItem->children->isEmpty() )
                <ul class="dropdown-menu" role="menu">
                    @foreach($menuItem->children as $subMenuItem)
                        <li><a href="{{ $subMenuItem->url }}">{{ $subMenuItem->title }}</a></li>
                    @endforeach
                </ul>
                @endif
                </li>

                @endforeach

                  <div class="table-responsive">
                    <!-- <table class="table" id="example1"> -->
                    <table class="table" id="postlist">
                    <thead class="text-danger">
                    <tr>
                        <th width="80px">No</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th width="140px" class="text-center">
                            <a class="btn btn-danger btn-sm" href="{{ route('menus.create') }}"><i class="material-icons">post_add</i> Add New</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($items as $menu)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $menu->title }}</td>
                        <td>{!! $menu->subtitle !!}</td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="" class="btn btn-warning btn-link btn-sm" data-original-title="Preview">
                            <a class="text-info" href="{{ route('menus.show',$menu->id) }}"><i class="material-icons">visibility</i></a>
                            <div class="ripple-container"></div></button>
                            <button type="button" rel="tooltip" title="" class="btn btn-warning btn-link btn-sm" data-original-title="Edit">
                            <a class="text-warning" href="{{ route('menus.edit',$menu->id) }}"><i class="material-icons">edit</i></a>
                            <div class="ripple-container"></div></button>
                            {!! Form::open(['method' => 'DELETE','route' => ['menus.destroy', $menu->id],'style'=>'display:inline']) !!}
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
</div>
            </div>

          </div>
        </div>
      </div>
@endsection
