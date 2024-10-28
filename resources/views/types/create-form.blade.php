@extends('layouts.main')
@section('title', 'Add Type of Activity')
@section('content')

    <!-- สร้างกิจกรรม -->

    <!-- ฟอร์ม -->
    <form action="{{ route('types.create') }}" method="POST">
        @csrf <!-- ป้องกันการโจมตี CSRF -->

        <!-- กรอกข้อมูล -->
        <table class="">
            <tr>
                <td><strong>Code:</strong></td>
                <td><input type="text" name="code" value="" required></td>
            </tr>
            <tr>
                <td><strong>Name:</strong></td>
                <td><input type="text" name="name" value="" required></td>
            </tr>
            <tr>
                <td><strong>Description:</strong></td>
                <td>
                    <textarea name="description" cols="200" rows="10" required></textarea>
                </td>
            </tr>
        </table>

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
