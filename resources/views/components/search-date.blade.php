<form action="?" method="get" class="ml-auto">
    <div class="input-group">

        <input type="date" name="tanggal" class="form-control" placeholder="Cari..." value="<?= request()->tanggal ?>">

        <input type="text" name="search" class="form-control" placeholder="Cari..." value="<?= request()->search ?>">

        <div class="input-group-append">
            <button class="btn bg-lightblue" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>

    </div>
</form>
