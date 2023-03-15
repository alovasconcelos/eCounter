@extends('template')

@section("content")
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <img src="/img/logo.png"><h3 class="mb-5">eCounter</h3>
            <form name="formLogin" method="post" action="/validaLogin">
                @csrf
                <div class="form-outline mb-4">
                <input type="text" id="ec_login" name="ec_login" class="form-control form-control-lg" placeholder="informe o seu login" readonly onfocus="this.removeAttribute('readonly');" onblur="this.setAttribute('readonly','');" />
                </div>

                <div class="form-outline mb-4">
                <input type="password" id="ec_senha" name="ec_senha" class="form-control form-control-lg" placeholder="informe a senha" readonly onfocus="this.removeAttribute('readonly');" onblur="this.setAttribute('readonly','');" />
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>
                <button class="btn btn-warning btn-lg btn-block" type="button" onclick="novoUsuario();">Criar conta</button>
            </form>
         </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
