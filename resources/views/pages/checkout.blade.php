@extends('layouts.checkout')
@section('title', 'Checkout')

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
                                <li class="breadcrumb-item">Details</li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h1>Who is Going</h1>
                            <p>Trip to {{ $item->travel_package->title }}, {{ $item->travel_package->location }}</p>
                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>VISA</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                            <tr>
                                                <td>
                                                    <img src="https://ui-avatars.com/api/?name={{ $detail->username }}"
                                                        height="60" class="rounded-circle">
                                                </td>
                                                <td class="align-middle">{{ $detail->username }}</td>
                                                <td class="align-middle">{{ $detail->nationality }}</td>
                                                <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                                <td class="align-middle">
                                                    {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout-remove', $detail->id) }}">
                                                        <img src="{{ url('frontend/images/logo/icon_X.png') }}"
                                                            alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    No Visitor
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form action="{{ route('checkout-create', $item->id) }}"
                                    class="row gx-3 gy-2 align-items-center" method="POST">
                                    @csrf
                                    <div class="col-sm-2">
                                        <label for="username" class="visually-hidden">Name</label>
                                        <input type="text" name="username" class="form-control mb-2 me-sm-2"
                                            id="username" placeholder="Username">
                                    </div>
                                    <div class="col-sm-1">
                                      <label for="nationality" class="visually-hidden">Nationality</label>
                                      <input type="text" name="nationality" class="form-control mb-2 me-sm-2"
                                          style="width: 50px" id="nationality" placeholder="Nationality">
                                  </div>
                                    <div class="col-sm-3">
                                        <label for="is_visa" class="visually-hidden">Visa</label>
                                        <select name="is_visa" id="is_visa" class="form-select mb-2 me-sm-2" required>
                                            <option value="" selected>VISA</option>
                                            <option value="1">30 Days</option>
                                            <option value="0">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="doe_passport" class="visually-hidden">DOE Passport</label>
                                        <div class="input-group mb-2 me-sm-2">
                                            <input type="text" class="form-control datepicker" id="doe_passport" name="doe_passport"
                                                placeholder="DOE Passport">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 tombol">
                                        <button type="submit" class="btn btn-add-now mb-2 px-4">
                                            Add Now
                                        </button>
                                    </div>
                                </form>
                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    You are only able to invite member that has registered in mtravel
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Information</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="100%">Members</th>
                                    <td width="100%" class="text-end">{{ $item->details->count() }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Additional VISA</th>
                                    <td width="50%" class="text-end">${{ $item->additional_visa }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-end">${{ $item->travel_package->price }}/person</td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td width="50%" class="text-end">${{ $item->transaction_total }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique Code)</th>
                                    <td width="50%" class="text-end text-total">
                                        <span class="text-blue">${{ $item->transaction_total }},</span>
                                        <span class="text-orange">{{ mt_rand(0, 99) }}</span>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h2>Payment Instructions</h2>
                            <p class="payment-instructions">
                                Please complete your payment before to <br>
                                continue the wonderful trip
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/logo/icon-bank.png') }}" alt=""
                                        class="bank-image">
                                    <div class="description">
                                        <h3>
                                            PT MTRAVEL ID
                                        </h3>
                                        <p>
                                            08xx xxxx xxxx
                                        </p>
                                        <p>
                                            Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/logo/icon-bank.png') }}" alt=""
                                        class="bank-image">
                                    <div class="description">
                                        <h3>
                                            PT MTRAVEL ID
                                        </h3>
                                        <p>
                                            08xx xxxx xxxx
                                        </p>
                                        <p>
                                            Dana
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container d-grid">
                            <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-join-now mt-3 py-2">
                                I Have Made Payment
                            </a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ url('/detail', $item->travel_package->slug) }}" class="text-muted">
                                Cancel Booking
                            </a>
                        </div>
                    </div>
                </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <!-- gijgo -->
    <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/combined/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
    <!-- gijgo -->
    <script src="{{ url('frontend/libraries/gijgo/combined/js/gijgo.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap5',
                icons: {
                    rightIcon: '<img src="{{ url('frontend/images/logo/icon-date.png') }}" />'
                }
            })
        });
    </script>
@endpush
