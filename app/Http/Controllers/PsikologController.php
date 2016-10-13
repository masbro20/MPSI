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
		$shift = PsikologPiket::where('psikolog_id',$id)->lists('shift');
		$hrs = PsikologPiket::where('psikolog_id',$id)->lists('hari');
		$add = "<table>";
		$b = 1;
		$hari = array("Senin","Selasa","Rabu","Kamis","Jumat");
		foreach ($hari as $key) { 
			$n=8;
			$add .= '<tr class="hari"><td><input type="checkbox" id='.$key.' name='.$b.' class="nh"';
			if (array_search($b, $hrs)!==false) {
				$add .= 'checked';
				$n=array_search($b, $hrs);
			}
			$add .= '><label for='.$key.'>'.$key.'</label></td>';
			$add .= '<td><input type="radio" id="pagi'.$b.'" name="shift'.$b.'" class="1"';
			if ($n<7 && $shift[$n] == 1) {
				$add .= 'checked';
			}
			$add .= '><label for="pagi'.$b.'">Pagi</label>';
			$add .= '<td><input type="radio" id="siang'.$b.'" name="shift'.$b.'" class="2"';
			if ($n<7 && $shift[$n] == 2) {
				$add .= 'checked';
			}
			$add .= '><label for="siang'.$b.'">Siang</label></tr>';
			$b++;
		}
		$add .= '</table>';
		return Response::json(['add'=>$add]);
	}

	public function savePiket(Request $request)
	{
		$js = json_decode($request->vals);
		$id = $request->id;
		$psPkt = PsikologPiket::where('psikolog_id',$id)->get();
		$n = count($psPkt);
		$j=0;
		$b=0;
		if ($n>0) {
			$a = PsikologPiket::where('psikolog_id',$id)->delete();
		}
		$i=0;
		while ($i < count($js->hari)) {
			$pkt = new PsikologPiket();
			$pkt->hari = $js->hari[$i];
			$pkt->shift = $js->shift[$i];
			$pkt->psikolog_id = $id;
			$a = $pkt->save();
			if ($a===true) {
				$j++;
			}
			$i++;
		}
		if ($j==$n) {
			$res = "Data Berhasil Disimpan AB!";
		} else{
			$res = "Data belum berhasil disimpan nih";
		}
		return Response::json(['add'=>$res]);
	}
}