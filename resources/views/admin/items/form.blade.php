@extends('admin.layouts.app')

@php
    $currentPage = $section->page;
    $creating = ! $item->exists;
    $label = strtolower($definition['label']);
@endphp

@section('title', $creating ? 'Add '.$label : 'Edit '.$label)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.pages.show', $section->page) }}">{{ $pageDefinition['label'] }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.sections.edit', [$section->page, $section->key]) }}">{{ $sectionDefinition['label'] }}</a></li>
    @if ($parent)
        <li class="breadcrumb-item">{{ $parent->title }}</li>
    @endif
@endsection

@section('content')
    <form method="POST" enctype="multipart/form-data" class="panel"
          action="{{ $creating
              ? route('admin.items.store', [$section->page, $section->key, 'parent' => $parent?->id])
              : route('admin.items.update', $item) }}">
        @csrf
        @unless ($creating)
            @method('PUT')
        @endunless

        <div class="panel-body">
            @foreach ($definition['fields'] as $name => $field)
                @include('admin.partials.field', ['model' => $item])
            @endforeach

            <div class="form-group">
                <input type="hidden" name="is_active" value="0">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1"
                           @checked(old('is_active', $item->is_active))>
                    <label class="custom-control-label" for="is_active">Show on site</label>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">{{ $creating ? 'Add '.$label : 'Save '.$label }}</button>
                <a href="{{ route('admin.sections.edit', [$section->page, $section->key]) }}" class="btn btn-link">Cancel</a>
            </div>
        </div>
    </form>
@endsection
