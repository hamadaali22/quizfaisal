<div class="row education-cont image-answer1" id="image-answer1" style="background-color: #fff;border-bottom-color: red;padding: 10px;    margin: 24px;">
    <div class="form-group col-md-6 col-sm-6 ">
        <label>image A </label>
        <input type="file" name="image_a[]" id="bannerid" class="form-control" accept=".JPEG,.JPG,.TIF,.TIFF">
        @error('banner')
          <span class="text-danger">{{$message}}</span>
        @enderror
        <span id="bannerError" style="color: red;"></span>
    </div>
    <div class="form-group col-md-6 col-sm-6 ">
      <label>image B </label>
      <input type="file" name="image_b[]" id="bannerid" class="form-control" accept=".JPEG,.JPG,.TIF,.TIFF">
      @error('banner')
        <span class="text-danger">{{$message}}</span>
      @enderror
      <span id="bannerError" style="color: red;"></span>
    </div>                                    
</div>