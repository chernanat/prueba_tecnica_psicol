<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function store(SignatureController $request)
    {
        $signature = new Signature($request->all());
        $signature->save();
        return response()->json([
            'saved' => true,
            'signature' => $signature
        ]);
    }
    public function edit(Signature $signature)
    {
        // return view('user', compact('person'));
    }
    public function update(Request $request, Signature $user)
    {
        $user = Signature::where('id', $request['id']);
        $user->update($request->all());
        return response()->json([
            'updated' => true,
        ], 200);
    }
}
