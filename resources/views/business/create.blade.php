@extends('template.theme')
@section('contents')

<body>
    <div class="container mt-4">
        <h1>Add New Business</h1>

        <form action="{{ route('Business.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="business-name">Business Name:</label>
            <input type="text" id="business-name" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="email">Business Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="logo">Logo (Upload File):</label>
            <input type="file" id="logo" name="logo" class="form-control">
            @error('logo')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="business-type">Business Type:</label>
            <input type="text" id="business-type" name="business_type" class="form-control" value="{{ old('business_type') }}">
            @error('business_type')
            <div class="text-danger">{{ $message }}</div>
            @enderror


            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror


            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Add Business</button>
                <a href="Business" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>

@endsection