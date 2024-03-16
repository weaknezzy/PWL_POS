<div class="btn-group btn-group-xs d-flex ">
    <a href="{{ route('kategori.edit', $kategori_id) }}" class="btn btn-xs btn-warning " style="min-width: 50%">
        <i class="fas fa-edit">Edit</i>
    </a>
    <a href="{{ route('kategori.delete', $kategori_id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
        <i class="fas fa-trash">Delete</i>
    </a>
    </form>
</div>