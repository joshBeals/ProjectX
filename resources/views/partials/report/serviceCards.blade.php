<div class="row"> 
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="card total-sales">
        <div class="card-body">
        <div class="row">
            <div class="col-xl-8 xl-12 col-md-8 col-sm-12 col box-col-12">
            <div class="d-flex up-sales"><span> 
                <svg>
                    <use href="{{ asset('assets/svg/icon-sprite.svg#Sales') }}"></use>
                </svg></span>
                <div class="flex-shrink-0"> 
                <h4>{{ Helper::shortNumber($data['num_services']) }}</h4>
                <h6>No. Of Services</h6>
                </div>
            </div>
            </div>
            <div class="col-xl-4 col-md-4 col-4 p-0 ecommerce-chart">
            <div class="sales-chart" id="sales-chart"></div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
    <div class="card total-sales">
        <div class="card-body">
        <div class="row">
            <div class="col-xl-8 xl-12 col-md-8 col-sm-12 col box-col-12">
            <div class="d-flex total-customer"><span> 
                <svg>
                    <use href="{{ asset('assets/svg/icon-sprite.svg#Customer') }}"></use>
                </svg></span>
                <div class="flex-shrink-0"> 
                <h4>{{ Helper::shortNumber($data['num_providers']) }}</h4>
                <h6>No. Of Providers</h6>
                </div>
            </div>
            </div>
            <div class="col-xl-4 col-md-4 col-4 p-0 ecommerce-chart">
            <div class="customer-chart" id="total-customer-chart"></div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>