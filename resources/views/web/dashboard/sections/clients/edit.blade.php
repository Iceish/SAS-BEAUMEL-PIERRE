@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.editing', ['item' => $client->name])) }}</h2>


    <div>
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    </div>
    <form id="edit" action="{{ route("dashboard.clients.update",["client"=>$client->id]) }}" method="post">
        @csrf
        <h4>{{ ucfirst(__('custom/words.data.crud.edit')) }}</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}</label>
            <input type="text" id="name" name="name" placeholder="{{ __('custom/words.data.input.text.name.placeholder') }}" value="{{$client->name}}"/>
        </div>

        <div class="field">
            <label for="email">{{ ucfirst(__('custom/words.data.input.email.default.label')) }}</label>
            <input type="email" id="email" name="email" placeholder="{{ __('custom/words.data.input.email.default.placeholder') }}" value="{{$client->email}}"/>
        </div>

        <div class="field">
            <label for="address">{{ ucfirst(__('custom/words.data.input.text.address.label')) }}</label>
            <input type="text" id="address" name="address" placeholder="{{ __('custom/words.data.input.text.address.placeholder') }}" value="{{$client->address}}"/>
        </div>

        <div class="field">
            <label for="city">{{ ucfirst(__('custom/words.data.input.text.city.label')) }}</label>
            <input type="text" id="city" name="city" placeholder="{{ __('custom/words.data.input.text.city.placeholder') }}" value="{{$client->city}}"/>
        </div>

        <div class="field">
            <label for="postal">{{ ucfirst(__('custom/words.data.input.number.postal-code.label')) }}</label>
            <input type="number" id="postal" name="postal_code" placeholder="{{ __('custom/words.data.input.number.postal-code.placeholder') }}" value="{{$client->postal_code}}}"/>
        </div>

        <div class="field">
            <label for="tel">{{ ucfirst(__('custom/words.data.input.text.tel.label')) }}</label>
            <input type="text" id="tel" name="tel" placeholder="{{ __('custom/words.data.input.text.tel.placeholder') }}" value="{{$client->tel}}"/>
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
        <p class="caption"><i class="fa-solid fa-circle-exclamation"></i> {{ucfirst(__('custom/messages.informative.form.client'))}}</p>
    </form>


    <div class="editor"></div>
    <input class="btn" type="submit" id="save" value="{{ucfirst(__('custom/words.data.input.submit.default.label'))}}">

@endsection

@push('js')
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script>
        InlineEditor
            .create( document.querySelector( '.editor' ), {
                languages:[
                    @foreach($languages as $lang)
                    {
                        code:'{{$lang->code}}',
                        name:'{{$lang->name}}',
                        html:'{!! $client->language->where('id',$lang->id)->first()->pivot->content ?? ""  !!}'
                    },
                    @endforeach
                ],
                licenseKey: '',
                simpleUpload: {
                    uploadUrl: '{{ route('dashboard.store-image') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}',
                    }
                },
                imageRemoveEvent: {
                    callback: (imagesSrc, nodeObjects) => {
                        imagesSrc.forEach(imageSrc => {
                            try{
                                new URL(imageSrc)
                                return;
                            }catch (e) {}
                            let imageName = (new URL('{{ URL::to('/') }}/'+imageSrc)).lastSegment()

                            const request = new Request('{{route('dashboard.delete-image')}}', {
                                method: 'POST',
                                headers:{
                                    'X-CSRF-TOKEN': '{{csrf_token()}}',
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: `file=${imageName}`
                            });
                            fetch(request)
                                .then(response => {
                                    if (response.status === 200) {
                                        return response.json();
                                    } else {
                                        throw new Error('Something went wrong on api server!');
                                    }
                                })
                                .then(response => {
                                    console.debug(response);
                                }).catch(error => {
                                console.error(error);
                            });

                        })
                    }
                }
            })
            .then( editor => {
                window.editor = editor;
            })
            .catch( error => {
                console.error( 'Oops, something went wrong!' );
                console.error( error );
            });
    </script>
    <script>
        let button = document.querySelector("#save")
        button.addEventListener('click',()=>{
            let langsHTML = editor.plugins.get("MultiLanguages").langHtml;
            let array = []
            for(let lang in langsHTML){
                let obj = {}
                obj['lang'] = lang
                obj['content'] = langsHTML[lang]
                array.push(obj)
            }
            const request = new Request('{{route('dashboard.store-content')}}', {
                method: 'POST',
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({'htmls':array,'id':{{$client->id}},'model':'Client'})
            });
            fetch(request)
                .then(response => {
                    if (response.status === 200) {
                        return response.json();
                    } else {
                        throw new Error('Something went wrong on api server!');
                    }
                })
                .then(response => {
                    console.debug(response);
                }).catch(error => {
                console.error(error);
            });
        })
    </script>
@endpush
