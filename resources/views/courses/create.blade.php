<x-layout title="New Course">
    <h1>New Course</h1>

    <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
        @csrf

        @include('courses._form')

        <div style="margin-top: 1rem;">
            <button type="submit">Save Course</button>
            <a href="{{ route('courses.index') }}">Cancel</a>
        </div>
    </form>
</x-layout>