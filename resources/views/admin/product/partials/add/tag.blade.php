
<div class="space-4"></div>

<div class="form-group">
    <a href="javascript:void(0);" id="check-all-tag">Check All</a> | <a href="javascript:void(0);" id="un-check-all-tag">Un Check All</a>

</div>


@if(isset($data['tag']) && $data['tag']->count() > 0)
    @foreach($data['tag'] as $tag)
        <div class="form-group col-sm-3">
            <label>
                <input type="checkbox" id="tag[]" name="tag[]" value="{{ $tag->id }}">
                <span class="lbl"> {{ $tag->title }}</span>
            </label>
        </div>
    @endforeach
    @endif
