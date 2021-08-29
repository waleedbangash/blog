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
                                <th>name</th>
                                <th>email</th>
                                <th>password</th>
                                <th>created_at</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rowArr as $res)
                             <tr>
                                 <td>{{$res->id}}</td>
                                 <td>{{$res->name}}</td>
                                 <td>{{$res->email}}</td>
                                 <td>{{$res->password}}</td>
                                 <td>{{$res->created_at}}</td>
                                 <td>
                                  <a href="{{url('admin/userstatus')}}/{{$res->id}}/{{$res->status?0:1}}">{{$res->status?'Active':'Disabled'}}</a>
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

