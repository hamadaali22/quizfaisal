<div class="form-group">
    <label>Level</label>

    <select name="level_id" class="form-control">
        <option value="">Select Level</option>

        @foreach($levels as $level)

        <option value="{{ $level->id }}" {{ old('level_id',$instruction->level_id ?? '')==$level->id?'selected':'' }}>
            {{ $level->name }}
        </option>

        @endforeach
    </select>
</div>


<div class="form-group">
    <label>German</label>
    <textarea name="desc_de" class="form-control" rows="5">{{ old('desc_de',$instruction->desc_de ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Arabic</label>
    <textarea name="desc_ar" class="form-control" rows="5">{{ old('desc_ar',$instruction->desc_ar ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>English</label>
    <textarea name="desc_en" class="form-control" rows="5">{{ old('desc_en',$instruction->desc_en ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>French</label>
    <textarea name="desc_fr" class="form-control" rows="5">{{ old('desc_fr',$instruction->desc_fr ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Spanish</label>
    <textarea name="desc_es" class="form-control" rows="5">{{ old('desc_es',$instruction->desc_es ?? '') }}</textarea>
</div>

<button class="btn btn-success">
    Save
</button>