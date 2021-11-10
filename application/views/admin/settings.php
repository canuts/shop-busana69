<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Settings web</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Settings web</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Default</h3>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form action="<?= base_url() ?>settings/update" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta title</label>
                                            <input type="text" class="form-control" name="title" value="<?= $awb->title ?>" required>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Meta deskripsi</label>
                                            <textarea name="description" class="form-control" cols="30" rows="5" required><?= $awb->description; ?></textarea>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta keyword</label>
                                            <textarea name="keyword" class="form-control" cols="30" rows="5" required><?= $awb->keyword; ?></textarea>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Nohp</label>
                                            <input type="text" name="nohp" class="form-control" value="<?= $awb->nohp ?>" required>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control" cols="30" rows="5" required><?= $awb->alamat; ?></textarea>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="<?= $awb->email ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Logo Hitam</label>
                                            <img src="<?= base_url() ?>/assets/img/<?= $awb->logo_dark ?>">
                                            <input type="file" name="logo_dark" class="form-control">
                                            <small>178x62</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" value="<?= $awb->username ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="password" class="form-control" value="<?= $awb->password ?>">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Copyright</label>
                                            <input type="text" class="form-control" name="copyright" value="<?= $awb->copyright ?>" required>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Url</label>
                                            <input type="text" name="url" class="form-control" value="<?= $awb->url ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama web</label>
                                            <input type="text" name="nama_site" class="form-control" value="<?= $awb->nama_site ?>" required>
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <label>Logo putih</label>
                                            <img src="<?= base_url() ?>/assets/img/<?= $awb->logo_white ?>">
                                            <input type="file" name="logo_white" class="form-control">
                                            <small>164x58</small>
                                        </div>

                                    </div>
                                    <!-- /.col -->

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- /.card-body -->
                        <!-- <div class="card-footer">
                            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                            the plugin.
                        </div> -->
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->