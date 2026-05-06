<div class="flex flex-wrap gap-4">
    @foreach($skills as $skill)
        <label class="flex items-center gap-2">
            <input type="checkbox" name="skills[]" value="{{ $skill->id }}">
            {{ $skill->name }}
        </label>
    @endforeach
</div>