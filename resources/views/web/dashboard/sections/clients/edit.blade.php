@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    Client edit page

    <div class="editor"></div>
    <button id="save">save</button>
@endsection

@push('js')
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script>
        InlineEditor
            .create( document.querySelector( '.editor' ), {
                languages:[
                    @foreach($client->language as $lang)
                    {
                        code:'{{$lang->code}}',
                        name:'{{$lang->name}}',
                        html:'{!! $lang->pivot->content  !!}'
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
