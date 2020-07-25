@extends('frontend.layouts.app')
@section('title','E-Sewa Payment Gateway')
@section('content')
<div class="container">
	<div class="card">
		@if($data['amt'] > 0)
		<div class="card-body">
			<form action="https://uat.esewa.com.np/epay/main" method="POST">
		    <input value="{{ $data['tAmt'] }}" name="tAmt" type="hidden">
		    <input value="{{$data['amt']}}" name="amt" type="hidden">
		    <input value="{{$data['txAmt']}}" name="txAmt" type="hidden">
		    <input value="{{$data['psc']}}" name="psc" type="hidden">
		    <input value="{{$data['pdc']}}" name="pdc" type="hidden">
		    <input value="epay_payment" name="scd" type="hidden">
		    <input value="{{$data['pid']}}" name="pid" type="hidden">
		    <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
		    <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
		    <button class="btn-round">Proceed to Pay</button>
		    </form>
		</div>
		@endif
	</div>
</div>
@endsection