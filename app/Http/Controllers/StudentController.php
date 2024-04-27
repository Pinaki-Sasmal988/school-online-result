<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Student;
use App\Models\Subject;
use App\Models\School;
use App\Models\StudentMark;

class StudentController extends Controller
{
    public function home(){
           $class=Classe::all();
           $school=School::all();
        return view('home',compact('class','school'));
    }
    public function findResult(Request $req){
        $schoolDetail=School::where('school_id','=',$req->school_id)->get();
       $student=Student::where('school_id','=',$req->school_id)->where('roll_no','=',$req->roll)->where('class','=',$req->class)->get();
        $subjects=Subject::where('class_name','=',$req->class)->where('school_id','=',$req->school_id)->get();
         $result=StudentMark::where('school_id','=',$req->school_id)->where('roll_no','=',$req->roll)->where('class','=',$req->class)->get();
         
        $sum= StudentMark::where('school_id','=',$req->school_id)->where('roll_no','=',$req->roll)->where('class','=',$req->class)->sum('obtain_marks');
        $totalSubject=StudentMark::where('school_id','=',$req->school_id)->where('roll_no','=',$req->roll)->where('class','=',$req->class)->count();
       if($sum && $totalSubject ){
        $avg =$sum/$totalSubject;

       }else{
        $avg=0;
       }
         $minPass=35;
       return view('result',compact('student','schoolDetail','subjects','result','sum','avg','minPass'));
    }

    public function result(){
        return view('result');
    }
}
