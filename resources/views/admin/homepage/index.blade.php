@extends('layouts.admin')

@section('content')
    @include('/admin/homepage/slider', ['images' => $images])
    <div id="separacao" class="w-full h-[2px]"></div>
    @include('/admin/homepage/empreendimentos', ['empreendimentos' => $empreendimentos])
@endsection