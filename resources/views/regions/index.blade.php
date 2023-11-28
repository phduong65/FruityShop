@extends('layouts.manager')
@section('regions')
    <form action="{{ route('fetch.regions') }}" method="GET">
        @csrf
        <button type="submit">Lấy thông tin vùng miền Việt Nam</button>
    </form>
    <div id="regions-info">
        @if (isset($regions))
            <ul>
                @foreach ($regions as $region)
                    <li>{{ $region['name'] }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
@endpush
