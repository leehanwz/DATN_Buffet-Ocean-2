@extends('layouts.admins.layout-admin')

@section('title', 'Thêm bàn ăn')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Quản lý bàn ăn</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.ban-an.index') }}">Danh sách bàn ăn</a></li>
            <li class="breadcrumb-item active">Thêm bàn ăn</li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Thêm bàn ăn mới</h3>
        <form action="{{ route('admin.ban-an.store') }}" method="POST">
            @include('admins.ban-an._form', ['buttonText' => 'Thêm mới'])
        </form>
    </div>
</main>
@endsection