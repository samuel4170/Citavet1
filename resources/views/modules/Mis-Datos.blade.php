@extends('template')
@section('content-logged-in')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Mis Datos Personales</h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <form method="post">

                        @csrf
                        @method('put')

                        <div class="row">

                            <div class="col-md-6 col-xs-12">

                                <h2>Nombre y Apellido</h2>
                                <input type="text" class="input-lg" name="name" id="nameInput" value="{{ auth()->user()->name }}">
                                <p id="error" style="color: red;"></p>
                            
                                <script>
                                    const nameInput = document.getElementById("nameInput");
                                    const errorElement = document.getElementById("error");
                            
                                    nameInput.addEventListener("input", function() {
                                        const regex = /^[A-Za-z\s]+$/;
                                        const inputValue = nameInput.value;
                            
                                        if (!regex.test(inputValue)) {
                                            errorElement.textContent = "El nombre y apellido solo pueden contener letras y espacios.";
                                        } else {
                                            errorElement.textContent = "";
                                        }
                                    });
                            
                                    nameInput.addEventListener("blur", function() {
                                        if (errorElement.textContent === "El nombre y apellido solo pueden contener letras y espacios.") {
                                            nameInput.value = nameInput.value.replace(/[^A-Za-z\s]/g, "");
                                            errorElement.textContent = "";
                                        }
                                    });
                                </script>
                                <h2>Email</h2>
                                <input type="text" class="input-lg" name="email" value="{{ auth()->user()->email }}">

                                @error('email')
                                    <p class="alert alert-danger">El email ya existe</p>
                                @enderror   

                                <h2>Nueva Contraseña</h2>
                                <input type="text" class="input-lg" name="passwordN" value="">
                                
                            </div>


                            {{--  --}}

                            <div class="col-md-6 col-xs-12">

                                <h2>Documento</h2>
                                <input type="text" class="input-lg" name="document" id="documentInput" value="{{ auth()->user()->document }}">
                                <p id="documentError" style="color: red;"></p>
                                
                                <script>
                                    const documentInput = document.getElementById("documentInput");
                                    const documentError = document.getElementById("documentError");
                                
                                    documentInput.addEventListener("input", function() {
                                        const regex = /^\d{13}$/;
                                        const inputValue = documentInput.value;
                                
                                        if (!regex.test(inputValue)) {
                                            documentError.textContent = "El DPI debe contener exactamente 13 números.";
                                        } else {
                                            documentError.textContent = "";
                                        }
                                    });
                                
                                    documentInput.addEventListener("blur", function() {
                                        if (documentError.textContent === "El documento debe contener exactamente 13 números.") {
                                            const numericValue = documentInput.value.replace(/\D/g, ""); // Eliminar no números
                                            documentInput.value = numericValue;
                                            documentError.textContent = "";
                                        }
                                    });
                                </script>
                                
                                <h2>Teléfono</h2>
                                <input type="text" class="input-lg" name="phone" id="phoneInput" value="{{ auth()->user()->phone }}">
                                <p id="phoneError" style="color: red;"></p>
                                
                                <script>
                                    const phoneInput = document.getElementById("phoneInput");
                                    const phoneError = document.getElementById("phoneError");
                                
                                    phoneInput.addEventListener("input", function() {
                                        const regex = /^\d{8}$/;
                                        const inputValue = phoneInput.value;
                                
                                        if (!regex.test(inputValue)) {
                                            phoneError.textContent = "El teléfono debe contener exactamente 8 números.";
                                        } else {
                                            phoneError.textContent = "";
                                        }
                                    });
                                
                                    phoneInput.addEventListener("blur", function() {
                                        if (phoneError.textContent === "El teléfono debe contener exactamente 8 números.") {
                                            const numericValue = phoneInput.value.replace(/\D/g, ""); // Eliminar no números
                                            phoneInput.value = numericValue;
                                            phoneError.textContent = "";
                                        }
                                    });
                                </script>
                                
                                <br><br><br>

                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
