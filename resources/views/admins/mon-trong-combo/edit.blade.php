@extends('layouts.admins.layout-admin')

@section('title', 'Sửa món trong combo')

@section('content')
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Quản lý combo</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.mon-trong-combo.index') }}">Danh sách món trong
                    combo</a></li>
            <li class="breadcrumb-item">Sửa món trong combo</li>
        </ul>
    </div>

    <div class="tile">
        <h3 class="tile-title">Sửa món trong combo</h3>

        <div class="tile-body">
            <form action="{{ route('admin.mon-trong-combo.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admins.mon-trong-combo._form', ['buttonText' => 'Cập nhật', 'item' => $item, 'combos' =>
                $combos, 'monAns' => $monAns])
            </form>
        </div>
    </div>
</main>
@endsection