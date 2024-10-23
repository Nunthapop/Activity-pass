@extends('layouts.main')
@section('title', 'User: Information')
@section('content')

    <!-- หน้านี้ใช้ดูข้อมูล User -->

    <ul class="action-menu">
        <li class="action-item">
            <a href="{{ route('users.list', ['userEmail' => $users->email]) }}">
                <button type="button" class="nav-button">&lt; BACK</button>
            </a>
        </li>

        <li class="action-item">
            <a href="{{ route('users.update-form', ['userEmail' => $users->email]) }}">
                <button type="button" class="nav-button">Update</button>
            </a>
        </li>
    </ul>

    <table>
        <tbody>
            <tr>
                <th>E-mail</th>
                <th>Name</th>
                @can('update', \App\Models\Product::class)
                    <th>Role</th>
                @endcan
                <th>Year</th>
                <th>Branch</th>
                <th>Score</th>
            </tr>
            <tr>
                <td>{{ $users->email }}</td>
                <td>{{ $users->name }}</td>
                @can('update', \App\Models\Product::class)
                    <td>{{ $users->role }}</td>
                @endcan
                <td> {{ $user->year }}</td>
                <td> {{ $user->branch }}</td>
                <td> {{ $user->score }}</td>
            </tr>
        </tbody>
    </table>

@endsection
