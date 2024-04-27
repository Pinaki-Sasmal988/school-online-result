@extends('school.layouts.main')
@section('page-name')
 <h5>Add Subjects<h5>
@endsection
@section('slider')
<div class="containers">
    <div class="row">
       
    <div class="card sm-4 text-center">
  <div class="card-body">
<table class="table sm-4 table-bordered">
  <thead>
    <tr>
     <th>Action</th>
     <th>Action 2</th>
    </tr>
  </thead>
  <tbody>
    <form action="{{route('addSubject')}}" method="post" enctype="multipart/form-data">
      @csrf
    <tr >
    <td scope="row">Select Class</td>
    <td> <select id="selectBox" name="class_name">
        @foreach($data as $item)
        <option value="{{$item->class_name}}">{{$item->class_name}}</option>

        @endforeach
    </select>
    </td>
    </tr>
    <tr >
    <td scope="row">Subject Name:</td>
    <td><input type="text" name="subject_name" value="{{old('subject')}}"><span>@error('subject') {{$message}} @enderror</span>
</td>
</tr>
    <tr >
    <td scope="row">Minimum Passing Marks</td>
    <td><input type="text" name="min_pass" value="{{old('passing')}}"><span>@error('passing') {{$message}} @enderror</span>
    </td>
</tr>
<tr >
    <td scope="row">Total Marks</td>
    <td><input type="text" name="total_mark" value="{{old('total')}}"><span>@error('total') {{$message}} @enderror</span>
    </td>
</tr>
    

  </tbody>
</table>
    <button type="submit" class="btn btn-primary">Add Subject</a>
  </div>
</div> 
</form>       
    

<table class="table">
  <thead>
    <tr>
      <th scope="col">Class Id</th>
      <th scope="col">Subject</th>
      <th scope="col">class</th>
      <th scope="col">Minimum Passing Mark</th>
      <th scope="col">Total Mark</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @php
    $i=1;
    @endphp
    @foreach($sub as $item)
    
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->subject_name}}</td>
      <td>{{$item->class_name}}</td>
      <td>{{$item->min_pass}}</td>
      <td>{{$item->total_mark}}</td>
      <td><a href=""><i class="fas fa-edit"></i></a><b>|</b><a href=""><i class="fas fa-trash-alt"></i></a>
    </tr>
    @endforeach
  </tbody>
</table>

         
    </div>    
</div>
@endsection