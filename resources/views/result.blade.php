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

  
<div class="container my-4" style="border: 2px solid black" id="container">
      <div
        id="heading"
        class="text-center"
        style="
          font-family: 'Times New Roman', Times, serif;
          letter-spacing: 5px;
        "
      >
      @foreach($schoolDetail as $schoolDetail)
        <h1>{{$schoolDetail->name}}</h1>
        <p>{{$schoolDetail->village}}, {{$schoolDetail->police}}, {{$schoolDetail->dist}} {{( $schoolDetail->state )}}</p>
        <h4>PROGRESS REPORT</h4>
     @endforeach
      </div>
      @foreach($student as $details)
      <div id="student-info">
        <table class="table table-bordered">
          <tbody class="text-center">
            <tr>
              <th scope="row">Name of the student :</th>
              <td>{{$details->student_name}}</td>
              <th scope="row">GENDER</th>
              <td>{{$details->gender}}</td>
            </tr>
            <tr>
              <th scope="row">Father's Name :</th>
              <td>{{$details->father}}</td>
              <th scope="row">MOTHER'S NAME :</th>

              <td>{{$details->mother}}</td>
            </tr>
            <tr>
              <th scope="row">Class :</th>
              <td>{{$details->class}}</td>
              <th scope="row">ROLL NO :</th>
              <td>{{$details->roll_no}}</td>
            </tr>
            <tr>
              <th scope="row">REGISTRATION NUMBER :</th>
              <td>{{$details->reg_no}}</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>

      @endforeach
      <div id="marksheet-section" class="my-4">
        <table class="table table-bordered my-4">
          <thead>
            <tr>
              <th scope="col">Subject :</th>
              <th scope="col">Total Marks :</th>
              <th scope="col">Min Passing Marks :</th>
              <th scope="col">Obtained Marks :</th>
              <th scope="col">Grade :</th>
            </tr>
          </thead>
          <tbody>
          
          @foreach($subjects as $key=>$subject )
            <tr>
             <td>{{$subject->subject_name}}</td>
             <td>{{$subject->total_mark}}</td>
             <td>{{$subject->min_pass}}</td>
      
             <td>{{$result[$key]['obtain_marks'] ?? ' '}}</td>
             <td>@if ($result[$key]['obtain_marks'] > 80)
                 <p>A+</p>
                 @elseif ($result[$key]['obtain_marks'] > 60)
                 <p>A</p>
                 @else
                 <p>C</p>
                 @endif
            </td>

            </tr>
            @endforeach

          </tbody>
          
         
    
        </table>
      </div>
      <div id="res-section" class="text-center my-4">
        <h3>ress</h3>
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th scope="row">Percentage :</th>
              <td>{{$avg}}</td>
              <th scope="row">Minimum Passing Percentage :</th>
              <td>{{$minPass}}</td>
              <th scope="row">Remark :</th>
              <td>
                @if ($avg>80)
                <p>First Class</p>
                @elseif ($avg>70)
                <p>Second Class</p>
                @else
                <p>Good</p>
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="container text-center my-4">
      <div
        class="btn text-center"
        style="background-color: black; color: white"
        id="downloadButton"
      >
        Print This Marksheet
      </div>
    </div>
    <script>
      document
        .getElementById("downloadButton")
        .addEventListener("click", function () {
          // Get the container element
          const container = document.getElementById("container");

          // Use html2canvas to capture the content as an image
          html2canvas(container).then(function (canvas) {
            // Convert the canvas to data URL
            const dataUrl = canvas.toDataURL("image/png");

            // Create a link element to trigger the download
            const downloadLink = document.createElement("a");
            downloadLink.href = dataUrl;
            downloadLink.download = "container_content.png";

            // Append the link to the document and trigger the click event
            document.body.appendChild(downloadLink);
            downloadLink.click();

            // Remove the link from the document
            document.body.removeChild(downloadLink);
          });
        });
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

</body>
</html>