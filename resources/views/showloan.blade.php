@extends('layouts.custom')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
			<p>Customer id : {{ $cust_id }}</p>
			@foreach($sql_loan as $rec_loan)
            <p>{{ $rec_loan->loan_dtl_id }}</p>
				@foreach($rec_loan->pmt_sch_dtl as $pmt_dtl)
            	<p>{{ $pmt_dtl->pmt_id }}</p>
				
				@endforeach
			@endforeach
        </div>
    </div>
</div>
@endsection
