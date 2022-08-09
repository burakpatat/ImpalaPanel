<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\EstateCategory;
use App\Models\Estate;

class EstateCategoryController extends Controller
{
    public function index(){
        
        $estatecategories = EstateCategory::all();

        return view('back.estatecategories.index',compact('estatecategories'));
    }

    public function create(Request $request){

        $isExist = EstateCategory::where('slug',Str::slug($request->ec_name))->first();
        if($isExist){
            toastr()->error($request->ec_name.' adında bir kategori zaten mevcut!!');
            return redirect()->back();
        }

        $estatecategory = new EstateCategory;
        $estatecategory->name=$request->ec_name;
        $estatecategory->slug=Str::slug($request->ec_name);
        $estatecategory->save();

        toastr()->success('Kategori Başarılı Şekilde Oluşturuldu!');

        return redirect()->back();
    }

    public function updatedata(Request $request){
        $estatecategory=EstateCategory::findOrFail($request->id);
        return response()->json($estatecategory);
    }

    public function update(Request $request){

        $isSlug = EstateCategory::where('slug', Str::slug($request->cslug))->whereNotIn('id', [$request->id])->first();
        $isName = EstateCategory::where('name', $request->cname)->whereNotIn('id', [$request->id])->first();
        if($isSlug || $isName){
            toastr()->error($request->cname.' adında bir kategori zaten mevcut!!');
            return redirect()->back();
        }

        $estatecategory = EstateCategory::find($request->id);
        $estatecategory->name=$request->cname;
        $estatecategory->slug=Str::slug($request->cslug);
        $estatecategory->save();

        toastr()->success('Kategori Başarılı Şekilde Güncellendi!');

        return redirect()->back();
    }

    public function delete(Request $request){
        $estatecategory=EstateCategory::findOrFail($request->id);
        
        if($estatecategory->estateCount()>0){
            Estate::where('estatecategory_id',$estatecategory->id)->update(['estatecategory_id' => 1]);
        }
        $estatecategory->delete();
        toastr()->info('Kategori Başarılı Şekilde Silindi!');
        return redirect()->back();
    }

    public function SwitchStatus(Request $request){
        $estatecategory=EstateCategory::findOrFail($request->id);
        $estatecategory->status = $request->statu =='true' ? 1 : 0;
        $estatecategory->save();
    }
}
