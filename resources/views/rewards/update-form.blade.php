@extends('layouts.main')
@section('title', 'Reward Update: ' . $reward->name)
@section('content')

<!-- หน้านี้ใช้สำหรับอัปเดตข้อมูลของสินค้า -->
<link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">

<div class="container">
    <form action="{{ route('rewards.update', ['reward_code' => $reward->code]) }}" method="POST">
        @csrf <!-- ป้องกันการโจมตี CSRF -->

        <!-- ฟิลด์สำหรับกรอกข้อมูลสินค้า -->
        <div>
            <label for="code"><strong>Code:</strong></label>
            <input type="text" name="code" id="code" value="{{ $reward->code }}" required>
        </div>
        <div>
            <label for="name"><strong>Name:</strong></label>
            <input type="text" name="name" id="name" value="{{ $reward->name }}" required>
        </div>
        <div>
            <label for="qty"><strong>Qty:</strong></label>
            <input type="number" name="qty" id="qty" value="{{ $reward->qty }}" required>
        </div>
        <div>
            <label for="score"><strong>Score:</strong></label>
            <input type="text" name="score" id="score" value="{{ $reward->score }}" required>
        </div>
        <div>
            <label for="description"><strong>Description:</strong></label>
            <textarea name="description" id="description" cols="200" rows="10" required>{{ $reward->description }}</textarea>
        </div>

        <!-- ปุ่ม action -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('rewards.view', ['reward_code' => $reward->code]) }}">
                        <button type="button" class="back-button">Back</button>
                    </a>
                </li>
                <li class="action-item">
                    <button type="submit" class="submit-button">Submit</button>
                </li>
                <li class="action-item">
                    <button type="reset" class="cancel-button">Cancel</button>
                </li>
            </ul>
        </nav>
    </form>
</div>


@endsection
