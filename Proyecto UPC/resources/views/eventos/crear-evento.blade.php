@extends('layouts.app')

@section('CDNs')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
@endsection

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css\crear-evento.css') }}">
@endsection

@section('content')
    <div class="h-100 d-flex align-items-center">
        <form class="container1">
            <div class="row">
                <h4 class="text-center">Crear Evento</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Full Name" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Email Adress" />
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="password" placeholder="Password" />
                    <div class="input-icon"><i class="fa fa-key"></i></div>
                </div>
            </div>
            <div class="row">
                <div class="col-half">
                    <h4>Date of Birth</h4>
                    <div class="input-group">
                        <div class="col-third">
                            <input type="text" placeholder="DD" />
                        </div>
                        <div class="col-third">
                            <input type="text" placeholder="MM" />
                        </div>
                        <div class="col-third">
                            <input type="text" placeholder="YYYY" />
                        </div>
                    </div>
                </div>
                <div class="col-half">
                    <h4>Gender</h4>
                    <div class="input-group">
                        <input id="gender-male" type="radio" name="gender" value="male" />
                        <label for="gender-male">Male</label>
                        <input id="gender-female" type="radio" name="gender" value="female" />
                        <label for="gender-female">Female</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4>Payment Details</h4>
                <div class="input-group">
                    <input id="payment-method-card" type="radio" name="payment-method" value="card" checked="true" />
                    <label for="payment-method-card"><span><i class="fa fa-cc-visa"></i>Credit Card</span></label>
                    <input id="payment-method-paypal" type="radio" name="payment-method" value="paypal" />
                    <label for="payment-method-paypal"> <span><i class="fa fa-cc-paypal"></i>Paypal</span></label>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Card Number" />
                    <div class="input-icon"><i class="fa fa-credit-card"></i></div>
                </div>
                <div class="col-half">
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Card CVC" />
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                    </div>
                </div>
                <div class="col-half">
                    <div class="input-group">
                        <select>
                            <option>01 Jan</option>
                            <option>02 Jan</option>
                        </select>
                        <select>
                            <option>2015</option>
                            <option>2016</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
