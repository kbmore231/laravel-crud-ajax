@extends('app')

@section('contents')
    {!! $dataTable->table([], true) !!}
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush