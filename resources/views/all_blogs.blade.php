@extends('layouts.master')
@section('content')
<section class="content">
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
              <div class="box-header">
                 <h3 class="box-title">Hover Data Table</h3>
              </div><!-- /.box-header -->
             <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Short_discription</th>
                                <th>Long_discription</th>
                                <th>Image</th>
                                <th>User Name</th>
                                <th>Created_At</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rowArr as $res)
                             <tr>
                                 <td>{{$res->id}}</td>
                                 <td>{{$res->title}}</td>
                                 <td>{{$res->short_discription}}</td>
                                 <td>{{$res->long_discription}}</td>
                                 <td><img src="{{ url('public/asset/img') }}/{{ $res->image }}" height="50px" width="50px"/></td>
                                 <td>{{$res->users->name }}</td>
                                 <td>{{$res->created_at}}</td>
                                 <td><a href="{{url('admin/status')}}/{{$res->id}}/{{ $res->status?0:1 }}">{{ $res->status?'Active':'Disabled' }}</a></td>
                                 <td><a href="{{url('admin/delete')}}/{{$res->id}}">delete</a></td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div><!-- /.box-body -->
        </div>
    </div>
    </div>

</section>
@endsection

