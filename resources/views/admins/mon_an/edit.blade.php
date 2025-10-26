    @extends('layouts.admins.layout-admin')

    @section('title', 'Sửa món ăn')

    @section('content')
    <div class="container-fluid mt-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Sửa món ăn</h3>
            </div>
            <div class="card-body">

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('admin.mon-an.update', $mon_an->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="ten_mon" class="form-label">Tên món</label>
                        <input type="text" class="form-control" name="ten_mon" value="{{ old('ten_mon', $mon_an->ten_mon) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="danh_muc_id" class="form-label">Danh mục</label>
                        <select name="danh_muc_id" class="form-select" required>
                            @foreach($danhMucs as $dm)
                            <option value="{{ $dm->id }}" {{ old('danh_muc_id', $mon_an->danh_muc_id) == $dm->id ? 'selected' : '' }}>
                                {{ $dm->ten_danh_muc }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gia" class="form-label">Giá</label>
                        <input type="number" class="form-control" name="gia" value="{{ old('gia', $mon_an->gia) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="mo_ta" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="mo_ta" rows="3">{{ old('mo_ta', $mon_an->mo_ta) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="hinh_anh" class="form-label">Ảnh món ăn</label>
                        <input type="file" class="form-control" name="hinh_anh">
                        @if($mon_an->hinh_anh)
                        <img src="{{ asset($mon_an->hinh_anh) }}" width="100" class="mt-2 rounded">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="trang_thai" class="form-label">Trạng thái</label>
                        <select name="trang_thai" class="form-select" required>
                            <option value="1" {{ old('trang_thai', $mon_an->trang_thai) ?? 1 ? 'selected' : '' }}>Hiển thị</option>
                            <option value="0" {{ old('trang_thai', $mon_an->trang_thai) ?? 0 ? 'selected' : '' }}>Ẩn</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="thoi_gian_che_bien" class="form-label">Thời gian chế biến (phút)</label>
                        <input type="number" class="form-control" name="thoi_gian_che_bien" value="{{ old('thoi_gian_che_bien', $mon_an->thoi_gian_che_bien) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật món ăn</button>
                    <a href="{{ route('admin.mon-an.index') }}" class="btn btn-secondary">Hủy</a>
                </form>

            </div>
        </div>
    </div>
    @endsection
