<x-layout title="Edit Course">
    <h1>Edit Course: {{ $course->code }}</h1>

    <form method="POST" action="{{ route('courses.update', $course) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('courses._form', ['course' => $course])

        <div style="margin-top: 1rem;">
            <button type="submit">Update Course</button>
            <a href="{{ route('courses.show', $course) }}">Cancel</a>
        </div>
    </form>
</x-layout>