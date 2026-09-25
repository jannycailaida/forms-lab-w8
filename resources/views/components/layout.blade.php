<!doctype html>
<html>
<head>
    <title>{{ $title ?? 'Student Portal' }}</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 2rem auto; }
        .error { color: #c00; }
        .success { color: #080; }
        label { display: block; margin-top: .75rem; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('courses.index') }}">Courses</a> | 
        <a href="{{ route('courses.create') }}">New</a>
    </nav>

    @if (session('status'))
        <p class="success">{{ session('status') }}</p>
    @endif

    {{ $slot }}
</body>
</html>