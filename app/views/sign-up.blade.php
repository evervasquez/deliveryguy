@extends("layout")

@section('content')
<div class="container">

        <div class="row">
        <br/>
                            <!--/panel content-->
                           
              <section class="register">
                  <article class="register__tab">
                    <ul class="register__list">
                        <li class="register__item register__itemRes"><a id="register__restaurant" class="register__link register__link--white  register__link--jsRest"  href=""><i class=" register__link--margin fa fa-motorcycle"></i><span>Registro Restaurant</span></a></li>
                        <li class="register__item  register__itemEmplo"><a id="register__employee" class="register__link register__link--jsEmployee" href=""><i class="register__link--margin fa fa-cutlery"></i><span>Registro DeliveryGuy</span></a></li>
                    </ul>
                  </article>

                  <article class="register__form">
                    <h2 class="register__title">registro DeliveryGuy</h2>
                            

                    <a class="register__google fa fa-google-plus-square" href=""><span>Google</span></a>
                    <a class="register__facebook fa fa-facebook" href=""><span>Facebook</span></a>
                    <br>
                    <span>OR</span>
                    <hr>



                 {{ Form::open(array('route' => 'employee.sign-up','class'=> 'form form-vertical','id' => 'employee-form','role'=>'form')) }}
                        <label class="register__titleFirstName"><span class="register__titleInput text-danger">*</span> First Name</label>
                        <div class="register__contInput controls input-group ">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" required name="first_name" class="form-control register__input form-control">
                            {{ $errors->first('first_name','<p class="error_message">:message</p>') }}
                        </div>
                        <label class="register__titleInput">Last Name</label>
                        <div class="register__contInput controls">
                            <span class="input-group-addon"><i class="fa fa-user  fa-fw"></i></span>
                            <input type="text" required name="last_name" class="register__input form-control"
                                   >
                            {{ $errors->first('last_name','<p class="error_message">:message</p>') }}
                        </div>
                        <label class="register__titleInput">Email</label>
                        <div class="register__contInput controls">
                             <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                            <input type="email" name="email" required class="register__input form-control"
                                  >
                            {{ $errors->first('email','<p class="error_message">:message</p>') }}
                        </div>
                       <div class="right send">
                          <button type="submit" class="register__btnSend btn btn-primary"><i class="fa fa-chevron-circle-right"></i>
                                      Enviar
                          </button>
                        
                          <a href="{{URL::previous()}}" class="register__btnCancel fa fa-times btn btn-danger">
                                      Cancelar
                          </a>
                        </div>
                {{ Form::close() }} 


                  </article>  



              <article class="register__resta">
                    <h2 class="register__title">registro Restaurant</h2>

                    <a class="register__google fa fa-google-plus-square" href=""><span>Google</span></a>
                    <a class="register__facebook fa fa-facebook" href=""><span>Facebook</span></a>
                     <br>
                     <span>OR</span>
                     <hr>

                 {{ Form::open(array('route' => 'employee.sign-up','class'=> 'form form-vertical','id' => 'employee-form','role'=>'form')) }}
                        <label class="register__titleFirstName"><span class="register__titleInput text-danger">*</span>Razon Social</label>
                        <div class="register__contInput controls input-group ">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" required name="first_name" class="form-control register__input form-control">
                            {{ $errors->first('first_name','<p class="error_message">:message</p>') }}
                        </div>
                        <label class="register__titleInput">Direccion</label>
                        <div class="register__contInput controls">
                            <span class="input-group-addon"><i class="fa fa-user  fa-fw"></i></span>
                            <input type="text" required name="last_name" class="register__input form-control"
                                   >
                            {{ $errors->first('last_name','<p class="error_message">:message</p>') }}
                        </div>
                        <label class="register__titleInput">Email</label>
                        <div class="register__contInput controls">
                             <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                            <input type="email" name="email" required class="register__input form-control"
                                  >
                            {{ $errors->first('email','<p class="error_message">:message</p>') }}
                        </div>
                       <div class="right send">
                          <button type="submit" class="register__btnSend btn btn-primary"><i class="fa fa-chevron-circle-right"></i>
                                      Enviar
                          </button>
                        
                          <a href="{{URL::previous()}}" class="register__btnCancel fa fa-times btn btn-danger">
                                      Cancelar
                          </a>
                        </div>
                {{ Form::close() }} 


                  </article>  



              </section>                  

            @overwrite





                      

