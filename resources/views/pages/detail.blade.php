@extends('layouts.app')

@section('title', 'Detail Travel')

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Paket Travel</li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $item->title }}</h1>
                            <p>{{ $item->location }}</p>
                            @if ($item->galleries->count())
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img class="xzoom" id="xzoom-default"
                                            src="{{ Storage::url($item->galleries->first()->image) }}"
                                            xoriginal="{{ Storage::url($item->galleries->first()->image) }}" />
                                        <div class="xzoom-thumbs">
                                            @foreach ($item->galleries as $gallery)
                                                <a href="{{ Storage::url($gallery->image) }}">
                                                    <img class="xzoom-gallery" width="120"
                                                        src="{{ Storage::url($gallery->image) }}"
                                                        xpreview="{{ Storage::url($gallery->image) }}" />
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <h2>Tentang Wisata</h2>
                                    <p>
                                        {!! $item->about !!}
                                    </p>
                                    <div class="features row">
                                        <div class="col-md-4">
                                            <img src="{{ url('frontend/images/logo/logo-event.png') }}" alt=""
                                                class="features-image" />
                                            <div class="description">
                                                <h3>Featured Event</h3>
                                                <p>{{ $item->featured_event }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 border-left">
                                            <img src="{{ url('frontend/images/logo/logo-bahasa.png') }}" alt=""
                                                class="features-image" />
                                            <div class="description">
                                                <h3>Languange</h3>
                                                <p>{{ $item->language }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 border-left">
                                            <img src="{{ url('frontend/images/logo/logo-food.png') }}" alt=""
                                                class="features-image" />
                                            <div class="description">
                                                <h3>Foods</h3>
                                                <p>{{ $item->food }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members are going</h2>
                            <div class="members my-2">
                                <img src="{{ url('frontend/images/member.png') }}" alt="" class="member-image me-1">
                                <img src="{{ url('frontend/images/member.png') }}" alt="" class="member-image me-1">
                                <img src="{{ url('frontend/images/member.png') }}" alt="" class="member-image me-1">
                                <img src="{{ url('frontend/images/member.png') }}" alt="" class="member-image me-1">
                                <img src="{{ url('frontend/images/member.png') }}" alt="" class="member-image me-1">
                            </div>
                            <hr>
                            <h2>Trip Information</h2>
                            <table class="trip-information">
                                <tr>
                                    <th width="100%">Date of Departure</th>
                                    <td width="100%" class="text-end">
                                        {{ \Carbon\Carbon::create($item->departure_date)->format('F n, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Duration</th>
                                    <td width="50%" class="text-end">{{ $item->duration }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Type</th>
                                    <td width="50%" class="text-end">{{ $item->type }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-end">${{ $item->price }}/person</td>
                                </tr>
                            </table>
                        </div>
                        <div class="join-container d-grid">
                            @auth
                                <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                                    @csrf
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                            Join Now
                                        </button>
                                    </div>
                                </form>
                            @endauth

                            @guest
                                <a href="{{ url('/login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                                    Login or Register to Join
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
        </section>
    </main>

@endsection

@push('prepend-style')
    <!-- x-zoom -->
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/dist/xzoom.css') }}" />
@endpush

@push('addon-script')
    <!-- x-zoom -->
    <script src="{{ url('frontend/libraries/xzoom/dist/xzoom.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush
