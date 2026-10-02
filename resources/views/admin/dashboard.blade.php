@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="panel">
        <div class="panel-head">
            <h2>Pages</h2>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Page</th>
                        <th class="num">Sections</th>
                        <th class="num">Items</th>
                        <th>Last edited</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $key => $page)
                        <tr>
                            <td><a href="{{ route('admin.pages.show', $key) }}">{{ $page['label'] }}</a></td>
                            <td class="num">{{ count($page['sections']) }}</td>
                            <td class="num">{{ $itemCounts[$key] ?? 0 }}</td>
                            <td class="muted">
                                {{ isset($lastEdits[$key]) ? \Illuminate\Support\Carbon::parse($lastEdits[$key])->format('j M Y, g:i a') : 'Never' }}
                            </td>
                            <td class="actions">
                                <a href="{{ url($page['url']) }}" target="_blank" rel="noopener" class="btn btn-sm btn-link">View</a>
                                <a href="{{ route('admin.pages.show', $key) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="panel">
        <div class="panel-head">
            <h2>Recently changed items</h2>
        </div>
        @if ($recent->isEmpty())
            <p class="panel-body muted mb-0">No changes yet</p>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Section</th>
                            <th>Page</th>
                            <th>Changed</th>
                            <th>By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recent as $item)
                            @php($sectionDef = $pages[$item->section->page]['sections'][$item->section->key] ?? null)
                            <tr>
                                <td><a href="{{ route('admin.items.edit', $item) }}">{{ \Illuminate\Support\Str::limit($item->title ?: 'Untitled', 50) }}</a></td>
                                <td>{{ $sectionDef['label'] ?? $item->section->key }}</td>
                                <td>{{ $pages[$item->section->page]['label'] ?? $item->section->page }}</td>
                                <td class="muted">{{ $item->updated_at->format('j M Y, g:i a') }}</td>
                                <td class="muted">{{ $item->editor?->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
