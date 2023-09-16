<?php $this->view('templates/header.php', $data); ?>
<main class="content">
    <div class="container-fluid p-0">


        <div class="d-flex justify-content-between">
            <h1 class="h3 mb-3"> <?= strtoupper($data['subtitle']); ?></h1>
            <div class="">
                <button type="button" class=" btn btn-success shadow me-3 fw-bold" data-bs-toggle="modal" data-bs-target="#addmo">+ Header </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="hme" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama </th>
                                        <th>Deskripsi</th>
                                        <th>urutan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['sql'] as $no => $row) : ?>
                                        <tr>
                                            <td><?= $row->nama_header; ?></td>
                                            <td><?= $row->deskripsi; ?></td>
                                            <td>
                                                <?= $row->urutan; ?>
                                            </td>
                                            <td>
                                                <button type="button">edit</button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>


<!-- modal -->
<div class="modal fade" id="addmo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Header Menu </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Header</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Urutan</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $this->view('templates/buildJS.php') ?>
<script>
    $(document).ready(function() {
        // var table = $('#example').DataTable({
        //     lengthChange: false,
        //     buttons: ['copy', 'excel', 'pdf', 'colvis']
        // });

        new DataTable('#hme');
    })
</script>
<?php $this->view('templates/footer.php') ?>