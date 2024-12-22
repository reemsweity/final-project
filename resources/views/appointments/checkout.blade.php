<!-- resources/views/checkout.blade.php -->

@extends('pages.app')
@section('content')
@section('title', 'Checkout')
@section('breadcrumb', 'Checkout')

<h2>Checkout</h2>
<p>Please confirm your payment details below:</p>

<form action="{{ route('appointments.payment.confirm') }}" method="POST">
    @csrf
    <input type="hidden" name="payment_id" value="{{ $payment->id }}">

    <label for="payment_method">Payment Method:</label>
    <select name="payment_method" id="payment_method">
        <option value="credit_card">Credit Card</option>
        <option value="paypal">PayPal</option>
        <option value="cash">Cash</option>
    </select>

    <p>Total Amount: ${{ number_format($payment->amount, 2) }}</p>

    <button type="submit">Confirm Payment</button>
</form>
@endsection
