<div>
    <form action="{{ route('update', ['id' => $id, 'type' => $type]) }}" method="POST">
        @csrf
        @method('PUT')
        
            @switch($type)
                @case(1)
                    {{-- Countries --}}
                    <div class="mb-4">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Escribe el nombre" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(2)
                    {{-- Cities --}}
                    <div class="mb-4">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Escribe el nombre" value="{{ $information->name }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <label for="citiesSelect" class="form-label">Paises</label>
                        <select class="form-select" id="country_id">
                            <option selected>Selecciona un país</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country['id'] }}" {{ $country["id"] == $information->country_id ? 'selected' : '' }}>{{ $country['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            value="1" {{ old('status', $information->status == 1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(3)
                    {{-- Roles --}}
                    <div class="mb-4">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Escribe el nombre" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(4)
                    {{-- Users --}}
                    <div class="mb-4">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Escribe el nombre" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="last_name" class="form-label">Apellidos</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                            name="last_name" placeholder="Escribe el nombre" value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="birthday" class="form-label">Cumpleaños</label>
                        <input type="date" class="form-control" id="birthday" name="birthday">
                        @error('birthday')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="cellphone" class="form-label">Celular</label>
                        <input type="text" class="form-control @error('cellphone') is-invalid @enderror"
                            id="cellphone" name="cellphone" placeholder="Escribe el número de celular"
                            value="{{ old('cellphone') }}" required>
                        @error('cellphone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Escribe el correo electronico" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" placeholder="Escribe la dirección de residencia" value="{{ old('address') }}"
                            required>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="neightboarhood" class="form-label">Barrio</label>
                        <input type="text" class="form-control @error('neightboarhood') is-invalid @enderror"
                            id="neightboarhood" name="neightboarhood" placeholder="Escribe el barrio de la residencia"
                            value="{{ old('neightboarhood') }}" required>
                        @error('neightboarhood')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Ingrese la contraseña a asignar al usuario"
                            value="{{ old('password') }}" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <label for="city_id" class="form-label">Ciudades</label>
                        <select class="form-select" id="city_id">
                            <option selected>Selecciona una ciudad</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check form-switch mb-4">
                        <label for="role_id" class="form-label">Roles</label>
                        <select class="form-select" id="role_id">
                            <option selected>Selecciona un rol</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(5)
                    {{-- Tables --}}
                    <div class="mb-4">
                        <label for="table" class="form-label">Mesa</label>
                        <input type="text" class="form-control @error('table') is-invalid @enderror" id="table"
                            name="table" placeholder="Ingrese el nombre de la mesa" value="{{ old('table') }}"
                            required>
                        @error('table')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="number" class="form-label">Número Mesa</label>
                        <input type="text" class="form-control @error('number') is-invalid @enderror" id="number"
                            name="number" placeholder="Ingrese el número de la mesa" value="{{ old('number') }}"
                            required>
                        @error('number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(6)
                    {{-- Inventary --}}
                    <div class="form-check form-switch mb-4">
                        <label for="product_id" class="form-label">Productos</label>
                        <select class="form-select" id="product_id">
                            <option selected>Seleccione un producto</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check form-switch mb-4">
                        <label for="supplier_id" class="form-label">Proveedor</label>
                        <select class="form-select" id="supplier_id">
                            <option selected>Seleccione el proveedor</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="amont" class="form-label">Cantidad</label>
                        <input type="integer" class="form-control @error('amont') is-invalid @enderror" id="amont"
                            name="amont" placeholder="Ingrese la cantidad" value="{{ old('amont') }}" required>
                        @error('amont')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="prize" class="form-label">Precio</label>
                        <input type="integer" class="form-control @error('prize') is-invalid @enderror" id="prize"
                            name="prize" placeholder="Ingrese el precio" value="{{ old('prize') }}" required>
                        @error('prize')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(7)
                    {{-- Entries --}}
                    <div class="mb-4">
                        <label for="cash_inflow" class="form-label">Ingreso</label>
                        <input type="integer" class="form-control @error('cash_inflow') is-invalid @enderror"
                            id="cash_inflow" name="cash_inflow" placeholder="Ingrese el pago"
                            value="{{ old('cash_inflow') }}" required>
                        @error('cash_inflow')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            placeholder="Ingrese la descripción del pago" rows="4" required>{{ old('description') }}
                                    </textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <label for="user_id" class="form-label">Quien Registra el pago:</label>
                        <select class="form-select" id="user_id">
                            <option selected>Seleccione la persona</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} {{ $user->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="date_entry" class="form-label">Fecha de Pago</label>
                        <input type="date" class="form-control @error('date_entry') is-invalid @enderror"
                            id="date_entry" name="date_entry" value="{{ old('date_entry') }}" required>
                        @error('date_entry')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(8)
                    {{-- payments --}}
                    <div class="mb-4">
                        <label for="amount" class="form-label">Cobro</label>
                        <input type="integer" class="form-control @error('amount') is-invalid @enderror"
                            id="amount" name="amount" placeholder="Ingrese el pago"
                            value="{{ $information->amount }}" required>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            placeholder="Ingrese la descripción del pago" rows="4" required>{{ $information->description }}
                                    </textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <label for="user_id" class="form-label">Quien Registra el cobro:</label>
                        <select class="form-select" id="user_id">
                            <option selected>Seleccione la persona</option>
                            @foreach ($users as $user)
                                <option value="{{ $user["id"] }}" {{ $information->user_id == $user["id"] ? 'selected' : '' }} >{{ $user["name"] }} {{ $user["last_name"] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="transaction_Date" class="form-label">Fecha de Pago</label>
                        <input type="date" class="form-control @error('transaction_Date') is-invalid @enderror"
                            id="transaction_Date" name="transaction_Date" value="{{ $information->transaction_Date }}" required>
                        @error('transaction_Date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @break

                @case(9)
                    {{-- Cash Box --}}
                    <div class="mb-4">
                        <label for="net_income" class="form-label">Dinero Caja</label>
                        <input type="hidden" name="type" id="type" value="{{ $type }}">
                        <input type="integer" class="form-control @error('net_income') is-invalid @enderror"
                            id="net_income" name="net_income" placeholder="Ingrese el dinero de caja"
                            value="{{ $information->net_income }}" required>
                        @error('net_income')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            placeholder="Ingrese la descripción de la caja" rows="4" required>
                            {{ $information->description }}
                        </textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <label for="user_id" class="form-label">Quien Registra la caja:</label>
                        <select class="form-select" id="user_id" name="user_id">
                            <option selected>Seleccione la persona registrara en la caja</option>
                            @foreach ($users as $user)
                                <option value="{{ $user["id"] }}" {{ $user["id"] == $information->user_id ? 'selected' : '' }} >{{ $user["name"] }} {{ $user["last_name"] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="date_entry" class="form-label">Fecha de ingreso caja</label>
                        <input type="date" class="form-control @error('date_entry') is-invalid @enderror"
                            id="date_entry" name="date_entry" value="{{ old('date_entry', \Carbon\Carbon::parse($information->date_entry)->format('Y-m-d')) }}" required>
                        @error('date_entry')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            value="1" {{ old('status', $information->status == 1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(10)
                    {{-- Promotions --}}
                    <div class="mb-4">
                        <label for="promotion" class="form-label">Nombre Promoción</label>
                        <input type="integer" class="form-control @error('promotion') is-invalid @enderror"
                            id="promotion" name="promotion" placeholder="Ingrese el nombre de la promoción"
                            value="{{ old('promotion') }}" required>
                        @error('promotion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            placeholder="Ingrese la descripción de la promoción" rows="4" required>{{ old('description') }}
                                    </textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="prize" class="form-label">Precio Promoción</label>
                        <input type="integer" class="form-control @error('prize') is-invalid @enderror" id="prize"
                            name="prize" placeholder="Ingrese el precio de la promoción" value="{{ old('prize') }}"
                            required>
                        @error('prize')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="start_date" class="form-label">Fecha de inicio</label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                            id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="end_date" class="form-label">Fecha final</label>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                            id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(11)
                    {{-- Preparaciones --}}
                    <div class="form-check form-switch mb-4">
                        <label for="product_id" class="form-label">Productos</label>
                        <select class="form-select" id="product_id">
                            <option selected>Seleccione el producto</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="preparation" class="form-label">Titulo Preparación</label>
                        <input type="integer" class="form-control @error('preparation') is-invalid @enderror"
                            id="preparation" name="preparation" placeholder="Ingrese el titulo de la preparación"
                            value="{{ old('preparation') }}" required>
                        @error('preparation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            placeholder="Ingrese la descripción de la preparación" rows="4" required>{{ old('description') }}
                                    </textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="quantity" class="form-label">Cantidad Prepación</label>
                        <input type="integer" class="form-control @error('quantity') is-invalid @enderror"
                            id="quantity" name="quantity" placeholder="Ingrese la cantidad de la preparación"
                            value="{{ old('quantity') }}" required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(12)
                    {{-- Música --}}
                    <div class="mb-4">
                        <label for="song" class="form-label">Nombre Canción</label>
                        <input type="text" class="form-control @error('song') is-invalid @enderror"
                            id="song" name="song" placeholder="Ingrese el nombre de la canción"
                            value="{{ old('song') }}" required>
                        @error('song')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="artist" class="form-label">Artista</label>
                        <input type="text" class="form-control @error('artist') is-invalid @enderror"
                            id="artist" name="artist" placeholder="Ingrese el nombre del artista o banda"
                            value="{{ old('artist') }}" required>
                        @error('artist')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="order" class="form-label">Orden</label>
                        <input type="text" class="form-control @error('order') is-invalid @enderror"
                            id="order" name="order" placeholder="Ingrese el orden de la cancion en la lista"
                            value="{{ old('order') }}" required>
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(13)
                    {{-- Productos --}}
                    <div class="mb-4">
                        <label for="product" class="form-label">Producto</label>
                        <input type="integer" class="form-control @error('product') is-invalid @enderror"
                            id="product" name="product" placeholder="Ingrese el nombre del producto"
                            value="{{ old('product') }}" required>
                        @error('product')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <label for="category_id" class="form-label">Categorias</label>
                        <select class="form-select" id="category_id">
                            <option selected>Seleccione la categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->product }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="units" class="form-label">Unidad de presentación</label>
                        <input type="text" class="form-control @error('units') is-invalid @enderror"
                            id="units" name="units" placeholder="Ingrese la unidad de presentacion del producto"
                            value="{{ old('units') }}" required>
                        @error('units')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="prize_unit" class="form-label">Precio producto</label>
                        <input type="number" class="form-control @error('prize_unit') is-invalid @enderror"
                            id="prize_unit" name="prize_unit" placeholder="Ingrese el valor de la unidad del producto"
                            value="{{ old('prize_unit') }}" required>
                        @error('prize_unit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Estado</label>
                    </div>
                @break

                @case(14)
                    {{-- Categorias --}}
                    <div class="mb-4">
                        <label for="name" class="form-label">Nombre Categoria</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" name="name" placeholder="Ingrese el nombre de la categoria"
                            value="{{ $information->name }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @break

                @default
            @endswitch

        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm mb-3">Editar</button>
            <a type="submit" class="btn btn-outline-primary btn-lg rounded-pill shadow-sm"
                href="{{ route('list', ['type' => $type]) }}">Cancelar</a>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
