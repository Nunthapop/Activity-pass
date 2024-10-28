@extends('layouts.main')
@section('title', 'Activity: Create')
@section('content')

    <!-- สร้างกิจกรรม -->

    <!-- ฟอร์ม -->
    <form action="{{ route('activities.create') }}" method="POST">
        @csrf <!-- ป้องกันการโจมตี CSRF -->

        <!-- กรอกข้อมูล -->
        <table class="">
            <tr>
                <td><strong>Name:</strong></td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td><strong>Type</strong></td>
                <td>
                    <select name="type" id="type" required>
                       @foreach ($type as $item)
                           <option value="{{ $item->id }}">{{ $item->name }}</option>
                       @endforeach
                </td>
            </tr>
            <tr>
                <td><strong>Reward</strong></td>
                <td>
                    <select name="reward" id="type" required>
                       @foreach ($reward as $item)
                           <option value="{{ $item->id }}">{{ $item->code }}</option>
                       @endforeach
                </td>
            </tr>
            <tr>
                <td><strong>Activity By:</strong></td>
                <td><input type="text" name="activity_by" required></td>
            </tr>
            <tr>
                <td><strong>Date & Time:</strong></td>
                <td><input type="datetime-local" name="datetime" required></td>
            </tr>
            <tr>
                <td><strong>Location:</strong></td>
                <td><input type="text" name="location" required></td>
            </tr>
            <tr>
                <td><strong>Score:</strong></td>
                <td><input type="text" name="score" required></td>
            </tr>
            <tr>
                <td><strong>Description:</strong></td>
                <td>
                    <textarea name="description" cols="200" rows="10" required></textarea>
                </td>
            </tr>
        </table>

        <button type="submit">Submit</button>

        <!-- ปุ่ม action -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('activities.list') }}">
                        <button type="button" class="back-button">Back</button>
                    </a>
                </li>
                <li class="action-item">
                    <button type="submit" class="submit-button">Submit</button>
                </li>
                <li class="action-item">
                    <button type="clear" class="cancel-button">Cancel</button>
                </li>
            </ul>
        </nav>

    </form>

@endsection
