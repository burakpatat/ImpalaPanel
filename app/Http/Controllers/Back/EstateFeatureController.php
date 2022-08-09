<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\EstateCategory;
use Illuminate\Http\Request;
use App\Models\EstateFeature;

class EstateFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = EstateFeature::all();
        return view('back.estatefeatures.index',['features' => $features]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Bu alanda jquery ile atılan isteğe göre response dönülecektir
        // 2 => daha önce o kayıt varsa dönülecek değerdir
        // 1 => Başarılı ise dönülür
        // 0 => Kayıt işlemi tamamlanamazsa dönülür

        $check = EstateFeature::where('features', $request->ec_name)->first();
        if ($check) {
            return "2";
        }

        $res = EstateFeature::create([
            'features' => $request->ec_name
        ]);

        if ($res) {

            $listData = EstateFeature::find($res['id']);
            return view('back.estatefeatures.listview',['feature' => $listData]);
        }  else {
            return "0";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function updateInfo(Request $request) {
        $data = EstateFeature::find($request->id);
        return response()->json($data);
    }

    public function updateData(Request $request) {

        $res = EstateFeature::find($request->id)->update(['features' => $request->cname]);
        if ($res) {
            toastr()->success('Özellik Başarılı Şekilde Güncellendi!');

            return redirect()->back();

        } else {
            toastr()->error("Beklenmedik bir hata oluştu");
            return redirect()->back();
        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request) {
        $id = $request->id;
        $delete = EstateFeature::where('id', $id)->delete();

        if ($delete) {
            return "1";
        } else {
            return "0";
        }

    }
}
