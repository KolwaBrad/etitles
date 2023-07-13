<!DOCTYPE html>



    <html>
        <head>
            <title>eTitles</title>
            <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        </head>
        <body>

            <header>
                <div class = "blankdiv"></div>
               
                    <div class = "topnav">
                        <div class="maintitle"><a href="#">eTitles</a></div>

                        <div class = "centernav">
                            <div><a class = "mycenternav" href="dashboard">Home</a></div>
                            <div><a class = "mycenternav" href="#">Counties</a></div>
                            <div><a class = "mycenternav" href="#">Contacts</a></div>
                            <div><a class = "mycenternav" href="#">Support</a></div>
                        </div>
                         
                        <div class = "lastnav">
                            <div><a class = "mylastnav" href="logout">Log out</a></div>
                            <div><span class = "mylastnav">{{ session('firstName') }}</span>
                                 <span class = "mylastnav">{{ session('lastName') }}</span></div>
                            </div>    
                    </div>
                    

            </header>
            <br>
            <br>
            <main>
                <div class="majordiv">
                <div class="mytitlestable">
                <br>
                <h1>My Titles on Market</h1>
                <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Photograph</th>
                <th>County</th>
                <th>Subcounty</th>
                <th>Location Name</th>
                <th>Size</th>
                <th>Withdraw</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('mergedTitles') as $title)
            @if($title->market == "1")
            <tr>
                <td>{{ $title->id }}</td>
                <td><img src="{{ asset('storage/app/' . $title->titledeed) }}" alt="{{ $title->titledeed }}"></td>
                <td><img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}"></td>
                <td>{{ $title->subcounty->countyname }}</td>
                <td>{{ $title->subcounty->subcountyname }}</td>
                <td>{{ $title->location_name }}</td>
                <td>{{ $title->approximate_area }}</td>
                <td>    
                          <form action="{{ route('withdrawland') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <button type="submit">Withdraw</button>
                        </form>
                    </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

<div class="mytitlestable">
                <br>
                <h1>My Titles Off Market</h1>
                <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Photograph</th>
                <th>County</th>
                <th>Subcounty</th>
                <th>Location Name</th>
                <th>Enlist</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('mergedTitles') as $title)
            @if($title->market == "0")
            <tr>
                <td>{{ $title->id }}</td>
                <td><img src="{{ asset('storage/app/' . $title->titledeed) }}" alt="{{ $title->titledeed }}"></td>
                <td><img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}"></td>
                <td>{{ $title->subcounty->countyname }}</td>
                <td>{{ $title->subcounty->subcountyname }}</td>
                <td>{{ $title->location_name }}</td>
                <td>            <form action="{{ route('enlistland') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <button type="submit">Enlist</button>
                        </form>
                    </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
</div>
</main>


            <footer>
                <p class="endparagraph">Copyright &copy; 2023 eTitles</p>
            </footer>
        </body>
    </html>