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
        <div class="row">
            <div class="col-md-10">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __("Pulicité") }}
                </h2>
            </div>
            <div class="col-md-2">
                <a href="{{ route('pub.index') }}" class="btn btn-danger">Retour</a>
            </div>
        </div>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                    <div class="row">
                        <div class="col-md-6 form-group text-center">
                            <label for="">Titre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-center" value="{{$pubs->title }}" name="title" required>
                        </div>
                        <div class="col-md-6 form-group text-center">
                            <label for="">Lien <span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-center" value="{{$pubs->lien }}" name="lien" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group text-center">
                            <label for="">Contact<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{$pubs->contact }}" name="contact" required>
                        </div>
                        <div class="col-md-6 form-group text-center">
                            <label for="">Image<span class="text-danger">*</span></label>
                            <img src="{{$pubs->image }}" width="300" alt="">
                            <!-- <input type="file" class="form-control text-center" value="{{$pubs->image }}" name="image" required> -->
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>
@include('includes.footer')

