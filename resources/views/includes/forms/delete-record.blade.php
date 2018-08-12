                        <form action="{{ $route }}" method="POST" class="form-inline form-delete">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }} 
                            <button class="btn btn-link form-button-delete c-grey-700"><i class="ti-trash mR-10"></i></button>
                        </form>
