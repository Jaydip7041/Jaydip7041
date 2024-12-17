<div>
    <h1>{{ $blog->name }} {{ $blog->surname }}</h1>
    <p>Mobile: {{ $blog->mno }}</p>
    <p>
        @if ($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" width="200">
        @else
            <span>No Image</span>
        @endif
    </p>
</div>
