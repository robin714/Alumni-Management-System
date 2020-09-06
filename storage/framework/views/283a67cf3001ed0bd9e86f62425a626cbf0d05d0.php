<?php $__env->startPush('styles'); ?>
    <style>
        body{
            overflow-x: hidden;
        }
        .slide{
            position: relative;
        }
        .content{
            position: absolute;
            bottom: 70px;
            background-color: #000000;
            left: 100px;
            padding: 10px 40px;
            opacity: 0.7;
            color: #ffffff;
        }
        .content h2{
            font-size: 45px;
            font-weight: 900;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <section>
        <div class="container-fluid pr-0 pl-0">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carouselExampleIndicators" class="slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php echo e(asset('alumni/img/transport.png')); ?>" alt="First slide" height="400px" width="100%" />
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <h2>About Us</h2>
                        </div>
                    </div>
                </div>
        </div>
    </section>

     <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Our Future Plan</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, inventore!
                        Corrupti perspiciatis fuga molestiae sit maxime, maiores est facilis nesciunt tenetur
                        molestias repellendus itaque distinctio dolorem aliquam quod voluptatibus reiciendis
                        praesentium et libero eius necessitatibus porro iste ullam enim! Aut nulla animi reiciendis
                        blanditiis sed aliquam corporis voluptatem pariatur fuga culpa mollitia ipsum ducimus dolores
                        veniam consectetur explicabo deserunt, officia, facilis unde soluta! Ut aliquam consequatur fugit
                        laborum eligendi accusantium et architecto eos tempore! Reprehenderit quisquam consequuntur
                        error nesciunt nulla illum quae pariatur excepturi ut officia? Exercitationem soluta quis totam,
                        eaque animi et sit illum id doloremque, veniam harum est.</p>
                </div>
                <div class="col-md-6">
                    <h2>Our Goal</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Blanditiis perspiciatis rem id cum nostrum accusamus,
                        sit dolorum sed minima corporis dolor animi ipsam facilis
                        voluptatem modi? Quis minima magni, debitis quos qui ipsam,
                        dolorum, fugit dicta placeat alias fugiat repellendus. Tenetur
                        consequatur vero consectetur fugit nulla repellat quod, molestias
                        totam nemo iusto, ullam, explicabo illum laborum iste? Sapiente
                        quisquam dicta accusantium, ullam pariatur obcaecati ipsa vitae?
                        Accusantium, fugiat. A culpa porro suscipit optio, quam eveniet totam.
                        Eos ab, aperiam reprehenderit voluptatibus cum harum libero minus expedita
                        eveniet! Id eius modi quo neque provident reprehenderit voluptates libero molestias. Sit, pariatur possimus.</p>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('alumni.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ams/resources/views/alumni/about.blade.php ENDPATH**/ ?>