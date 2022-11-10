@extends("layouts.app")
@section("title") Create Student
@endsection
@section("page-scripts")
    <script src="{{ asset("dist/js/jquery.maskedinput.js") }}"></script>
@endsection
@section("content")
    <div class="container">
        <div class="form w-50">
            <div class="form-title">
                <h2>Student Information</h2>
                <form action="{{ route("student-store") }}" method="post">
                    @csrf
                    @if(isset($student))
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                    @endif
                    <div class="mb-2">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input class="form-control" type="text" id="full_name" name="full_name" placeholder="John Smith">
                    </div>

                    <div class="mb-2">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input class="form-control" type="date" id="birth_date" name="birth_date">
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="example@mail.ru">
                    </div>

                    <div class="mb-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input class="form-control" type="tel" id="phone" name="phone" placeholder="(999)999-9999">
                    </div>

                    <button class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $("#phone").mask("(999)-999-9999");
        })
    </script>
@endsection
