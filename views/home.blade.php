@extends('layout')

@section('title', 'Suppression Stats')

@section('content')
    <h4>Total Records in Database: {{ $total }}</h4>
    <table class="table table-bordered table-striped">
        <legend>Supressed Email Statistics</legend>
        <tr>
            <th>Suppression Type</th>
            <th>Suppressible Records</th>
            <th>Suppressed Count</th>
        </tr>

        @foreach ($suppressions as $suppression)
        <tr>
            <td>{{ $suppression['name'] }}</td>
            <td>{{ $suppression['count'] }}</td>
            <td>{{ $suppression['suppressed'] }}</td>
        </tr>
        @endforeach
    </table>
@endsection
