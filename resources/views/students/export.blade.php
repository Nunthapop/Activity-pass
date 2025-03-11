<table>
    <thead>
        <tr>
            <th style="background-color:crimson , color:aliceblue">Student Code</th>
            <th>Name</th>
            <th>Year</th>
            <th>Major</th>
            <th>Score</th>
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
                <td>{{ $student->score }}</td>
                <!-- Add any other data columns -->
            </tr>
        @endforeach
    </tbody> 
</table> 