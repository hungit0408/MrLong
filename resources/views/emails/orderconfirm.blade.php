<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

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
        <td valign="top"><img src="{{ $message->embed(public_path() . '/img/logo/logo.png') }}" alt="" width="150"/></td>
        <td align="right">
            <h3>ORIANIA</h3>
            <pre>
                ORIANIA
                183 Cau Giay, Dong Da, Ha Noi, Viet Nam
                Tax ID :113566185
                phone :0123456789
                fax:01234567989
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>From:</strong> ORIANI CO.,LTD</td>
        <td><strong>To:</strong> {{$customer->name}}</td>
    </tr>
    <tr>
        <td colspan="2">ORDER ID : <a href="{{route('Vieworder',['id'=>$order->id])}}" title="">{{$order->id}}</a>-> You can click this to view your order</td>
    </tr>
    <tr>
        <td colspan="2">Dear valued customer, Thank you for your order! This is confirmation that we have received your order as show below:</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>TT</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1; ?>

      @foreach(session('cart') as $product)
   
      <tr>
        <th scope="row">{{$num}}</th>
        <td>{{$product['name']}}</td>
        <td align="right">{{$product['quantity']}}</td>
        <td align="right">{{$product['price']}}</td>
        <td align="right">{{$product['quantity']*$product['price']}}</td>
        <?php $num++ ?>
      </tr>
      @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal $</td>
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

  <table>
      <thead>
          <tr>
              <th><strong>Questions about your order? Don’t hesitate to contact us at info@yourcompanyltd.com, or call us at 303-555-5555</strong></th>
          </tr>
      </thead>
      <br>
      <tbody>
          <tr>
              <td><strong>ORIANIA Company Ltd.</strong></td>
          </tr>
          <tr>
              <td>189 Cau Giay</td>
          </tr>
          <tr>
              <td>Dong Da, Ha Noi</td>
          </tr>
          <tr>
              <td>01234567989</td>
          </tr>
          <tr>
              <td>info@oriania.com</td>
          </tr>
      </tbody>
  </table>

</body>
</html>