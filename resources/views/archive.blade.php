@extends('layouts.app')

@section('content')

@include('partials.content-archive-'.get_post_type())

@endsection
