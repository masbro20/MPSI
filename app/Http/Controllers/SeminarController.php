<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Seminar;

class SeminarController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sem = Seminar::all();
		return view('admin.seminar.index',compact('sem'));
	}

	/**
	 * Show the form for creating a new resource.
	 *return view('admin.seminar.create');	}
	 * @return Response
	 */
	public function create()
	{
		return view('admin.seminar.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$sem = new Seminar();
		$sem->judul = $request->judul;
		$sem->tgl = $request->tgl;
		$sem->save();
		return redirect('/admin/seminar');
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	public function update($id,Request $request)
	{
		//
		$sem = Seminar::find($id);
		$sem->judul = $request->judul;
		$sem->tgl = $request->tgl;
		$sem->save();
		return redirect('/admin/seminar');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
