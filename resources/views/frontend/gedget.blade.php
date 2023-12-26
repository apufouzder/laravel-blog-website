@extends('layouts.master')

@section('content')
    
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 border-end">
                <h1 class="py-5">Gadget</h1>
                <div class="col px-lg-5 px-md-4 px-2 mb-5">
                    <div class="border-top overflow-hidden pt-5">
                        <img width="100%"
                            src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-post-featured-img-26.jpg"
                            alt="">
                        <h3 class="mt-3 fs-4 fw-bold">Apple opens another megastore in China amid William Barr
                            criticism</h3>
                        <div class="d-flex gap-3 mb-2 align-items-center">
                            <span class="">Gadget / By Winters</span>
                        </div>
                        <p class="text-secondary fs-5 fw-normal">Cursus iaculis etiam in In nullam donec sem sed
                            consequat scelerisque nibh amet, massa egestas risus, gravida vel amet, imperdiet
                            volutpat rutrum sociis quis velit, commodo enim aliquet. Nunc volutpat tortor libero at
                            augue mattis neque, suspendisse aenean praesent sit habitant laoreet felis lorem nibh
                            diam faucibus viverra penatibus donec etiam sem consectetur vestibulum purus …</p>
                        <a class="text-decoration-none fs-5 text-dark-emphasis" href="#">Read more...</a>
                    </div>
                </div>
                <div class="col px-lg-5 px-md-4 px-2 mb-5">
                    <div class="border-top overflow-hidden pt-5">
                        <img width="100%"
                            src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-post-featured-img-26.jpg"
                            alt="">
                        <h3 class="mt-3 fs-4 fw-bold">Apple opens another megastore in China amid William Barr
                            criticism</h3>
                        <div class="d-flex gap-3 mb-2 align-items-center">
                            <span class="">Gadget / By Winters</span>
                        </div>
                        <p class="text-secondary fs-5 fw-normal">Cursus iaculis etiam in In nullam donec sem sed
                            consequat scelerisque nibh amet, massa egestas risus, gravida vel amet, imperdiet
                            volutpat rutrum sociis quis velit, commodo enim aliquet. Nunc volutpat tortor libero at
                            augue mattis neque, suspendisse aenean praesent sit habitant laoreet felis lorem nibh
                            diam faucibus viverra penatibus donec etiam sem consectetur vestibulum purus …</p>
                        <a class="text-decoration-none fs-5 text-dark-emphasis" href="#">Read more...</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                @include('includes.rightSideBar')

            </div>
        </div>
    </div>
</section>


@endsection