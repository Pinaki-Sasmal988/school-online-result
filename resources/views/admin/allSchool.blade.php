@extends('admin.layouts.main')
@section('page-name')
 <h5>All School<h5>
@endsection
@section('slider')
<div class="containers">
    <div class="row">
       
    <table class="table">
  <thead>
    <tr>
      <th scope="col">SL NO</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Principle</th>
      <th scope="col">Village</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
      <td>{{$item->school_id}}</td>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->contact}}</td>
      <td>{{$item->principle}}</td>
      <td>{{$item->village}}</td>
      <td><a href=""><i class="fas fa-edit"></i></a><b>|</b><a href=""><i class="fas fa-trash-alt"></i></a>
</td>

    </tr>
    @endforeach
   
  </tbody>
</table>
{{--
{{$item->name}}
{{$item->email}}
--}}
         
    </div>    
</div>
@endsection