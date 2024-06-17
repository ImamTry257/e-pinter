<table>
    <thead>
        <tr>
            <td colspan="5">DATA HASIL KUISIONER SISWA</td>
        </tr>
    </thead>

    <tbody>
        <tr></tr>
        <tr></tr>
        <tr>
            <td rowspan="2">Timestamp</td>
            <td rowspan="2">Sekolah</td>
            <td rowspan="2">Nama Siswa</td>
            <td colspan="30">No</td>
        </tr>
        <tr>
            @for ($i = 1; $i <= 30; $i++)
                <td>no {{ $i }}</td>
            @endfor
        </tr>
        @foreach ($detail_user_answer as $user_answer)
            <tr>
                <td>{{ $user_answer['progress_date'] }}</td>
                <td>{{ $user_answer['school_name'] }}</td>
                <td>{{ $user_answer['student_name'] }}</td>
                @foreach ($user_answer['result'] as $result)
                    <td>{{ $result['answer'] }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
