{{-- @extends('layouts.main')
@section('title', $type->code)
@section('content')

    <!-- เมนูจัดการหน้ารางวัล -->
    <ul class="action-menu">
        @can('update', \App\Models\Product::class)
            <li class="action-item">
                <a href="{{ route('types.update-form', ['type' => $type->code]) }}">
                    <button type="button" class="nav-button">Update</button>
                </a>
            </li>
        @endcan

        @can('delete', \App\Models\Product::class)
            <li class="action-item">
                <a href="{{ route('types.delete', ['type' => $type->code]) }}">
                    <button type="button" class="nav-button">Delete</button>
                </a>
            </li>
        @endcan

        <!-- ลิงก์สำหรับกิจกรรมในประเภทนี้ -->
        <li class="action-item">
            <a href="{{ route('types.view_activities', ['type' => $type->code]) }}">
                <button type="button" class="nav-button">View Activities</button>
            </a>
        </li>
    </ul>

    <main>
        <!-- รายละเอียดรางวัล -->
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Number of Activities</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $type->code }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->activities_count }}</td>
                    <td>{{ $type->description }}</td>
                </tr>
            </tbody>
        </table>
    </main>

@endsection --}}
