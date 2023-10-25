<?php

namespace App\Http\Controllers;

use App\Models\Parawisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\FlareClient\View;

class ParawisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            return view('dashboard.parawisata.index', [
                'title' => 'PARIWISATA E-TIKET',
                'pariwisatas' => Parawisata::where('parawisata', 'LIKE', '%' . $request->search . '%')->latest()->paginate(2)
            ]);
        }else{
            return view('dashboard.parawisata.index', [
                'title' => 'PARIWISATA E-TIKET',
                'pariwisatas' => Parawisata::latest()->paginate(2)
            ]);
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // function untuk menampilkan view create pariwisata
        return view('dashboard.parawisata.create', [
            'title' => 'PARIWISATA E-TIKET',
            'create' => 'Create Pariwisata'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Function proses create pariwisat
        $validateData = $request->validate([
            'parawisata' => ['required'],
            'alamat' => ['required'],
            'tentang' => ['required'],
            'image' => 'file|file|max:1024',
            'harga' => 'required',
            'maps' => 'required'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('post-image');
        }
        Parawisata::create($validateData);
        return redirect('/dashboard/pariwisata')->with('success', 'Tourism data successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parawisata  $parawisata
     * @return \Illuminate\Http\Response
     */
    public function show(Parawisata $parawisata, $id)
    {
        // Function untuk menampilkan view detal
        $parawisata = Parawisata::where('id', $id)->first();
        return view('dashboard.parawisata.show', [
            'title' => 'PARIWISATA E-TIKET',
            'detail' => $parawisata->parawisata,
            'pariwisata' => $parawisata
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parawisata  $parawisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Function untuk menampilkan view edit
        $parawisata = Parawisata::where('id', $id)->first();
        return view('dashboard.parawisata.edit', [
            'title' => 'PARIWISATA E-TIKET',
            'edit' => 'Edit Pariwisata ' . $parawisata->parawisata,
            'pariwisata' => $parawisata
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parawisata  $parawisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parawisata $parawisata, $id)
    {
        //function untuk prose update
        $parawisata = Parawisata::where('id', $id)->first();
        $rules = [
            'parawisata' => ['required'],
            'alamat' => ['required'],
            'tentang' => ['required'],
            'image' => 'file|file|max:1024',
            'harga' => 'required',
            'maps' => 'required'
        ];
        $validateData = $request->validate($rules);
        if($request->file('image')){
            if($request->gambarLama){
                Storage::delete($request->gambarLama);
            }
            $validateData['image'] = $request->file('image')->store('post-image');
        }
        Parawisata::where('id', $parawisata->id)->update($validateData);
        return redirect('/dashboard/pariwisata')->with('success', 'Tourism data successfully changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parawisata  $parawisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parawisata $parawisata, $id)
    {
        //function untuk proses hapus
        $parawisata = Parawisata::where('id', $id)->first();
        if($parawisata->image){
            Storage::delete($parawisata->image);
        }
        Parawisata::destroy('id', $parawisata->id);
        return redirect('/dashboard/pariwisata', 'success', 'Tourism data has been successfully deleted!');
    }
}
