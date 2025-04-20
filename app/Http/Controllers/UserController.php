<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('user.register');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                'confirmed', // Asegura que el campo password_confirmation coincida
            ],
            'password_confirmation' => 'required|same:password', // Campo de confirmación de contraseña
        ];

        // Define los mensajes de error personalizados
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe tener un formato válido.',
            'email.unique' => 'Este email ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.regex' => 'La contraseña debe contener al menos una letra mayúscula y un número.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'password_confirmation.required' => 'La confirmación de la contraseña es obligatoria.',
            'password_confirmation.same' => 'La confirmación de la contraseña debe coincidir con la contraseña.',
        ];

        // Realiza la validación
        $validator = Validator::make($request->all(), $rules, $messages);

        // Si la validación falla, retorna los errores
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 Unprocessable Entity
        }

        // Si la validación es exitosa, crea el nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encripta la contraseña
        ]);

        // creamos uan sesion con lso datos del usuario recien registrado
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // creacion de sesion si las credenciales son validadas
            $request->session()->regenerate();
        }


        // Se grea un evento para la validacion de email
        //event(new Registered($user));

        // Retorna una respuesta con el usuario creado (opcional)
        return response()->json(['message' => 'Usuario registrado exitosamente', 'user' => $user], 201); // 201 Created
    

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


    public function validarCredenciales(Request $request)
    {
        // Define las reglas de validación
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', // Ejemplo: requiere al menos 8 caracteres
        ];

        // Define los mensajes de error personalizados (opcional)
        $messages = [
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe tener un formato válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];

        // Realiza la validación
        $validator = Validator::make($request->all(), $rules, $messages);

        // Si la validación falla, retorna los errores
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 Unprocessable Entity
        }

        // Si la validación es exitosa, puedes continuar con la lógica (por ejemplo, intentar autenticar al usuario)
        // Por ahora, solo retornamos un mensaje de éxito
        return response()->json(['message' => 'Credenciales validadas correctamente'], 200);
    }

    public function login(){

        return view('user.login');

    }

}
