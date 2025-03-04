<div>
    {{ __('banyak data luar livewire') }} |
    @forelse ($listProject as $items)
        <p>{{ $items->name }}</p>
        <p>{{ $items->status }}</p>
        <p>{{ $items->category }}</p>
        <p>{{ $items->description }}</p>
    @empty
    <p>Kosong!</p>
    @endforelse
</div>
