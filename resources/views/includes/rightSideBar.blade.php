<div data-aos="fade-left" class="px-lg-5 px-md-4 px-3">
    <h4 class="mb-4 fw-bolder">Categories</h4>
    <ul class="list-unstyled mb-5">

        @foreach ($categoryPostCounts as $categoryCount)
            <li>
                <a class="text-decoration-none fs-5 lh-lg text-dark fw-normal"
                    href="{{ route('filter_by_category', $categoryCount->category_id) }}">
                    {{ $categoryCount->category_name }} ({{ $categoryCount->post_count }})
                </a>
            </li>
        @endforeach

    </ul>

    <div class="border px-3 pt-0 pb-5 mb-5">
        <span class="bg_color_indigo p-3 rounded-1"><span class="fs-3 text-white"><i
                    class="bi bi-envelope"></i></span></span>
        <h4 class="mt-4 fw-bold">Subscribe to Our Newsletter</h4>
        <p class="text-muted fs-5 fw-normal">gravida aliquet vulputate faucibus tristique odio.</p>
        <input type="email" class="form-control py-3 mb-4" placeholder="Email address" />
        <button class="btn btn-primary bg_color_indigo fs-5">Subscribe</button>
    </div>

    <img class="mb-3 object-fit-cover" width="100%"
        src="https://websitedemos.net/tech-news-04/wp-content/uploads/sites/903/2021/07/tech-news-promo-potrait-banner-img.jpg"
        alt="">

    <div>
        <h3>Recent Posts</h3>
        <ul class="list-unstyled mb-5">
            <li>
                <a class="text-decoration-none fs-6 lh-lg text-dark-emphasis fw-normal" href="#">Running
                    macOS and Windows 10 on the Same Computer</a>
            </li>
            <li>
                <a class="text-decoration-none fs-6 lh-lg text-dark-emphasis fw-normal" href="#">Apple opens
                    another megastore in China amid William Barr criticism</a>
            </li>
            <li>
                <a class="text-decoration-none fs-6 lh-lg text-dark-emphasis fw-normal" href="#">The ‘Sounds’
                    of Space as NASA’s Cassini Dives by Saturn</a>
            </li>
            <li>
                <a class="text-decoration-none fs-6 lh-lg text-dark-emphasis fw-normal" href="#">Broke a
                    Glass? Someday You Might 3-D-Print a New One</a>
            </li>
            <li>
                <a class="text-decoration-none fs-6 lh-lg text-dark-emphasis fw-normal" href="#">This Is a
                    Giant Shipworm. You May Wish It Had Stayed In Its Tube.</a>
            </li>
        </ul>
    </div>
</div>
