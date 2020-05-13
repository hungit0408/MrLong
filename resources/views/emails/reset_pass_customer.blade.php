<div><img src="{{ $message->embed(public_path() . '/img/logo/logo.png') }}" alt="" width="150"/></div>
<h3>Hi,{{$name}}</h3>
<p>We send you this link to help reset your password,plz click on this link to reset your password</p>
<a href="{{route('forgot_pass_link',['token'=>$token])}}" title="">Reset link</a>