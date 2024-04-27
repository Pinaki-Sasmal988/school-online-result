@extends('school.layouts.main')
@section('page-name')
 <h5>Add Class<h5>
@endsection
@section('slider')
<div class="containers">
<div class="row">
  <div class="col-sm-4 text-center py-10" style="">
    <div class="card ">
      <div class="card-body ">
        <h4>Add Class</h4>
        <p>Enter Class Name</p>
        <form action="{{route('addClass')}}" method="post">
            @csrf
        <input type="text" name="class" ><br><br>
        <button type="submit" class="btn btn-primary">Add Class</button>
        </form>
      </div>
    </div>
  </div>
  

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Class Id</th>
      <th scope="col">Class</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @php
    $i=1;
    @endphp
    @foreach($data as $item)
    
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->class_name}}</td>
      <td><a href=""><i class="fas fa-edit"></i></a><b>|</b><a href=""><i class="fas fa-trash-alt"></i></a>
    </tr>
    @endforeach
  </tbody>
</table>
</div>   
</div>
@endsection