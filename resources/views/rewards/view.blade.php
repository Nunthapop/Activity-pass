@extends('layouts.main')
@section('title', 'View Reward: ' . $reward->name)
@section('content')

<link rel="stylesheet" href="{{ asset('css/view.css') }}" type="text/css">
<div class="container">
    <main>
        <h2 class="title">Reward Details</h2>

        <div class="details">
            <div class="detail-item">
                <label><strong>Code:</strong></label>
                <span>{{ $reward->code }}</span>
            </div>

            <div class="detail-item">
                <label><strong>Name:</strong></label>
                <span>{{ $reward->name }}</span>
            </div>

            <div class="detail-item">
                <label><strong>Quantity:</strong></label>
                <span>{{ $reward->qty }}</span>
            </div>

            <div class="detail-item">
                <label><strong>Score:</strong></label>
                <span>{{ $reward->score }}</span>
            </div>

            <div class="detail-item">
                <label><strong>Description:</strong></label>
                <span>{{ $reward->description }}</span>
            </div>
        </div>
    </main>
    <nav>
        <ul class="action-menu">
            <li class="action-item">
                <a href="{{ route('rewards.update-form', ['reward_code' => $reward->code]) }}">
                    <button type="button" class="update-button">Update</button>
                </a>
            </li>

            <!-- ปุ่ม Delete-->
            {{-- <li class="action-item">
                <a href="{{ route('rewards.delete', ['reward_code' => $reward->code]) }}">
                    <button type="button" class="delete-button">Delete</button>
                </a>
            </li> --}}

            <li class="action-item">
                <a href="{{ route('rewards.list') }}">
                    <button type="button" class="back-button">Back</button>
                </a>
            </li>
        </ul>
    </nav>
</div>


@endsection
