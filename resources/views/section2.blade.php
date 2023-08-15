<body style="background-color: rgba(13, 84, 118, 0.257)">
@include('nav')
<P>Hello {{ Auth::guard('web')->user()->name }},this is section2 page</P>

<form method="POST" action="{{ route('section2_search') }}">
    @csrf
    <label for="input_values">Input Values (comma separated)</label> <br>
    <input type="text" name="input_values" id="input_values" required> <br>
    <label for="search_value">Search Value</label><br>
    <input type="text" name="search_value" id="search_value" required><br>
    <button type="submit">Khoj</button>
</form>

@isset($result)
<p>Result: {{ $result ? 'True' : 'False' }}</p>
@endisset

</body>