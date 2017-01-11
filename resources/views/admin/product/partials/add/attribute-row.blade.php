<tr>
    <td>
        <select name="attribute_group[]">
            @if ($attribute_groups->count() > 0))
                @foreach($attribute_groups as $attribute_group)
                    <option value="{{ $attribute_group->id }}">{{ $attribute_group->title }}</option>
                    @endforeach
                @else
                    <option value="0">No Attribute Group</option>
            @endif
        </select>
    </td>
    <td>
        <select name="attribute[]">
            @if ($attributes->count() > 0))
            @foreach($attributes as $attribute)
                <option value="{{ $attribute->id }}">{{ $attribute->title }}</option>
            @endforeach
            @else
                <option value="0">No Attribute</option>
            @endif
        </select>
    </td>
    <td><input type="text" name="value[]"></td>
    <td>
        <div class="btn-group">

            <a href="javascript:void(0);" class="btn btn-xs btn-danger remove-btn">
                <i class="icon-trash bigger-120"></i>
            </a>
        </div>

    </td>
</tr>