<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanDtl extends Model
{
	protected $table = 'loan_dtl';
	protected $primaryKey = 'loan_dtl_id';
	public $incrementing = false;
	public $timestamps = false;
	
	public function pmt_sch_dtl()
    {
        return $this->hasMany('App\PmtSchDtl','loan_dtl_id','loan_dtl_id');//s_p or s_argument f_k, t_p or t_a local_key;
    }
}
