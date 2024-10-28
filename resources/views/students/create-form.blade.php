@extends('layouts.main')
@section('title', 'Student: Create')
@section('content')

    <!-- หน้าสร้างรางวัล -->

    <!-- ฟอร์ม -->

    <form action="{{ route('students.create') }}" method="POST">
        @csrf <!-- CSRF token for security -->

        <table class="table-form">
            <tr>
                <td>
                    <strong>Code:</strong>
                </td>
                <td>
                    <input type="number" name="code" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>First Name:</strong>
                </td>
                <td>
                    <input type="text" name="first_name" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Last Name:</strong>
                </td>
                <td>
                    <input type="text" name="last_name" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Year:</strong>
                </td>
                <td>
                    <select name="year" required>
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
                        <option value="">Select Major</option>
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
                    <a href="{{ route('students.list') }}">
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
