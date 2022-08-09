@extends('front.layouts.master')
@section('title',"Nea Makri - İletişim")
@section('content')
<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2>İletişime Geçin!</h2>
                    <p>Aklınıza takılan soruları çekinmeden sorabilirsiniz, yol tarifi için aşağıdaki numaradan bizi arayabilirsiniz..</p>
                    <table>
                        <tbody>
                        <tr>
                            <td class="c-o">Adres:</td>
                            <td>Kayaköy, Fethiye / Muğla / Turkey</td>
                        </tr>
                        <tr>
                            <td class="c-o">Telefon:</td>
                            <td>(+90) 532 650 9657</td>
                        </tr>
                        <tr>
                            <td class="c-o">Email:</td>
                            <td>info@neamakri.com</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <br>
                <form method="post" action="{{route('contact.post')}}" class="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" placeholder="Adınız Soyadınız" name="name">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" placeholder="E-Mail" name="email">
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Mesajınız" name="message"></textarea>
                            <button type="submit">İletişime Geç</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12" align="center">
                <img src="{{asset('front/')}}/img/neamfooter.jpg" style="width:30%;" />
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection
