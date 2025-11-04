{{-- admins/mon-trong-combo/_form.blade.php --}}

<div class="mb-3">
    <label for="combo_id" class="form-label">Chọn combo <span class="text-danger">*</span></label>
    <select name="combo_id" id="combo_id" class="form-select @error('combo_id') is-invalid @enderror" required>
        <option value="">-- Chọn combo --</option>
        @foreach($combos as $combo)
        <option value="{{ $combo->id }}" {{ (old('combo_id', $item->combo_id ?? '') == $combo->id) ? 'selected' : '' }}>
            {{ $combo->ten_combo }}
        </option>
        @endforeach
    </select>
    @error('combo_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="mon_an_id" class="form-label">Chọn món ăn <span class="text-danger">*</span></label>
    <select name="mon_an_id" id="mon_an_id" class="form-select @error('mon_an_id') is-invalid @enderror" required>
        <option value="">-- Chọn món ăn --</option>
        @foreach($monAns as $mon)
        <option value="{{ $mon->id }}" {{ (old('mon_an_id', $item->mon_an_id ?? '') == $mon->id) ? 'selected' : '' }}>
            {{ $mon->ten_mon }}
        </option>
        @endforeach
    </select>
    @error('mon_an_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="gioi_han_so_luong" class="form-label">Giới hạn số lượng</label>
    <input type="number" name="gioi_han_so_luong" id="gioi_han_so_luong" class="form-control"
        value="{{ old('gioi_han_so_luong', $item->gioi_han_so_luong ?? '') }}" min="0"
        placeholder="Để trống nếu không giới hạn">
</div>

<div class="mb-3">
    <label for="phu_phi_goi_them" class="form-label">Phụ phí gọi thêm</label>
    <input type="number" name="phu_phi_goi_them" id="phu_phi_goi_them" class="form-control"
        value="{{ old('phu_phi_goi_them', $item->phu_phi_goi_them ?? '') }}" min="0" placeholder="Nhập số tiền phụ phí">
</div>

<div class="mb-3">
    <label class="form-label">Trạng thái</label>
    <div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="trang_thai" id="active" value="1"
                {{ old('trang_thai', $item->trang_thai ?? 1) == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Hoạt động</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="trang_thai" id="inactive" value="0"
                {{ old('trang_thai', $item->trang_thai ?? 1) == 0 ? 'checked' : '' }}>
            <label class="form-check-label" for="inactive">Ngừng</label>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="{{ route('admin.mon-trong-combo.index') }}" class="btn btn-secondary">Hủy</a>
    <button type="submit" class="btn btn-success">{{ $buttonText ?? 'Lưu' }}</button>
</div>