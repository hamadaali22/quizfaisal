
<script src="{{ asset('admin/vendors/js/editors/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/scripts/editors/editor-ckeditor.js') }}" type="text/javascript"></script>

<div class="container-fluid px-0">

    {{-- Level --}}
    <div class="card mb-2">
        <div class="card-header">
            <h4 class="card-title mb-0">General Information</h4>
        </div>

        <div class="card-body">
            <div class="form-group mb-0">
                <label for="level_id">Level <span class="text-danger">*</span></label>

                <select name="level_id" id="level_id" class="form-control">
                    <option value="">Select Level</option>

                    @foreach($levels as $level)
                        <option value="{{ $level->id }}"
                            {{ old('level_id', $instruction->level_id ?? '') == $level->id ? 'selected' : '' }}>
                            {{ $level->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>


    {{-- Titles --}}
    <div class="card mb-2">
        <div class="card-header">
            <h4 class="card-title mb-0">Titles</h4>
            <small class="text-muted">Enter the title in each language.</small>
        </div>

        <div class="card-body">
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="title_de">German (DE)</label>
                    <input type="text" id="title_de" name="title_de"
                        class="form-control"
                        value="{{ old('title_de', $_item->title_de ?? '') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="title_ar">Arabic (AR)</label>
                    <input type="text" id="title_ar" name="title_ar"
                        class="form-control"
                        value="{{ old('title_ar', $_item->title_ar ?? '') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="title_en">English (EN)</label>
                    <input type="text" id="title_en" name="title_en"
                        class="form-control"
                        value="{{ old('title_en', $_item->title_en ?? '') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="title_fr">French (FR)</label>
                    <input type="text" id="title_fr" name="title_fr"
                        class="form-control"
                        value="{{ old('title_fr', $_item->title_fr ?? '') }}">
                </div>

                <div class="form-group col-md-6 mb-0">
                    <label for="title_es">Spanish (ES)</label>
                    <input type="text" id="title_es" name="title_es"
                        class="form-control"
                        value="{{ old('title_es', $_item->title_es ?? '') }}">
                </div>

            </div>
        </div>
    </div>


    {{-- Slugs --}}
    <div class="card mb-2">
        <div class="card-header">
            <h4 class="card-title mb-0">Slugs</h4>
            <small class="text-muted">Enter the URL slug for each language.</small>
        </div>

        <div class="card-body">
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="slug_de">German (DE)</label>
                    <input type="text" id="slug_de" name="slug_de"
                        class="form-control"
                        value="{{ old('slug_de', $_item->slug_de ?? '') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="slug_ar">Arabic (AR)</label>
                    <input type="text" id="slug_ar" name="slug_ar"
                        class="form-control"
                        value="{{ old('slug_ar', $_item->slug_ar ?? '') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="slug_en">English (EN)</label>
                    <input type="text" id="slug_en" name="slug_en"
                        class="form-control"
                        value="{{ old('slug_en', $_item->slug_en ?? '') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="slug_fr">French (FR)</label>
                    <input type="text" id="slug_fr" name="slug_fr"
                        class="form-control"
                        value="{{ old('slug_fr', $_item->slug_fr ?? '') }}">
                </div>

                <div class="form-group col-md-6 mb-0">
                    <label for="slug_es">Spanish (ES)</label>
                    <input type="text" id="slug_es" name="slug_es"
                        class="form-control"
                        value="{{ old('slug_es', $_item->slug_es ?? '') }}">
                </div>

            </div>
        </div>
    </div>


    {{-- Descriptions --}}
    <div class="card mb-3">
        <div class="card-header">
            <h4 class="card-title mb-0">Descriptions</h4>
            <small class="text-muted">Write the instructions in each language.</small>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label for="desc_de">German (DE)</label>
                <textarea name="desc_de" id="desc_de"
                    class="form-control ckeditor"
                    rows="5">{{ old('desc_de', $instruction->desc_de ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="desc_ar">Arabic (AR)</label>
                <textarea name="desc_ar" id="desc_ar"
                    class="form-control ckeditor"
                    rows="5">{{ old('desc_ar', $instruction->desc_ar ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="desc_en">English (EN)</label>
                <textarea name="desc_en" id="desc_en"
                    class="form-control ckeditor"
                    rows="5">{{ old('desc_en', $instruction->desc_en ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="desc_fr">French (FR)</label>
                <textarea name="desc_fr" id="desc_fr"
                    class="form-control ckeditor"
                    rows="5">{{ old('desc_fr', $instruction->desc_fr ?? '') }}</textarea>
            </div>

            <div class="form-group mb-0">
                <label for="desc_es">Spanish (ES)</label>
                <textarea name="desc_es" id="desc_es"
                    class="form-control ckeditor"
                    rows="5">{{ old('desc_es', $instruction->desc_es ?? '') }}</textarea>
            </div>

        </div>
    </div>


    {{-- Save --}}
    <div class="d-flex justify-content-end mb-2">
        <button type="submit" class="btn btn-success px-4">
            <i class="la la-save"></i>
            Save
        </button>
    </div>

</div>