@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="a-pagehead">
        <div>
            <h1>Dashboard</h1>
            <p>Manage settings, enquiries, and blog posts.</p>
        </div>
        <div class="a-actions">
            <a class="a-btn a-btn--ghost" href="{{ route('admin.settings.edit') }}">Site Settings</a>
            <a class="a-btn a-btn--ghost" href="{{ route('admin.enquiries.index') }}">Enquiries</a>
            <a class="a-btn a-btn--primary" href="{{ route('admin.posts.index') }}">Blog</a>
        </div>
    </div>

    <div class="a-grid2">
        <div class="a-card">
            <h2 style="margin:0 0 6px; font-size:16px;">Enquiries</h2>
            <div class="a-muted">Total: <strong style="color:var(--text)">{{ $totalEnquiries }}</strong></div>
            <div style="margin-top: 10px;">
                <a class="a-btn a-btn--primary" href="{{ route('admin.enquiries.index') }}">Open inbox</a>
            </div>
        </div>

        <div class="a-card">
            <h2 style="margin:0 0 10px; font-size:16px;">Recent enquiries</h2>
            <div class="a-tablewrap">
                <table class="a-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>When</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentEnquiries as $e)
                            <tr>
                                <td>{{ $e->name }}</td>
                                <td>{{ $e->email }}</td>
                                <td class="a-muted">{{ $e->created_at?->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="a-muted">No enquiries yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

