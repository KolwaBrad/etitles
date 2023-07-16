<!DOCTYPE html>
<html>
<head>
    <title>My Titles</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <a href="proccedadmin"><button>Back to Dashboard</button></a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Photograph</th>
                <th>County Code</th>
                <th>Subcounty Code</th>
                <th>Location Name</th>
                <th>Owner ID</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($title as $mytitle)
            <tr>
                <td>{{ $mytitle->id }}</td>
                <td><img src="{{ asset('storage/app/' . $mytitle->titledeed) }}" alt="{{ $mytitle->titledeed }}"></td>
                <td><img src="{{ asset('storage/app/' . $mytitle->photograph) }}" alt="{{ $mytitle->photograph }}"></td>
                <td>{{ $mytitle->countycode }}</td>
                <td>{{ $mytitle->subcountyid }}</td>
                <td>{{ $mytitle->location_name }}</td>
                <td>{{ $mytitle->owner_id }}</td>
                <td>{{ $mytitle->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>