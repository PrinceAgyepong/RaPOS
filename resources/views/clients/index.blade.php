@extends('layouts.app', ['page' => 'Clients', 'pageSlug' => 'clients', 'section' => 'clients'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Clients</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary">Add Client</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- @include('alerts.success') --}}

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th>Name</th>
                                <th>Email / Telephone</th>
                                <th>Sales</th>
                                <th>Total Payment</th>
                                <th>Balance</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
                                            <br>
                                            {{ $client->phone }}
                                        </td>
                                        <td>{{$sales->where('client_id', $client->id)->count()}}</td>
                                        <td> GHC {{$client->payments->sum('amount')}} </td>
                                        <td> GHC {{$sales->where('status', 'unbalanced')->where('client_id', $client->id)->sum('balance')}} </td>
                                        
                                        {{-- <td>{{ $client->sales->count() }}</td>
                                        <td>{{ $client->transactions->sum('amount') }}</td>
                                        <td>{{ ($client->sales->sortByDesc('created_at')->first()) ? date('d-m-y', strtotime($client->sales->sortByDesc('created_at')->first()->created_at)) : 'N/A' }}</td> --}}
                                        <td class="td-actions text-right">
                                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-link"
                                                data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-link"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit Client">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            @if (auth()->user()->isAdmin)
                                                <form action="{{ route('clients.destroy', $client->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-link" data-toggle="tooltip"
                                                        data-placement="bottom" title="Delete Client"
                                                        onclick="confirm('Estás seguro que quieres eliminar a este Client? Los registros de sus compras y Transactions no serán eliminados.') ? this.parentElement.submit() : ''">
                                                        <i class="tim-icons icon-simple-remove"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $clients->links('vendor.pagination.bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
