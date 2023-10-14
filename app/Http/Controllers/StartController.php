<?php

namespace App\Http\Controllers;

use App\Models\Start;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StartController extends Controller
{
    //Indica que para acceder a este modulo debemos de estar si o si autenticados.
    public function __construct()
    {
        $this -> middleware('auth');
    }

    public function index()
    {
        $inicio = Start::find(1);
        return view('modules.Start')->with('inicio', $inicio);
    }

    public function DatosCreate()
    {
        return view('modules.Mis-Datos');
    }


    public function DatosUpdate(Request $request)
    {
        if(auth()->user()->email != request('email')){
            if(isset($datos['passwordN'])){

                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'phone' => ['string', 'max:255'],
                    'document' => ['string', 'max:255'],
                    'email' => ['required', 'email', 'string', 'unique:users'],
                    'passwordN' => ['string', 'min:3', 'required']
                ]);
            }else{
                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'phone' => ['string', 'max:255'],
                    'document' => ['string', 'max:255'],
                    'email' => ['required', 'email', 'string', 'unique:users']
                    ]);
            }
        }else{
             if(isset($datos['passwordN'])){
                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'phone' => ['string', 'max:255'],
                    'document' => ['string', 'max:255'],
                    'email' => ['required', 'email', 'string'],
                    'passwordN' => ['string', 'min:3', 'required']
                ]);
            }else{
                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'phone' => ['string', 'max:255'],
                    'document' => ['string', 'max:255'],
                    'email' => ['required', 'email', 'string']
                    ]);
            }

        }

        if(asset(request('passwordN'))){
            DB::table('users')->where('id', auth()->user()->id)->update(['name'=>$datos['name'], 'email'
                =>$datos['email'],'phone'=>$datos['phone'], 'document'=>$datos['document']]);
        }else{
            DB::table('users')->where('id', auth()->user()->id)->update(['name'=>$datos['name'], 'email'
            =>$datos['email'],'phone'=>$datos['phone'], 'document'=>$datos['document'],'password'=>Hash::make($datos["passwordN"]) ]);
        }
        
        return redirect('Mis-Datos');
    }


    public function edit()
    {
        $inicio = Start::find(1);

        return view('modules.Inicio-Editar')->with('inicio', $inicio);
    }



    public function update(Request $request)
    {
        $datos = request();

        $inicio = Start::find(1);

        $inicio->dias = $datos["dias"];
        $inicio->horaInicio = $datos["horaInicio"];
        $inicio->horaFin = $datos["horaFin"];
        $inicio->direccion = $datos["direccion"];
        $inicio->telefono = $datos["telefono"];
        $inicio->email = $datos["email"];
        
        if(request('logoN')){

            Storage::delete('public/'.$inicio->logo);

            $rutaImg = $request['logoN']->store('inicio','public');

            $inicio->logo = $rutaImg;
        }

        $inicio -> save();

        return redirect('Inicio-Editar');
    }

    public function destroy(Start $start)
    {
        
    }
}
