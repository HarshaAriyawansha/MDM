@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Welcome to the Dashboard</h5>
            <p class="card-text">This is your admin overview page.</p>
        </div>
    </div>
@endsection
