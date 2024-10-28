@extends('layouts.main')
@section('title', $reward->code)
@section('content')

    <!-- ปุ่ม action -->
    <nav>
        <ul class="action-menu">
            <li class="action-item">
                <a href="{{ route('rewards.list') }}">
                    <button type="button" class="back-button">Back</button>
                </a>
            </li>
            <li class="action-item">
                <a href="{{ route('rewards.update-form', ['reward_code' => $reward->code]) }}">
                    <button type="button" class="update-button">Update</button>
                </a>
            </li>

            {{-- <li class="action-item">
            <a href="{{ route('rewards.delete', ['reward_code' => $reward->code]) }}">
                <button type="button" class="delete-button">Delete</button>
            </a>
        </li> --}}
        </ul>
    </nav>

    <main>
        <!-- Reward Details -->
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>qty</th>
                    <th>Score</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $reward->code }}</td>
                    <td>{{ $reward->qty }}</td>
                    <td>{{ $reward->points }}</td>
                    <td>{{ $reward->description }}</td>
                </tr>
            </tbody>
        </table>
    </main>

@endsection
