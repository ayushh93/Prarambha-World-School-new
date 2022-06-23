@extends('layouts.frontend')

@section('main-content')
    <div class="information">
        <div class="container-fluid p-0">
            <div class="t-4 pt-4" style="padding: 20px;">
                <div class="row">
                    <div class="col-lg-6 mb-4 border-right" style="padding-left: 1rem;">
                        <h2 class="left-border mb-3" style="font-size: 16px;">GET IN TOUCH</h2>
                        <h5 class="online-form-section-heading">Contact Information</h5>
                        <div class="contact-detail mt-4">
                            <div class=" d-flex mb-4">
                                <div class="mark mr-3 d-flex justify-content-center align-items-center"
                                     style="font-size: 25px;">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="content mt-2">
                                    <h4 style="font-size: 18px;" class="font-weight-bold">Address</h4>
                                    <h5 style="font-size: 15px;">{!! $contact->address !!}</h5>
                                </div>
                            </div>

                            <div class="d-flex mb-4">
                                <div class="mark mr-3 d-flex justify-content-center align-items-center font-weight-bold"
                                     style="font-size: 25px;">
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                                <div class="content phone mt-2">
                                    <h4 style="font-size: 18px;" class="font-weight-bold">Phone Number</h4>
                                    <h5 style="font-size: 15px;"><a href="tel:">{!! $contact->phone !!}</a></h5>
                                </div>
                            </div>

                            <div class="d-flex mb-4">
                                <div class="mark mr-3 d-flex justify-content-center align-items-center"
                                     style="font-size: 25px;">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="content mail mt-2">
                                    <h4 style="font-size: 18px;" class="font-weight-bold">Mail Us At</h4>
                                    <h5 style="font-size: 15px;"><a href="mailto:">{!! $contact->email !!}</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @include('message.message')
                        <form action="{{url('send')}}" method="post" class="contact-form">
                            @csrf
                            <div class="row w-100">
                                <div class="col-12 mb-3">
                                    <label style="color: var(--black-color);" class="font-weight-bold">Your
                                        Name</label>
                                    <input type="text" class="form-control" name="title" placeholder="Your Name" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label style="color: var(--black-color);" class="font-weight-bold">Your
                                        Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label style="color: var(--black-color);"
                                           class="font-weight-bold">Subject</label>
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label style="color: var(--black-color);" class="font-weight-bold">Your
                                        Messsage</label>
                                    <textarea placeholder="Message" class="form-control" name="description" cols="5"
                                              rows="5" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="form-submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map">
        <iframe
            src="{!! $contact->iframe !!}"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
