@csrf
<div class="md-form">
  <label>リスト名</label>
  <input type="text" name="title" class="form-control" required value="{{ $listing->title ?? old('title') }}">
</div>