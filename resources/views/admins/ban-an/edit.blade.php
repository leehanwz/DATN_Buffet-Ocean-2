@extends('layouts.admins.layout-admin')

@section('title', 'Chỉnh sửa bàn ăn')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Quản lý bàn ăn</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.ban-an.index') }}">Danh sách bàn ăn</a></li>
            <li class="breadcrumb-item active">Chỉnh sửa bàn ăn</li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Chỉnh sửa bàn ăn</h3>
        <form action="{{ route('admin.ban-an.update', $banAn->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admins.ban-an._form', ['buttonText' => 'Cập nhật'])
        </form>
    </div>
</main>
@endsection