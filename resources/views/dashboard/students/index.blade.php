@extends("layouts.app")
@section("title")Student List @endsection
@section("content")
    <div class="container">
        <a href="{{route("student-create")}}" class="btn btn-primary mt-2">Create New Student</a>
        <h2>USER LIST</h2>
        <x-messages />
        <div class="mt-2 user-list d-flex flex-wrap-wrap">
            @if(count($students) == 0)
                <p>Empty List</p>
            @else
                @foreach($students as $student)
                    <div class="card w-25" style="margin:10px">
                        <div class="card-header">
                            <h4>{{ $student->full_name }}</h4>
                        </div>

                        <div class="card-body">
                            <p>Email` <strong>{{ $student->email }}</strong></p>
                            <p>Phone` <strong>{{ $student->phone }}</strong></p>
                            <a href="{{ route("student-details", ["id" => $student->id]) }}" class="btn btn-info">Details</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
