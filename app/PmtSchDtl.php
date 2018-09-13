<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PmtSchDtl extends Model
{
	protected $table = 'pmt_schedule_dtl';
	protected $primaryKey = 'pmt_id';
	public $incrementing = false;
	public $timestamps = false;
	 
	public function loan_dtl()
	{
		return $this->belongsTo('App\LoanDtl','loan_dtl_id','loan_dtl_id');
	}
}
