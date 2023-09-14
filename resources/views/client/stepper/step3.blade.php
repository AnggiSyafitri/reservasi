<div id="pilih-menu" class="content " role="tabpanel" aria-labelledby="information-part-trigger">
    <div class="row">
        <div class="col-xl-12">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-lg-4 order-lg-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Menu Terpilih</span>
                            </h4>
                            <ul id="cart_container" class="list-group mb-3 table-responsive" style="max-height: 400px">

                            </ul>
                            <div class="p-3 border rounded-lg d-flex justify-content-between">
                                <h3 class="fw-bold">Total: </h3>
                                <span id="total_price">Rp -</span>
                            </div>
                        </div>
                        <div class="col-lg-8 order-lg-1">
                            <h4 class="mb-3">Menu</h4>
                            <input type="text" oninput="renderMenus(this)" placeholder="Search something here..." class="form-control rounded-pill col-12">
                            <div class="row" id="menu_container">
                                @foreach($menu as $item)
                                    <div class="col-12 col-md-4 m-0 p-2">
                                        <div class="border rounded-lg h-100">
                                            <img style="height: 128px; object-fit:cover;" src="{{ '/uploads/menus/'.$item['image'] }}"
                                                class="card-img-top" alt="...">
                                            <div class="p-2 d-flex flex-column">
                                                <div class="mb-2">
                                                    <h5 class="card-title mb-0">
                                                        {{ $item['name'] }}
                                                    </h5>
                                                    <span>{{ $item->description }}</span>
                                                    <br>
                                                    <span>@currency($item->price)</span>
                                                </div>
                                                <div class="d-flex gap-3 mt-auto">
                                                    <button onclick="addToCart(`{{ json_encode($item) }}`)" href="#" class="btn btn-sm btn-primary">Tambah</button>
                                                    <input id="cart_amount_{{ $item->id }}" type="number" min="1" value="1" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="float-end">
    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
    <button class="btn btn-primary" onclick="onStep3()">Next</button>
    </div>
</div>
