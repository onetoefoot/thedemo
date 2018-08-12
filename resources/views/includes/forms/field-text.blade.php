                                <label for="input{{$displayName}}">{{$displayName}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input{{$displayName}}"><i class="{{$iconClass}}"></i><span>
                                    </div>
                                    <input type="text" class="form-control" id="input{{$displayName}}" placeholder="{{$placeholder}}"
                                        name="{{$fieldName}}" value="{{ $old }}" {{$required}}>
                                </div>