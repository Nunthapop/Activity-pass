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
                <td><strong>Code:</strong></td>
                <td><input type="text" name="code" required></td>
            </tr>
            <tr>
                <td><strong>Name:</strong></td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td><strong>Type</strong></td>
                <td>
                    <select name="type_id" id="type" required>
                        <option>
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

    </form>

@endsection
