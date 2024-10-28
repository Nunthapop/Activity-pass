 @extends('layouts.main')
 @section('title', 'View Student: ' . $student->code)
 @section('content')

     <!-- ปุ่ม action -->
     <nav>
         <ul class="action-menu">
             <li class="action-item">
                 <a href="{{ route('students.view-activities', ['student_code' => $student->code]) }}">
                     <button type="button" class="view-button">View all activity of this student</button>
                 </a>
             </li>

             {{-- @can('update', \App\Models\activities::class)
                <li class="action-item">
                    <a href="{{ route('activities.update-form', ['activity_name' => $activity->code]) }}">
                        <button type="button" class="update-button">Update</button>
                    </a>
                </li>
            @endcan

            @can('delete', \App\Models\activities::class)
                <li class="action-item">
                    <a href="{{ route('activities.delete', ['activity_name' => $activity->code]) }}">
                        <button type="button" class="delete-button">Delete</button>
                    </a>
                </li>
            @endcan --}}
         </ul>
     </nav>

     <main>

         <!-- รายละเอียดรางวัล -->
         <table class="">
             <tr>
                 <td><strong>Student Code:</strong></td>
                 <td>{{ $student->code }}</td>
             </tr>
             <tr>
                 <td><strong>First Name:</strong></td>
                 <td>{{ $student->first_name }}</td>
             </tr>
             <tr>
                 <td><strong>Last Name:</strong></td>
                 <td>{{ $student->last_name }}</td>
             </tr>
             <tr>
                 <td><strong>Year:</strong></td>
                 <td>{{ $student->year }}</td>
             </tr>
             <tr>
                 <td><strong>Major:</strong></td>
                 <td>{{ $student->major }}</td>
             </tr>
             <tr>
                 <td><strong>Score:</strong></td>
                 <td>{{ $student->score }}</td>
             </tr>
         </table>

     </main>

 @endsection
