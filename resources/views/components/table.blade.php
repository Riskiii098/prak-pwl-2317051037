<div class="table-responsive">
    <table class="table table-striped table-hover custom-table">
        <thead class="table-primary text-center">
            <tr>
                @foreach ($headers ?? [] as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($rows ?? [] as $row)
                <tr>
                    @foreach ($row ?? [] as $cell)
                        <td>{!! $cell !!}</td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers ?? []) }}" class="text-center text-muted">
                        Tidak ada data
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
