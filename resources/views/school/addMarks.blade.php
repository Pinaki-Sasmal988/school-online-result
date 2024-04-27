@extends('school.layouts.main')
@section('page-name')
 <h5>Add Marks<h5>
@endsection
@section('slider')
<div class="containers">
<div class="row">
    <div class="card md-3 text-center">
     <div class="card-body">
     <table class="table md-4 table-bordered">
  <thead>
    <tr>
     <th>Action</th>
     <th>Action 2</th>
    </tr>
  </thead>
  <tbody>
    <form action="{{route('searchStudent')}}" method="post" enctype="multipart/form-data">
      @csrf
    <tr >
    <td scope="col"><input type="text" name="roll_no" placeholder="Enter Roll No"><span>@error('roll_no') {{$message}} @enderror</span>
</td>
    <td> <select id="selectBox" name="class">
    <option value="">Select Class</option>
        @foreach($data as $item)
        <option value="{{$item->class_name}}">{{$item->class_name}}</option>
        @endforeach
    </select><span>@error('class') {{$message}} @enderror</span>

    </td>
    </tr>
  </tbody>
  </table>
    <button type="submit" class="btn btn-primary">Search Student</a>
    </form>         
  </div>
</div> 
 
@if(isset($record))
<h4>Add Marks</h4>
{{$record->student_name}}
{{$record->student_id}}
{{$record->roll_no}}
{{$record->class}}

@if (isset($conMessage))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $conMessage }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button> 
              </div>
              @endif

             
<div class="card sm-4 text-center">
  <div class="card-body">
<table class="table sm-4 table-bordered">
  <thead>
    <tr>
     <th>Action</th>
     <th>Action 2</th>
     <th>Action 3</th>
    </tr>
  </thead>
  <tbody>
    <form action="{{route('addMarks')}}" method="post" enctype="multipart/form-data">
      @csrf
     
      <input type="text" name="school_id" value="{{Session::get('school')['school_id']}}">
      <input type="hidden" name="roll_no" value="{{$record->roll_no}}">
      <input type="hidden" name="class" value=" {{$record->class}}">
      <input type="hidden" name="student_id" value=" {{$record->student_id}}">

      @foreach($subject as $sub)
      <tr>
    <td scope="col">
    {{$sub->subject_name}}
     </td>
      <td> {{$sub->total_mark}}</td>
      <td><input type="text" name="obtain_marks[]" value="">
    </td>
      </tr>
     @endforeach

  </tbody>
</table>
    <button type="submit" class="btn btn-primary">Search Student</a>
  </div>
</div> 
</form>         
@else
<h3>Noting</h3>
  
@endif
         
  </div>    
</div>

@endsection