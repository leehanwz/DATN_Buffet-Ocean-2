@extends('layouts.admins.layout-admin')

@section('title', 'Sửa Order món')

@section('content')
<div class="app-content">
    <div class="app-title">
        <h4>Sửa Order món</h4>
    </div>

    <form action="{{ route('admin.order-mon.update', $orderMon->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                {{-- Đặt bàn (readonly) --}}
                <label>Đặt bàn:</label>
                <input type="text" class="form-control" value="{{ $orderMon->datBan->ma_dat_ban ?? 'Không rõ' }}" readonly>
                <input type="hidden" name="dat_ban_id" value="{{ $orderMon->dat_ban_id }}">

                <label for="tong_mon" class="mt-3">Tổng món:</label>
                <input type="number" name="tong_mon" id="tong_mon" class="form-control" readonly
                    value="{{ $orderMon->tong_mon }}">

                <label for="tong_tien_display" class="mt-3">Tổng tiền:</label>
                <input type="text" id="tong_tien_display" class="form-control" readonly
                    value="{{ number_format($orderMon->tong_tien, 0, ',', '.') . ' đ' }}">
                <input type="hidden" name="tong_tien" id="tong_tien" value="{{ $orderMon->tong_tien }}">
            </div>

            <div class="col-md-6">
                {{-- Chỉ cho phép đổi trạng thái theo bước kế tiếp --}}
                <label>Trạng thái</label>
                <select name="trang_thai" class="form-control">
                    @foreach($allowedStatus as $key => $label)
                        <option value="{{ $key }}" {{ $orderMon->trang_thai === $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
            <a href="{{ route('admin.order-mon.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
<script>
    document.getElementById('dat_ban_id').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];

        const banName = selected.getAttribute('data-ban') || '';
        const banId = selected.getAttribute('data-banid') || '';
        const soKhach = parseInt(selected.getAttribute('data-sokhach') || 0);
        const giaCombo = parseFloat(selected.getAttribute('data-giacombo') || 0);
        const soMon = parseInt(selected.getAttribute('data-somon') || 0);

        document.getElementById('ban_display').value = banName;
        document.getElementById('ban_id').value = banId;

        // Tính tổng món & tổng tiền
        if (soKhach > 0 && giaCombo > 0) {
            const tongMon = soMon || soKhach;
            const tongTien = soKhach * giaCombo;

            document.getElementById('tong_mon').value = tongMon;
            document.getElementById('tong_tien').value = tongTien;
            document.getElementById('tong_tien_display').value = tongTien.toLocaleString('vi-VN') + ' đ';
        } else {
            document.getElementById('tong_mon').value = '';
            document.getElementById('tong_tien').value = '';
            document.getElementById('tong_tien_display').value = '';
        }
    });
</script>
@endsection

