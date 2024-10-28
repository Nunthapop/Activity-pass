@extends('layouts.main')
@section('title', 'Activity: Update')
@section('content')

    <!-- หน้าอัปเดตกิจกรรม -->

    <!-- ฟอร์ม -->
    <form action="{{ route('activities.update', ['activity_name' => $activity->name]) }}" method="POST">
        @csrf

        <!-- ข้อมูลกิจกรรม -->

        <table class="">
            <tr>
                <td><strong>Name:</strong></td>
                <td><input type="text" name="name" value="{{ $activity->name }}" required></td>
            </tr>
            <tr>
                <td>strong>Type</strong></td>
                <td>
                    <select name="type" required>
                        <option value="{{ $type_id->name }}">{{ $type_id->name }} @selected(true)</option>
                        @foreach ($type as $item)
                            @if ($item->id !== $type_id->id)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Activity By:</strong></td>
                <td><input type="text" name="activity_by" value="{{ $activity->activity_by }}" required></td>
            </tr>
            <tr>
                <td><strong>Date & Time:</strong></td>
                <td><input type="datetime-local" name="datetime" value="{{ $activity->datetime }}" required></td>
            </tr>
            <tr>
                <td><strong>Location:</strong></td>
                <td><input type="text" name="location" value="{{ $activity->location }}" required></td>
            </tr>
            <tr>
                <td><strong>Score:</strong></td>
                <td><input type="text" name="score" value="{{ $activity->score }}" required></td>
            </tr>
            <tr>
                <td><strong>Description:</strong></td>
                <td>
                    <textarea name="description" cols="200" rows="10" required>{{ $activity->description }}</textarea>
                </td>
            </tr>
        </table>

        <!-- ปุ่ม action -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('activities.view', ['activity_name' => $activity->code]) }}">
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
