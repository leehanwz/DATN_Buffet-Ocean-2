<form action="{{ route('nhanvien.datban.store') }}" method="POST">
    @csrf
    <input name="ten_khach" placeholder="Tên khách" required>
    <input name="sdt_khach" placeholder="SĐT">
    <input type="number" name="so_khach" required>

    <select name="ban_id">
        @foreach($bans as $ban)
            <option value="{{ $ban->id }}">{{ $ban->so_ban }} - {{ $ban->trang_thai }}</option>
        @endforeach
    </select>

    <button type="submit">Tạo đặt bàn</button>
</form>
