@extends('layouts.main')
@section('title', $reward->code)
@section('content')

    <!-- Reward Management Menu -->
    <ul class="action-menu">

        {{-- @can('update', \App\Models\Reward::class) --}}
            <li class="action-item">
                <a href="{{ route('rewards.update-form', ['reward_code' => $reward->code]) }}">
                    <button type="button" class="nav-button">Update</button>
                </a>
            </li>
        {{-- @endcan --}}
{{-- 
        @can('delete', \App\Models\Reward::class)
            <li class="action-item">
                <a href="{{ route('rewards.delete', ['reward_code' => $reward->code]) }}">
                    <button type="button" class="nav-button">Delete</button>
                </a>
            </li>
        @endcan --}}
    </ul>

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
