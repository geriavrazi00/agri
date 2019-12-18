@extends('errors::minimal')

@section('title', __('E ndaluar'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'E ndaluar'))
