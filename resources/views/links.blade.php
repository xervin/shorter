@extends('layouts.app')

@section('info')
    <x-info-bar></x-info-bar>
@endsection

@section('content')
    <x-pages.links :links="$links"></x-pages.links>
@endsection
