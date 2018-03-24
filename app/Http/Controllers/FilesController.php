<?php

namespace App\Http\Controllers;

use App\File;
use App\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;


class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::paginate(10);

        return view('files.index', [
            'files' => $files

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = Storage::disk('public')->put('',$request->file('file_name'));

        $file = new File();
        $file->file_name = $fileName;
        $file->save();

        Image::configure(array('driver' => 'gd'));

        $img = Image::make(public_path('storage/'.$file->file_name));

        $img->resize(20, 40);

        $img->save(public_path('/storage/thumb'.$file->file_name));

        return redirect(route('files.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view('files.edit', [
            'file' => $file
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {

        Storage::disk('public')->delete([
            $file->file_name,
            'thumb' . $file->file_name
        ]);

        $fileName = Storage::disk('public')->put('',$request->file('file_name'));

        $thumbPath = storage_path('app/public').'/thumb'.$fileName;

        $manager = new ImageManager(['driver' => 'gd']);
        $image = $manager
            ->make($request -> file('file_name'))
            ->resize(300, 200)
            ->save($thumbPath);

        $file->file_name = $fileName;
        $file->save();



//        //to jest dobrze ale inny sposób
//        Storage::disk('public')->delete($file->file_name);
//        Storage::disk('public')->delete('thumb'.$file->file_name);
//        $file->delete();
//
////wrzuć nowa
//        $fileName = Storage::disk('public')->put('',$request->file('file_name'));
//
//        $thumbPath = storage_path('app/public').'/thumb'.$fileName;
//
//        $manager = new ImageManager(['driver' => 'gd']);
//        $image = $manager
//            ->make($request -> file('file_name'))
//            ->resize(300, 200)
//            ->save($thumbPath);
//
//        $file->file_name = $fileName;
//        $file->save();


        return redirect( route('files.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        Storage::disk('public')->delete($file->file_name);
        Storage::disk('public')->delete('thumb'.$file->file_name);

        $file->delete();
        return redirect( route('files.index'));
    }
}
