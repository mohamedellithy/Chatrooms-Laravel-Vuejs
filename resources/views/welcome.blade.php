@extends('layouts.app')
@section('style')
   <link href="{{ asset('css/css/style.css') }}" type="text/css" rel="stylesheet" defer />
@endsection
@section('scripts')
       <script type="application/javascript">
            if(!localStorage.getItem('channelkey')){
                localStorage.setItem('channelkey',{{ Auth::user()->id }});
            }
        </script>
@endsection
@section('content')
        {{ Auth::user()->id }}
        <router-view></router-view>
        <vue-progress-bar></vue-progress-bar>
@endsection
