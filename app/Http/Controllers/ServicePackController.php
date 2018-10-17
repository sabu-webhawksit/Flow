<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicepack;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use DB;
use App\Pack;

class ServicePackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $country_list=json_decode(file_get_contents(public_path().'/countries.json'));
         return view('service_pack.index')->with(compact('country_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pack = DB::table('pack')->get();
        $country_list=json_decode(file_get_contents(public_path().'/countries.json'));
       // return $pack;
        return view('service_pack.create')->with(compact('country_list'))->with('packs',$pack);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'pack_name' => 'required|max:100',
            'country_name' => 'required|max:50',
            'pack_file' => 'required|max:10000'
        ]);
        
        if(Servicepack::where('pack_name',$request->input('pack_name'))->where('country_name',$request->input('country_name'))->count() > 0){
            return redirect('service-pack')->with('success','service pack already exists !');
        }
        if ($request->hasFile('pack_file')) {
            $file = $request->file('pack_file');
            $filename = $file->getClientOriginalName();
            $filename = date('Y-m-d-H:i:s') . "-" . pathinfo($filename, PATHINFO_FILENAME);
            $fullname = str_slug($filename) . '.' . $file->getClientOriginalExtension();
            $upload = $file->move(config('file.upload_pack'), $fullname);
            $request['pack_file_name'] = $fullname;
        }
        
        if(Servicepack::create($request->all())){
            return redirect('service-pack')->with('success','Service Pack Added Successfully!');
        }
    }
    public function viewServices(Request $request){
       
        $service =Servicepack::where('country_name',$request->input('country_id'))->paginate(10);
        return view('service_pack.service_pack_list')->with('services',$service);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Servicepack::where('id',$id)->first();
        return view('service_pack.pack_profile',compact($service));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $service_pack = Servicepack::findorFail($id);
        $pack=Pack::all();
        $country=json_decode(file_get_contents(public_path().'/countries.json'));
        return view('service_pack.edit')
        ->with('country_list',$country)
        ->with('service',$service_pack)
        ->with('packs',$pack);
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
     $service_pack = Servicepack::find($id);
     $service_pack->pack_name = $request->input('pack_name');
        if ($request->hasFile('pack_file')) {
            $file = $request->file('pack_file');
            $filename = $file->getClientOriginalName();
            $filename = date('Y-m-d-H:i:s') . "-" . pathinfo($filename, PATHINFO_FILENAME);
            $fullname = str_slug($filename) . '.' . $file->getClientOriginalExtension();
            $upload = $file->move(config('file.upload_pack'), $fullname);
            $service_pack['pack_file_name'] = $fullname;
            
        }
     $service_pack->save();
    return redirect('service-pack')->with('success','Service Pack Update Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $service = Servicepack::find($id)->delete();
       return redirect('view-pack');
    }
    
    public function getDownloadPackFile($id){
        $service=Servicepack::find($id);
        $file= public_path(). "/packs/".$service->pack_file_name;
        return Response::download($file, $service->pack_file_name);
    }
    public function downloadSelectPack($packname,$country){
        
        $service=Servicepack::where('id',$packname)->first();
        $file= public_path(). "/packs/".$service->pack_file_name;
        return Response::download($file, $service->pack_file_name);   
    }
    
    
}
