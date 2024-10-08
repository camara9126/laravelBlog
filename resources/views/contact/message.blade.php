@include('includes.header')

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('danger') }}
                </div>
            @endif
        <div class="row mt-0">
            <div class="col-md-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __("Messages") }}
                </h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('dashboard.index') }}" class="btn btn-danger">Retour Dashboard</a>
            </div>
        </div>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Sujet</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @if($contact->count() > 0)
                            @foreach($contact as $c)
                            <tbody>
                                <tr>
                                    <th>{{$c->created_at}}</th>
                                    <td>{{$c->name}}</td>
                                    <td>{{$c->subject}}</td>
                                    <td>{{$c->email}}</td>
                                    <td>
                                        <a href="{{route('contact.destroy',['contact' => $c->id])}}" class="btn btn-outline-danger">Supprimer</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><b class="text-warning">Message</b></th>
                                    <td colspan="4">{{$c->message}}</td>
                                </tr>                                
                            </tbody>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div>