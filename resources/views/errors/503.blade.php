@extends('errors::minimal')

@section('title', __('Shërbimi i i padisponueshëm'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Shërbimi i i padisponueshëm'))
