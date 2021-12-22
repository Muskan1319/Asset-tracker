<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tracker;
use App\Models\cate;
use Illuminate\Support\Facades\DB;


class Category extends Controller
{
    public function Cat(){
        $dd = tracker::all();
        return view('admin.category', compact('sel'));
        }
        public function catdata(Request $req){
            $val = $req->validate(
                [
                    'name' => 'required',
                    'status' => 'required',
                ],
              
            );
            if ($val) {
                $name = $req->name;
                $file = $req->file('image');
                $dest = public_path('/uploads');
                $filename = "Image-" . rand() . "-" . time() . "." . $file->extension();
                $status = $req->status;
                $type_id = $req->type_id;
                $data = new cate();
                $data->name = $name;
                $data->image = $filename;
                $data->status=1;
                $data->type_id = $type_id;
            if ($data->save()) {
                $file->move(public_path('/uploads'), $filename);
                    return back()->with('error', 'Data Added Successfully!!!');
                } else
                    return back()->with('error', 'Data not Added');
            }
        }
          //For Pie Chart
    public function index()
    {
        $result = DB::select(DB::raw("select count(*)as total,name from cates group by name"));
        $chartData = "";
        foreach ($result as $list) {
            $chartData .= "['" . $list->name . "',     " . $list->total . "],";
        }
        $arr['chartData'] = rtrim($chartData, ",");
        return view('admin.piechart', $arr);
    }
    public function showcategory(){
        $sel = cate::all();
        return view('admin.showcategory', compact('sel'));
}
// For delete Category Type
public function delete($id)
{
    $data = cate::find($id)->delete();
    return redirect('/showdata');
}
//for edit category type
public function edit($id)
    {
        $query =cate::all()->where('id', $id);
        return view('admin.editcategory', compact('query','id'));
    }


//For data update
public function update( $id,Request $req)
{
    $val = $req->validate([
        'name' => 'required',

    ]);
    if ($val) {
        $data = cate::where('id', $id)->update([
            'name' => $req->type,
        ]);
       /* if ($data)*/           
       return redirect('/showdata');
    }
}
}

    

