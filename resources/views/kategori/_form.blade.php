
<div class="mb-3">
    <label class="form-label">Nama Kategori</label>
    <input type="text" name="nama_kategori" class="form-control"
           value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}" required>
    @error('nama_kategori') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $kategori->deskripsi ?? '') }}</textarea>
    @error('deskripsi') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-success">Simpan</button>
<a href="{{ route('kategori.index') }}" class="btn btn-light">Batal</a>
