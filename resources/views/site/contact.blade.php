@extends('layouts.app')

@push('page-title')
Contact Us
@endpush

@push('css')

@endpush


@section('content')
<h1 class="text-center">Contact Us</h1>
<h4 class="text-center mb-4">Feel Free to Reach us Out</h4>
<br />
<div class="row mt-4">
    <div class="col-md-7 mb-4">
        <form method="post" action="{{route('site.contact.post')}}">
            @csrf()
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="massage">Massage</label>
                        <textarea name="massage" class="form-control" rows="6"></textarea>
                    </div>
                </div>
                <button class="btn btn-primary" style="margin-left: 15px;">Send Massage</button>
            </div>
        </form>

    </div>
    <div class="col-md-5">
        <div class="section-title">
            <h2>Contact Info</h2>
            <p>Lorem ipsum dolor sit consectetur adipiscing morbi venenatis et tortor consectetur adipisicing lacinia tortor morbi ultricies.</p>
        </div>

        <p><i class="fa fa-map-marker"></i> 456 New Street 22000, New York City, USA</p>
        <p><i class="fa fa-comment"></i> <a href="mailto:info@company.com">info@company.com</a></p>
        <p><i class="fa fa-phone"></i> 010-020-0340</p>
    </div>
</div>
@endsection


@push('js')

@endpush