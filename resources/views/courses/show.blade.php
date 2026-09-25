<x-layout :title="$course->code">
    <h1>{{ $course->code }} — {{ $course->title }}</h1>

    @if ($course->image_path)
        <div style="margin: 1rem 0;">
            <img src="{{ asset('storage/' . $course->image_path) }}" alt="{{ $course->title }}" width="220" style="border-radius: 4px; border: 1px solid #ccc;">
        </div>
    @endif

    <p>{{ $course->description ?? 'No description provided.' }}</p>

    <p>
        <strong>Instructor:</strong> {{ $course->instructor?->name ?? '—' }} <br>
        <strong>Units:</strong> {{ $course->units }} <br>
        <strong>Status:</strong> {{ $course->is_active ? 'Active' : 'Inactive' }}
    </p>

    <div style="margin-top: 1.5rem;">
        <a href="{{ route('courses.edit', $course) }}">Edit Course</a> |
        <a href="{{ route('courses.index') }}">Back to List</a>

        <!-- Delete button gamit ang POST form + @method('DELETE') at confirm dialog -->
        <form method="POST" action="{{ route('courses.destroy', $course) }}" style="display: inline; margin-left: 1rem;" onsubmit="return confirm('Sigurado ka bang gusto mong burahin ang kursong ito?');">
            @csrf
            @method('DELETE')
            <button type="submit" style="color: red; cursor: pointer;">Delete</button>
        </form>
    </div>
</x-layout>