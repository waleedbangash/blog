@extends('user/layout.master')
@section('content')
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-2"></div>
      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">Quick Example</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{url('user/update')}}/{{$rowArr->id}}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="user_title" value="{{$rowArr->title}}">
                <span class="error">@error('user_title'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
                <label>Short Discription</label>
                <input type="text" class="form-control" name="shortdisc" value="{{$rowArr->short_discription}}" >
                <span class="error">@error('shortdisc'){{$message}}@enderror</span>

            </div>
            <div class="form-group">
                <label>Long Discription</label>
                <input type="text" class="form-control" name="longdisc" value="{{$rowArr->long_discription}}">
                <span class="error" class="error">@error('longdisc'){{$message}}@enderror</span>
             </div>
            <div class="form-group">
                <label>File input</label>
                <input type="file" name="image" value="{{$rowArr->image}}">
                <span class="error">@error('image'){{$message}}@enderror</span>

            </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">edit</button>
            {{session('msg')}}
            </div>
        </form>
        </div>
    </div>
    </div>
 </section>
@endsection
<style>
    .error
    {
        color: red;
    }
</style>
