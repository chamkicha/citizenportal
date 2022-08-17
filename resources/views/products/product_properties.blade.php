
<table class="table table-striped" id="events-table">
    <tbody>
        @foreach($product_properties as $product_property)
        <tr>
            <td class="py-1">{{$loop->iteration}}</td>
            <td class="py-1">{{ $product_property->name }}</td><td class="py-1">

                <button type="button" class="btn btn-success btn-icon">
                <a href="{{ url('/products/view', $product_property->id) }}" style="color:white;"><i data-feather="eye"></i></a>
                </button> 


                <button type="button" class="btn btn-primary btn-icon">
                <a href="{{ url('/products/edit', $product_property->id) }}" style="color:white;"><i data-feather="edit"></i></a>
                </button> 

                <button type="button" class="btn btn-danger btn-icon">
                <a href="{{ url('/products/delete', $product_property->id) }}" style="color:white;"><i data-feather="delete"></i></a>
                </button> 

            </td>
        </tr>

        @endforeach
        
        
    </tbody>
    </table>