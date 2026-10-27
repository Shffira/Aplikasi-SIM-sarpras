
@csrf

<div class="mb-3">
    <label class="form-label">Kode Sarana</label>
    <input name="kode_sarana" class="form-control"
           value="{{ old('kode_sarana', $sarana->kode_sarana ?? '') }}" required>
    @error('kode_sarana') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Nama Sarana</label>
    <input name="nama_sarana" class="form-control"
           value="{{ old('nama_sarana', $sarana->nama_sarana ?? '') }}" required>
    @error('nama_sarana') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Kategori</label>
    <select name="kategori_id" class="form-select" required>
        <option value="">Pilih kategori</option>
        @foreach($kategori as $k)
            <option value="{{ $k->id }}"
                @selected(old('kategori_id', $sarana->kategori_id ?? '') == $k->id)>
                {{ $k->nama_kategori }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Ruangan</label>
    <select name="ruangan_id" class="form-select" required>
        <option value="">Pilih ruangan</option>
        @foreach($ruangan as $r)
            <option value="{{ $r->id }}"
                @selected(old('ruangan_id', $sarana->ruangan_id ?? '') == $r->id)>
                {{ $r->nama_ruangan }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Kondisi</label>
    <select name="kondisi" class="form-select" required>
        @foreach(['baik', 'rusak_ringan', 'rusak_berat'] as $kondisi)
            <option value="{{ $kondisi }}"
                @selected(old('kondisi', $sarana->kondisi ?? 'baik') == $kondisi)>
                {{ ucfirst(str_replace('_', ' ', $kondisi)) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Status Perbaikan</label>
    <select name="status_perbaikan" class="form-select" required>
        @foreach(['normal', 'dalam_perbaikan'] as $status)
            <option value="{{ $status }}"
                @selected(old('status_perbaikan', $sarana->status_perbaikan ?? 'normal') == $status)>
                {{ ucfirst(str_replace('_', ' ', $status)) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Jumlah</label>
    <input type="number" min="1" name="jumlah" class="form-control"
           value="{{ old('jumlah', $sarana->jumlah ?? 1) }}" required>
</div>

<button class="btn btn-success">Simpan</button>
<a href="{{ route('sarana.index') }}" class="btn btn-light">Batal</a>
