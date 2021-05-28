@extends('layouts.app')
@section('style')
   <link href="{{ asset('css/css/style.css') }}" type="text/css" rel="stylesheet" defer />
@endsection
@section('content')

        <router-view></router-view>
@endsection
