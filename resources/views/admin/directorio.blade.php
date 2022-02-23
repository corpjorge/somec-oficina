@extends('admin.app')

@section('content')
    <div id="adminDirectorio"></div>
@endsection

@push('js')
    <script src="{{ url('/js/admin/directorio/main.js') }}"></script>
@endpush
