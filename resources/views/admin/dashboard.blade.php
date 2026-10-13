@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('actions')
    <a href="{{ url('/') }}" target="_blank" rel="noopener" class="btn btn-outline-secondary">Open website</a>
@endsection

@section('content')
    <dl class="summary reveal">
        <div>
            <dt>Pages</dt>
            <dd>{{ count($pages) }}</dd>
        </div>
        <div>
            <dt>Sections</dt>
            <dd>{{ $sectionTotal }}</dd>
        </div>
        <div>
            <dt>Content items</dt>
            <dd>{{ $itemTotal }}</dd>
        </div>
        <div>
            <dt>Last change</dt>
            <dd class="summary-date">
                {{ $lastEdit ? \Illuminate\Support\Carbon::parse($lastEdit)->diffForHumans() : 'No changes yet' }}
            </dd>
        </div>
    </dl>

    <div class="panel reveal">
        <div class="panel-head">
            <h2>Pages</h2>
        </div>
        <ul class="page-list">
            @foreach ($pages as $key => $page)
                <li class="page-row">
                    <a href="{{ route('admin.pages.show', $key) }}" class="page-row-link">
                        <span @class(['page-thumb', 'page-thumb-logo' => $key === 'layout'])>
                            @if ($previews[$key] ?? null)
                                <img src="{{ $previews[$key] }}" alt="" loading="lazy">
                            @endif
                        </span>
                        <span class="page-name">
                            {{ $page['label'] }}
                            <small>{{ $page['url'] }}</small>
                        </span>
                        <span class="page-meta">
                            <span>{{ count($page['sections']) }} {{ \Illuminate\Support\Str::plural('section', count($page['sections'])) }}</span>
                            <span>{{ $itemCounts[$key] ?? 0 }} {{ \Illuminate\Support\Str::plural('item', $itemCounts[$key] ?? 0) }}</span>
                        </span>
                        <span class="page-edited">
                            {{ isset($lastEdits[$key]) ? 'Edited '.\Illuminate\Support\Carbon::parse($lastEdits[$key])->diffForHumans() : 'Not edited yet' }}
                        </span>
                    </a>
                    <a href="{{ url($page['url']) }}" target="_blank" rel="noopener" class="page-view">View</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="panel reveal">
        <div class="panel-head">
            <h2>Recently changed</h2>
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
