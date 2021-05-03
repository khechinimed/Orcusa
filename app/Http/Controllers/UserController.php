<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    //
    public function createUser(Request $request ){
        //validation
        $request->validate([
            'fullName' => 'required',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|min:6',
            'userType' => 'required'
        ]);

        $password = bcrypt($request->password);
        $user = User::create([
            'fullName' => $request->fullName,
            'email' => $request->email,
            'password' => $password,
            'userType' => $request->userType,
            'image' => $request->image
        ]);
        return $user;
    }

    public function getUsers(){
        return User::orderBy('id', 'desc')->get();
    }

    public function editUser(Request $request){
        //validation
        $request->validate([
            'fullName' => 'required',
            'email' => "bail|required|email|unique:users,email,$request->id",
            'password' => 'min:6',
            'userType' => 'required',
        ]);
        $data = [
            'fullName' => $request->fullName,
            'email' => $request->email,
            'userType' => $request->userType
        ];
        if($request->password){
            $password = bcrypt($request->password);
            $data['password'] = $password;
        }
        
        $user = User::where('id', $request->id)->update($data);
        return $user;
    }

    public function upload(Request $request){
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png'
        ]);

        $picName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads'), $picName);

        return $picName;
    }

    public function deleteImage(Request $request){
        $fileName = $request->imageName;
        $this->deleteFileFromServer($fileName);

        return 'done';
    }

    public function deleteFileFromServer($fileName){
        $filePath = public_path().'/uploads/'.$fileName;
        if(file_exists($filePath)){
            @unlink($filePath);
            File::delete($filePath);
        }
        return;
    }

     
}
