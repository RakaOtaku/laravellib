<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookExport;
use App\Models\library;


class libController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
         $this->middleware('auth');
    }
    


    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if (strlen($katakunci)) {
            $data = library::where('judul', 'like', "%$katakunci%")
                    ->orWhere('pengarang', 'like', "%$katakunci%")
                    ->orWhere('penerbit', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
        }else{
            $data = library::orderBy('id_buku', 'desc')->paginate($jumlahbaris);
        }

        return view ('lib.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('lib.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('gambar')){
            $data['gambar'] =  $request->file('gambar')->store('asset/gambar', 'public');
        }else{
            'Gambar cannot be null';
        }
        //Validasi
        $request->validate([
            'id_buku'=>'required|numeric|unique:library,id_buku',
            'judul'=>'required',
            'deskripsi'=>'required',
            'pengarang'=>'required',
            'penerbit'=>'required',
            'gambar'=>'required|mimes:jpeg,png,jpg,gif'
        ],[
            'id_buku.numeric' => 'Id buku must be numeric',
            'id_buku.unique' => 'Id buku must be unique'
        ]);

        
        library::create($data);


        return redirect()->to('lib')->with('success', 'Data Added');
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
    public function edit($id)
    {
        $data = library::where('id_buku', $id)->first();
        return view('lib.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $lib = library::where('id_buku', $id)->first();
        
        $data = $request->except(['_token', '_method']);
        
        if($request->hasFile('gambar')){
            $data['gambar'] =  $request->file('gambar')->store('asset/gambar', 'public');
        }else{
            $data['gambar'] = $lib->gambar;
        }

            

        $request->validate([
            'judul'=>'required',
            'deskripsi'=>'required',
            'pengarang'=>'required',
            'penerbit'=>'required',
          
        ]);

        $lib->update($data);
        return redirect()->to('lib')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        library::where('id_buku', $id)->delete();
        return redirect()->to('lib')->with('success', 'Data Deleted');
    }


    public function export_excel()
	{
		return Excel::download(new BookExport, 'databuku.xlsx');
	}
}
