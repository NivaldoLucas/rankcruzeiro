@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <div class="ranking">
        <div class="tables">
            <div class="table-container-red">
                <div class="title red">
                    <img src="{{ asset('images/G30.png') }}" alt="Logo" class="title-logo-red">
                    <h1>DOBRARAM AS VENDAS</h1>
                </div>
                <div class="table red">
                    @foreach($customers as $customer)
                        <div class="row">
                            <div class="position">
                            <h2>{{ $loop->iteration }}°</h2>
                            </div>
                            <div class="logo">
                                <img src="{{ Storage::url($customer->logo_url) }}" alt="Logo da Loja">
                            </div>
                            <div class="details">
                                <h2>{{ $customer->store_name }}</h2>
                                <p>{{ $customer->store_owner }}</p>
                            </div>
                            <div class="stars">
                                <span class="star {{ $customer->dobrou_mes1 ? 'filled' : '' }}"></span>
                                <span class="star {{ $customer->dobrou_mes2 ? 'filled' : '' }}"></span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="table-container-orange">
                <div class="title orange">
                    <img src="{{ asset('images/G30ABORDO.png') }}" alt="Logo" class="title-logo-orange">
                    
                </div>
                <div class="table orange">
                    @foreach($customers as $customer)
                        <div class="row">
                            <div class="recommendations">
                                <span class="star {{ $customer->referral_1 ? 'filled' : '' }}"></span>
                                <span class="star {{ $customer->referral_2 ? 'filled' : '' }}"></span>
                                <span class="star {{ $customer->referral_3 ? 'filled' : '' }}"></span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection