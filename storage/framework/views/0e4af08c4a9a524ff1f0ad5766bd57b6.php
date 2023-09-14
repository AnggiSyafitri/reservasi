<?php $__env->startSection('main'); ?>
<div class="sm:container md:p-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-xxl-12 row">
            <div class="card col-12">
                <div class="card-header">
                    <h4 class="card-title">Reservasi</h4>
                </div>
                <div class="card-body">
                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="bs-stepper" id="stepperEl">
                        <div class="bs-stepper-header mb-5 table-responsive" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#step1">
                                <button type="button" class="step-trigger d-flex flex-column" role="tab" aria-controls="step1"
                                    id="step1-trigger">
                                    <span class="bs-stepper-circle bg-primary">1</span>
                                    <span class="fw-normal">Cek Ketersediaan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#nama">
                                <button type="button" class="step-trigger d-flex flex-column" role="tab" aria-controls="nama"
                                    id="nama-part-trigger">
                                    <span class="bs-stepper-circle bg-primary">2</span>
                                    <span class="fw-normal">Isi Data Diri</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#pilih-menu">
                                <button type="button" class="step-trigger d-flex flex-column" role="tab" aria-controls="pilih-menu"
                                    id="pilih-menu-trigger">
                                    <span class="bs-stepper-circle bg-primary">3</span>
                                    <span class="fw-normal">Pilih Menu</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#confirm">
                                <button type="button" class="step-trigger d-flex flex-column" role="tab" aria-controls="confirm"
                                    id="confirm-trigger">
                                    <span class="bs-stepper-circle bg-primary">4</span>
                                    <span class="fw-normal">Konfirmasi</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <?php echo $__env->make('client.stepper.step1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('client.stepper.step2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('client.stepper.step3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('client.stepper.step4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    var stepper = new Stepper(document.querySelector('.bs-stepper'), {
        animation: true
    });
    var inputData = {};
    var cart = (getDataFromLocalStorage())?.cart ?? [];
    var totalPrice = 0;
    var menus = JSON.parse(`<?php echo json_encode($menu); ?>`)
    let condition = [false, false];
    let to = 3;

    // if (getDataFromLocalStorage() != {}) {
    //     stepper.to(4)
    // }

    $("#setuju_semua_benar").on('change', () => {
        condition[0] = $("#setuju_semua_benar").is(':checked')
        if (condition[0] === true && condition[1] === true) {
            $('#booking_button').prop('disabled', false)
        }else{
            $('#booking_button').prop('disabled', true)
        }
    })

    $("#setuju_dengan_syarat").on('change', () => {
        condition[1] = $("#setuju_dengan_syarat").is(':checked')
        if (condition[0] === true && condition[1] === true) {
            $('#booking_button').prop('disabled', false)
        }else{
            $('#booking_button').prop('disabled', true)
        }
    })


    $("input[name='reservation_time']").bootstrapMaterialDatePicker();
    $("input[name='reservation_date']").bootstrapMaterialDatePicker({
        time: false,
        clearButton: true
    });

    function cekKetersediaan() {
        let reservation_time = $('input[name=reservation_time]').val()
        let reservation_date = $('input[name=reservation_date]').val()
        let guest_amount = $('input[name=guest_amount]').val()
        let sitting_area = $('select[name=sitting_area] option:selected').val()
        $("#cekKetersediaan").toggleClass('gap-2')
        $("#spinner-container").html('<span class="spinner-border text-white" style="width: 16px; height: 16px;"></span>')

        $.ajax({
            'url': `/reservation/check?sitting_area=${sitting_area}&reservation_date=${reservation_date}&reservation_time=${reservation_time}&guest_amount=${guest_amount}`,
            'type': 'GET',
            'dataType': 'json',
            success: (res) => {
                $("#cekKetersediaan").toggleClass('gap-2')
                $("#spinner-container").html('')
                if (res.status) {
                    $("#reservation_check_message").html(`
                    <div class="alert alert-success">
                        ${res.message}
                    </div>
                    `)
                    $('#nextStep1').prop('disabled', false)
                }else{
                    $("#reservation_check_message").html(`
                    <div class="alert alert-danger">
                        ${res.message}
                    </div>
                    `)
                    $('#nextStep1').prop('disabled', true)
                }
            },
            error: (res) => {
                $("#reservation_check_message").html(`
                    <div class="alert alert-danger">
                        Harap dicermati kembali
                    </div>
                    `)
            }
        })
    }

    function onStep1() {
        stepper.next()
        inputData['reservation_date'] = $("input[name='reservation_date']").val()
        inputData['reservation_time'] = $("input[name='reservation_time']").val()
        inputData['guest_amount'] = $("input[name='guest_amount']").val()
        inputData['sitting_area'] = $("select[name='sitting_area']").find(':selected').val()

        // localStorage.setItem('_state_reservation', JSON.stringify(inputData));
        addDataoLocalStorage(inputData)
    }
    $('select[name=type]').on('change', () => {
        let type = $('select[name=type] option:selected').val()
        if (type != 'order_now') {
            to = 4
        }else {
            to = 3
        }
        console.log(to);
    })
    function onStep2() {
        inputData['name'] = $("input[name='name']").val()
        inputData['email'] = $("input[name='email']").val()
        inputData['telephone'] = $("input[name='telephone']").val()
        inputData['allergy_note'] = $("textarea[name='allergy_note']").val()
        inputData['request_note'] = $("textarea[name='request_note']").val()
        inputData['type'] = $("select[name='type']").val()
        addDataoLocalStorage(inputData)
        if (to == 4) {
            initializationStep4()
        }
        stepper.to(to)
    }

    function onStep3() {
        initializationStep4()
        stepper.next()
    }

    function initializationStep4() {
        // initialization
        _input = getDataFromLocalStorage()
        Object.keys(_input).forEach((inp, index) => {
            $(`#form_step4 *[name='${inp}']`).val(_input[inp]).change();
        });
        $("#total_price_step4").html(rupiah(_input['totalPrice'] > 100000 ? caculateTax(18.5, _input['totalPrice']): _input['totalPrice']))
        renderCartElement('#cart_container_step4', true)
        $('#menus_input').html('')
        _input.cart.forEach((menu) => {
            $('#menus_input').append(`
                <input type="text" name="menus[]" value="${menu.id}|${menu.amount}">
            `)
        })
    }

    function addDataoLocalStorage(data) {
        let _oldState = JSON.parse(localStorage.getItem('_state_reservation'))
        localStorage.setItem('_state_reservation', JSON.stringify({
            ..._oldState,
            ...data
        }))
    }

    function getDataFromLocalStorage() {
        return JSON.parse(localStorage.getItem('_state_reservation'))
    }

    // handle cart
    renderMenus()
    renderCartElement()
    function renderMenus(e) {
        $('#menu_container').html('')
        menus.filter((m) => m.name.match(new RegExp(`${e?.value ?? ''}`, 'gi'))).forEach((menu, index) => {
            $('#menu_container').append(`
            <div class="col-12 col-md-4 m-0 p-2">
                <div class="border rounded-lg h-100">
                    <img style="height: 128px; object-fit:cover;" src="/uploads/menus/${menu.image}"
                        class="card-img-top" alt="...">
                    <div class="p-2 d-flex flex-column">
                        <div class="mb-2">
                            <h5 class="card-title mb-0">
                                ${menu.name}
                            </h5>
                            <span>${menu.description}</span>
                            <br>
                            <span>${rupiah(menu.price)}</span>
                        </div>
                        <div class="d-flex gap-3 mt-auto">
                            <button onclick="addToCart('${menu.id}', '${menu.name}', '${menu.price}', '${menu.amount}')" href="#" class="btn btn-sm btn-primary">Tambah</button>
                            <input id="cart_amount_${menu.id}" type="number" min="1" value="1" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            `)
        })
    }

    function rupiah(num) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        }).format(num);
    }

    function caculateTax(tax, num) {
        return (num * (tax / 100)) + num
    }

    function renderCartElement(id='#cart_container', noDelete=false) {
        $(id).html('')
        totalPrice = 0
        cart.forEach((menu, index) => {
            totalPrice += parseInt(menu.price * menu.amount)
            $(id).append(
            `<li id="cart_menu_${menu.id}" data-id-menu="${menu.id}" class="list-group-item d-flex justify-content-between align-items-center lh-condensed p-0">
                <div class="col-12">
                    <div class="p-3 d-flex justify-content-between">
                        <div>
                            ${menu.name}
                            <br>
                            ${rupiah(menu.price)}
                        </div>
                        <span class="d-flex align-items-center">x ${menu.amount}</span>
                        </div>
                        ${!noDelete ? `
                            <div class="card-footer border-0 rounded-0 row m-0">
                                <button onclick="removeMenu(${index})" class="btn btn-sm col-12 btn-secondary"><i class="fa fa-trash"></i></button>
                            </div>
                        ` : ``}
                </div>
            </li>`)
        })
        addDataoLocalStorage({
            'cart': cart,
            'totalPrice': totalPrice
        });
        $("#total_price").html(rupiah(totalPrice))
    }

    function removeMenu(index) {
        cart.splice(index, 1)
        renderCartElement()
    }

    function addToCart(id, name, price, amount) {
        let menu = {
            id,
            name,
            price,
            amount
        }
        menu.amount = parseInt($(`#cart_amount_${menu.id}`).val())
        cart.push({
            ...menu
        })
        renderCartElement()
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanettic/public_html/resources/views/client/reservation.blade.php ENDPATH**/ ?>