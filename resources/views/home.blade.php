<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<style>
      *{
        margin: 0%;
        padding: 0%;
      }
      .container{
        overflow-x: auto;
      }
      /* Responsive styling */
      @media (max-width: 768px) {
        .container {
          max-width: 100%;
        }}
        body {
        font-family: 'Times New Roman', Times, serif;
      }
      
    </style>
    </head>
<body>
<div
      class="container my-4"
      style="border: 2px solid black; max-width: 600px; margin: auto;"
    >
    <form action="{{route('findResult')}}" method="post">
        @csrf
      <table class="table table-bordered my-4">
        <tbody>
          <tr>
            <td>Select Class :</td>
            <td>
              <select
                list="rollNumbers"
                name="class"
                id="rollNumber"
                class="form-select"
                style="width: 160px"
              >
                <option value="" disabled selected>Select Class</option>
                @foreach($class as $class)
                <option value="{{$class->class_name}}">{{$class->class_name}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>Roll No :</td>
            <td>
              <input
                type="number"
                class="form-control"
                name="roll"
                placeholder="Enter your roll number"
                min="1"
              />
            </td>
          </tr>
          <tr>
            <td>Select School :</td>
            <td>
              <select
                list="rollNumbers"
                name="school_id"
                id="rollNumber"
                class="form-select"
                style="width: 160px"
              >
                <option value="" disabled selected>Select School Name</option>
                @foreach($school as $school)
                <option value="{{$school->school_id}}">{{$school->name}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td class="d-flex align-items-center text-center" colspan="2"></td>
          </tr>
          <tr>
            <td colspan="2" class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    </div>



</body>
</html>