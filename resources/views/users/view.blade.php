@extends('layouts.main')
@section('title', 'User: Information')
@section('content')

    <!-- หน้านี้ใช้ดูข้อมูล User -->

    <!-- ปุ่ม action -->
    <nav>
        <ul class="action-menu">
            <li class="action-item">
                <a href="{{ route('users.list', ['userEmail' => $users->email]) }}">
                    <button type="button" class="nav-button">&lt; BACK</button>
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

    <table>
        <tbody>
            <tr>
                <th>Username</th>
                @can('update', \App\Models\Product::class)
                    <th>Role</th>
                @endcan
            </tr>
            <tr>
                <td>{{ $users->name }}</td>
                @can('update', \App\Models\Product::class)
                    <td>{{ $users->role }}</td>
                @endcan
            </tr>
        </tbody>
    </table>

@endsection
