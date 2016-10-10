<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Psikolog;
use App\PsikologPiket;
use Response;

class PsikologController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$psiko = Psikolog::all();
		return view('admin.psikolog.index', compact('psiko'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$psi = new Psikolog();
		$psi->nama = $request->nama;
		$psi->no_hp = $request->no_hp;
		$psi->save();

		return redirect('/admin/psikolog');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$psi = Psikolog::find($id);
        return view('admin.psikolog.edit',compact('psi'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id ,Request $request)
	{
		$phsy = Psikolog::findOrFail($id);

        $phsy->nama = $request->nama;
        $phsy->no_hp = $request->no_hp;
        $phsy->save();

        return redirect('/admin/psikolog');
	}
	
	public function cekPiket(Request $request)
	{
		$id = $request->id;
		$psPkt = PsikologPiket::find($id);
		$add = "<table>";
		$b = 1;
		$hari = array("Senin","Selasa","Rabu","Kamis","Jumat");
		foreach ($hari as $key) { 
			$add .= '<tr><td><input type="checkbox" id='.$key.' name='.$b.'>';
			$add .= '<label for='.$key.'>'.$key.'</label></td>';
			$add .= '<td><input type="radio" id="pagi'.$b.'" name="shift'.$b.'"><label for="pagi'.$b.'">Pagi</label>';
			$add .= '<td><input type="radio" id="siang'.$b.'" name="shift'.$b.'"><label for="siang'.$b.'">Siang</label></tr>';
			$b++;
		}
		$add .= '</table>';
		return Response::json(['add'=>$add]);
	}
}