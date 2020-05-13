<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bill</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="{{url('/')}}/public/img/logo/logo.png" alt="" width="150"/></td>
        <td align="right">
            <h3>ORIANIA Shop</h3>
            <pre>
                ORIANIA
                189 Cau Giay, Ha Noi, Viet Nam
                ID :113566185
                phone :0123456789
                fax:012345679=89
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>From:</strong> ORIANI CO.,LTD</td>
        <td><strong>To:</strong> {{$customer->name}}</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>TT</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price (VND)</th>
        <th>Total (VND)</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1; ?>
      @foreach($products as $product)
      <tr>
        <?php 
            $prod=product_id($product['product_id']); 
        ?>
        <th scope="row">{{$num}}</th>
        <td>{{$prod['name']}}</td>
        <td align="right">{{$product->quantity}}</td>
        <td align="right">{{$product->price}}</td>
        <td align="right">{{$product->quantity*$product->price}}VND</td>
        <?php $num++ ?>
      </tr>
      @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal VND</td>
            <td align="right">{{cart_value($products)}}</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">VAT</td>
            <td align="right">0</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total VND</td>
            <td align="right" class="gray">{{cart_value($products)}}VND</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>