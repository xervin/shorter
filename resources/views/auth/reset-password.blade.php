@extends('layouts.app')

@section('info')
    <x-info-bar></x-info-bar>
@endsection

@section('content')
    <x-reset-password :token="$request->token" :email="$request->email"></x-reset-password>
@endsection
