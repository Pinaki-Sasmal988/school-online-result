@extends('admin.layouts.main')
@section('page-name')
 <h5>Admin Dashboard<h5>
@endsection
@section('slider')
<div class="containers">
    <div class="row">

       <h3>School Registration</h3>
       @if(Session::has('succes'))
        {{Session::get('succes')}}
        @endif
        @if(Session::has('fail'))
        {{Session::get('fail')}}
        @endif
<table class="table table-bordered">
  <thead>
    <tr>
     <th>Action</th>
     <th>Action 2</th>
    </tr>
  </thead>
  <tbody>
    <form action="{{route('schoolRegistration')}}" method="post" enctype="multipart/form-data">
      @csrf
    <tr >
    <td scope="row">School Name</td>
    <td><input type="text" name="name" value="{{old('name')}}"><span>@error('name') {{$message}} @enderror</span>
</td>
    </tr>
    <tr >
    <td scope="row">Email</td>
    <td><input type="text" name="email" value="{{old('email')}}"><span>@error('email') {{$message}} @enderror</span>
</td>
</tr>
    <tr >
    <td scope="row">School Reg No</td>
    <td><input type="text" name="regno" value="{{old('regno')}}"><span>@error('regno') {{$message}} @enderror</span>
</td>
    </tr>
    <tr >
    <td scope="row">Village</td>
    <td><input type="text" name="village" value="{{old('village')}}"><span>@error('village') {{$message}} @enderror</span>
</td>
    </tr>
    <tr >
    <td scope="row">Police Station </td>
    <td><input type="text" name="police" value="{{old('police')}}"><span>@error('police') {{$message}} @enderror</span>
</td>
    </tr>
    <tr >
    <td scope="row">Dist</td>
    <td><input type="text" name="dist" value="{{old('dist')}}"><span>@error('dist') {{$message}} @enderror</span>
</td>
    </tr>
    <tr >
    <td scope="row">Pin Code </td>
    <td><input type="text" name="pin" value="{{old('pin')}}"><span>@error('pin') {{$message}} @enderror</span>
</td>
    </tr>
    <tr >
    <td scope="row">State</td>
    <td><input type="text" name="state" value="{{old('state')}}"><span>@error('state') {{$message}} @enderror</span>
</td>
    </tr>
    <tr >
    <td scope="row">Contact No</td>
    <td><input type="text" name="contact" value="{{old('contact')}}"><span>@error('contact') {{$message}} @enderror</span>
</td> 
    </tr>
    <tr >
    <td scope="row">Principle</td>
    <td><input type="text" name="principle" value="{{old('principle')}}"><span>@error('principle') {{$message}} @enderror</span>
</td>

    </tr>
    <tr >
    <td scope="row">Website</td>
    <td><input type="text" name="website" value="{{old('website')}}"><span>@error('website') {{$message}} @enderror</span>
</td>
<tr >
    <td scope="row">Password</td>
    <td><input type="text" name="password" value=""><span>@error('password') {{$message}} @enderror</span>
</td>

    </tr>
    <tr >
    <td scope="row">Upload Logo</td>
    <td><input type="file" name="logo"value="{{old('logo')}}"><span>@error('logo') {{$message}} @enderror</span>
</td>
    </tr>
    <tr >
      <td></td>
    <td><button  type="submit" class="btn btn-primary" >Sub</button>
     </td>
    </tr>
</form>
  </tbody>
</table>
        

         
    </div>    
</div>
@endsection