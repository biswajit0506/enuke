<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\api\BaseController;


class ImageController extends BaseController
{






    /** user login function with credential
     *
     */
    public function upload(Request $request)
    {

        // checkvalidation
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:500'
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }

        //upload file on image directory
        $path = Storage::disk('public')->putFile('images', $request->file('image'));

        if($path){

            $success['imagePath'] =  $path;

            return $this->handleResponse($success, 'Image Upload Successfull !! ');
        }else{
            return $this->handleError('Not uploaded !!', ['error'=>'File upload fail!!']);
        }
    }

}
