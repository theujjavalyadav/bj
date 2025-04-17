@extends('template.theme')

@section('contents')

<div class="container mt-3">
    <h3 class="text-center mb-3">Location Data</h3>

    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <tbody>
                <tr>
                    <th class="table-dark text-white">Address</th>
                    <td>{{ $location->address ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <th class="table-dark text-white">City</th>
                    <td>{{ $location->city ?? 'N/A' }}</td>
                </tr>

                <tr>
                    <th class="table-dark text-white">State</th>
                    <td>{{ $location->state ? Str::limit($location->state) : 'N/A' }}</td>
                </tr>

                <tr>
                    <th class="table-dark text-white">Zip Code</th>
                    <td>{{ $location->zip_code ? Str::limit($location->zip_code) : 'N/A' }}</td>
                </tr>

                <tr>
                    <th class="table-dark text-white">Country</th>
                    <td>{{ $location->country ? Str::limit($location->country) : 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="table-dark text-white">Business Name</th>
                    <td>{{ $location->business->name ?? 'No Business Linked' }}</td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center gap-4 mt-2">
        <a href="{{ route('showLocation') }}" class="btn btn-primary btn-sm">Location List</a>
    </div>
</div>

@endsection