@extends('template.theme')
@section('contents')

<div class="container mt-5">
    <h2 class="mb-4 text-center">Update Location Details</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('update', $locations->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Select Business</label>
            <select class="form-control" name="business_id">
                <option value="">-- Select Business --</option>
                @foreach($businesses as $business)
                <option value="{{ $business->id }}">{{ $business->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">City</label>
            <input type="text" class="form-control" name="city" value="{{ $locations->city }}" required>
            <span class="error">@error('city'){{$message}}@enderror</span>

        </div>


        <div class="mb-3">
            <label class="form-label">State</label>
            <input type="text" class="form-control" name="state" value="{{ $locations->state }}" required>
            <span class="error">@error('state'){{$message}}@enderror</span>

        </div>

        <div class="mb-3">
            <label class="form-label">ZIP Code</label>
            <input type="text" class="form-control" name="zip_code" value="{{ $locations->zip_code }}" required>
            <span class="error">@error('zip_code'){{$message}}@enderror</span>

        </div>

        <div class="mb-3">
            <label class="form-label">Country</label>
            <input type="text" class="form-control" name="country" value="{{ $locations->country }}" required>
            <span class="error">@error('country'){{$message}}@enderror</span>

        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection