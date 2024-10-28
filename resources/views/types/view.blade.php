@extends('layouts.main')
@section('title', 'Type of Activity: ' .$type->name)
@section('content')

    <!-- ปุ่ม action -->
    <nav>
        {{-- <ul class="action-menu">
            <li class="action-item">
                <a href="{{ route('types.view-activities', ['type_code' => $type->code]) }}">
                    <button type="button" class="view-button">View all activity of this type</button>
                </a>
            </li> --}}

            {{-- @can('update', \App\Models\Type::class) --}}
               <li class="action-item">
                   <a href="{{ route('types.update-form', ['type_code' => $type->code]) }}">
                       <button type="button" class="update-button">Update</button>
                   </a>
               </li>
           {{-- @endcan --}}

           {{-- @can('delete', \App\Models\Type::class) --}}
               {{-- <li class="action-item">
                   <a href="{{ route('types.delete', ['type_code' => $type->code]) }}">
                       <button type="button" class="delete-button">Delete</button>
                   </a>
               </li> --}}
           {{-- @endcan --}}
        </ul>
    </nav>

    <main>

        <!-- รายละเอียดรางวัล -->
        <table class="/">
            <tr>
                <td><strong>Code:</strong></td>
                <td>{{ $type->code }}</td>
            </tr>
            <tr>
                <td><strong>Name:</strong></td>
                <td>{{ $type->name }}</td>
            </tr>
            <tr>
                <td><strong>Description:</strong></td>
                <td>{{ $type->description }}</td>
            </tr>
        </table>

    </main>

@endsection
