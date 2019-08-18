<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Libern\QRCodeReader\lib\QrReader;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Zxing\Qrcode\QRCodeReader;

class ProductController extends BackendBaseController{

    protected $base_route = 'backend.product';
    protected $panel = 'product';
    protected $folder_path;


    public function __construct (){
        $this->folder_path= public_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$this->panel.DIRECTORY_SEPARATOR;

    }
    public function index (){
        $data = [];
        $data['rows'] = Product::orderBy('created_at','DESC')->get();


        return view($this->loadDataToView($this->base_route . '.index'), compact('data'));
    }
    public function create (){
        $data = [];
        return view($this->loadDataToView($this->base_route . '.create'), compact('data'));
    }


    public function store(ProductRequest $request)
    {
        if ($request->hasFile('photo')){
            $file_name = $this->UploadFiles($request->file('photo'));
            $request->request->add(['image' => $file_name]);
        }
        $request->request->add(['created_by'=> Auth::user()->id]);
        $request->request->add(['code' =>strtoupper( Str::random(8)).''.rand(00, 99)]);
        $qr_code=Str::random(5)."_".rand(00, 99).".png";
        //encoding
        QrCode::size(250)->format('png')->generate($request->input('code'),$this->folder_path.''.$qr_code);
        $request->request->add(['qr_code' =>$qr_code]);
        $store=Product::create($request->all());
        if ($store){
//            dd($request);
            $request->session()->flash($this->success_message, ucfirst($this->panel) . ' Successfully Created !');
            return redirect()->route($this->base_route.'.index');
        }else{
            $request->session()->flash($this->message_error,ucfirst($this->panel) . ' cann\'t be Created  ! ');
            return back();
        }
    }
    public function show($id)
    {
        if (!$data['row'] = Product::find($id))
            return parent::invalidRequest();
        return view(parent::loadDataToView($this->base_route . '.show'), compact('data'));
    }
    public function edit($id)
    {

        $data = [];
        if (!$data['row'] = Product::find($id))
            return parent::invalidRequest();
        return view(parent::loadDataToView($this->base_route . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        if (!$row = Product::find($id)) {
            $request->session()->flash('message_error', 'Invalid Request !');
            return redirect()->route($this->base_route.'.index');
        }
        if ($request->hasFile('photo')) {

            $file_name = $this->UploadFiles($request->file('photo'));
            if (file_exists($this->folder_path . $row->image)){
                unlink($this->folder_path . $row->image);
            }

        }
        $request->request->add(['image' => isset($file_name) ? $file_name : $row->image]);
        $request->request->add(['updated_by' => Auth::user()->id]);
        $row->update($request->all());

        if ($row){
            $request->session()->flash($this->success_message, ucfirst($this->panel) . ' Successfully updated !');
            return redirect()->route($this->base_route.'.index');
        }else{
            $request->session()->flash($this->message_error, ucfirst($this->panel) . ' update failed  ! ');
            return back();
        }
    }

    public function destroy(Request $request,$id)
    {

        if (!$row = Product::find($id)) {
            $request->session()->flash($this->message_error, ' Invalid Request  ! ');
            return redirect()->route($this->base_route.'.index');
        }
        if (file_exists($this->folder_path . $row->image)){
            unlink($this->folder_path . $row->image);
        }
        if (file_exists($this->folder_path . $row->qr_code)){
            unlink($this->folder_path .''. $row->qr_code);
        }
        $row->delete();
        if ($row){
            $request->session()->flash($this->success_message, ucfirst($this->panel) . ' Successfully deleted !');
            return redirect()->route($this->base_route.'.index');
        }else{
            $request->session()->flash($this->success_message, ucfirst($this->panel) . ' delete failed  ! ');
            return back();
        }

    }

    public function find(Request $request)
    {
        if ($request->hasFile('csv')){
            $csv_file = $request->file('csv');
             //decoding
            $QRCodeReader = new \Libern\QRCodeReader\QRCodeReader();
            $qr_text = $QRCodeReader->decode($csv_file->getRealPath());
            $data['rows'] = Product::whereIn('code',[$qr_text])
                ->orderBy('created_at','DESC')->get();
            return view($this->loadDataToView($this->base_route . '.index'), compact('data'));
        }

    }

    protected function UploadFiles($image)
    {
        //  $image      = $request->file('photo');
        $image_name = rand(6785, 9814).'_'.$image->getClientOriginalName();
        $image->move($this->folder_path, $image_name);
        return $image_name;
    }

}
