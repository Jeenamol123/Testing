<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\dummy as dummy;
use DB;
//use App\Http\Request;
use  App\Http\Controllers\Controller;


class UserController extends Controller
{
    public  function dummy(Request $req)
  {
    $name = $req->input('name');
    $age = $req->input('age');
     $rec = DB::table('dels')
            ->where("dels.name", "=", $name)->first();
           if($rec){
                echo "<script>alert('User Already Exist ')</script>";
      return view('welcome');
           }
    if ($name !=null and $age!=null)
    {
      $data ['data']= array('name' =>$name,'Age'=>$age);
      DB::table('dels')->insert($data); 
       echo "<script>alert('User Details Successfully  added')</script>";
      return view('welcome');
    }
    else{
      echo "<script>alert('Empty Field Found ')</script>";
      return view('welcome');
    }
  }
}
