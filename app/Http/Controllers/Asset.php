<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tracker;
use Illuminate\Support\Facades\DB;
class Asset extends Controller
{
public function Add(){
    return view('admin.addasset');
    }
    public function senddata(Request $req){
        $val = $req->validate(
            [
                'type' => 'required|unique:trackers',
                'desc' => 'required|min:5|max:500',
            ],
            [
                'type.required' => 'The Asset type field is required',

            ]
        );
        if ($val) {
            $type = $req->type;
            $desc = $req->desc;
            $data = new tracker();
            $data->type = $type;
            $data->desc = $desc;
            if ($data->save()) {
                return back()->with('error', 'Data Added Successfully!!!');
            } else
                return back()->with('error', 'Data not Added');
        }
    }
    public function showdata(){
        $sel = tracker::all();
        return view('admin.showasset', compact('sel'));
}
// For delete Asset Type
public function delete($id)
{
    $data = tracker::find($id)->delete();
    return redirect('/show');
}
//for edit asset type
public function edit($id)
    {
        $sel = tracker::all()->where('id', $id);
        return view('admin.editasset', compact('sel','id'));
    }


//For data update
public function update( $id,Request $req)
{  // print_r($req->all());
    $val = $req->validate([
        'type' => 'required',

    ]);
    if ($val) {
        $data = tracker::where('id' ,$id)->update([
            'type' => $req->type,
            'desc' => $req->desc,
        ]);
       /* if ($data)*/  
      // dd($data);     
       return redirect('/show');
    }
}
/*public function update(Request $req, $id)
    {
        DB::table("trackers")->where('id',$id)->update([
            'type'=> $req->type,
            'desc'=> $req->desc
            
        ]);

          return redirect("show");
    }*/
public function index1()
{

   $result2 = DB::select(DB::raw("select status as total,count('status')as count from cates group by status"));
   $chartData = "";
    foreach ($result2 as $list) {
        $name = $list->total == 1 ? "Active" : "In-Active";
        $chartData .= "['" . $name . "',     " . $list->count . "],";
    }
    $arr['chartData'] = rtrim($chartData, ",");



    return view('admin.barchart', $arr);
}

}
