<?php $__env->startSection('main'); ?>
<div class="container pt-4">
    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="text-center">
        <h2>Rumah Sanetti</h2>
        <p class="text-justify" style="text-indent: 50px">Selamat datang di Rumah Sanetti! Kami adalah Retoran yang berkonsep keluarga dengan nuansa bangunan yang
            elegan dan minimalis. Di sini, kami menggabungkan cita rasa lezat dengan suasana yang hangat dan penuh
            keramahan.
            Menu kami menggugah selera dan mencakup berbagai hidangan yang dapat memanjakan lidah anda. Dari Pizza yang
            gurih hingga Spaghetti yang lezat, dari Sirloin yang juicy hingga Nasi Campur Legian yang autentik, kami
            menawarkan pilihan yang beragam untuk memuaskan selera makan anda. Jangan lupa untuk mencoba hidangan
            penutup kami yang menggoda seperti Strawberry Bread & Butter Pudding yang lembut dan minuman segar seperti
            Nutella Hazelnut Milkshake, Longan Fizz dan menu beragam lainnnya..
        </p>
        <p class="text-justify" style="text-indent: 50px;">
            Kami juga menghadirkan atmosfer yang menyenangkan dengan Live Music yang akan menghibur anda saat
            menikmati hidangan dari Rumah Sanetti. Kami selalu berusaha memberikan tempat yang nyaman bagi pelanggan
            kami untuk berkumpul, bersantai, dan menikmati hidangan dengan kerabat dan teman-teman terdekat.

            Rumah Sanetti buka mulai pukul 08:00 hingga 22:00, sehingga anda dapat menikmati hidangan kami sepanjang
            hari. Kami berkomitmen untuk memberikan pelayanan terbaik kepada para pelanggan, karena kepuasan pelanggan
            adalah prioritas kami.
            Jadi, tunggu apa lagi? Kunjungi Rumah Sanetti sekarang dan temukan pengalaman kuliner yang menggugah selera
            di tempat yang penuh kehangatan dan keceriaan. Nikmati makanan lezat, hiburan live music, dan suasana yang
            menyenangkan bersama kami. Ayo, jadikan Rumah Sanetti sebagai tempat berkumpul dan menciptakan momen tak
            terlupakan bersama orang terkasih.
        </p>
    </div>
    <div class="text-center mt-5">
        <h2 class="pt-4">Information</h2>
        <div class="row my-4 justify-content-center">
            <?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div data-aos="zoom-in-up" class="col-12 col-md-6 mb-3">
                    <div class="card shadow ">
                        <img src="<?php echo e('/uploads/informations/'.$data['image']); ?>"
                            class="card-img-top rounded-5 img-fluid" style="height: 300px; object-fit:cover; " alt="...">
                        <div class="card-body bg-batik1">
                            <div class="bg-white p-4">
                                <h5 class="card-title"><b><?php echo e($data['title']); ?></b></h5>
                                <p class="fw-light"><b><?php echo e($data['description']); ?></b></p>
                                <a target="_blank" class="btn btn-primary text-center"
                                    href="<?php echo e('/uploads/informations/'.$data['file']); ?>">Discover</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="text-center mt-5">
        <h2 class="pt-4">Additional Offers</h2>
        <div class="row my-4 justify-content-center">
            <?php $__currentLoopData = $aditionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div data-aos="zoom-in-right" class="col-12 col-md-4 mb-3">
                    <div class="card shadow">
                        <img src="<?php echo e('/uploads/aditionalOffers/'.$item['image']); ?>"
                            style="height:300px;object-fit: cover" class="card-img-top img-fluid" alt="...">
                        <div class="card-body bg-batik1">
                            <div class="bg-white p-4">
                                <h5 class="card-title"><b><?php echo e($item['title']); ?></b></h5>
                                <p class="fw-light"><b><?php echo e($item['description']); ?></b></p>
                                <a href="/offers-detail/<?php echo e($item['slug']); ?>"
                                    class="btn btn-primary text-center">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sanettic/public_html/resources/views/client/index.blade.php ENDPATH**/ ?>