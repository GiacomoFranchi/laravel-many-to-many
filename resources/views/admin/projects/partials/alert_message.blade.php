@if (Session::has('message'))
<div class="alert alert-success mt-2">
    {{ Session::get('message') }}
</div>
@endif