@extends('layout')

@section('title')
    Tasks
@endsection

@section('page_title')
    Tasks
@endsection

@section('body_content')
    <livewire:tasks-c-r-u-d />
@endsection

@section('page_js')
    <script src="{{ asset('js/filters-form.js') }}" type="text/javascript"></script>
@endsection
