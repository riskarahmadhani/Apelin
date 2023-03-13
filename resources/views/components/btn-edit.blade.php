@props(['title'=>''])
<a {{ $attributes->merge(['class'=>'btn bg-lightblue']) }}>
    <i class="fas fa-edit mr-2"></i>Edit {{ $title }}
</a>