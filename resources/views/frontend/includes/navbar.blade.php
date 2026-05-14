<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand logo" href="{{ url('/') }}">
            <img src="{{ asset('frontend/images/logo.png') }}" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link active-menu" href="{{ url('/') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="serviceDropdown" role="button"
                        data-toggle="dropdown">
                        Service
                    </a>
                    <div class="dropdown-menu" aria-labelledby="serviceDropdown">
                        @foreach ($services as $service)
                            <a class="dropdown-item" href="{{ url('/loan', $service->id) }}">
                                {{ $service->name }}
                            </a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/farmer')}}">Farmer</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="agentDropdown" role="button"
                        data-toggle="dropdown">
                        Agent
                    </a>
                    <div class="dropdown-menu" aria-labelledby="agentDropdown">
                        <a class="dropdown-item" href="{{ url('/invesment') }}">Investment</a>
                        <a class="dropdown-item" href="{{ url('/agent') }}">Agent</a>
                        <a class="dropdown-item" href="{{ url('/admin') }}">Admin</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="paymentDropdown" role="button"
                        data-toggle="dropdown">
                        Payment
                    </a>
                    <div class="dropdown-menu" aria-labelledby="paymentDropdown">
                        <a class="dropdown-item" href="{{ url('/bkash') }}">Bkash</a>
                        <a class="dropdown-item" href="{{ url('/nagad') }}">Nagad</a>
                        <a class="dropdown-item" href="{{ url('/roket') }}">Roket</a>
                        <a class="dropdown-item" href="{{ url('/bank') }}">Bank</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
