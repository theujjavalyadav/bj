@extends('template.theme')
@section('contents')

<style>.logo-preview {
    width: 100px;  /* Set width */
    height: 100px; /* Set height */
    object-fit: cover; /* Ensures the image is properly cropped */
    border-radius: 8px; /* Optional: Adds rounded corners */
    border: 1px solid #ddd; /* Optional: Adds a light border */
}
</style>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Update Business Details</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('Business.update', $businesses->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Select country</label>
            <select class="form-control" name="country">
                <option value="">-- Select country --</option>
                @foreach($businesses->location as $business)
                <option value="{{ $business->id }}">{{ $business->country }}</option>
                @endforeach
            </select>
            <span class="error">@error('country'){{$message}}@enderror</span>
        </div>
        <div>
            <label for="logo">Logo (Upload File):</label>
            <input type="file" id="logo" name="logo" class="form-control" value="{{ $businesses->logo}}">
            <img src="{{ Storage::url($businesses->logo) }}" alt="image"  class="logo-preview">
            <span class="error">@error('logo'){{$message}}@enderror</span>
        </div>

        <div class="mb-3">
            <label class="form-label">Business Name</label>
            <input type="text" class="form-control" name="name" value="{{ $businesses->name }}">
            <span class="error">@error('name'){{$message}}@enderror</span>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $businesses->email }}">
            <span class="error">@error('email'){{$message}}@enderror</span>
        </div>

        <div class="mb-3">
            <label class="form-label">Business Type</label>
            <input type="text" class="form-control" name="business_type" value="{{ $businesses->business_type }}">
            <span class="error">@error('business_type'){{$message}}@enderror</span>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $businesses->description }}">
            <span class="error">@error('description'){{$message}}@enderror</span>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('Business') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection