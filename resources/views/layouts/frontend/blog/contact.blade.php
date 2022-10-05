@extends('layouts.frontend.master')

@section('title')
    contact
@endsection

@section('body')
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mt-4 mb-3">Contact us</h3>
                            <p>
                                Call or submit our online form to request an estimate or for general questions about Designed Publishing Inc. and our services. We look forward to serving you!
                            </p>
                        </div>
                    </div>

                    <form id="contact-form" class="my-5">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Hello! Why are you contacting us today?</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Please Select</option>
                                        <option>I need technical support</option>
                                        <option>I am finding issue in publishing article</option>
                                        <option>I am intrested in publishing advertisment</option>
                                        <option>I want to pitch a story</option>
                                        <option>I want support in security issue</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your name*:</label>
                                    <input class="form-control form-control-name" name="name" id="name" type="text" required >
                                </div>

                                <div class="form-group">
                                    <label for="email">Your Email Address*:</label>

                                    <input class="form-control form-control-email" name="email" id="email" type="email" required >
                                </div>

                                <div class="form-group">
                                    <label for="topic">Your Query Topic*:</label>

                                    <input class="form-control form-control-subject" name="subject" id="subject" required >
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message*:</label>
                                    <textarea class="form-control form-control-message" name="message" id="message" rows="7" required ></textarea>
                                </div>

                                <button class="btn btn-primary solid blank mt-3" type="submit">Send Message</button>
                            </div>
                            <div class="col-lg-4">
                                <h4 class="text-black mb-4 mt-5 mt-lg-0">Hello! We’d like to make sure that your contact submission/feedback is directed to us. </h4>
                                <p class="lead">Please read through the following carefully before submitting below:</p>
                                <ul class="list-unstyled ">
                                    <li class="mb-3">1. We can only address issues related to themefisher.com. We are not affiliated with the sites we write about.</li>
                                    <li class="mb-3"> 2. If you would like to submit news, please see the “Submit News to Form” page that has more details. </li>
                                    <li class="mb-3">3. For more information on advertising, please see our  Advertising Information Page first.</li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
