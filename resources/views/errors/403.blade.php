@extends('errors::minimal')

@section('title', trans('messages.403'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: trans('messages.403')))
