@extends('admin.layouts.app')

@php
    $currentPage = $page;
    $fields = $definition['fields'] ?? [];
    $itemDef = $definition['items'] ?? null;
    $childDef = $itemDef['children'] ?? null;
    $itemFields = $itemDef['fields'] ?? [];
@endphp

@section('title', $definition['label'])

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.pages.show', $page) }}">{{ $pageDefinition['label'] }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $definition['label'] }}</li>
@endsection

@section('actions')
    <a href="{{ url($pageDefinition['url']) }}" target="_blank" rel="noopener" class="btn btn-outline-secondary">View page</a>
@endsection

@section('content')
    @if ($fields)
        <form method="POST" action="{{ route('admin.sections.update', [$page, $section->key]) }}" enctype="multipart/form-data" class="panel">
            @csrf
            @method('PUT')
            <div class="panel-body">
                @foreach ($fields as $name => $field)
                    @include('admin.partials.field', ['model' => $section])
                @endforeach

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Save section</button>
                </div>
            </div>
        </form>
    @endif

    @if ($itemDef)
        <div class="panel">
            <div class="panel-head">
                <h2>{{ \Illuminate\Support\Str::plural($itemDef['label']) }}</h2>
                <a href="{{ route('admin.items.create', [$page, $section->key]) }}" class="btn btn-sm btn-primary">Add {{ strtolower($itemDef['label']) }}</a>
            </div>

            @if ($items->isEmpty())
                <p class="panel-body muted mb-0">No {{ strtolower(\Illuminate\Support\Str::plural($itemDef['label'])) }} yet</p>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order</th>
                                @isset($itemFields['image'])
                                    <th>{{ $itemFields['image']['label'] }}</th>
                                @endisset
                                <th>{{ $itemFields['title']['label'] ?? 'Title' }}</th>
                                @isset($itemFields['subtitle'])
                                    <th>{{ $itemFields['subtitle']['label'] }}</th>
                                @endisset
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                @include('admin.sections.item-row', ['item' => $item, 'isChild' => false])

                                @if ($childDef)
                                    @foreach ($children->get($item->id, collect()) as $child)
                                        @include('admin.sections.item-row', ['item' => $child, 'isChild' => true])
                                    @endforeach
                                    <tr class="row-child">
                                        <td colspan="{{ 4 + isset($itemFields['image']) + isset($itemFields['subtitle']) }}">
                                            <a href="{{ route('admin.items.create', [$page, $section->key, 'parent' => $item->id]) }}" class="btn btn-sm btn-link px-0">
                                                Add {{ strtolower($childDef['label']) }} to {{ $item->title }}
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    @endif
@endsection
