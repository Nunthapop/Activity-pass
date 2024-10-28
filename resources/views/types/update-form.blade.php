@extends('layouts.main')
@section('title', 'Type of Activity Update: ' . $type->code)
@section('content')

    <!-- หน้านี้ใช้สำหรับอัปเดต -->

    <!-- ฟอร์ม -->
    <form action="{{ route('types.update', ['type' => $type->code]) }}" method="POST">
        @csrf

        <!-- ฟิลด์สำหรับกรอกข้อมูล -->
        <table>
            <tr>
                <td><strong>Code:</strong></td>
                <td><input type="text" name="code" value="{{ $type->code }}" required></td>
            </tr>
            <tr>
                <td><strong>Name:</strong></td>
                <td><input type="text" name="name" value="{{ $type->name }}" required></td>
            </tr>
            <tr>
                <td><strong>Description:</strong></td>
                <td>
                    <textarea name="description" cols="200" rows="10" required>{{ $type->description }}</textarea>
                </td>
            </tr>
        </table>

        <!-- ปุ่ม action -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('types.view', ['type_code' => $type->code]) }}">
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
