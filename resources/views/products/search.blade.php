@extends('components.layout')
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css') }}/home.css">
@endpush
@section('pageTitle', 'Trang chủ')
@section('content')
    Search
@endsection
@push('js')
    <script src="{{ URL::asset('js') }}/search_home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    
@endpush