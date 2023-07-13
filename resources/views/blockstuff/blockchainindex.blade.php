<html>
    <head>
</head>
<body>
<h1>Blockchain</h1>

<table>
    <thead>
        <tr>
            <th>Index</th>
            <th>Timestamp</th>
            <th>Data</th>
            <th>Previous Hash</th>
            <th>Hash</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blocks as $block)
            <tr>
                <td>{{ $block->indexb }}</td>
                <td>{{ $block->data }}</td>
                <td>{{ $block->moredata }}</td>
                <td>{{ $block->previousHash }}</td>
                <td>{{ $block->hash }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
