<div id="gmap" style="width: 100%; height: 91vh; position: relative; overflow: hidden;"></div>

<!-- Modal -->
<div class="modal fade" id="productsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success is-subscribed">
                    Tu seko!
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <img class="product-thumbnail img-thumbnail" width="100%" src="https://www.w3schools.com/w3images/fjords.jpg">
                    </div>
                    <div class="col-md-7">
                        <div class="description"></div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <a href="#" class="btn btn-green pull-left col-md-12 product-view">{{ __('map.viewitem') }}</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('map.close') }}</button>
            </div>
        </div>
    </div>
</div>

<style>
    #productsModal .modal-content {
        height: auto;
        min-height: 100%;
        border-radius: 0;
    }

    #productsModal .modal-dialog {
        max-width: 100%;
        margin: 50vh 0 0 0;
    }

    #productsModal .modal-content {
        border: none;
    }

    #productsModal .modal-header {
        background: #FF7e79;
        border-radius: 0;
        color: #fff;
    }

    #productsModal .product-info {
        padding-top: 10px;
    }

    #productsModal .product-info span:first-of-type {
        padding-right: 5px;
    }

    #productsModal .description p {
        text-indent: 20px;
    }
</style>


@section('scripts')
    <script>
        window.locations = @json($products);
    </script>

    <script src="{{ asset('js/map.js') }}" defer></script>
@endsection
