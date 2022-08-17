@foreach($products as $product)
<div class="col-12 col-md-6 col-lg-4 portfolio-item">
    <div class="portfolio-inner-content">
        <a >
            <div class="item-img-holder position-relative">
                <img style="max-height: 260px;" src="{{ asset('/uploads/products/'.$product->product_image) }}">
                <div class="item-badge rounded-circle">{{ number_format($product->price) }}&nbsp;&nbsp;&nbsp;<span>Tsh</span></div>
            </div>
            <div class="item-detail-area">
                <div class="d-flex justify-content-between">
                    <h4 class="item-name">{{ $product->name }}</h4>
                </div>
                <p class="text">{{ $product->description }}</p>
            </div>
        </a>
    </div>
</div>
@endforeach