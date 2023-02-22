@props(['name'])
<form method="GET" class="ml-auto">
    <div class="input-group">
        <input type="text" name="{{ $name }}" value="<?=request()->input($name) ?>" class="form-control" placeholder="Search...">
        <div class="input-group-append">
            <button type="submit" class="btn bg-lightblue">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>