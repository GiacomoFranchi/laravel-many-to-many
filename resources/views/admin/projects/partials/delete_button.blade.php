
<form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" class="d-inline-block" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-delete" type="submit" data-title="{{ $project->title }}">
      <i class="fa-solid fa-trash"></i>
    </button>
</form>