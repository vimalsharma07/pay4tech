@extends('layouts.admin')

@section('title', 'Enquiries')

@section('content')
    <div class="a-pagehead">
        <div>
            <h1>Enquiries</h1>
            <p>All messages submitted from the Contact page.</p>
        </div>
    </div>

    <div class="a-card">
        <div class="a-tablewrap">
            <table class="a-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>When</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enquiries as $e)
                        <tr>
                            <td class="a-muted">{{ $e->id }}</td>
                            <td>{{ $e->name }}</td>
                            <td>{{ $e->email }}</td>
                            <td class="a-muted">{{ \Illuminate\Support\Str::limit($e->message, 110) }}</td>
                            <td class="a-muted">{{ $e->created_at?->format('Y-m-d H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="a-muted">No enquiries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 12px; display:flex; justify-content: space-between; gap:10px; flex-wrap:wrap;">
            @if($enquiries->previousPageUrl())
                <a class="a-btn a-btn--ghost" href="{{ $enquiries->previousPageUrl() }}">Previous</a>
            @else
                <span class="a-btn a-btn--ghost" style="opacity:.55; pointer-events:none;">Previous</span>
            @endif

            <span class="a-muted">Page {{ $enquiries->currentPage() }} of {{ $enquiries->lastPage() }}</span>

            @if($enquiries->nextPageUrl())
                <a class="a-btn a-btn--ghost" href="{{ $enquiries->nextPageUrl() }}">Next</a>
            @else
                <span class="a-btn a-btn--ghost" style="opacity:.55; pointer-events:none;">Next</span>
            @endif
        </div>
    </div>
@endsection

