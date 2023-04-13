<div>
    <p>Customer name: {{$customer_name}}</p>
    <p>Customer address: {{$customer_address}}</p>
    <p>Customer phone: {{$customer_phone}}</p>
    <p>Order method: {{$method}}</p>
    <p>Status: {{$status}}</p>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Pet Name</th>
                <th>Qty</th>
                <th>Per Price</th>
            </tr>
        </thead>
        <tbody>
            @for ($i =0; $i<count($list_pet);$i++)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$list_pet[$i]->Product->product_name}}</td>
                    <td>{{$list_pet[$i]->qty}}</td>
                    <td>{{$list_pet[$i]->Product->per_price}}</td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>