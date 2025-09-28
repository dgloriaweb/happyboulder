@extends('main')

@section('content')
<div class="container">
    <h1>Setup Boulder Route</h1>
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="/start">
        @csrf
        <label>Nickname:
            <input type="text" name="nickname" value="" required>
        </label>
        <label>Level at Setup:
            <input type="number" name="levelAtSetup" value="" required>
        </label>
        <label>Color:
            <input type="text" name="color" value="" required>
        </label>
        <label>Suggested Level:
            <input type="number" name="suggestedLevel" value="" required>
        </label>
        <label>Wall Index:
            <input type="number" name="wallIndex" value="" required>
        </label>
        <label>Intensity:
            <input type="number" name="intensity" value="" required>
        </label>
        <label>Risk:
            <input type="number" name="risk" value="" required>
        </label>
        <label>Complexity:
            <input type="number" name="complexity" value="" required>
        </label>
        <button type="submit">Add Route</button>
    </form>
</div>
@endsection
