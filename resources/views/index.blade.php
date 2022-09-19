@extends('layouts.app')

@section('info')
    <x-info-bar></x-info-bar>
@endsection

@section('content')
    <x-main-form></x-main-form>
    <x-ready-link :link="$link"></x-ready-link>
@endsection
