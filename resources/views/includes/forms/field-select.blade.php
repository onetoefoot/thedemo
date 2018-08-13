                                <label for="input{{$displayName}}">{{$displayName}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="input{{$displayName}}"><i class="{{@$iconClass ? $iconClass : ''}}"></i><span>
                                    </div>
                                    <select id="input{{$fieldName}}" name="{{$fieldName}}" class="form-control" {{@$required ? 'required' : ''}}>
                                        <option selected>Choose...</option>
                                        @foreach ($timezonelist as $key => $value)
                                        <option value="{{$value}}" @if ($value == $old) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>