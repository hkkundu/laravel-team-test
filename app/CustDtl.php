<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustDtl extends Model
{
    protected $table = 'cust_mast';
	protected $primaryKey = 'cust_id';
	public $incrementing = false;
	public $timestamps = false;
	 
	public function loan_dtl()
	{
		return $this->hasMany('App\LoanDtl','cust_id','cust_id');
	}
}
