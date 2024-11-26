<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class eventcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = event::all();

        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=> 'required|string',
            'deskripsi'=> 'required|string',
            'tanggal'=> 'required|string',
            'foto'=> 'required|image|mimes:jpeg,png,jpg,gif|max:1000',
            'lokasi'=> 'required|string',]);

            $foto = $request->file('foto')->store('bukti','public');

            event::create([
                'nama'=> $request->nama,
                'deskripsi'=> $request->deskripsi,
                'tanggal'=> $request->tanggal,
                'foto'=> $foto ?? null,
                'lokasi'=> $request->lokasi,
            ]);
    
    
            return redirect('event');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //menampilkan data berdasarkan id
       $event = event::findOrFail($id);

       //mengirim data produk ke halaman view yg bernama edit
       return view('event.show' , compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //menampilkan data berdasarkan id
       $event = event::findOrFail($id);

       //mengirim data produk ke halaman view yg bernama edit
       return view('event.edit' , compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          //menampilkan data berdasarkan id
       $event = event::findOrFail($id);

       //mengirim data produk ke halaman view yg bernama edit
       $request->validate([
        'nama'=> 'required|string',
        'deskripsi'=> 'required|string',
        'tanggal'=> 'required|string',
        'foto'=> 'required|image|mimes:jpeg,png,jpg,gif|max:1000',
        'lokasi'=> 'required|string',]);

        $event->nama = $request->input('nama');
        $event->deskripsi = $request->input('deskripsi');
        $event->tanggal = $request->input('tanggal');
        $event->lokasi = $request->input('lokasi');

        if ($request->hasFile('foto')){
            $filepath = $request->file('foto')->store('fotos', 'public');
            $event->foto = $filepath;

        }

        $event->save();

        return redirect()->route('event.index')->with('succes','event update succesfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resource = event::find($id);

        if ($resource){
            $resource->delete();
            return redirect()->back();
        }
    }
}
