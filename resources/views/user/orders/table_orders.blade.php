<h4>Orders</h4>
<div class="table-responsive">
    <button id="pay-button" class="btn btn-warning px-5 mt-3" data-bs-target="#exampleModalToggle"
        data-bs-toggle="modal">Beli</button>
    {{-- <table class="table table-striped table-sm">
    <thead class="">
      <tr>
        <th scope="col">Item</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total Price</th>
        <th scope="col">Date Transaction</th>
        <th scope="col">Update at</th>
        <th scope="col">Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody class="">
      @foreach ($orders as $order)
        <tr>
          <td class="py-3"><a class="link-dark" href="/products/show/{{ $order->item->id }}">{{ mb_strimwidth($order->item->name, 0, 60, "...") }}</a></td>
          <td class="py-3">{{ $order->quantity }}</td>
          @php
            $totalPrice = $order->item->price * $order->quantity;
            @endphp
          <td class="py-3">Rp{{ number_format($totalPrice,2, ',', '.') }}</td>
          <td class="py-3">{{ $order->created_at }}</td>
          <td class="py-3">{{ $order->updated_at }}</td>
          @if ($order->status == '2') 
            <th class="py-3 text-success">{{ $order->status }}</th>
          @elseif (($order->status == '1') )
            <th class="py-3 text-dark">{{ $order->status }}</th>
          @else
            <th class="py-3 text-danger">{{ $order->status }}</th>
          @endif
        </tr>
      @endforeach

    </tbody>
  </table>
    @if ($orders->hasPages())
      <div class="card-footer">
        {{ $orders->links() }}
      </div>
    @endif --}}
</div>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
        // Also, use the embedId that you defined in the div above, here.
        window.snap.embed('{{ $snapToken }}', {
            embedId: 'snap-container',
            onSuccess: function(result) {
                /* You may add your own implementation here */
                alert("payment success!");
                console.log(result);
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function(result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        });
    });
</script>
