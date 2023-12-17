<table class="table table-bordered" id="myorder">
    <thead class="thead-dark text-center">
      <tr>
        <th style="width:5%;">Sl.No</th>
        <th style="width:15%;">#Invoice No</th>
        <th scope="col"> Sub Total</th>
        <th scope="col"> Dicount Amount</th>
        <th scope="col">Total Amount</th>
        <th scope="col">Date</th>
        <th scope="col">Order Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @php
            $count = 1;
        @endphp
        @foreach ($orders as $order)
        <tr>
            <th style="padding-left: 10px;"  > {{  $count++ }}</th>
            <th style="padding-left: 10px;"  ># {{ $order->invoice }}</th>
            <td style="padding-left: 10px;"> <span>&#2547;</span>{{ number_format($order->subtotal) }}</td>
            <td style="padding-left: 10px;" > <span>&#2547;</span> {{ number_format($order->copon_discount) }}</td>
            <td style="padding-left: 10px;"> <span>&#2547;</span> {{ number_format($order->total) }}</td>
            <td style="padding-left: 10px;">
                @php
                 $newtime = strtotime($order->created_at)
               @endphp
               {{ $order->time = date('d-M-Y',$newtime)}}
            </td>
            <td  class="text-center fs-1">
                @if($order->order_status=="1")
                  <p  class="badge badge-warning text-white">Pendding</p>
                @elseif ($order->order_status=="2")
                  <p  class="badge badge-primary text-white">Oreder Accept</p>
                @elseif ($order->order_status=="3")
                <p class="badge badge-success text-white">Oreder On The Way</p>
                @elseif($order->order_status=="4")
                 <p  class="badge badge-success text-white">Order Delivery Recived</p>
                 @elseif($order->order_status=="5")
                 <p  class="badge badge-danger text-white">Order Cancel</p>
                @endif
                 
            </td>
            <td style="padding-left: 10px;">
                <a href="{{ route('my.order.details',$order->id) }}" class="btn btn-success btn-sm">View Details</a>
                @if($order->order_status=="1" OR $order->order_status=="2")
                <a href="{{ route('my.order.cancel',$order->id) }}" class="btn btn-danger btn-sm">Cancel</a>
                @endif
            </td>
        </tr>
        @endforeach
  </table>