@extends('template.theme')
@section('contents')



@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="container">
    <h2 class="text-center my-4">Location List</h2>
    <div class="text-center">
    <a href="{{ route('create') }}" class="add-btn">Add Location</a>

    </div>
    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Business ID</th>
                <!-- <th>City</th> -->
                <th>State</th>
                <th>ZIP Code</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->business_id }}</td>
                <td>{{ $location->state }}</td>
                <td>{{ $location->zip_code }}</td>
                <td>{{ $location->country}}</td>
                <td>
                    <a href="{{ url('edit',$location->id) }}" class="btn btn-primary btn-sm">Edit</a>

                    <form action="{{ url('delete', $location->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm delete-btn">Delete</button>
                    </form>
                    <a href="{{ url('show',$location->id) }}" class="btn btn-success btn-sm">Show</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener("click", function(e) {
                e.preventDefault();
                const form = this.closest('form');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this location!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection