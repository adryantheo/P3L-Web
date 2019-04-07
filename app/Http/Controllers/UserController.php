<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use Validator;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(),200);
    }


    public function login(Request $request)
    {
       

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('AtmaAuto');
        $token = $tokenResult->token;
        
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);

        
    }

    public function register(Request $request)
    {
        $request->validate([
            
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = new User([
            'Nama' => $request->Nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),            
            'Alamat' => $request->Alamat,
            'Gaji' => $request->Gaji,
            'Role' => $request->Role,
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);

       
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function gantipassword(Request $request, User $user)
    {
        $status = $user->update(
            $request->only([
                'password' => $request->password
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'password Diupdate!' : 'Error Mengupdate password'
        ]);
    }

    public function show(User $user)
    {
        return response()->json($user,200);
    }

    public function update(Request $request, User $user)
    {
        $status = $user->update(
            $request->only([
                'Nama' => $request->Nama,
                'email' => $request->email,
                'Alamat' => $request->Alamat,
                'Gaji' => $request->Gaji,
                'Role' => $request->Role,                 
        
            ])
        );
        return response()->json([
            'status' => $status,
            'message' => $status ? 'User Diupdate!' : 'Error Mengupdate User'
        ]);
    }

    public function destroy(User $user)
    {
        $status = $user->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'User Berhasil di Hapus!' : 'Error Menghapus User'
        ]);
    }
}
