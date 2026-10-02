<tr @class(['row-child' => $isChild])>
    <td class="order-buttons">
        <form method="POST" action="{{ route('admin.items.move', [$item, 'up']) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-sm btn-light" @disabled($loop->first)>Up</button>
        </form>
        <form method="POST" action="{{ route('admin.items.move', [$item, 'down']) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-sm btn-light" @disabled($loop->last)>Down</button>
        </form>
    </td>
    @isset($itemFields['image'])
        <td>
            @if ($item->image)
                <img src="{{ $item->src() }}" alt="" class="thumb" loading="lazy">
            @endif
        </td>
    @endisset
    <td class="item-title">{{ \Illuminate\Support\Str::limit($item->title ?: 'Untitled', 90) }}</td>
    @isset($itemFields['subtitle'])
        <td class="muted">{{ \Illuminate\Support\Str::limit($item->subtitle, 50) }}</td>
    @endisset
    <td>
        <span @class(['status', 'status-on' => $item->is_active, 'status-off' => ! $item->is_active])>
            {{ $item->is_active ? 'Visible' : 'Hidden' }}
        </span>
    </td>
    <td class="actions">
        <a href="{{ route('admin.items.edit', $item) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
        <form method="POST" action="{{ route('admin.items.destroy', $item) }}" onsubmit="return confirm('Delete {{ addslashes(\Illuminate\Support\Str::limit($item->title ?: 'this item', 40)) }}?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-link btn-link-danger">Delete</button>
        </form>
    </td>
</tr>
