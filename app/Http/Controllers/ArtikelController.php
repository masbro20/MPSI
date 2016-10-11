<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Artikel;

class ArtikelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$art = Artikel::all();
		return view('admin.artikel.index',compact('art'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.artikel.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$art = new Artikel();
		$art->judul = $request->judul;
		$art->body = $request->body;
		$art->save();
		return redirect('/admin/artikel');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$art = Artikel::find($id);
		return view('admin.artikel.show',compact('art'));
	}

	public function getArtikel($id)
	{
		$art = Artikel::find($id);
		$bd = '<!DOCTYPE html><html><body>';
		$bd .= $art->body;
		$bd .= '</body></html>';
		return $bd;
	}

	public function openArtikel($id)
	{
		$art = Artikel::find($id);
		return view('artikel',compact('art'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$art = Artikel::find($id);
		return view('admin.artikel.edit',compact('art'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$art = Artikel::find($id);
		$art->judul = $request->judul;
		$art->body = $request->body;
		$art->save();
		return redirect('/admin/artikel');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$art = Artikel::find($id);
		$art->delete();
		return redirect('/admin/artikel');
	}

}
