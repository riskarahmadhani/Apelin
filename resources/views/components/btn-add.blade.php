@props(['title'=>''])
<a {{ $attributes->merge([ 'class' => 'btn bg-lightblue']) }}>
    <i class="fas fa-plus mr-2"></i> Tambah {{ $title }}
</a>