<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Student Code</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <!-- Add any other columns you need -->
        </tr>
    </thead>
    <tbody>
        @foreach($students as $index => $student)
            <tr>
               
                <td>{{ $student->code }}</td>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                <td>{{ $student->major }}</td>
                <td>{{ $student->year }}</td>
                <!-- Add any other data columns -->
            </tr>
        @endforeach
    </tbody>
</table>