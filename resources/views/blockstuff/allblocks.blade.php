<html>
    <head>
    <title>eTitles</title>
            <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
            <link rel="stylesheet" href="{{ asset('css/blockstuff.css') }}">
</head>
    <body>


    
<div class="myblocktable">
@foreach(session('allblocks')->groupBy('title_id') as $titleId => $blocks)
<h2>Title ID: {{ $titleId }}</h2>
<table>
    <thead>
        <tr>
            <th>Index</th>
            <th>Possesor</th>
            <th>Previous Hash</th>
            <th>Hash</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blocks as $block)
            <tr>
                <td>{{ $block->indexb }}</td>
                <td>{{ $block->owner_id }}</td>
                <td>{{ $block->previousHash }}</td>
                <td>{{ $block->hash }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endforeach
</div>



    @foreach(session('allblocks')->groupBy('title_id') as $titleId => $blocks)
    <h1>Title ID: {{ $titleId }}<h1>
    <div class="mytiles">
 

    
    @foreach($blocks as $block)
    <div class="mytileone">

    
    <p>{{ $block->indexb }}<p>
    <p>Owner ID: {{ $block->owner_id }}<p>
    <p>previousHash: {{ $block->previousHash }}<p>
    <p>Hash: {{ $block->hash }}<p>
    
    </div>
    @endforeach
    
</div>



@endforeach






</body>
    </html>