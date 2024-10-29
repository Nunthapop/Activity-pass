 @extends('layouts.main')
 @section('title', 'View Student: ' . $student->code)
 @section('content')

 <link rel="stylesheet" href="{{ asset('css/view.css') }}" type="text/css">
     <!-- ปุ่ม action -->
    <div class="container">
     <main>
        <h2 class="title">Student Details</h2>

        <div class="image-container">
            <img src="{{ asset('images/anya_profile.jpg') }}" alt="Student Photo" class="student-photo">
        </div>

        <div class="details">
            <div class="detail-item">
                <label><strong>Student ID</strong></label>
                <span>{{ $student->code }}</span>
            </div>

            <div class="detail-item">
                <label><strong>First Name</strong></label>
                <span>{{ $student->first_name }}</span>
            </div>

            <div class="detail-item">
                <label><strong>Last Name</strong></label>
                <span>{{ $student->last_name }}</span>
            </div>

            <div class="detail-item">
                <label><strong>Year</strong></label>
                <span>{{ $student->year }}</span>
            </div>

            <div class="detail-item">
                <label><strong>Major</strong></label>
                <span>{{ $student->major }}</span>
            </div>

            <div class="detail-item">
                <label><strong>Score</strong></label>
                <span>{{ $student->score }}</span>
            </div>
        </div>
    </main>

    <nav>
        <ul class="action-menu">
            <li class="action-item">
                <a href="{{ route('students.view-activities', ['student_code' => $student->code]) }}">
                    <button type="button" class="view-button">View All Activity of This Student</button>
                </a>
            </li>

            <li class="action-item">
                <a href="{{ route('students.list') }}">
                    <button type="button" class="back-button">Back</button>
                </a>
            </li>

         {{-- @can('update', \App\Models\Student::class)
            <li class="action-item">
                <a href="{{ route('students.update-form', ['student_code' => $student->code]) }}">
                    <button type="button" class="update-button">Update</button>
                </a>
            </li>
        @endcan

        @can('delete', \App\Models\Student::class)
            <li class="action-item">
                <a href="{{ route('students.delete', ['student_code' => $student->code]) }}">
                    <button type="button" class="delete-button">Delete</button>
                </a>
            </li>
        @endcan --}}
        </ul>
    </nav>
</div>

 @endsection
