@extends('web.dashboard.layout')

@section('main')
    <form action="{{route("dashboard.roles.store")}}" method="POST">
        @csrf
        <label>
            <input name="role_name" type="text" placeholder="role name"/>
        </label>
        <div class="role-card">
            <div class="card">
                <i class="fa-solid fa-2x fa-tractor"></i>
                <div class="container">
                    <label id="vehicle_role" >{{ ucfirst(__('word.vehicles')) }}</label>
                    <input type="checkbox" name="vehicle_role"/>
                    <p>
                        <div>
                            <label id="create_permission_vehicle" >{{ ucfirst(__('word.create')) }}</label>
                            <input type="checkbox" name="create_permission_vehicle"/>
                        </div>
                        <div>
                            <label id="edit_permission_vehicle" >{{ ucfirst(__('word.edit')) }}</label>
                            <input type="checkbox" name="edit_permission_vehicle"/>
                        </div>
                        <div>
                            <label id="delete_permission_vehicle" >{{ ucfirst(__('word.delete')) }}</label>
                            <input type="checkbox" name="delete_permission_vehicle"/>
                        </div>
                    </p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-2x fa-handshake"></i>
                <div class="container">
                    <label id="partner_role" >{{ ucfirst(__('word.partners')) }}</label>
                    <input type="checkbox" name="partner_role"/>
                    <p>
                    <div>
                        <label id="create_permission_partner" >{{ ucfirst(__('word.create')) }}</label>
                        <input type="checkbox" name="create_permission_partner"/>
                    </div>
                    <div>
                        <label id="edit_permission_partner" >{{ ucfirst(__('word.edit')) }}</label>
                        <input type="checkbox" name="edit_permission_partner"/>
                    </div>
                    <div>
                        <label id="delete_permission_partner" >{{ ucfirst(__('word.delete')) }}</label>
                        <input type="checkbox" name="delete_permission_partner"/>
                    </div>
                    </p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-2x fa-cash-register"></i>
                <div class="container">
                    <label id="client_role" >{{ ucfirst(__('word.clients')) }}</label>
                    <input type="checkbox" name="client_role"/>
                    <p>
                    <div>
                        <label id="create_permission_client" >{{ ucfirst(__('word.create')) }}</label>
                        <input type="checkbox" name="create_permission_client"/>
                    </div>
                    <div>
                        <label id="edit_permission_client" >{{ ucfirst(__('word.edit')) }}</label>
                        <input type="checkbox" name="edit_permission_client"/>
                    </div>
                    <div>
                        <label id="delete_permission_client" >{{ ucfirst(__('word.delete')) }}</label>
                        <input type="checkbox" name="delete_permission_client"/>
                    </div>
                    </p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-2x fa-truck-pickup"></i>
                <div class="container">
                    <label id="provider_role" >{{ ucfirst(__('word.providers')) }}</label>
                    <input type="checkbox" name="provider_role"/>
                    <p>
                    <div>
                        <label id="create_permission_provider" >{{ ucfirst(__('word.create')) }}</label>
                        <input type="checkbox" name="create_permission_provider"/>
                    </div>
                    <div>
                        <label id="edit_permission_provider" >{{ ucfirst(__('word.edit')) }}</label>
                        <input type="checkbox" name="edit_permission_provider"/>
                    </div>
                    <div>
                        <label id="delete_permission_provider" >{{ ucfirst(__('word.delete')) }}</label>
                        <input type="checkbox" name="delete_permission_provider"/>
                    </div>
                    </p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-2x fa-balance-scale-right"></i>
                <div class="container">
                    <label id="role_role" >{{ ucfirst(__('word.roles')) }}</label>
                    <input type="checkbox" name="role_role"/>
                    <p>
                    <div>
                        <label id="create_permission_role" >{{ ucfirst(__('word.create')) }}</label>
                        <input type="checkbox" name="create_permission_role"/>
                    </div>
                    <div>
                        <label id="edit_permission_role" >{{ ucfirst(__('word.edit')) }}</label>
                        <input type="checkbox" name="edit_permission_role"/>
                    </div>
                    <div>
                        <label id="delete_permission_role" >{{ ucfirst(__('word.delete')) }}</label>
                        <input type="checkbox" name="delete_permission_role"/>
                    </div>
                    </p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-2x fa-file-invoice"></i>
                <div class="container">
                    <label id="client_invoice_role" >{{ ucfirst(__('word.client-invoices')) }}</label>
                    <input type="checkbox" name="client_invoice_role"/>
                    <p>
                    <div>
                        <label id="create_permission_client_invoice" >{{ ucfirst(__('word.create')) }}</label>
                        <input type="checkbox" name="create_permission_client_invoice"/>
                    </div>
                    <div>
                        <label id="edit_permission_client_invoice" >{{ ucfirst(__('word.edit')) }}</label>
                        <input type="checkbox" name="edit_permission_client_invoice"/>
                    </div>
                    <div>
                        <label id="delete_permission_client_invoice" >{{ ucfirst(__('word.delete')) }}</label>
                        <input type="checkbox" name="delete_permission_client_invoice"/>
                    </div>
                    </p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-2x fa-file-invoice"></i>
                <div class="container">
                    <label id="provider_invoice_role" >{{ ucfirst(__('word.provider-invoices')) }}</label>
                    <input type="checkbox" name="provider_invoice_role"/>
                    <p>
                    <div>
                        <label id="create_permission_provider_invoice" >{{ ucfirst(__('word.create')) }}</label>
                        <input type="checkbox" name="create_permission_provider_invoice"/>
                    </div>
                    <div>
                        <label id="edit_permission_provider_invoice" >{{ ucfirst(__('word.edit')) }}</label>
                        <input type="checkbox" name="edit_permission_provider_invoice"/>
                    </div>
                    <div>
                        <label id="delete_permission_provider_invoice" >{{ ucfirst(__('word.delete')) }}</label>
                        <input type="checkbox" name="delete_permission_provider_invoice"/>
                    </div>
                    </p>
                </div>
            </div>
            <div class="card">
                <i class="fa-solid fa-2x fa-feather-pointed"></i>
                <div class="container">
                    <label id="product_role" >{{ ucfirst(__('word.products')) }}</label>
                    <input type="checkbox" name="product_role"/>
                    <p>
                    <div>
                        <label id="create_permission_product" >{{ ucfirst(__('word.create')) }}</label>
                        <input type="checkbox" name="create_permission_product"/>
                    </div>
                    <div>
                        <label id="edit_permission_product" >{{ ucfirst(__('word.edit')) }}</label>
                        <input type="checkbox" name="edit_permission_product"/>
                    </div>
                    <div>
                        <label id="delete_permission_product" >{{ ucfirst(__('word.delete')) }}</label>
                        <input type="checkbox" name="delete_permission_product"/>
                    </div>
                    </p>
                </div>
            </div>
        </div>

        @foreach($permissions as $permission)
            <label>
                <input type="checkbox" name="permissions[]" value="{{$permission->id}}"/>
                {{ __($permission->name) }}
            </label>
        @endforeach
        <input type="submit">
    </form>
@endsection
