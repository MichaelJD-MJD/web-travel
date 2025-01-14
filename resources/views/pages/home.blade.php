@extends('layouts.app')

@section('title', 'Mtravel')

@section('content')
    <!-- Header -->
    <header class="text-center">
        <h1>Explore the World <br />As Easy One Click</h1>
        <p class="mt-3">
            You will see beautiful moment <br />
            you never see before
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">Get Started</a>
    </header>

    <main>
        <!-- Statistik -->
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-3 col-md-2 stats-detail">
                    <h2>20k</h2>
                    <p>Members</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>12</h2>
                    <p>Countries</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>3k</h2>
                    <p>Hotels</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>72</h2>
                    <p>Partners</p>
                </div>
            </section>
        </div>

        <!-- Wisata -->
        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Popular</h2>
                        <p>
                            Something that you never try<br />
                            in this world
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-popular-content" id="popular-content">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach ($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column"
                                style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}')">
                                <div class="travel-country">{{ $item->location }}</div>
                                <div class="travel-location">{{ $item->title }}</div>
                                <div class="travel-button mt-auto">
                                    <a href="{{ url('/detail',$item->slug) }}" class="btn btn-travel-details px-4">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Networks -->
        <section class="section-networks" id="networks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Networks</h2>
                        <p>
                            Companies are trusted us <br />
                            more than just a trip
                        </p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img src="frontend/images/logo_networks.png" alt="Logo Partner" class="img-partner" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial -->
        <section class="section-testimonial-heading" id="testimonialHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They Are Loving Us</h2>
                        <p>
                            Moments are giving them <br />
                            the best experience
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimonial-content" id="testimonial-content">
            <div class="container">
                <div class="section-testimonial row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/user1.png" alt="user" class="mb-4 rounded-circle" />
                                <h3 class="mb-4">Jokowi</h3>
                                <p class="testimonial">
                                    “ Ini sangat seru dan <br />
                                    menyenangkan, saya harap <br />
                                    semua orang dapat <br />
                                    merasakannya juga. ”
                                </p>
                            </div>
                            <hr />
                            <p class="trip-to mt-2">Trip to Ubud, Indonesia</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/user2.png" alt="user" class="mb-4 rounded-circle" />
                                <h3 class="mb-4">Megawati</h3>
                                <p class="testimonial">
                                    “ Ini sangat seru dan <br />
                                    menyenangkan, saya harap <br />
                                    semua orang dapat <br />
                                    merasakannya juga. ”
                                </p>
                            </div>
                            <hr />
                            <p class="trip-to mt-2">Trip to Nusa Penida, Indonesia</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/user3.png" alt="user" class="mb-4 rounded-circle" />
                                <h3 class="mb-4">Jessica</h3>
                                <p class="testimonial">
                                    “ Ini sangat seru dan <br />
                                    menyenangkan, saya harap <br />
                                    semua orang dapat <br />
                                    merasakannya juga. ”
                                </p>
                            </div>
                            <hr />
                            <p class="trip-to mt-2">Trip to Bromo, Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                        I Need Help
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">
                        Get Started
                    </a>
                </div>
            </div>
        </section>
    </main>

@endsection
