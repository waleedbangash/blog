@extends('user/layout.master')
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
                                  <th>image</th>
                                <th>User_id</th>
                                <th>Created_At</th>
                                <th>action</th>
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
                                 <td>{{$res->user_id }}</td>
                                 <td>{{$res->created_at}}</td>
                                 <td><a href="{{url('user/edit')}}/{{$res->id}}" >edit</a>
                                    <a href="{{url('user/delete')}}/{{$res->id}}" >delete</a>
                                </td>
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
