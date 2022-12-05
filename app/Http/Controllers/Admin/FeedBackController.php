<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeedBack;
class FeedBackController extends Controller
{
    //
    public function index(){
       
        if (request()->ajax()) {
            $feedbacks= FeedBack::get();
            return datatables()->of( $feedbacks )
                ->addColumn('tdDescricao', 'admin.feedback.td-descricao')
                ->rawColumns(['tdDescricao'])
                ->addIndexColumn()
                ->make(true);
        }
            return view('admin.feedback.index');
    }
}
