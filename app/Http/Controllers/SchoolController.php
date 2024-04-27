<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;  

use App\Mail\schoolRegistration;
use App\Models\School;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Classe;
use App\Models\StudentMark;

use validate;
use Hash;
use Session;
class SchoolController extends Controller
{
    public function dashboard(){
        $data=array();
     if(Session::has('school')){
     $data=School::where('school_id', '=', Session::get('school'))->first(); 
     }
        
        return view('school.dashboard');
    }
    public function classes(){
        $id=Session::get('school')['school_id'];
        $data = DB::table('schools')->join('classes', 'schools.school_id', '=', 'classes.school_id')
        ->where('schools.school_id', '=', $id)->select('*')->get(); 
          return view('school.classes',['data'=>$data]);
        
    }
    public function subject(){

        $id=Session::get('school')['school_id'];
        $data = DB::table('schools')->join('classes', 'schools.school_id', '=', 'classes.school_id')
        ->where('schools.school_id', '=', $id)->select('*')->get(); 

        $sub= DB::table('schools')->join('subjects', 'schools.school_id', '=', 'subjects.school_id')
        ->where('schools.school_id', '=', $id)->select('*')->get(); 
        return view('school.subjects',compact('data','sub'));

    }
    public function addStudent(){
        $id=Session::get('school')['school_id'];
        $data = DB::table('schools')->join('classes', 'schools.school_id', '=', 'classes.school_id')
        ->where('schools.school_id', '=', $id)->select('*')->get();
        return view('school.addStudent',compact('data'));

    }
    public function addMark(){
        $id=Session::get('school')['school_id'];
        $data = DB::table('schools')->join('classes', 'schools.school_id', '=', 'classes.school_id')
        ->where('schools.school_id', '=', $id)->select('*')->get();
        return view('school.addMarks',compact('data'));

    }
    public function allStudent(){
        return view('school.allStudents');

    }
    public function schoolLogin(){
        return view('school.schoolLogin');
    }
    public function schoolRegistration(Request $request){
        $request->validate([
         'name'=>'required',
         'email'=>'required',
         'regno'=>'required',
         'village'=>'required',
         'police'=>'required',
         'dist'=>'required',
         'pin'=>'required',
         'state'=>'required',
         'contact'=>'required',
         'principle'=>'required',
         'website'=>'required',
         'logo'=>'required',
         'password'=>'required',
        ]);

        $school=new School;
        $school->name=$request->name;
        $school->email=$request->email;
        $school->regno=$request->regno;
        $school->village=$request->village;
        $school->police=$request->police;
        $school->dist=$request->dist;
        $school->pin=$request->pin;
        $school->state=$request->state;
        $school->contact=$request->contact;
        $school->principle=$request->principle;
        $school->website=$request->website;
        $image=$request->logo;
        $name=$image->getClientOriginalName();
        $image->storeAs('public/images',$name);
        $school->logo=$name;
        $school->password=Hash::make($request->password);
        // $school->otp=$request->otp;
        $res=$school->save();
         Mail::to($request->email)->send(new schoolRegistration($request->name));
        if($res){
            // echo "done";

            return redirect('admin/allSchool');
        }else{
            echo "sorry";
        }
    
    }
    public function schoolAccess(Request $request){
        $request->validate([
        'email'=>'required|email',
       'password'=>'required|min:5|max:10',
        ]);
        $school=School::where('email', '=', $request->email)->first();
        if($school){
              if(Hash::check($request->password, $school->password)){
                     $request->session()->put('school',$school);
                     return redirect('school/dashboard');
              }else{
                return back()->with('fail','password Does not match');

              }
        }else{
            return back()->with('fail','This email does not exite ');
        }
    }
    public function schoolLogout(){
        if(Session::has('school')){
            Session::pull('school');
            return redirect('school/login');
        } 
    }
    public function addClass(Request $request){
        $id=Session::get('school')['school_id'];
             $class=new Classe;
             $class->school_id=$id; 
             $class->class_name=$request->class;
             $res=$class->save();
             if($res){
                $data = DB::table('schools')->join('classes', 'schools.school_id', '=', 'classes.school_id')
                ->where('schools.school_id', '=', $id)->select('*')->get(); 
                  return view('school.classes',['data'=>$data]);
             }
    }
    public function addSubject(Request $request){
        $id=Session::get('school')['school_id'];
           $data=new Subject;
           $data->school_id=$id;
           $data->subject_name=$request->subject_name;
           $data->class_name=$request->class_name;
           $data->min_pass=$request->min_pass;
           $data->total_mark=$request->total_mark;
           $res=$data->save();
           if($res){
            $sub= DB::table('schools')->join('subjects', 'schools.school_id', '=', 'subjects.school_id')
                ->where('schools.school_id', '=', $id)->select('*')->get(); 

        $id=Session::get('school')['school_id'];
        $data = DB::table('schools')->join('classes', 'schools.school_id', '=', 'classes.school_id')
        ->where('schools.school_id', '=', $id)->select('*')->get();
            return view('school.subjects',compact('sub','data'));
           }else{
            return "Wrong";
           }
           

    }public function studentRegister(Request $request){
        $id=Session::get('school')['school_id'];
        $data=new Student;
        $request->validate([
            'roll_no'=>'required',
            'reg_no'=>'required',
            'student_name'=>'required',
            'class'=>'required',
            'gender'=>'required',
            'father'=>'required',
            'mother'=>'required',
        ]);
        $data->school_id=$id;
        $data->roll_no=$request->roll_no;
        $data->reg_no=$request->reg_no;
        $data->student_name=$request->student_name;
        $data->class=$request->class;
        $data->gender=$request->gender;
        $data->father=$request->father;
        $data->mother=$request->mother;
        $res=$data->save();
        if($res){
            $id=Session::get('school')['school_id'];
            $data = DB::table('schools')->join('classes', 'schools.school_id', '=', 'classes.school_id')
            ->where('schools.school_id', '=', $id)->select('*')->get();
            return view('school.addStudent',compact('data'))->with('confirmationMessage','Data Added Successfully!');
        }
    }
    public function searchStudent(Request $req){
        $req->validate([
          'roll_no'=>'required',
          'class'=>'required',
        ]);
        $id=Session::get('school')['school_id'];
        $record=Student::where('class', $req->class)
        ->where('roll_no', $req->roll_no)
        ->where('school_id', $id)
        ->first();
        $data = DB::table('schools')->join('classes', 'schools.school_id', '=', 'classes.school_id')
        ->where('schools.school_id', '=', $id)->select('*')->get();
        
        $subject=Subject::where('school_id',$id)
        ->where('class_name',$req->class)->select('*')->get();
        return view('school.addMarks',compact('record','data','subject'));
        //echo $record;
    
    }
    public function submitResult(Request $request){
            // $data=new StudentMark;
            //     $data->school_id=$request->input('school_id');
            //     $data->roll_no=$request->input('roll_no');
            //     $data->class=$request->input('class');
            //     $data->student_id=$request->input('student_id');  
                // foreach ($request->obtain_marks as $student_id=>$mark) {
                //     // foreach ($student_id as $mark) {
                //         StudentMark::create([
                //             'school_id' => $school_id,
                //             'student_id' => $student_id,
                //             'roll_no' => $request->input('roll_no'),
                //             'obtain_marks' => $mark
                //         ]);
                //     // }
                // }

                $school_id=Session::get('school')['school_id'];
                $studentId = $request->input('student_id');
                $rollNo = $request->input('roll_no');
                $class = $request->input('class');
                $marks = $request->input('obtain_marks');
        
                // Validate input here if needed
        
                $values = [];
        
            
                // Loop through each student_id, subject_id, and marks and prepare the data for insertion
            foreach ($marks as $key => $mark) {
            $values[] = [
                'school_id'=>$school_id,
                'student_id' =>  $studentId,
                'roll_no'=>$rollNo,               
                 'class'=>$class,
                'obtain_marks' => $marks[$key],
                'created_at' => now(),
                'updated_at' => now(),
               ];
             }

           // Bulk insert the subject marks into the database
             DB::table('student_marks')->insert($values);
             return redirect()->back()->with('conMessage', 'Number Added successfully.');

     }
    
        
    // return $request->all();
}


