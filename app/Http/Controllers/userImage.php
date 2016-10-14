<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\userImageModel;

class userImage extends Controller {

//


    public function index() {
        return view('useredit');
    }
    public function userImage(Request $request) {
//$file = array('image' => Input::file('image'));        /
// validate        
        $rules = array('description' => 'required');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/')->withErrors($validator);
        } else {
            $imageTempName = $request->file('usrimage')->getPathname();
            $imageName = $request->file('usrimage')->getClientOriginalName();
            $path = base_path() . '/public/assets/';
            list($width, $height) = getimagesize($request->file('usrimage'));
            $request->file('usrimage')->move($path, $imageName);
//if($request->file('image')->getErrorMessage()){echo "error: " . 
            $request->file('usrimage')->getErrorMessage();
        }
        if ($request->hasFile('usrimage')) {
            $filepath = '/public/assets/' . $imageName;
            $desc = $_POST['description'];
            
            $image_detail = new userImageModel;
            $image_detail->image = $imageName;
            
            $image_detail->description = $desc;
            
            $image_detail->save();
            #echo $id;exit;                    
            return Redirect::to('/');
        } else {
            return Redirect::to('add_art')->withErrors('Image not uploaded');
        }
    }

}
