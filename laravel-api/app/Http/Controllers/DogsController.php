<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Dogs;

class DogsController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'raza' => 'required',
            'size' => 'required',
            'color' => 'required',
            'foto' => 'required'
        ]);

        $requestData = $request->all();
        // Create and save image

        // Get image file
        $image = $requestData['foto'];

        $image = Image::make(file_get_contents($image));

        $extension = explode('/', $image->mime);

        //Genero el hash
        $random = rand();
        $hash_data = "image_".$random."_".$requestData['nombre'];

        //Genero el nombre
        $name = hash('md5', $hash_data);
        
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $name. '.' . $extension[1];

        // Upload image
        Image::make($image)->save(base_path('public').'/images/perros/'.$name. '.' .$extension[1]);

        //$this->uploadOne($image, $folder, 'public', $name);
        // Set user profile image path in database to filePath
        $requestData['foto'] = $filePath;

        // Creating row
        $dog = Dogs::create($requestData);

        return response()->json($dog, 200);
    }

    public function search(Request $request){

        $this->validate($request, [
            'busqueda' => 'required'
        ]);

        $dogs_data = Dogs::where('dogs.nombre', 'like', '%' . $request->input('busqueda') . '%')
                            ->orWhere('dogs.raza', 'like', '%' . $request->input('busqueda') . '%')
                            ->orWhere('dogs.size', 'like', '%' . $request->input('busqueda') . '%')
                            ->orWhere('dogs.color', 'like', '%' . $request->input('busqueda') . '%')
                            ->paginate(20);

        return response()->json($dogs_data);
    }
}