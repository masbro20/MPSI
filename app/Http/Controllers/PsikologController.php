<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Psikolog;

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
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
