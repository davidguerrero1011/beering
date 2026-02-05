<div class="table-responsive">

    <div class="flex justify-content-between align-items-center mb-4">
        @switch($type)
            @case(1)
            @case(2)
            @case(3)
            @case(4)
            @case(5)
            @case(6)
            @case(7)
            @case(8)
            @case(10)
            @case(11)
            @case(12)
            @case(13)
            @case(14)
            @case(15)
            @case(16)
                <a type="button" class="btn btn-primary mb-4" href="{{ route('create', ['type' => $type]) }}">Crear</a>
                @break
            @case(9)
                @if (is_null($currenCash) || is_null($currenCash->net_income))
                    <a type="button" class="btn btn-primary mb-4 {{ $block == 1 ? 'disabled' : '' }}" href="{{ route('create', ['type' => $type]) }}" aria-disabled="{{ $block == 1 ? true : false }}">Crear</a>
                @endif        
                @break
            @default
        @endswitch

        <form action="{{ route('list', ['type' => $type]) }}" method="get" class="d-flex" style="max-width: 300px";>
            <input type="text" name="search" class="form-control me-2" placeholder="Buscar...">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </form>
    </div>

    <table class="table table-striped table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                @switch($type)
                    @case(1)
                        <th>País</th>
                        <th>Estatus</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(2)
                        <th>Ciudad</th>
                        <th>País</th>
                        <th>Estatus</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(3)
                        <th>Nombre</th>
                        <th>Estatus</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(4)
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cumpleaños</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Barrio</th>
                        <th>Ciudad</th>
                        <th>Role</th>
                        <th>Estatus</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(5)
                        <th>Mesa</th>
                        <th>Disponibilidad</th>
                        <th>Estado</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(6)
                        <th>Producto</th>
                        <th>Proveedor</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(7)
                        <th>Base</th>
                        <th>Descripción</th>
                        <th>Usuario</th>
                        <th>Fecha Entrada</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(8)
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Usuario</th>
                        <th>Fecha Transacción</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(9)
                        <th>Pago</th>
                        <th>Descripción</th>
                        <th>Quien Paga</th>
                        <th>Fecha Movimiento</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(10)
                        <th>Promoción</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Terminación</th>
                        <th>Estatus</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(11)
                        <th>Producto</th>
                        <th>Preparación</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(12)
                        <th>Canción</th>
                        <th>Mesa</th>
                        <th>Orden</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(13)
                        <th>Producto</th>
                        <th>Categoria</th>
                        <th>Unidades</th>
                        <th>Precio Unidad</th>
                        <th>Estado</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(14)
                        <th>Categoria</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(15)
                        <th>Tipo</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                    @break

                    @case(16)
                        <th>Razon Social</th>
                        <th>Nit</th>
                        <th>Correo</th>
                        <th>Celular</th>
                        <th>Telefono</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>Contacto</th>
                    @break

                    @default
                @endswitch
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($information as $i => $item)
                <tr>
                    @switch($type)
                        @case(1)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->name }}</th>
                            <th>
                                <button type="button" class="{{ $item->status == 1 ? 'btn btn-primary' : 'btn btn-danger' }}" onclick="changeStatus({{ $item->id }}, {{ $item->status }}, {{ $type }})">
                                    {{ $item->status == 1 ? 'Activo' : 'Inactivo' }}
                                </button>
                            </th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(2)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->name }}</th>
                            <th>{{ $item->country->name }}</th>
                            <th>
                                <button type="button" class="{{ $item->status == 1 ? 'btn btn-primary' : 'btn btn-danger' }}" onclick="changeStatus({{ $item->id }}, {{ $item->status }}, {{ $type }})">
                                    {{ $item->status == 1 ? 'Activo' : 'Inactivo' }}
                                </button>
                            </th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(3)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->name }}</th>
                            <th>
                                <button type="button" class="{{ $item->status == 1 ? 'btn btn-primary' : 'btn btn-danger' }}" onclick="changeStatus({{ $item->id }}, {{ $item->status }}, {{ $type }})">
                                    {{ $item->status == 1 ? 'Activo' : 'Inactivo' }}
                                </button>
                            </th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(4)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->name }}</th>
                            <th>{{ $item->last_name }}</th>
                            <th>{{ $item->birthday }}</th>
                            <th>{{ $item->cellphone }}</th>
                            <th>{{ $item->email }}</th>
                            <th>{{ $item->address }}</th>
                            <th>{{ $item->neightboarhood }}</th>
                            <th>{{ $item->city->name }}</th>
                            <th>{{ $item->role->name }}</th>
                            <th>
                                <button type="button" class="{{ $item->status == 1 ? 'btn btn-primary' : 'btn btn-danger' }}" onclick="changeStatus({{ $item->id }}, {{ $item->status }}, {{ $type }})">
                                    {{ $item->status == 1 ? 'Activo' : 'Inactivo' }}
                                </button>
                            </th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(5)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->table }} - {{ $item->number }}</th>
                            <th class="{{ $item->state == 'Disponible' ? 'text-primary' : ($item->state == 'Reservada' ? 'text-warning' : 'text-danger')}}">{{ $item->state }}</th>
                            <th>
                                <button type="button" class="{{ $item->status == 1 ? 'btn btn-primary' : 'btn btn-danger' }}" onclick="changeStatus({{ $item->id }}, {{ $item->status }}, {{ $type }})">
                                    {{ $item->status == 1 ? 'Activo' : 'Inactivo' }}
                                </button>
                            </th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(6)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->product->product }}</th>
                            <th>{{ $item->supplier->supplier_name }}</th>
                            <th>{{ $item->amont }}</th>
                            <th>${{ number_format($item->prize, 0, ',', '.') }}</th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(7)
                            <th>{{ $item->id }}</th>
                            <th>${{ number_format($item->net_income, 2, ',', '.') }}</th>
                            <th>{{ $item->description }}</th>
                            <th>{{ $item->user->name }} {{ $item->user->last_name }}</th>
                            <th>{{ \Carbon\Carbon::parse($item->date_entry)->locale('es')->translatedFormat('l j \d\e F \a \l\a\s H:i:s') }}</th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(8)
                            <th>{{ $item->id }}</th>
                            <th>${{ number_format($item->amount, 0, ',', '.') }}</th>
                            <th>{{ $item->description }}</th>
                            <th>{{ $item->user->name }} {{ $item->user->last_name }}</th>
                            <th>{{ $item->transaction_Date }}</th>
                            <th>{{ $item->created_at->locale('es')->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->locale('es')->diffForHumans() }}</th>
                        @break

                        @case(9)
                            <th>{{ $item->id }}</th>
                            <th>${{ number_format($item->amount, 2, ',', '.') }}</th>
                            <th>{{ $item->description }}</th>
                            <th>{{ $item->user_id }}</th>
                            <th>{{ $item->transaction_Date->locale('es')->translatedFormat('F j, Y') }}</th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(10)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->promotion }}</th>
                            <th>{{ $item->description }}</th>
                            <th>${{ number_format($item->prize) }}</th>
                            <th>{{ $item->start_date }}</th>
                            <th>{{ $item->end_date }}</th>
                            <th>
                                <button type="button" class="{{ $item->status == 1 ? 'btn btn-primary' : 'btn btn-danger' }}" onclick="changeStatus({{ $item->id }}, {{ $item->status }}, {{ $type }})">
                                    {{ $item->status == 1 ? 'Activo' : 'Inactivo' }}
                                </button>
                            </th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(11)
                            <th>{{ $item->id }}</th>
                            <th>
                                @foreach ($item->products as $product)
                                    <span class="badge bg-primary">{{ $product->product }}</span>
                                @endforeach
                            </th>
                            <th>{{ $item->preparation }}</th>
                            <th>{{ $item->description }}</th>
                            <th>{{ $item->quantity }}</th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(12)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->song }} - {{ $item->artist }}</th>
                            <th>
                                @if (!empty($item->clubTables) && $item->clubTables->count())
                                    {{ $item->clubTables->map(fn($ct) => $ct->table . ' - ' . $ct->number)->implode(', ') }}
                                @else
                                    Sin mesas
                                @endif
                            </th>
                            <th>{{ $item->order }}</th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(13)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->product }}</th>
                            <th>{{ $item->category->name }}</th>
                            <th>{{ $item->units }}</th>
                            <th>${{ number_format($item->prize_unit) }}</th>
                            <th>
                                <button type="button" class="{{ $item->status == 1 ? 'btn btn-primary' : 'btn btn-danger' }}" onclick="changeStatus({{ $item->id }}, {{ $item->status }}, {{ $type }})">
                                    {{ $item->status == 1 ? 'Activo' : 'Inactivo' }}
                                </button>
                            </th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(14)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->name }}</th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(15)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->type }}</th>
                            <th>{{ $item->created_at->diffForHumans() }}</th>
                            <th>{{ $item->updated_at->diffForHumans() }}</th>
                        @break

                        @case(16)
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->supplier_name }}</th>
                            <th>{{ $item->nit }}</th>
                            <th>{{ $item->email }}</th>
                            <th>{{ $item->cellphone }}</th>
                            <th>{{ $item->phone }}</th>
                            <th>{{ $item->address }}</th>
                            <th>{{ $item->city->name }}</th>
                            <th>{{ $item->user->name }} {{ $item->user->last_name }}</th>
                        @break

                        @default
                    @endswitch

                    @if ($type == 7 || $type == 4)
                        <th>
                            <a type="button" class="btn btn-success {{ $item->status == 0 ? 'disabled' : '' }}" href="{{ route('edit', ['id' => $item->id, 'type' => $type]) }}" aria-disabled="{{ $item->status == 0 ? true : false }}">Editar</a>
                            <button type="button" class="btn btn-warning" {{ $item->status == 0 ? 'disabled' : '' }}
                                onclick="deleteConfig({{ $item->id }}, {{ $type }});">Borrar</button>
                        </th>
                    @else
                        <th>
                            <a type="button" class="btn btn-success" href="{{ route('edit', ['id' => $item->id, 'type' => $type]) }}">Editar</a>
                            <button type="button" class="btn btn-warning" onclick="deleteConfig({{ $item->id }}, {{ $type }});">Borrar</button>
                        </th>
                    @endif
                </tr>
                @empty
                    <tr>
                        @switch($type)
                            @case(1)
                            @case(3)
                            @case(14)
                            @case(15)
                                @php
                                    $rows = 6;
                                @endphp
                            @break

                            @case(2)
                            @case(5)
                                @php
                                    $rows = 7;
                                @endphp
                            @break

                            @case(4)
                                @php
                                    $rows = 14;
                                @endphp
                            @break

                            @case(6)
                            @case(11)
                            @case(13)
                                @php
                                    $rows = 9;
                                @endphp
                            @break

                            @case(7)
                            @case(8)
                            @case(10)
                            @case(16)
                                @php
                                    $rows = 10;
                                @endphp
                            @break

                            @case(9)
                            @case(12)
                                @php
                                    $rows = 8;
                                @endphp
                            @break
                            
                            @default
                        @endswitch
                        <td colspan="{{ $rows }}">No hay registros para mostrar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $information->appends(request()->query())->links() }}
        </div>
    </div>
