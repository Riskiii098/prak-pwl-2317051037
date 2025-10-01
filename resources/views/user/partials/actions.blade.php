<div class="d-flex justify-content-center gap-2">
    <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
    <form action="{{ route('user.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">Hapus</button>
    </form>
</div>
