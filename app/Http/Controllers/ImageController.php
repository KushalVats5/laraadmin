<?php
namespace App\Http\Controllers;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function ajaxImage(Request $request)
    {
        if ($request->isMethod('get'))
            return view('ajax_image_upload');
        else {
            $validator = Validator::make($request->all(),
                [
                    'file' => 'image',
                ],
                [
                    'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);
            if ($validator->fails())
                return array(
                    'fail' => true,
                    'errors' => $validator->errors()
                );
            // $extension = $request->file('file')->getClientOriginalExtension();
            // $dir = 'uploads/profiles/';
            // $filename = uniqid() . '_' . time() . '.' . $extension;
            // $request->file('file')->move($dir, $filename);

            $image = $request->file('file');
            $filename = rand() . '.' . $image->getClientOriginalExtension();
            $full = 'uploads/profiles/full/';
            $thumb = 'uploads/profiles/thumb/';
            $medium = 'uploads/profiles/medium/';
            $large = 'uploads/profiles/large/';

            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(150, 150);
            $image_resize->save(public_path($thumb.$filename));

            $image_resize->resize(300, 300);
            $image_resize->save(public_path($medium.$filename));

            $image_resize->resize(780, 520);
            $image_resize->save(public_path($large.$filename));

            $image->move($full, $filename);

            return $filename;
        }
    }

    public function deleteImage($filename)
    {
        $full = 'uploads/profiles/full/';
        $large = 'uploads/profiles/large/';
        $medium = 'uploads/profiles/medium/';
        $thumb = 'uploads/profiles/thumb/';

        File::delete($full . $filename);
        File::delete($large . $filename);
        File::delete($medium . $filename);
        File::delete($thumb . $filename);
    }
}
