@extends('layouts.main')
@section('title', 'Add Students To ' . $activity->name)
@section('content')

    {{-- <nav>
        <ul>
            <li><a href="{{ route('products.view-shops', [
                'product' => $products->code,
            ]) }}">&lt;
                    Back</a>
                </li>
        </ul>
    </nav> --}}

    <form action="{{ route('activities.add-students-form', ['activity_name' => $activity->name]) }}" method="post" class="search-form">
        @csrf
        <label>
            Search
            <input type="text" name="term" value="{{ $search['term'] }}" />
        </label>
        <button type="submit" class="primary">Search</button>

        <a href="{{ route('activities.add-students-form', ['activity_name' => $activity->name]) }}">
            <button type="button" class="accent">Clear</button>
        </a>

        <div>{{ $students->withQueryString()->links() }}</div>

        <table class="lg:w-1/2">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Owner</th>
            </tr>
            <tbody>
                <tr>
                    @foreach ($students as $item)
                        <td class="underline">
                            {{ $item->code }} </td>
                        <td> {{$item->first_name }} {{$item->last_name }}</td>
                        <td> {{$item->major }}</td>
                        <td> <button type="submit" name="code" value="{{ $item->code }}" class="primary">Add</button>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </html>
    </form>
@endsection