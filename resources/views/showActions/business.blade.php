@extends('template.theme')

@section('contents')

<div class="container mt-3">
    <h5 class="text-center mb-3">Business Data</h5>

    @if($business)
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <tbody>
                <th class="table-light text-center" colspan="2" style="width: 25%;">
                    <img src="{{ $business->logo ? asset('storage/' . $business->logo) : asset('images/default-logo.png') }}" width="60" height="60" class="rounded-circle">
                </th>
                <tr>
                    <th class="table-dark text-white">Business</th>
                    <td>{{ $business->name }}</td>
                </tr>

                <tr>
                    <th class="table-dark text-white">Type</th>
                    <td>{{ $business->business_type }}</td>
                </tr>

                <tr>
                    <th class="table-dark text-white">Description</th>
                    <td>{{ Str::limit($business->description, 40) }}</td>
                </tr>

                <tr>
                    <th class="table-dark text-white">Location</th>
                    <td>
                        @php
                        $uniqueCities = $business->location ? $business->location->pluck('city')->unique() : collect();
                        @endphp

                        {{ $uniqueCities->isNotEmpty() ? $uniqueCities->implode(', ') : 'No Location Available' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @else
    <p class="text-center text-danger">No business data available.</p>
    @endif

    <div class="d-flex justify-content-center gap-4 mt-2">
        <a href="{{ route('Business.index') }}" class="btn btn-primary btn-sm">Business List</a>
    </div>
</div>

@endsection