@extends('admin.layouts.app')

@php($currentPage = $page)

@section('title', $definition['label'])

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $definition['label'] }}</li>
@endsection

@section('actions')
    <a href="{{ url($definition['url']) }}" target="_blank" rel="noopener" class="btn btn-outline-secondary">View page</a>
@endsection

@section('content')
    <div class="panel">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Section</th>
                        <th>Heading</th>
                        <th class="num">Items</th>
                        <th>Last edited</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($definition['sections'] as $key => $sectionDef)
                        @php($section = $sections->get($key))
                        <tr>
                            <td><a href="{{ route('admin.sections.edit', [$page, $key]) }}">{{ $sectionDef['label'] }}</a></td>
                            <td class="muted">{{ \Illuminate\Support\Str::limit($section?->title, 60) }}</td>
                            <td class="num">{{ isset($sectionDef['items']) ? ($section?->items_count ?? 0) : '' }}</td>
                            <td class="muted">{{ $section?->updated_by ? $section->updated_at->format('j M Y, g:i a') : '' }}</td>
                            <td class="actions">
                                <a href="{{ route('admin.sections.edit', [$page, $key]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
