@extends('errors::minimal')

@section('title', trans('messages.503'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: trans('messages.503')))
