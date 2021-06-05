@extends('layouts.app')
@section('style')
   <meta name="user-id" content="{{ Auth::user()->id }}"/>
   <link href="{{ asset('css/css/style.css') }}" type="text/css" rel="stylesheet" defer />
@endsection
@section('scripts')

@endsection
@section('content')
        <router-view></router-view>
        <vue-progress-bar></vue-progress-bar>
@endsection
