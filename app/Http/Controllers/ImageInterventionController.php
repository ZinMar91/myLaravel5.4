<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImageInterventionController extends Controller
{
    public function index()
    {
        return view('image.index');
    }

    public function resizeImage(Request $request)
    {
        $this->validate($request, [
           'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imgName = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(100,100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imgName);

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imgName);

        alert()->success('Image Upload Successful', '');


        return back()->with('success', 'Image Upload Successful')
                    ->with('imageName', $imgName);
    }
}
