@extends ('layout.admin_layout')


@section('content') <br>
<div class="container">
  <h4 style="margin-left:10px;"> Add Aspirant </h4>
<div class="col-sm-5">
  <form method="post" action="{{ route('admin.adspirant') }}" enctype="multipart/form-data">
  @if(Session::has('success'))
<div class="alert alert-success"> {{Session::get('success')}} </div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger"> {{Session::get('fail')}} </div>
@endif
    @csrf
 <div class="form-group">
    <label>Aspirant Full Name</label>
    <input type="text" name="f_name" class="form-control" placeholder="Aspirant full name here" value="{{old('f_name')}}">
    <span style="color:red;"> @error('f_name') {{$message}} @enderror</span>
  </div>
  <div class="form-group">
    <label>Position Aspiring For:</label>
    <input type="text" name="position" class="form-control" placeholder="Post applying for">
    <span style="color:red;"> @error('position') {{$message}} @enderror</span>
  </div>
    <div class="form-group mb-4">
    <label>Upload Aspirant picture</label>
    <input type="file" name='dp' class="form-control" id="exampleFormControlFile1" required>

  </div>
 
  <button type="submit" class="btn btn-primary">Add Aspirant</button>
</form>  
</div>
</div>
</div>

@stop
 