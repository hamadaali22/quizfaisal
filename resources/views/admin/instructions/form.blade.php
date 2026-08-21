<div class="form-group">
    <label>Level</label>

    <select name="level_id" class="form-control">
        <option value="">Select Level</option>

        @foreach($levels as $level)

        <option value="{{ $level->id }}"
            class="{{ old('level_id',$instruction->level_id ?? '')==$level->id?'selected':'' }}">
            {{ $level->name }}
        </option>

        @endforeach
    </select>
</div>


<div class="form-group">
    <label>German</label>
    <textarea name="desc_de" id="ckeditor" class="form-control ckeditor"
        rows="5">{{ old('desc_de',$instruction->desc_de ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>exercise fr</label>
    <textarea name="exercise_fr" id="ckeditor" cols="30" rows="15"
        class="form-control ckeditor">{{ old('desc_de',$instruction->desc_de ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Arabic</label>
    <textarea name="desc_ar" id="ckeditor" class="form-control ckeditor"
        rows="5">{{ old('desc_ar',$instruction->desc_ar ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>English</label>
    <textarea name="desc_en" id="ckeditor" class="form-control ckeditor"
        rows="5">{{ old('desc_en',$instruction->desc_en ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>French</label>
    <textarea name="desc_fr" id="ckeditor" class="form-control ckeditor"
        rows="5">{{ old('desc_fr',$instruction->desc_fr ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Spanish</label>
    <textarea name="desc_es" id="ckeditor" class="form-control ckeditor"
        rows="5">{{ old('desc_es',$instruction->desc_es ?? '') }}</textarea>
</div>

<button class="btn btn-success">
    Save
</button>