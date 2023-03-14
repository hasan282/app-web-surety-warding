<?= $this->extend('template/page_login'); ?>

<?= $this->section('login_box'); ?>

<a href="/" class="link-transparent">
    <div class="mx-auto mb-2" style="max-width:300px">
        <img class="img-fluid" src="/image/icon/jis_suretybond.png" alt="">
    </div>
</a>
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Login untuk memulai sesi Anda</p>
        <form method="POST">
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
                <div class="col-4">
                    <!-- <button type="submit" class="btn btn-primary btn-block">Sign In</button> -->
                    <a href="/dashboard" type="submit" class="btn btn-primary btn-block">Sign In</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>