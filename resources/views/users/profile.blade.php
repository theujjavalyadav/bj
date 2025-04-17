@extends('template.theme')
@section('contents')
<div class="container mt-5">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <i class="fa-solid fa-user fa-2x me-2"></i>
            <h3 class="mb-0">User Profile</h3>
        </div>

        <div class="card-body">

            <table class="table table-striped table-striped-bg-default mt-3">
                <tr>
                    <th>Name</th>
                    <td>{{ $users->name }}</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td>{{ $users->email }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ ucfirst($users->gender) }}</td>
                </tr>
                <tr>
                    <th>Hobbies</th>
                    <td>
                        @if(!empty($users->hobby))
                        {{ implode(', ', $users->hobby) }}
                        @else
                        No hobbies selected
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection