<div class="form-group">
    <label>Page Name: <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control" placeholder="Enter home page name" value="{{ old('name', @$cms->name) }}">
    <span class="text-danger">{{ $errors->first('name') }}</span>
</div>
<div class="form-group">
    <label>Page Slug: <span class="text-danger">*</span></label>
    <input type="text" name="slug" class="form-control" placeholder="Enter home page slug" value="{{ old('slug', @$cms->slug) }}">
    <span class="text-danger">{{ $errors->first('slug') }}</span>
</div>
<div class="form-group">
    <label>Status: <span class="text-danger">*</span></label>
    <select class="form-control" name="status">
        <option value="0" {{ (old('status', @$cms->status) == 0) ? "selected" : "" }}>Disabled</option>
        <option value="1" {{ (old('status', @$cms->status) == 1) ? "selected" : "" }}>Enabled</option>
    </select>
    <span class="text-danger">{{ $errors->first('status') }}</span>
</div>