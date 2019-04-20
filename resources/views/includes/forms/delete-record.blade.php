                        <form action="{{ $route }}" method="POST" class="form-inline form-delete">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }} 
                            <button class="btn btn-link form-button-delete c-grey-700"><i class="material-icons mR-10">delete</i></button>
                        </form>
