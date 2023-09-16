<?php $this->view('templates/header.php', $data); ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><?= $data['subtitle']; ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php $this->view('templates/footer2.php') ?>