 <tr>
        <td><p style="color:red;">{{$feature->features}}</p></td>
        <td>0</td>

        <td>
            <a category-id="{{$feature->id}}" class="btn btn-sm btn-primary edit-click"><i class="fa fa-edit text-white"></i></a>
            @if($feature->id != 1)
                <a category-id="{{$feature->id}}"  class="btn btn-sm btn-danger remove-click"><i class="fa fa-times text-white"></i></a>
            @endif
        </td>
    </tr>
