                                <label for="input{{$displayName}}">{{$displayName}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input{{$displayName}}"><i class="{{$iconClass}}"></i><span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="{{$fieldName}}" class="custom-file-input" id="{{$fieldName}}">
                                        <label class="custom-file-label" for="{{$fieldName}}">{{__('Choose file')}}</label>
                                    </div>
                                </div>