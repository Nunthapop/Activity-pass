@extends('layouts.main')
@section('title', 'Reward Update: ' . $reward->name)
@section('content')

    <!-- หน้านี้ใช้สำหรับอัปเดตข้อมูลของสินค้า -->

    <!-- ฟอร์มสำหรับอัปเดตข้อมูลสินค้า -->
    <form action="{{ route('rewards.update', ['reward_code' => $reward->code]) }}" method="POST">
        @csrf

        <!-- ฟิลด์สำหรับกรอกข้อมูลสินค้า -->
        <p><strong>Code:</strong> <input type="text" name="code" value="{{ $reward->code }}" required></p>
        <p><strong>Name:</strong> <input type="text" name="name" value="{{ $reward->name }}" required></p>
        <p><strong>Qty:</strong> <input type="number" name="qty" value="{{ $reward->qty }}" required></p>
        <p><strong>Score:</strong> <input type="text" name="score" value="{{ $reward->score }}" required></p>
        <p><strong>Description:</strong>
            <textarea name="description" cols="200" rows="10" required>{{ $reward->description }}</textarea>
        </p>

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

@endsection
