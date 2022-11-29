<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$title ?? ''}} | Lava Express</title>
        <meta name="description" content="{{ $metaDescription ?? 'Default meta decription' }}" />
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
<body>
<x-layouts.navigation />
@if(session('status'))
<div>{{session('status')}}</div>
@endif
{{$slot}}
</body>
</html>