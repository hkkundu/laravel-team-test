<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\LoanDtl;
use App\PmtSchDtl;
use App\CustDtl;
use App\Article;
use App\Http\Resources\Article as ArticleResource;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	public function multidimentionalarray()
    {
        //$child_arr = [];
		//$phone = LoanDtl::find('LN00000168')->pmt_sch_dtl;
		//phone = PmtSchDtl::find('PMA0000000137')->loan_dtl;
		//$posts = LoanDtl::has('pmt_sch_dtl')->get();
		//dd($posts);
		
		$com_id = 'A0001';
		$cust_id = 'CS00000037';
		$sql_loan = CustDtl::find($cust_id)->loan_dtl()->where('com_id',$com_id)->get();
		//dd($cust_id);
		return view('showloan',compact('sql_loan', 'cust_id'));
    }
	public function article()
    {
        //return new ArticleResource(Article::find(1));
		return ArticleResource::collection(Article::all());
    }
}
