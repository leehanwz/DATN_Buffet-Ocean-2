<div class="tile">
    <div class="tile-body">
        @csrf
        <div class="row">
            {{-- Khu vực --}}
            <div class="form-group col-md-6">
                <label for="khu_vuc_id" class="control-label">Khu vực <span class="text-danger">*</span></label>
                <select name="khu_vuc_id" id="khu_vuc_id" class="form-control" required>
                    <option value="">-- Chọn khu vực --</option>
                    @foreach ($khuVucs as $kv)
                    <option value="{{ $kv->id }}"
                        {{ old('khu_vuc_id', $banAn->khu_vuc_id ?? '') == $kv->id ? 'selected' : '' }}>
                        {{ $kv->ten_khu_vuc }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Số bàn --}}
            <div class="form-group col-md-6">
                <label for="so_ban" class="control-label">Số bàn <span class="text-danger">*</span></label>
                <input type="text" name="so_ban" id="so_ban" class="form-control"
                    value="{{ old('so_ban', $banAn->so_ban ?? '') }}" placeholder="Nhập số bàn..." required>
            </div>

            {{-- Số ghế --}}
            <div class="form-group col-md-6">
                <label for="so_ghe" class="control-label">Số ghế <span class="text-danger">*</span></label>
                <input type="number" name="so_ghe" id="so_ghe" class="form-control"
                    value="{{ old('so_ghe', $banAn->so_ghe ?? 4) }}" placeholder="Nhập số ghế..." min="1" required>
            </div>

            {{-- Trạng thái --}}
            <div class="form-group col-md-6">
                <label for="trang_thai" class="control-label">Trạng thái</label>
                <select name="trang_thai" id="trang_thai" class="form-control">
                    <option value="trống"
                        {{ old('trang_thai', $banAn->trang_thai ?? '') == 'trống' ? 'selected' : '' }}>Trống</option>
                    <option value="đã đặt"
                        {{ old('trang_thai', $banAn->trang_thai ?? '') == 'đã đặt' ? 'selected' : '' }}>Đã đặt</option>
                </select>
            </div>
        </div>
    </div>

    <div class="tile-footer text-right">
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-save"></i> {{ $buttonText ?? 'Lưu' }}
        </button>
        <a class="btn btn-secondary" href="{{ route('admin.ban-an.index') }}">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>
</div>