<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
<div class="container">
     <br><br>
  <h4 class="text-bold" style="margin-left:20px;"> Add Aspirant </h4>
<div class="col-sm-5">
  <form method="post" action="{{ route('admin.update_aspirant', $view_aspirant->id) }}" enctype="multipart/form-data">
  @if(Session::has('success'))
<div class="alert alert-success"> {{Session::get('success')}} </div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger"> {{Session::get('fail')}} </div>
@endif
    @csrf
 <div class="form-group">

         
    
    <label>Aspirant Full Name</label>
    <input type="text" name="f_name" class="form-control" value="{{$view_aspirant->f_name }}">
    <span style="color:red;"> @error('f_name') {{$message}} @enderror</span>
  </div>
  <div class="form-group">
    <label>Position Aspiring For:</label>
    <input type="text" name="position" class="form-control" value="{{ $view_aspirant->position }}">
    <span style="color:red;"> @error('position') {{$message}} @enderror</span>
  </div>
  <div> 
 <img style="height: 200px; width:100px;" src="/images/{{ $view_aspirant->dp }}" />
  </div>
    <div class="form-group mb-4">
    <label>Upload Aspirant picture</label>
    <input type="file" name='dp' class="form-control" id="exampleFormControlFile1">

  </div>
 
  <button type="submit" class="btn btn-primary">Update Aspirant</button>
</form>  
</div>
</div>
</div>


