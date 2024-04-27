@extends('school.layouts.main')
@section('page-name')
 <h5>Add Student<h5>
@endsection
@section('slider')
<div class="containers">
    <div class="row">
       
    <div class="card sm-4 text-center">
    @if (isset($confirmationMessage))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $confirmationMessage }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button> 
              </div>
              @endif
  <div class="card-body">
  <table class="table sm-4 table-bordered">
  <thead>
    <tr>
     <th>Action</th>
     <th>Action 2</th>
    </tr>
  </thead>
  <tbody>
    <form action="{{route('studentRegister')}}" method="post" enctype="multipart/form-data">
      @csrf
      <tr >
    <td scope="row">Roll Number:</td>
    <td><input type="text" name="roll_no" value="{{old('roll_no')}}"><span>@error('roll_no') {{$message}} @enderror</span>
</td>
</tr>
<tr >
    <td scope="row">Registration Number:</td>
    <td><input type="text" name="reg_no" value="{{old('reg_no')}}"><span>@error('reg_no') {{$message}} @enderror</span>
</td>
<tr>
    <td scope="row">Student Name:</td>
    <td><input type="text" name="student_name" value="{{old('sudent_name')}}"><span>@error('student_name') {{$message}} @enderror</span>
</td>
</tr>
</tr>
    <tr >
    <td scope="row">Select Class</td>
    <td> <select id="selectBox" name="class">
    <option value="">Select Class</option>
        @foreach($data as $item)
        <option value="{{$item->class_name}}">{{$item->class_name}}</option>
        @endforeach
    </select><span>@error('class') {{$message}} @enderror</span>
    </td>
    <tr >
    <td scope="row">Select Gender</td>
    <td> <select id="selectBox" name="gender">
    <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="others">Others</option>
    </select><span>@error('gender') {{$message}} @enderror</span>
    </td>
    </tr>

<tr >
    <td scope="col">Father's Name</td>
    <td><input type="text" name="father" value="{{old('father')}}"><span>@error('father_name') {{$message}} @enderror</span>
    </td>
</tr>
<tr >
    <td scope="col">Mother's Name</td>
    <td><input type="text" name="mother" value="{{old('mother')}}"><span>@error('mother_name') {{$message}} @enderror</span>
    </td>
</tr>
    

  </tbody>
</table>
    <button type="submit" class="btn btn-primary">Add Sudent</a>
    </form>
  </div>
</div> 

        
    

         
    </div>    
</div>
@endsection