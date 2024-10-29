@extends('layouts.main')
@section('title', 'Add Activities For Type: ' . $type->code)
@section('content')

<link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
<main>
    <!-- ปุ่ม action -->
    <div class="container">
        <nav class="action-menu">
            <ul>
                <li class="action-item">
                    <a href="{{ route('types.view-activities', ['type' => $type->code]) }}">
                        <button type="button" class="back-button">Back</button>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- แสดงหน้าลิงค์เพจ -->
        <div class="pagination">
            {{ $activities->withQueryString()->links() }}
        </div>

        <h2 class="title">Add Activity to Type</h2>

        <!-- ฟอร์มเพิ่มกิจกรรม -->
        <form action="{{ route('types.add-activities', ['type' => $type->code]) }}" method="POST" class="activity-form">
            @csrf

            @php
                session()->put('bookmark.activities.view', url()->full());
            @endphp

            <div class="details">
                @foreach ($activity as $activityItem)
                    <div class="detail-item">
                        <label><strong>Activity Name:</strong></label>
                        <span>{{ $activityItem->name }}</span>
                    </div>

                    <div class="detail-item">
                        <label><strong>Date & Time:</strong></label>
                        <span>{{ $activityItem->datetime }}</span>
                    </div>

                    <div class="detail-item">
                        <label><strong>Location:</strong></label>
                        <span>{{ $activityItem->location }}</span>
                    </div>

                    <div class="detail-item">
                        <label><strong>Score:</strong></label>
                        <span>{{ $activityItem->score }}</span>
                    </div>

                    <div class="detail-item">
                        <button type="submit" name="type" value="{{ $activityItem->code }}" class="add-button">Add Activity</button>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
</main>


@endsection
