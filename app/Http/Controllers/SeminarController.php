<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Seminar;
use Auth;

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
	 *
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
	public function store(Request $req)
	{
		$sem = new Seminar();
		$sem->judul = $req->judul;
		$sem->tgl = $req->tgl;
		$sem->start_time = $req->start_time;
		$sem->end_time = $req->end_time;
		$sem->tempat = $req->tempat;
		$sem->deskripsi = $req->deskripsi;
		$sem->kuota = $req->kuota;
		$sem->biaya = $req->biaya;
		$sem->users_id = Auth::user()->id;
		$sem->note = $req->note;
		$sem->tipe = $req->tipe;
		$sem->penyelenggara = $req->penyelenggara;
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
		$sem = Seminar::find($id);
		return view('admin.seminar.edit',compact('sem'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$sem = Seminar::findOrFail($id);
		$sem->judul = $request->judul;
		$sem->tgl = $request->tgl;
		$sem->start_time = $request->start_time;
		$sem->end_time = $request->end_time;
		$sem->tempat = $request->tempat;
		$sem->deskripsi = $request->deskripsi;
		$sem->kuota = $request->kuota;
		$sem->biaya = $request->biaya;
		$sem->users_id = Auth::user()->id;
		$sem->note = $request->note;
		$sem->tipe = $request->tipe;
		$sem->penyelenggara = $request->penyelenggara;
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
