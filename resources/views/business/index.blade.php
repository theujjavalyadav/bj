@extends('template.theme')
@section('contents')
@include('sweetalert::alert')

<div class="container">
    <h2 class="text-center my-4">Business List</h2>


    <div class="text-center">
    <a href="{{ route('Business.create') }}" class="add-btn">Add Business</a>

    </div>

    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Logo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Business Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($businesses as $business)
            <tr>
                <td>
                    <img src="{{ $business->logo ? asset('storage/' . $business->logo) : asset('images/default-logo.png') }}" width="60" height="60" class="rounded-circle">
                </td>
                <td>{{ $business->name }}</td>
                <td>{{ $business->email ? Str::limit($business->email,6) : 'N/A' }}</td>
                <td>{{ $business->business_type }}</td>
                <td>
                    <a href="{{ route('Business.edit',$business->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <!-- delete records -->
                    <form action="{{ route('Business.destroy', $business->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm delete-btn" data-confirm-delete="true">Delete</button>

                    </form>
                    <!-- show records -->
                    <a href="{{ route('Business.show',$business->id) }}" class="btn btn-success btn-sm">Show</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No Business Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="flex justify-center mt-4">
        {{ $businesses->links() }}
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
                    text: "Once deleted, you will not be able to recover this business!",
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