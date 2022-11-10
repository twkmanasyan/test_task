@php use Illuminate\Support\Facades\Auth; @endphp
@extends("layouts.app")
@section("title")
    Student Details
@endsection
@section("content")
    <div class="container">
        <a href="{{ route('student-list') }}" class="btn btn-secondary mt-2 mb-2">Back</a>
        <div class="card">
            <div class="card-header">
                <h4>{{ $student->full_name }}</h4>
            </div>
            <div class="card-body">
                <p>Birth Date` <strong>{{ $student->b_date }}</strong></p>
                <p>Phone` <strong>{{ $student->phone }}</strong></p>
                <p>Author` <strong>{{ $student->author }}</strong></p>
                <p>Email` <strong>{{ $student->email }}</strong></p>
                <p>Created At` <strong>{{ $student->created_at }}</strong></p>
                @if($student->user_id == Auth::user()->id)
                    <a href="{{ route("student-edit", ["id" => $student->id]) }}" class="btn btn-success">Edit</a>
                    <a href="{{ route("student-delete", ["id" => $student->id]) }}" class="btn btn-danger">Delete</a>
                @endif
            </div>
        </div>
    </div>

@endsection
