@extends('layouts.main')
@section('title', 'Student Update: ' . $student->code)
@section('content')

    <!-- หน้านี้ใช้สำหรับอัปเดตข้อมูลของ student -->

    <!-- ฟอร์มสำหรับอัปเดตข้อมูล student -->
    <form action="{{ route('students.update', ['student_code' => $student->code]) }}" method="POST">
        @csrf

        <tabl class="table-form">
            <tr>
                <td>
                    <strong>Code:</strong>
                </td>
                <td>
                    <input type="number" name="code" value="{{ $student->code }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>First Name:</strong>
                </td>
                <td>
                    <input type="text" name="first_name" value="{{ $student->first_name }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Last Name:</strong>
                </td>
                <td>
                    <input type="text" name="last_name" value="{{ $student->last_name }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Year:</strong>
                </td>
                <td>
                    <select name="year" required>
                        <option value="{{ $student->year }}">{{ $student->year }}</option>
                        <option value="1">1</option>
                        <option value="3">2</option>
                        <option value="2">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Major:</strong>
                </td>
                <td>
                    <select name="major" required>
                        <option value="{{ $student->major }}">{{ $student->major }}</option>
                        <option value="SE">SE</option>
                        <option value="DII">DII</option>
                        <option value="MMIT">MMIT</option>
                        <option value="DG">DG</option>
                        <option value="ANI">ANI</option>
                    </select>
                </td>
            </tr>
        </table>

        <!-- ปุ่ม action -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('students.view', ['student_code' => $student->code]) }}">
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
