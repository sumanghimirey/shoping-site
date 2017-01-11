<tr>

    <td>
        <select name="page[]">
            @if (isset($pages))

                @foreach($pages as $page)

                    <option value="{{ $page->id }}">{{ $page->title }}</option>

                @endforeach

            @endif

        </select>
    </td>
    <td><input type="number" min="0" name="page_order[]"></td>
    <td>
        <div class="btn-group">

            <a href="javascript:void(0);" class="btn btn-xs btn-danger remove-btn">
                <i class="icon-trash bigger-120"></i>
            </a>
        </div>

    </td>
</tr>