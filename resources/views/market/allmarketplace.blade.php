<!DOCTYPE html>



    <html>
        <head>
            <title>eTitles</title>
            <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
          <link rel="stylesheet" href="{{ asset('css/market.css') }}">
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
                    <br>
                <div class="searchbar">
                    <input type="text" placeholder="Search..." />
                </div>
                <br> 

            </header>
            <main>
 
                
                <div class="all_county_lands">
                <h1 id="land_sales_title">Lands Available For Sale</h1>
                <div>
                <h1>Mombasa</h1>
                    <div class="county_lands"> 
                        @foreach($titles as $title)
                            @if($title->countycode == "001")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <div class="price">Ksh.{{ $title->price }}</div>
                                <div>{{ $title->approximate_area }}</div>
                                <div>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></div>
                                <div>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
</div>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Kwale</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "002")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Kilifi</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "003")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Tana River</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "004")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Lamu</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "005")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Taita Taveta</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "006")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Garissa</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "007")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Wajir</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "008")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Mandera</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "009")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Marsabit</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "010")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Isiolo</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "011")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Meru</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "012")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Tharaka-Nithi</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "013")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Embu</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "014")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Kitui</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "015")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Machakos</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "016")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Makueni</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "017")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Nyandarua</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "018")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Nyeri</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "019")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Kirinyaga</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "020")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Muranga</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "021")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Kiambu</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "022")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Turkana</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "023")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>West Pokot</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "024")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Samburu</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "025")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Uasin Gishu</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "026")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Trans-Nzoia</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "027")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Elgeyo-Marakwet</h1>
                    <div class="county_lands">
                   
                        @foreach($titles as $title)
                            @if($title->countycode == "028")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Nandi</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "029")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Baringo</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "030")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Laikipia</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "031")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Nakuru</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "032")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Narok</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "033")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Kajiado</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "034")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Kericho</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "035")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Bomet</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "036")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Kakamega</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "037")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Vihiga</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "038")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Bungoma</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "039")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Busia</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "040")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Siaya</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "041")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Kisumu</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "042")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Homa Bay</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "043")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Migori</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "044")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Kisii</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "045")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Nyamira</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "046")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>

                    <div>
                    <h1>Nairobi</h1>
                    <div class="county_lands">
                    
                        @foreach($titles as $title)
                            @if($title->countycode == "047")
                            <div class="card">
                                <img src="{{ asset('storage/app/' . $title->photograph) }}" alt="{{ $title->photograph }}" style="width:100%">
                                <h1>{{ $title->location_name }}</h1>
                                <p class="price">Ksh.{{ $title->price }}</p>
                                <p>{{ $title->approximate_area }}</p>
                                <p>
                                                            <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('storemessage') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="receiver_id" value="{{ $title->owner_id }}">
                            <input type="text" id="text_message" name="text_message" placeholder="Type your message...">
                            <button type="submit">Chat with Owner</button>
                        </form></p>
                                <p>
                        <!-- Add a form around the "Buy" button -->
                        <form action="{{ route('requestpurchase') }}" method="POST">
                            @csrf
                            <!-- Pass the necessary data as hidden input fields -->
                            <input type="hidden" name="title_id" value="{{ $title->title_id }}">
                            <input type="hidden" name="location_name" value="{{ $title->location_name }}">
                            <input type="hidden" name="owner_id" value="{{ $title->owner_id }}">
                            <button type="submit">Request Purchase</button>
                        </form>
                    </p>
                            </div>
                            @endif
                        @endforeach    
                    </div>
                    </div>


                </div>
                
            </main>
            <footer>
                <p class="endparagraph">Copyright &copy; 2023 eTitles</p>
            </footer>
        </body>
    </html>