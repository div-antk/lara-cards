<div class="col-sm-4">
  <div class="card p-3 mt-3 shadow-none bg-light">
    <div class="card-text">
      {{ $listing->title }}

      @if( Auth::id() === $listing->user_id )
    
      <!-- dropdown -->
        <div class="float-right card-text">
          <div class="dropdown">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ url('/listingsedit', $listing->id) }}">
                <i class="fas fa-pen mr-1"></i>リストを編集する
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $listing->id }}">
                <i class="fas fa-trash-alt mr-1"></i>リストを削除する
              </a>
            </div>
          </div>
        </div>
        <!-- dropdown -->
  
        <!-- modal -->
        <div id="modal-delete-{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <form method="GET" action="{{ url('/listingsdelete', $listing->id) }}">
                @csrf
                {{-- @method('DELETE') --}}
                <div class="modal-body">
                  {{ $listing->title }}を削除します。よろしいですか？
                </div>
                <div class="modal-footer justify-content-between">
                  <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                  <button type="submit" class="btn btn-danger">削除する</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal -->

        @endif
        <a href="/listing/{{$listing->id}}/card/new" class="text-dark">
          <i class="far fa-plus-square fa-1x ml-1"></i>
        </a>
      </div>

      {{-- <a class="float-right ml-2" style="color: black" onclick="return confirm('{{ $listing->title }}を削除して大丈夫ですか？')" href="{{ url('/listingsdelete', $listing->id) }}">
        <i class="fas fa-trash"></i>
      </a>
      <a class="float-right" style="color: black" onclick="return confirm('{{ $listing->title }}を編集しますか？')" href="{{ url('/listingsedit', $listing->id) }}">
        <i class="fas fa-trash"></i>
      </a>--}}
  </div>
</div>