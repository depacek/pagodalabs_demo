<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use AppHelper;
use View;

class BackendBaseController extends Controller
{
    protected $success_message = 'success_message';
    protected $message_error = 'message_error';

    protected function loadDataToView($view_path){
        View::composer($view_path, function ($view) {
            $view->with('base_route', $this->base_route);
//            $view->with('view_path', $this->view_path);
            if (isset($this->report_path)){
                $view->with('report_path', $this->report_path);
            }
            $view->with('panel',$this->panel);
            $view->with('folder_path', property_exists($this, 'folder_path' )?$this->folder_path:'');
//            $view->with('trans_path',$this->trans_path);
        });

        return $view_path;

    }

    protected function invalidRequest($message = 'Invalid Request !'){
        request()->session()->flash('message_error',$message);
        return redirect()->route($this->base_route.'.index');
    }
}
