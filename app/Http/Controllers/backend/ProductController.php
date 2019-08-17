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


//         //decoding
//        $QRCodeReader = new \Libern\QRCodeReader\QRCodeReader();
//        $qr_text = $QRCodeReader->decode(public_path('images\qr.png'));
//        dd($qr_text);
        return view($this->loadDataToView($this->base_route . '.index'), compact('data'));
    }
    public function create (){
        $data = [];
        return view($this->loadDataToView($this->base_route . '.create'), compact('data'));
    }


    public function store(ProductRequest $request)
    {
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
        $product= Product::find($id);
        $product->update($request->all());
        if ($product){
            $request->session()->flash($this->success_message, ucfirst($this->panel) . ' Successfully Created !');
            return redirect()->route('backend.product.index');
        }else{
            $request->session()->flash($this->message_error,ucfirst($this->panel) . ' cann\'t be Created  ! ');
            return back();
        }
    }

    public function destroy($id)
    {
        dd('dsvhjkl');
//        $product= Product::find($id);
//        $product->delete();
//        return redirect()->route('backend.product.index');
    }
    function deleteimage(Request $request){
//        dd('ducj');
        $product_image= ProductImage::find($_POST['image_id']);
        if( $product_image->delete()){
            return 'true';
        }else{
            return 'false';
        }

    }
    protected function UploadFiles($image)
    {
        //  $image      = $request->file('photo');
        $image_name = rand(6785, 9814).'_'.$image->getClientOriginalName();
        $image->move($this->folder_path, $image_name);
        //code for image resize
        foreach (config('image.image_dimensions.slider.image') as $dimension) {
            // open and resize an image file
            $img = Image::make($this->folder_path.$image_name)->resize($dimension['width'], $dimension['height']);
            // save the same file as jpg with default quality
            $img->save($this->folder_path.$dimension['width'].'_'.$dimension['height'].'_'.$image_name);
        }

        return $image_name;
    }
    protected function UnlinkImage($row)
    {
        foreach (config('image.image_dimensions.slider.image') as $dimension) {
            //     dd($dimension);
            if (file_exists($this->folder_path.$dimension['width'].'_'.$dimension['height'].'_' . $row->image))
                unlink($this->folder_path .$dimension['width'].'_'.$dimension['height'].'_'. $row->image);
        }


    }
}
