<div class="form-group">
    <label>Page: <span class="text-danger">*</span></label>
    <select class="form-control form-control-select2" id="page_name" data-fouc name="page">
        <option value="0">Select Page</option>
        @if(count($pages) > 0)
            @foreach($pages as $key => $page)
                <option value="{{ $key }}" {{ ($key == old('page',@$page_setting->page)) ? "selected" : "" }}>{{ $page }}</option>
            @endforeach
        @endif
    </select>
    <span class="text-danger">{{ $errors->first('page') }}</span>
</div>
<div class="form-group">
    <label>Title:</label>
    <input type="text" name="title" class="form-control" placeholder="Enter home page title" value="{{ old('title', @$page_setting->title) }}">
</div>
<div class="form-group">
    <label>Short Description:</label>
    <input type="text" name="short_description" class="form-control" placeholder="Enter short description" value="{{ old('short_description', @$page_setting->short_description) }}">
    <span class="text-danger">{{ $errors->first('short_description') }}</span>
</div>