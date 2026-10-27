
<div class="mb-3">
    <label class="form-label">Kode Ruangan</label>
    <input type="text" name="kode_ruangan" class="form-control"
           value="{{ old('kode_ruangan', $ruangan->kode_ruangan ?? '') }}" required>
    @error('kode_ruangan') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Nama Ruangan</label>
    <input type="text" name="nama_ruangan" class="form-control"
           value="{{ old('nama_ruangan', $ruangan->nama_ruangan ?? '') }}" required>
    @error('nama_ruangan') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Lokasi</label>
    <input type="text" name="lokasi" class="form-control"
           value="{{ old('lokasi', $ruangan->lokasi ?? '') }}">
    @error('lokasi') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-success">Simpan</button>
<a href="{{ route('ruangan.index') }}" class="btn btn-light">Batal</a>
