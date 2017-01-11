<tr>
    <td><input type="file" name="gallery_image[]"></td>
    <td><input type="text" name="gallery_image_alt_text[]"></td>
    <td><input type="text" name="gallery_image_caption[]"></td>
    <td><input type="number" min="1" max="9999" name="gallery_image_rank[]" value="9999"></td>
    <td>
        <select name="gallery_image_status[]" >
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </td>
    <td>
        <div class="btn-group">

            <a href="javascript:void(0);" class="btn btn-xs btn-danger remove-btn">
                <i class="icon-trash bigger-120"></i>
            </a>
        </div>

    </td>
</tr>